<?
/*
* Author Archive Page
*/
?>

<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>

<div class="container">
 
<?php
    if ( have_posts() )
        the_post();
?>
 
                <h1><?php the_author_meta( 'display_name' ); ?></h1>
 
<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>


                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'starkers_author_bio_avatar_size', 60 ) ); ?>

                <ul>
                	<li><strong>Description:</strong> <?php the_author_meta( 'description' ); ?></li>
                	<li><strong>Display Name:</strong> <?php the_author_meta( 'display_name' ); ?></li>
                	<li><strong>First Name:</strong> <?php the_author_meta( 'first_name' ); ?></li>
                	<li><strong>Last Name:</strong> <?php the_author_meta( 'last_name' ); ?></li>
                	<li><strong>Nickname:</strong> <?php the_author_meta( 'nickname' ); ?></li>
                	<li><strong>Email:</strong> <a href="mailto:<?php the_author_meta( 'user_email' ); ?>"><?php the_author_meta( 'user_email' ); ?></a></li>
                	<li><strong>Login:</strong> <?php the_author_meta( 'user_login' ); ?></li>
                	<li><strong>Nicename:</strong> <?php the_author_meta( 'user_nicename' ); ?></li>
                	<li><strong>URL:</strong> <a href="<?php the_author_meta( 'user_url' ); ?>"><?php the_author_meta( 'user_url' ); ?></a></li>
                <ul>
<?php endif; ?>

</div>
<hr>


<? 
  $authorID = get_query_var('author');
  $query = new WP_Query(array('posts_per_page' => -1, 'author'=> $authorID));
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