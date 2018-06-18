<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

/**
 * Enqueue Resources (Styles, Scripts) needed by the theme
 * and the admin console.
 */
class EnqueueResources extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'wp_enqueue_scripts' => 'enqueueStyles',
        'wp_enqueue_scripts' => 'enqueueScripts',
        'admin_enqueue_scripts' => 'limitMenuDepth',
    ];

    protected $scripts = [
        'theme-lib' => [
            'path' => 'static/js/bundle.js',
            'version' => '1.0',
            'dependencies' => [],
            'in_footer' => true,
        ]
    ];

    public function enqueueScripts()
    {
        foreach ($this->scripts as $handle => $script) {
            $path = sprintf('%s/%s', get_stylesheet_directory_uri(), $script['path']);
            wp_enqueue_script(
                $handle,
                $path,
                $script['dependencies'],
                              $script['version'],
                $script['in_footer']
            );
        }
    }

    /**
     * Required necessary external css files for the theme.
     *
     * @return void
     */
    public function enqueueStyles()
    {
        wp_enqueue_style(
            'fontawesome',
            'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            null,
            '4.7.0'
        );
    }

    /**
    * Limit max menu depth in admin panel to 2
    *
    * @return void
    */
    public function limitMenuDepth($hook)
    {
        if ($hook != 'nav-menus.php') {
            return;
        }

        // override default value right after 'nav-menu' JS
        wp_add_inline_script('nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after');
    }
}
