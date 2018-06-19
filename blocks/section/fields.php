<?php

use Sehrgut\StarterTheme\Lib\BlocksManager;

$fields = [
    'key' => 'group_section_block',
    'label' => __('Content Section', 'wp-starter-theme'),
    'name' => 'section',
    'display' => 'block',
    'sub_fields' => [

        // Tab: Content
        [
            'key' => 'tab_section_title_content',
            'label' => __('Content', 'wp-starter-theme'),
            'type' => 'tab',
        ],
            [
                'key' => 'field_section_title',
                'name' => 'title',
                'label' => __('Title', 'wp-starter-theme'),
                'instructions' => __('optional', 'wp-starter-theme'),
                'placeholder' => __('Put the section title in here', 'wp-starter-theme'),
                'type' => 'text',
            ],
            [
                'key' => 'field_section_blocks',
                'name' => 'blocks',
                'label' => __('Content', 'wp-starter-theme'),
                'instructions' => __('Add as many content blocks to the section as you wish.', 'wp-starter-theme'),
                'button_label' => __('Add Content to Section', 'wp-starter-theme'),
                'type' => 'flexible_content',
                'layouts' => BlocksManager::getBlocks([
                    'wysiwyg',
                ]),
            ],

        // Tab: Styling
        [
            'key' => 'tab_section_styling',
            'label' => __('Styling', 'wp-starter-theme'),
            'type' => 'tab',
        ],

            // Group: Layout
            [
                'key' => 'group_section_styling_layout',
                'label' => __('Layout', 'wp-starter-theme'),
                'name' => 'layout',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_layout_fluid',
                        'name' => 'fluid',
                        'label' => __('Full Width Content', 'wp-starter-theme'),
                        'instructions' => __('Only works when "Full Width Background" is on', 'wp-starter-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '25%'],
                    ],
                    [
                        'key' => 'field_columns_layout_min_height',
                        'name' => 'min_height',
                        'label' => __('Section Minimum Height', 'wp-starter-theme'),
                        'instructions' => __('optional, useful in conjunction with background image', 'wp-starter-theme'),
                        'placeholder' => __('e.g. 90vh, 300px, etc.', 'wp-starter-theme'),
                        'type' => 'text',
                        'wrapper' => ['width' => '25%'],
                    ],
                    [
                        'key' => 'field_section_layout_padding_top',
                        'name' => 'padding_top_class',
                        'label' => __('Top Padding', 'wp-starter-theme'),
                        'type' => 'select',
                        'default_value' => 'padding-top',
                        'choices' => [
                            'padding-top' => __('Regular', 'wp-starter-theme'),
                            'padding-top-lg' => __('Wide', 'wp-starter-theme'),
                            '' => __('None', 'wp-starter-theme'),
                        ],
                        'wrapper' => ['width' => '25%'],
                    ],
                    [
                        'key' => 'field_section_layout_padding_bottom',
                        'name' => 'padding_bottom_class',
                        'label' => __('Bottom Padding', 'wp-starter-theme'),
                        'type' => 'select',
                        'default_value' => 'padding-bottom',
                        'choices' => [
                            'padding-bottom' => __('Regular', 'wp-starter-theme'),
                            'padding-bottom-lg' => __('Wide', 'wp-starter-theme'),
                            '' => __('None', 'wp-starter-theme'),
                        ],
                        'wrapper' => ['width' => '25%'],
                    ],
                ]
            ],

            // Group: Background
            [
                'key' => 'group_section_styling_background',
                'label' => __('Background', 'wp-starter-theme'),
                'name' => 'background',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_background_fluid',
                        'name' => 'fluid',
                        'label' => __('Full Width', 'wp-starter-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_background_color',
                        'name' => 'color',
                        'label' => __('Color', 'wp-starter-theme'),
                        'instructions' => __('optional', 'wp-starter-theme'),
                        'type' => 'color_picker',
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_background_image',
                        'name' => 'image',
                        'label' => __('Image', 'wp-starter-theme'),
                        'instructions' => __('optional', 'wp-starter-theme'),
                        'type' => 'image',
                        'wrapper' => ['width' => '33%'],
                    ],
                ],
            ],

            // Group: Text
            [
                'key' => 'group_section_styling_text',
                'label' => __('Text', 'wp-starter-theme'),
                'name' => 'text',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_title_color',
                        'name' => 'title_color',
                        'label' => __('Title Color', 'wp-starter-theme'),
                        'instructions' => __('optional', 'wp-starter-theme'),
                        'type' => 'color_picker',
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_text_color',
                        'name' => 'text_color',
                        'label' => __('Text Color', 'wp-starter-theme'),
                        'instructions' => __('optional', 'wp-starter-theme'),
                        'type' => 'color_picker',
                        'wrapper' => ['width' => '33%'],
                    ],
                ]
            ],


            // Group: Shadows & Border
            [
                'key' => 'group_section_styling_shadows',
                'label' => __('Shadows & Border', 'wp-starter-theme'),
                'name' => 'shadows',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_shadows_top',
                        'name' => 'top',
                        'label' => __('Top Shadow', 'wp-starter-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_shadows_bottom',
                        'name' => 'bottom',
                        'label' => __('Bottom Shadow', 'wp-starter-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_border_bottom',
                        'name' => 'border_bottom',
                        'label' => __('Bottom Border', 'wp-starter-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                ]
            ],

        // Tab: Meta
        [
            'key' => 'tab_section_meta',
            'label' => __('Meta', 'wp-starter-theme'),
            'type' => 'tab',
        ],
            [
                'key' => 'field_section_anchor',
                'name' => 'anchor',
                'label' => __('Anchor Name', 'wp-starter-theme'),
                // 'placeholder' => __('', 'wp-starter-theme'),
                'type' => 'text',
                // 'wrapper' => ['width' => '50%'],
            ],
    ]
];
