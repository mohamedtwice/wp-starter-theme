<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

/**
 * Add Theme Supports
 */
class RegisterNavs extends Task
{
    /**
     * {@inheritdoc}
     */
    public function onTaskInit()
    {
        register_nav_menus([
            'primary' => __('Primary Navigation', 'wp-starter-theme'),
            'footer' => __('Footer Menu', 'wp-starter-theme')
        ]);
    }
}
