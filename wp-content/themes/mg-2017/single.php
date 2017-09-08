<?php
	$templates = 'article.twig';
	$context = Timber::get_context();
	$context['post'] = new TimberPost();
	$rel_q = array(
  	'orderby' => 'rand', 
  	'cat' => get_the_category()[0]->id, 
  	'posts_per_page' => 3,
  	'post__not_in' => array($post->ID),
	);

	$context['related'] = Timber::get_posts($rel_q);

	Timber::render($templates, $context);