<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

use Sehrgut\StarterTheme\Lib\BlocksManager;

/**
 * Register ACF Fields for the template
 */
class RegisterCustomFields extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'acf/init' => 'registerCustomFields',
    ];

    public function registerCustomFields()
    {
        $this->addDefaultPostFields();
        $this->addDefaultPageFields();
    }

    protected function addDefaultPostFields()
    {
        //
    }

    protected function addDefaultPageFields()
    {
        acf_add_local_field_group([
            'key' => 'default_page',
            'title' => 'Flexible Page Admin',
            'fields' => [
                [
                    'key' => 'field_content_blocks',
                    'label' => __('Content Blocks', 'wp-starter-theme'),
                    'name' => 'content_blocks',
                    'type' => 'flexible_content',
                    'button_label' => __('Add Content Block', 'wp-starter-theme'),
                    'instructions' => __('Add as many content blocks as you wish. Content blocks can be sorted via drag & drop.', 'wp-starter-theme'),
                    'min' => 1,
                    'layouts' => BlocksManager::getBlocks([
                        'wysiwyg',
                    ])
                ],
            ],
            'style' => 'seamless',
            'location' => [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-blocks.php',
                    ],
                    [
                        'param' => 'page_template',
                        'operator' => '!=',
                        'value' => 'page-index.php'
                    ]
                ],
            ],
            'hide_on_screen' => [
                // 'permalink',
                'the_content',
                'excerpt',
                'custom_fields',
                'discussion',
                'comments',
                'revisions',
                'slug',
                'author',
                'format',
                // 'page_attributes',
                'featured_image',
                'categories',
                'tags',
                'send-trackbacks',
            ]
        ]);
    }
}
