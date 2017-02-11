<?php

namespace Sehrgut\StarterTheme\Lib;

use \Timber\Timber;

class Guard
{
    public static function knock($post, $context)
    {
        if (post_password_required($post->id)) {
            Timber::render('single-password.twig', $context);
            exit(0);
        }

        if ($post->post_status == 'private' AND !current_user_can('read_private_pages' , $post->id)) {
            Timber::render('404.twig', $context);
            exit(0);
        }
    }
}
