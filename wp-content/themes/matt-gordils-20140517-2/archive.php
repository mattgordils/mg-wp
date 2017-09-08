<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>

<?php
	if ( have_posts() )
		the_post();
?>

<div class="container">
  <h1>
    <?php if ( is_day() ) : ?>
      <?php printf( __( '%s', 'starkers' ), get_the_date() ); ?>
    
    <?php elseif ( is_month() ) : ?>
      <?php printf( __( '%s', 'starkers' ), get_the_date('F Y') ); ?>
    
    <?php elseif ( is_year() ) : ?>
      <?php printf( __( '%s', 'starkers' ), get_the_date('Y') ); ?>
    
    <?php else : ?>
      <?php _e( 'Archive', 'starkers' ); ?>
    <?php endif; ?>
  </h1>
</div>
<?php
	rewind_posts();

	get_template_part( 'loop', 'archive' );
	
?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>