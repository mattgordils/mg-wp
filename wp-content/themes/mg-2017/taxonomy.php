<?php
	$templates = 'service.twig';
	$context = Timber::get_context();
	$context['post'] = new TimberPost();
	$context['services'] = new TimberTerm();
	$post_id = get_the_ID();
	$query = array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'orderby' => 'rand',
		'order' => 'asc'
	);
	$context['projects'] = Timber::get_posts($query);
	Timber::render($templates, $context);