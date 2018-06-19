<?php

namespace Sehrgut\StarterTheme\Tasks;

/**
 * Register ACF fields for SEO & Meta data.
 */
class RegisterFieldsForSeoMeta extends Task
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
            'key' => 'group_seo_meta',
            'title' => __('SEO Meta', 'wp-starter-theme'),
            'fields' => [
                [
                    'key' => 'field_seo_meta_title',
                    'label' => __('Meta Title', 'wp-starter-theme'),
                    'name' => 'meta_title',
                    'type' => 'text',
                    'instructions' => __('Title for search results and embedded posts in social media', 'wp-starter-theme'),
                    'default_value' => '',
                    'maxlength' => 95,
                    'placeholder' => __('Ideally less than 55 characters', 'wp-starter-theme'),
                ],
                [
                    'key' => 'field_seo_meta_description',
                    'label' => __('Meta Description', 'wp-starter-theme'),
                    'name' => 'meta_description',
                    'type' => 'textarea',
                    'instructions' => __('Description for search results and embedded posts in social media', 'wp-starter-theme'),
                    'default_value' => '',
                    'maxlength' => 200,
                    'placeholder' => __('Ideally about 155 characters', 'wp-starter-theme'),
                    'rows' => 2,
                ],
                [
                    'key' => 'field_seo_meta_noindex',
                    'label' => __('Do not index this page', 'wp-starter-theme'),
                    'name' => 'meta_noindex',
                    'type' => 'true_false',
                    'instructions' => __('When the box is checked, search engines are instructed not to list this page in their search results (noindex flag)', 'wp-starter-theme'),
                    'default_value' => false,
                    'message' => __('Do not index this page', 'wp-starter-theme'),
                    'ui' => false,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '!=',
                        'value' => 'post',
                    ],
                ],
                [
                    [
                        'param' => 'post_type',
                        'operator' => '!=',
                        'value' => 'page',
                    ],
                ],
                [
                    [
                        'param' => 'taxonomy',
                        'operator' => '==',
                        'value' => 'all',
                    ],
                ],
            ],
            'menu_order' => 100,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ]);
    }
}
