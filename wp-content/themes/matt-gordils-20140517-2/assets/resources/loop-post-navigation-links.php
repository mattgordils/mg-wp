<?php

defined( 'ABSPATH' ) or die();

global $c2c_loop_navigation_find;
$c2c_loop_navigation_find = false;

if ( ! function_exists( 'c2c_next_or_loop_post_link' ) ) :
/**
 * Display next post link that is adjacent to the current post, or if none, then
 * the first post in the series.
 *
 * @since 2.0
 *
 * @param string $format (optional) Link anchor format. Default is '%link &raquo;'.
 * @param string $link (optional) Link permalink format. Default is '%title'.
 * @param bool $in_same_cat (optional) Whether link should be in same category. Default is false.
 * @param string $excluded_categories (optional) Excluded categories IDs. Default is ''.
 * @return void
 */
function c2c_next_or_loop_post_link( $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '' ) {
	c2c_adjacent_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories, false );
}
add_action( 'c2c_next_or_loop_post_link', 'c2c_next_or_loop_post_link', 10, 4 );
endif;

if ( ! function_exists( 'c2c_previous_or_loop_post_link' ) ) :
/**
 * Display previous post link that is adjacent to the current post, or if none,
 * then the last post in the series.
 *
 * @since 2.0
 *
 * @param string $format (optional) Link anchor format. Default is '&laquo; %link'.
 * @param string $link (optional) Link permalink format. Default is '%title'.
 * @param bool $in_same_cat (optional) Whether link should be in same category. Default is false.
 * @param string $excluded_categories (optional) Excluded categories IDs. Default is ''.
 * @return void
 */
function c2c_previous_or_loop_post_link( $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '' ) {
	c2c_adjacent_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories, true );
}
add_action( 'c2c_previous_or_loop_post_link', 'c2c_previous_or_loop_post_link', 10, 4 );
endif;

if ( ! function_exists( 'c2c_adjacent_or_loop_post_link' ) ) :
/**
 * Display adjacent post link or the post link for the post at the opposite end of the series.
 *
 * Can be either next post link or previous.
 *
 * @param string $format Link anchor format.
 * @param string $link Link permalink format.
 * @param bool $in_same_cat (optional) Whether link should be in same category. Default is false.
 * @param string $excluded_categories (optional) Excluded categories IDs. Default is ''.
 * @param bool $previous (optional) Whether to display link to previous post. Default is true.
 * @return void
 */
function c2c_adjacent_or_loop_post_link( $format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true ) {
	if ( $previous && is_attachment() && is_object( $GLOBALS['post'] ) )
		$post = get_post( $GLOBALS['post']->post_parent );
	else
		$post = get_adjacent_post( $in_same_cat, $excluded_categories, $previous );

	// START The only modification of adjacent_post_link() -- get the last/first post if there isn't a legitimate previous/next post
	if ( ! $post ) {
		global $c2c_loop_navigation_find;
		$c2c_loop_navigation_find = true;
		$post = get_adjacent_post( $in_same_cat, $excluded_categories, $previous );
		$c2c_loop_navigation_find = false;
	}
	// END modification

	if ( ! $post ) {
		$output = '';
	} else {
		$title = $post->post_title;

		if ( empty( $post->post_title ) )
			$title = $previous ? __( 'Previous Post' ) : __( 'Next Post' );

		$title = apply_filters( 'the_title', $title, $post->ID );
		$date = mysql2date( get_option( 'date_format' ), $post->post_date );
		$rel = $previous ? 'prev' : 'next';

		$string = '<a class="fade" href="' . get_permalink( $post ) . '" rel="' . $rel . '">';
		$link = str_replace( '%title', $title, $link );
		$link = str_replace( '%date', $date, $link );
		$link = $string . $link . '</a>';

		$output = str_replace( '%link', $link, $format );
	}

	$adjacent = $previous ? 'previous' : 'next';

	// Apply the filters present in WP's adjacent_or_loop_post_link()
	$output = apply_filters( "{$adjacent}_post_link", $output, $format, $link, $post );

	// Apply old {$adjacent}_or_loop_post_link filters.
	// Deprecated as of v2.0. Here temporarily for backwards compatibility.
	$output = apply_filters( "{$adjacent}_or_loop_post_link", $output, $format, $link, $post );

	// Apply custom filters and echo
	echo apply_filters( "c2c_{$adjacent}_or_loop_post_link_output", $output, $format, $link, $post );
}
add_action( 'c2c_adjacent_or_loop_post_link', 'c2c_previous_or_loop_post_link', 10, 5 );
endif;

if ( ! function_exists( 'c2c_modify_nextprevious_post_where' ) ) :
/**
 * Modifies the SQL WHERE clause used by WordPress when getting a previous/next post to accommodate looping navigation.
 *
 * Can be either next post link or previous.
 *
 * @param string $where SQL WHERE clause generated by WordPress
 * @param string $link Link permalink format.
 * @param bool $in_same_cat (optional) Whether link should be in same category. Default is false.
 * @param string $excluded_categories (optional) Excluded categories IDs. Default is ''.
 * @param bool $previous (optional) Whether to display link to previous post. Default is true.
 * @return void
 */
function c2c_modify_nextprevious_post_where( $where ) {
	// The incoming WHERE statement generated by WordPress is a condition for the date, relative to the current
	//	post's date.  To find the post we want, we just need to get rid of that condition (which is the first) and retain the others.
	if ( $GLOBALS['c2c_loop_navigation_find'] )
		$where = preg_replace( '/WHERE (.+) AND/imsU', 'WHERE', $where );
	return $where;
}
endif;

/*
 * Register actions to filter WHERE clause when previous or next post query is being processed.
 */
add_filter( 'get_next_post_where',     'c2c_modify_nextprevious_post_where' );
add_filter( 'get_previous_post_where', 'c2c_modify_nextprevious_post_where' );


/*****
 * DEPRECATED FUNCTIONS
 *****/

if ( ! function_exists( 'next_or_loop_post_link' ) ) :
	/**
	 * Display next post link that is adjacent to the current post, or if none,
	 * then the first post in the series.
	 *
	 * @since 1.0
	 * @deprecated 2.0 Use c2c_next_or_loop_post_link() instead
	 */
	function next_or_loop_post_link( $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '' ) {
		_deprecated_function( 'next_or_loop_post_link', '2.0', 'c2c_next_or_loop_post_link' );
		return c2c_next_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories );
	}
endif;

if ( ! function_exists( 'previous_or_loop_post_link' ) ) :
	/**
	 * Display previous post link that is adjacent to the current post, or if
	 * none, then the last post in the series.
	 *
	 * @since 1.0
	 * @deprecated 2.0 Use c2c_previous_or_loop_post_link() instead
	 */
	function previous_or_loop_post_link( $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '' ) {
		_deprecated_function( 'previous_or_loop_post_link', '2.0', 'c2c_previous_or_loop_post_link' );
		return c2c_previous_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories );
	}
endif;

if ( ! function_exists( 'adjacent_or_loop_post_link' ) ) :
	/**
	 * Display previous post link that is adjacent to the current post, or if
	 * none, then the last post in the series.
	 *
	 * @since 1.0
	 * @deprecated 2.0 Use c2c_adjacent_or_loop_post_link() instead
	 */
	function adjacent_or_loop_post_link( $format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true ) {
		_deprecated_function( 'adjacent_or_loop_post_link', '2.0', 'c2c_adjacent_or_loop_post_link' );
		return c2c_adjacent_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories, $previous );
	}
endif;
