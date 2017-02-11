<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'zs-verlag-theme'));

/**
 * Add Theme Supports
 */
class AddThemeSupports extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'after_setup_theme' => 'addLanguageSupport',
    ];

    /**
     * Enable multiple language translations and load them from /languages.
     */
    public function addLanguageSupport(){
        load_theme_textdomain('zs-verlag-theme', get_template_directory().'/languages');
    }

    /**
     * {@inheritdoc}
     */
    public function justDoIt() {
        add_theme_support('post-formats', []);
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 200,
            'flex-width'  => true,
        ]);
    }
}
