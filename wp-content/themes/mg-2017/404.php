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
		'orderby' => 'rand',
		'order' => 'ASC'
	);
	$context['projects'] = Timber::get_posts($query);
	$context['body_class'] = '404-page';
	$context['page_title'] = 'Woops';
	$context['secondary_text'] = "We couldn't find the page your were looking for so we just took you home";
	$context['hide_thumb_info'] = true;
	// $phpinfo = phpinfo();

	Timber::render($templates, $context);