<?php

namespace Sehrgut\StarterTheme\Tasks;

use Sehrgut\StarterTheme\Lib\SocialSharingHelper;

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

        //* AC Fields

        // Theme Options: Footer
        acf_add_local_field_group([
            'key' => 'group_theme_options_footer',
            'title' => __('Footer', 'wp-starter-theme'),
            'fields' => [
                [
                    'key' => 'field_0558bee23e6c',
                    'name' => 'footer_text',
                    'label' => __('Text', 'wp-starter-theme'),
                    'type' => 'wysiwyg',
                    'atach_media' => false
                ],
                [
                    'key' => 'field_a79d4177961e',
                    'name' => 'footer_copyright',
                    'label' => __('Copyright Notice', 'wp-starter-theme'),
                    'type' => 'text',
                    'prepend' => strftime('© %G'),
                    'default_value' => get_option('blogname'),
                ],
                [
                    'key' => 'field_7ca0d8052548',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => '',
                    'collapsed' => '',
                    'label' => __('Social Links', 'wp-starter-theme'),
                    'name' => 'social_links',
                    'type' => 'repeater',
                    'instructions' => __('Click \'Add Row\' to add a new link. Enter the link target (e.g. the url of your profile), a title (shown when the user hovers over the link) and choose an icon for the link.', 'wp-starter-theme'),
                    'sub_fields' => [
                        [
                            'key' => 'field_c003466db141',
                            'label' => __('Link Target', 'wp-starter-theme'),
                            'name' => 'target',
                            'type' => 'url',
                            'required' => 1,
                            'placeholder' => 'https://www.linkedin.com/in/…',
                        ],
                        [
                            'key' => 'field_00ef373e9996',
                            'label' => __('Title', 'wp-starter-theme'),
                            'name' => 'title',
                            'type' => 'text',
                        ],
                        [
                            'key' => 'field_c3135507550a',
                            'label' => __('Icon', 'wp-starter-theme'),
                            'name' => 'icon',
                            'type' => 'select',
                            'multiple' => false,
                            'allow_null' => false,
                            'choices' => [
                                'fa-bandcamp' => 'Bandcamp',
                                'fa-behance-square' => 'Behance',
                                'fa-bitbucket-square' => 'Bitbucket',
                                'fa-facebook-square' => 'Facebook',
                                'fa-flickr' => 'Flickr',
                                'fa-github-square' => 'GitHub',
                                'fa-google-plus-square' => 'Google+',
                                'fa-instagram' => 'Instagram',
                                'fa-linkedin-square' => 'LinkedIn',
                                'fa-medium' => 'Medium',
                                'fa-pinterest-square' => 'Pinterest',
                                'fa-reddit-square' => 'Reddit',
                                'fa-skype' => 'Skype',
                                'fa-slack' => 'Slack',
                                'fa-snapchat-square' => 'Snapchat',
                                'fa-soundcloud' => 'Soundcloud',
                                'fa-steam-square' => 'Steam',
                                'fa-telegram' => 'Telegram',
                                'fa-tumblr-square' => 'Tumblr',
                                'fa-twitter-square' => 'Twitter',
                                'fa-vimeo-square' => 'Vimeo',
                                'fa-wordpress' => 'Wordpress',
                                'fa-xing-square' => 'Xing',
                                'fa-youtube-square' => 'YouTube',
                            ],
                            'default_value' => [],
                            'ui' => 1,
                            'ajax' => 0,
                            'return_format' => 'value',
                        ],
                        [
                            'key' => 'field_d58cd7f1fad2',
                            'label' => __('Open in new tab', 'wp-starter-theme'),
                            'name' => 'target_blank',
                            'type' => 'true_false',
                            'default_value' => 1,
                            'ui' => false,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options-footer',
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

        // Theme Options: Social Sharing
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
