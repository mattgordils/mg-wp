<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>
    
<div class="intro blk">
  <?php
    $attachment_id = get_field('full_logo', 'options');
    $image = wp_get_attachment_image_src( $attachment_id, 'full' );
  ?>
  <h1><?php bloginfo( 'name' ); ?></h1>
  <span class="separator"></span>
  <h2><?php bloginfo( 'description' ); ?></h2>
  <img class="logo" src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
</div>
    
<div class="container">

  <? $query = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => -1, 'orderby'=> 'menu_order','order' => 'asc')); ?>

  <div id="home-thumbs">
    <? if( $query->have_posts() ): ?>
      <? $i = 1; ?>
      <ul class="thumbs">
      <? while ($query->have_posts()) : $query->the_post(); ?>
        <li><?php include 'assets/includes/thumb-w-info-post-output.php'; ?></li>
        <? $i++; ?>
      <? endwhile; ?>
      </ul>
    <? endif; ?>
  </div><!--end .thumb-container-->

</div><!--end .container-->

<div class="blk bio">
  <div class="container">
    <?php the_field('Bio', 'options'); ?>
  </div>
</div>

<?php include('assets/includes/jribbble-feed.php'); ?>
<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>