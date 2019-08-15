<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

// Sidebar articles

$timber_post = new Timber\Post();
if ($timber_post->slug != 'blog') {
  $context['post'] = $timber_post;
  $context['popular_articles'] = Timber::get_posts(array('category_name' => 'popular', 'posts_per_page' => 3));

  Timber::render('single.twig', $context);
} else {

  if (!isset($paged) || !$paged) {
    $paged = 1;
  }

  $context['helpful_term'] = new Timber\Term('helpful-resources');

  $context['posts'] = new Timber\PostQuery(array('posts_per_page' => 9, 'paged' => $paged, 'orderby' => 'post_modified'));
  // print_r($context['posts']);
  Timber::render('blog.twig', $context);
}
