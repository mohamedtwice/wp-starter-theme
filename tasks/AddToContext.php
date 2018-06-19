<?php

namespace Sehrgut\StarterTheme\Tasks;

use Sehrgut\StarterTheme\Lib\SocialSharingHelper;
use TimberMenu;

/**
 * Add To Timber Context
 */
class AddToContext extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'timber_context' => 'addToContext',
    ];

    /**
     * Hook to add variables to the global template context.
     *
     * @param array  $context The original context
     * @return array Context with additional data
     */
    public function addToContext($context)
    {
        $context['primary_menu'] = new TimberMenu('primary');
        $context['footer_menu'] = new TimberMenu('footer');

        $site = $this->site;
        $title = wp_title('–', false, 'right');
        $site->title = $title ? $title . $site->name : $site->name;
        $logo_id = get_theme_mod('custom_logo');
        $site->logo = wp_get_attachment_image_src($logo_id, 'full');
        $context['site'] = $site;

        $context['options'] = get_fields('options');
        $context['social_sharing'] = SocialSharingHelper::getActiveProviders();

        return $context;
    }
}
