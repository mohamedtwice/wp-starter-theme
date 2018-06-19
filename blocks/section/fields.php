<?php

use Sehrgut\StarterTheme\Lib\BlocksManager;

$fields = [
    'key' => 'group_section_block',
    'label' => __('Content Section', 'freimuth-theme'),
    'name' => 'section',
    'display' => 'block',
    'sub_fields' => [

        // Tab: Content
        [
            'key' => 'tab_section_title_content',
            'label' => __('Content', 'freimuth-theme'),
            'type' => 'tab',
        ],
            [
                'key' => 'field_section_title',
                'name' => 'title',
                'label' => __('Title', 'freimuth-theme'),
                'instructions' => __('optional', 'freimuth-theme'),
                'placeholder' => __('Put the section title in here', 'freimuth-theme'),
                'type' => 'text',
            ],
            [
                'key' => 'field_section_blocks',
                'name' => 'blocks',
                'label' => __('Content', 'freimuth-theme'),
                'instructions' => __('Add as many content blocks to the section as you wish.', 'freimuth-theme'),
                'button_label' => __('Add Content to Section', 'freimuth-theme'),
                'type' => 'flexible_content',
                'layouts' => BlocksManager::getBlocks([
                    'wysiwyg',
                ]),
            ],

        // Tab: Styling
        [
            'key' => 'tab_section_styling',
            'label' => __('Styling', 'freimuth-theme'),
            'type' => 'tab',
        ],

            // Group: Layout
            [
                'key' => 'group_section_styling_layout',
                'label' => __('Layout', 'freimuth-theme'),
                'name' => 'layout',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_layout_fluid',
                        'name' => 'fluid',
                        'label' => __('Full Width Content', 'freimuth-theme'),
                        'instructions' => __('Only works when "Full Width Background" is on', 'freimuth-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '25%'],
                    ],
                    [
                        'key' => 'field_columns_layout_min_height',
                        'name' => 'min_height',
                        'label' => __('Section Minimum Height', 'freimuth-theme'),
                        'instructions' => __('optional, useful in conjunction with background image', 'freimuth-theme'),
                        'placeholder' => __('e.g. 90vh, 300px, etc.', 'freimuth-theme'),
                        'type' => 'text',
                        'wrapper' => ['width' => '25%'],
                    ],
                    [
                        'key' => 'field_section_layout_padding_top',
                        'name' => 'padding_top_class',
                        'label' => __('Top Padding', 'freimuth-theme'),
                        'type' => 'select',
                        'default_value' => 'padding-top',
                        'choices' => [
                            'padding-top' => __('Regular', 'freimuth-theme'),
                            'padding-top-lg' => __('Wide', 'freimuth-theme'),
                            '' => __('None', 'freimuth-theme'),
                        ],
                        'wrapper' => ['width' => '25%'],
                    ],
                    [
                        'key' => 'field_section_layout_padding_bottom',
                        'name' => 'padding_bottom_class',
                        'label' => __('Bottom Padding', 'freimuth-theme'),
                        'type' => 'select',
                        'default_value' => 'padding-bottom',
                        'choices' => [
                            'padding-bottom' => __('Regular', 'freimuth-theme'),
                            'padding-bottom-lg' => __('Wide', 'freimuth-theme'),
                            '' => __('None', 'freimuth-theme'),
                        ],
                        'wrapper' => ['width' => '25%'],
                    ],
                ]
            ],

            // Group: Background
            [
                'key' => 'group_section_styling_background',
                'label' => __('Background', 'freimuth-theme'),
                'name' => 'background',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_background_fluid',
                        'name' => 'fluid',
                        'label' => __('Full Width', 'freimuth-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_background_color',
                        'name' => 'color',
                        'label' => __('Color', 'freimuth-theme'),
                        'instructions' => __('optional', 'freimuth-theme'),
                        'type' => 'color_picker',
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_background_image',
                        'name' => 'image',
                        'label' => __('Image', 'freimuth-theme'),
                        'instructions' => __('optional', 'freimuth-theme'),
                        'type' => 'image',
                        'wrapper' => ['width' => '33%'],
                    ],
                ],
            ],

            // Group: Text
            [
                'key' => 'group_section_styling_text',
                'label' => __('Text', 'freimuth-theme'),
                'name' => 'text',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_title_color',
                        'name' => 'title_color',
                        'label' => __('Title Color', 'freimuth-theme'),
                        'instructions' => __('optional', 'freimuth-theme'),
                        'type' => 'color_picker',
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_text_color',
                        'name' => 'text_color',
                        'label' => __('Text Color', 'freimuth-theme'),
                        'instructions' => __('optional', 'freimuth-theme'),
                        'type' => 'color_picker',
                        'wrapper' => ['width' => '33%'],
                    ],
                ]
            ],


            // Group: Shadows & Border
            [
                'key' => 'group_section_styling_shadows',
                'label' => __('Shadows & Border', 'freimuth-theme'),
                'name' => 'shadows',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'key' => 'field_section_shadows_top',
                        'name' => 'top',
                        'label' => __('Top Shadow', 'freimuth-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_shadows_bottom',
                        'name' => 'bottom',
                        'label' => __('Bottom Shadow', 'freimuth-theme'),
                        'type' => 'true_false',
                        'ui' => true,
                        'default_value' => false,
                        'wrapper' => ['width' => '33%'],
                    ],
                    [
                        'key' => 'field_section_border_bottom',
                        'name' => 'border_bottom',
                        'label' => __('Bottom Border', 'freimuth-theme'),
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
            'label' => __('Meta', 'freimuth-theme'),
            'type' => 'tab',
        ],
            [
                'key' => 'field_section_anchor',
                'name' => 'anchor',
                'label' => __('Anchor Name', 'freimuth-theme'),
                // 'placeholder' => __('', 'freimuth-theme'),
                'type' => 'text',
                // 'wrapper' => ['width' => '50%'],
            ],
    ]
];
