<?php
/*
 * Template Name: Blocks Page
 * Description: For Flexible Blocks Pages.
 */

use Sehrgut\StarterTheme\Lib\Guard;
use Sehrgut\StarterTheme\Lib\BlocksManager;

$context = Timber::get_context();
$post = new TimberPost();
Guard::knock($post, $context);

$context['post'] = $post;

$content_blocks = $post->get_field('content_blocks');
$context['content_blocks'] = BlocksManager::resolveBlocks($content_blocks, $post);

Timber::render('page-blocks.twig', $context );
