<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$timber_post = Timber::query_post();
$context['post'] = $timber_post;

// Sidebar articles
$context['popular_articles'] = Timber::get_posts(array('category_name' => 'popular', 'posts_per_page' => 3, 'orderby' => 'post_modified'));

Timber::render('single.twig', $context);
