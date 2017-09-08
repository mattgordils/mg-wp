<?php
/*
	Template Name: Work
*/
	$templates = 'projects.twig';
	$context = Timber::get_context();
	$context['post'] = new TimberPost();

	Timber::render($templates, $context);