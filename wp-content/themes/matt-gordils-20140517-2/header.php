<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?><!DOCTYPE html>
 
    <header class="blk">
      <div class="container">
        <hgroup>
          <?php
            $attachment_id = get_field('full_logo', 'options');
            $image = wp_get_attachment_image_src( $attachment_id, 'full' );
          ?>
          <?php if ( is_front_page() ) { ?> 
          
          <?php } else { ?>	
            <h1><a class="fade" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img class="logo"src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
            </a></h1>
          <?php } ?>
          
          <?php if (is_singular( 'projects' )) { ?>		        
		        <span class="prev">
		          <?php c2c_previous_or_loop_post_link( '%link', '' . _x( '<span class="arrow">&larr;</span>', 'Previous post link', 'starkers' ) . '<span class="desktop"> %title</span>' ); ?>
		        </span>
	
            <span class="next">
		          <?php c2c_next_or_loop_post_link( '%link', '<span class="desktop">%title </span>' . _x( '<span class="arrow">&rarr;</span>', 'Next post link', 'starkers' ) . '' ); ?>
		        </span>
          <?php } ?>
          
        </hgroup>
      </div>
      <hr class="top">
    </header> 
    <div id="content">
