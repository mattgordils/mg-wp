<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>

<div class="container">
	<h1><?php
		printf( __( 'Tagged &ldquo;%s&rdquo;', 'starkers' ), '' . single_tag_title( '', false ) . '' );
	?></h1>
</div>

<? 
  $tag = get_query_var('tag');
  $query = new WP_Query(array('posts_per_page' => -1, 'tag'=> $tag));
?>

<? while ($query->have_posts()) : $query->the_post(); ?>
  <article class="<? if ($i = 1) { ?>first <? } ?>container post">
    <?php include 'assets/includes/short-post-output.php'; ?>
  </article>
  <hr>
<? endwhile; ?>


<?php //get_sidebar(); ?>

<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>