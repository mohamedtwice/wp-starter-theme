<?php

namespace Sehrgut\StarterTheme\Lib;

/**
 * Help organize the providers of social sharing targets.
 */
class SocialSharingHelper
{
    /**
     * An array of providers to use for social sharing
     *
     * @var array
     */
    protected static $providers = [
        'Pinterest' => 'https://pinterest.com/pin/create/button/?url={link}&media={img_link}&description={text}',
        'Twitter' => 'https://twitter.com/intent/tweet?status={text}+-+{link}&via={twitter_handle}',
        'Facebook' => 'https://www.facebook.com/sharer/sharer.php?u={link}',
        'Google+' => 'https://plus.google.com/share?url={link}',
        'E-Mail' => 'mailto:?&subject={text}&body={link}',
    ];

    /**
     * Retrieve the list of providers including sharing link.
     *
     * @return array
     */
    public static function getProviders()
    {
        return static::$providers;
    }

    /**
     * Retrieve a list of provider names.
     *
     * @return array
     */
    public static function getProviderNames()
    {
        $keys = array_keys(static::$providers);
        return array_combine($keys, $keys);
    }

    /**
     * Get all providers that are activated throug the options pages.
     *
     * @return array
     */
    public static function getActiveProviders()
    {
        $providers = [];
        $active = get_field('social_sharing_providers', 'option');
        $active = is_array($active) ? $active : [];
        foreach ($active as $index) {
            $providers[$index] = static::$providers[$index];
        }

        // Set the `&via` attribute for twitter sharing links
        if (array_key_exists('Twitter', $providers)) {
            $handle = get_field('twitter_handle', 'option');
            $providers['Twitter'] = str_replace('{twitter_handle}', $handle, $providers['Twitter']);
        }

        return $providers;
    }
}
