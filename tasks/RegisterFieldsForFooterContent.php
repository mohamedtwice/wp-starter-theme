<?php

namespace Sehrgut\StarterTheme\Tasks;

/**
 * Register ACF fields for footer content.
 */
class RegisterFieldsForFooterContent extends Task
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
            'key' => 'group_options_social_links',
            'title' => 'Social Links',
            'fields' => [
                [
                    'key' => 'field_footer_text',
                    'name' => 'footer_text',
                    'label' => __('Text', 'wp-starter-theme'),
                    'type' => 'wysiwyg',
                    'atach_media' => false
                ],
                [
                    'key' => 'field_footer_copyright',
                    'name' => 'footer_copyright',
                    'label' => __('Copyright Notice', 'wp-starter-theme'),
                    'type' => 'text',
                    'prepend' => strftime('© %G'),
                    'default_value' => get_option('blogname'),
                ],
                [
                    'key' => 'field_social_links',
                    'label' => __('Social Links', 'wp-starter-theme'),
                    'name' => 'social_links',
                    'type' => 'repeater',
                    'instructions' => __('Click \'Add Row\' to add a new link. Enter the link target (e.g. the url of your profile), a title (shown when the user hovers over the link) and choose an icon for the link.', 'wp-starter-theme'),
                    'layout' => 'table',
                    'sub_fields' => [
                        [
                            'key' => 'field_social_links_link_target',
                            'label' => __('Link Target', 'wp-starter-theme'),
                            'name' => 'target',
                            'type' => 'url',
                            'required' => true,
                            'default_value' => '',
                            'placeholder' => 'https://www.linkedin.com/in/…',
                        ],
                        [
                            'key' => 'field_social_links_title',
                            'label' => __('Title', 'wp-starter-theme'),
                            'name' => 'title',
                            'type' => 'text',
                        ],
                        [
                            'key' => 'field_social_links_icon',
                            'label' => __('Icon', 'wp-starter-theme'),
                            'name' => 'icon',
                            'type' => 'select',
                            'required' => true,
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
                            'ui' => true,
                            'ajax' => false,
                            'return_format' => 'value',
                        ],
                        [
                            'key' => 'field_social_links_target_blank',
                            'label' => __('Open in new tab', 'wp-starter-theme'),
                            'name' => 'target_blank',
                            'type' => 'true_false',
                            'default_value' => true,
                            'ui' => true,
                            'ui_on_text' => __('Yes', 'wp-starter-theme'),
                            'ui_off_text' => __('No', 'wp-starter-theme'),
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
                    ],
                ],
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

