<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>
<div class="container">

<? $query = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => -1, 'orderby'=> 'menu_order','order' => 'asc')); ?>

<div class="thumb-container pushdown">
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

<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>