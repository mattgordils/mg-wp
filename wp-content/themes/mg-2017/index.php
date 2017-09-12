<?php
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
	$context['page_title'] = 'Matthew Gordils';

	Timber::render($templates, $context);