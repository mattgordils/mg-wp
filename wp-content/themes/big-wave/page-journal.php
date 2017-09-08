<?php
/*
	Template Name: Journal
*/
	$templates = 'journal.twig';
	$context = Timber::get_context();
	$context['post'] = new TimberPost();
	$context['posts'] = Timber::get_posts('post_type=post');
	$query = array('post_type'=> 'post', "posts_per_page"=>-1);
	$context['posts_remaining'] = count(Timber::get_posts($query)) - 3;
	
	Timber::render($templates, $context);