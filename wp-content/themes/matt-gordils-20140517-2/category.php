<?
/*
* Category Page
*/
?>

<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>

<div class="container">
	<h1>
		<?php printf( __( 'Categorized &ldquo;%s&rdquo;', 'starkers' ), '' . single_cat_title( '', false ) . '' ); ?>
	</h1>
    <?php if (category_description( $category ) == '') : ?>
		<!-- html for when there is no description -->
	<?php else : ?>
		<h3>
			<?php echo category_description( $category ); ?>
		</h3>
<?php endif; ?>
</div>
<hr>

<? 
  $catID = get_query_var('cat');
  $query = new WP_Query(array('posts_per_page' => -1, 'cat'=> $catID));
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