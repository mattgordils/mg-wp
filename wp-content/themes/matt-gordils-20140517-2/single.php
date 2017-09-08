<?
/*
* Single Post Page
*/
?>

<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>

<div class="container">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<nav class="next-prev">
			<span class="prev"><?php c2c_previous_or_loop_post_link( '%link', '' . _x( '<span>&larr;</span>', 'Previous post link', 'starkers' ) . ' %title' ); ?></span>
			<span class="next"><?php c2c_next_or_loop_post_link( '%link', '%title ' . _x( '<span>&rarr;</span>', 'Next post link', 'starkers' ) . '' ); ?></span>
		</nav>
		
		<article><!--begin post-->
          <?php 
            if ( has_post_thumbnail() ) { 
            the_post_thumbnail( 'other-size' ); 
            } 
          ?>
          <h2><? the_title(); ?></h2>
        
        <a class="fade" href="<?php  // Post author
          echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
          <?php the_author_meta( 'display_name' ); ?>
        </a>
        <p><!--Categories no link-->
          <?php // Post categories with link
            $categories = get_the_category();
            $before = 'Categorized as ';
            $separator = ', ';
            $output = '';
            if($categories){
              foreach($categories as $category) {
                $output .= '<a class="fade" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
              }
            echo($before);
            echo trim($output, $separator);
            }
          ?>
          <?php // Post tags with link
            $posttags = get_the_tags();
            $before = 'and tagged as ';
            $separator = ', ';
            $output = '';
            if ($posttags) {
              foreach($posttags as $tag) {
                $output .= '<a class="fade" href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
              }
            echo($before);
            echo trim($output, $separator);
            }
          ?>
        </p>

          <?php
            $taxonomy_ar = get_the_terms($post->ID, 'custom_cats'); // Change it taxonomy name
            $before = 'The custom catergories are ';
            $separator = ', ';
            $output = '';
            if ($taxonomy_ar) {
              foreach ($taxonomy_ar as $taxonomy_term) {
                $term_link = get_term_link( $taxonomy_term, 'species' );
                $output .= '<a class="fade" href="' . $term_link . '"  title="' . esc_attr( sprintf( __( "View all posts in %s" ), $taxonomy_term->name ) ) . '">' . $taxonomy_term->name . '</a>'.$separator;
              }
            echo '<p>';
            echo($before);
            echo trim($output, $separator);
            echo '</p>';
            }
          ?>
        <p><?php the_time('l, F jS, Y') ?></p>

        <?php the_content(); ?>
      </article>

<?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>