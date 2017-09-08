<?php
/*
	Template Name: Info
*/
	$templates = 'info.twig';
	$context = Timber::get_context();
	$context['post'] = new TimberPost();

	Timber::render($templates, $context);