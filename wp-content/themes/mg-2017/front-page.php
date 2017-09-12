<?php
/*
	Template Name: Home
*/
	$templates = 'index.twig';
	$context = Timber::get_context();
	$context['post'] = new TimberPost();
	$context['services'] = new TimberTerm();
	$query = array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);
	$context['projects'] = Timber::get_posts($query);
	$context['body_class'] = 'home-page';
	$context['page_title'] = 'Matthew Gordils';
	$context['hide_thumb_info'] = true;
	// $phpinfo = phpinfo();

	Timber::render($templates, $context);