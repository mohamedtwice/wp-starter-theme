<?php

namespace Sehrgut\StarterTheme\Tasks;

/**
 * Create Options Pages...
 */
class CreateOptionsPages extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'acf/init' => 'createOptionsPages',
    ];

    /**
     * Create options pages using ACF to expose global theme settings.
     *
     * @return void
     */
    public function createOptionsPages()
    {
        //* Options Pages
        $theme_options = acf_add_options_page([
            'page_title' => __('Theme Options', 'wp-starter-theme'),
            'menu_title' => __('Theme Options', 'wp-starter-theme'),
            'menu_slug' => 'theme-options',
            'icon_url' => 'dashicons-admin-customizer',
            'autoload' => true
        ]);

        acf_add_options_sub_page([
            'page_title' => __('Footer', 'wp-starter-theme'),
            'menu_title' => __('Footer', 'wp-starter-theme'),
            'menu_slug' => 'theme-options-footer',
            'parent_slug' => $theme_options['menu_slug'],
        ]);

        acf_add_options_sub_page([
            'page_title' => __('Social Sharing', 'wp-starter-theme'),
            'menu_title' => __('Social Sharing', 'wp-starter-theme'),
            'menu_slug' => 'theme-options-sharing',
            'parent_slug' => $theme_options['menu_slug'],
        ]);
    }
}
