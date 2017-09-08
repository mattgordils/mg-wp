<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
  <?php get_header(); ?>
  
  <div class="container">
  
  		<?php if (have_posts()) : ?>
  		<?php while (have_posts()) : the_post(); ?>
  			<h1><?php the_title(); ?></h1>
  		  <?php the_content(); ?>
  			          <!-- End Blog Posts -->
  		<?php endwhile; ?>
  		<?php else : ?>
  		Not Found
  		Sorry, but you are looking for something that isn't here.
  		<?php endif; ?>
  
  </div>
  
  <?php get_footer(); ?>
  <?php include('assets/includes/foot.php'); ?>
  
</body>
</html>