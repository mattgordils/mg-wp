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
    <?php printf( __( '%s', 'starkers' ), '' . single_cat_title( '', false ) . '' ); ?> Projects
	</h1>
    <?php if (category_description( $category ) == '') : ?>
		<!-- html for when there is no description -->
	<?php else : ?>
		<h3 class="seo-only">
			<?php echo category_description( $category ); ?>
		</h3>
<?php endif; ?>
</div>


<? 
  $catID = get_query_var('custom_cats');
  $query = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => -1, 'custom_cats'=> $catID));
?>
<div class="container">
  <div class="thumb-container">
    <? if( $query->have_posts() ): ?>
      <ul class="thumbs">
        <? while ($query->have_posts()) : $query->the_post(); ?>
          <li><?php include 'assets/includes/thumb-w-info-post-output.php'; ?></li>
        <? endwhile; ?>
      </ul>
    <? endif; ?>
  </div><!--end .thumb-container-->
</div>

<div class="blk anchor">
  <nav class="next-prev">
    <a class="fade work view-all" href="<?php echo home_url( '/' ); ?>/portfolio" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      <div class="icon block"><span class="one"></span><span class="two"></span></div>All Projects
    </a>
  </nav>
</div>

<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>