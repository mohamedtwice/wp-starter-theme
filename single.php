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

use Sehrgut\StarterTheme\Lib\Guard;

$context = Timber::get_context();
$post = Timber::query_post();

Guard::knock($post, $context);

$post->by_line = sprintf(
	__("By %s", 'wp-starter-theme'),
	'<a href="'.$post->author->path.'">'.$post->author->name.'</a>'
);
$context['post'] = $post;
Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
