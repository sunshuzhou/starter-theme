<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::context();
$context['homepage'] = true;

$context['helpful_posts'] = Timber::get_posts(array('posts_per_page' => 9, 'category_name' => 'helpful-resources', 'orderby' => 'post_modified'));

$context['recent_posts'] = Timber::get_posts(array('posts_per_page' => 9, 'orderby' => 'post_modified'));

// print($context['recent_posts'][0]->preview->length(50));

$templates = array('index.twig');
Timber::render($templates, $context);
