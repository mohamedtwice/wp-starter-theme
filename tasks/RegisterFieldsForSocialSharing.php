<?php

namespace Sehrgut\StarterTheme\Tasks;

use Sehrgut\StarterTheme\Lib\SocialSharingHelper;

/**
 * Register ACF fields for Social Sharing helper.
 */
class RegisterFieldsForSocialSharing extends Task
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
            'key' => 'group_theme_options_sharing',
            'title' => __('Social Sharing', 'wp-starter-theme'),
            'fields' => [
                [
                    'key' => 'field_633a733031a2',
                    'label' => __('Providers', 'wp-starter-theme'),
                    'name' => 'social_sharing_providers',
                    'type' => 'checkbox',
                    'choices' => SocialSharingHelper::getProviderNames(),
                    'default_value' => []
                ],
                [
                    'key' => 'field_a62bd46db4fe',
                    'label' => __('Twitter Handle', 'wp-starter-theme'),
                    'name' => 'twitter_handle',
                    'type' => 'text',
                    'instructions' => __('Who to mention as "via" when sharing on twitter')
                ]
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options-sharing',
                    ]
                ]
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ]);
    }
}
