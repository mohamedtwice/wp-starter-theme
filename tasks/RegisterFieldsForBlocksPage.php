<?php

namespace Sehrgut\StarterTheme\Tasks;

use Sehrgut\StarterTheme\Lib\BlocksManager;

/**
 * Register ACF Fields for the template
 */
class RegisterFieldsForBlocksPage extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'acf/init' => 'registerCustomFields',
    ];

    public function registerCustomFields()
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
                        'section',
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
