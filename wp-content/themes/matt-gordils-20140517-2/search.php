<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

  <body <?php body_class(); ?>>
    <?php get_header(); ?>
    
    <div class="container">
    
    <?php if ( have_posts() ) : ?>
    	<div class="container">
    		<h1><?php printf( __( 'Search Results for: %s', 'starkers' ), '' . get_search_query() . '' ); ?></h1>
    	</div>
    			<?php include 'snippets/short-post-output.php'; ?>
    <?php else : ?>
    	<div class="container">
    		<h2><?php _e( 'Nothing Found', 'starkers' ); ?></h2>
    			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starkers' ); ?></p>
    			<?php include 'searchform.php'; ?>
    		</div>
    <?php endif; ?>
    
    <?php //get_sidebar(); ?>
    
    <?php get_footer(); ?>
    <?php include('assets/includes/foot.php'); ?>
    
  </body>
</html>