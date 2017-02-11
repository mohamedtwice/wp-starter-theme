<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'zs-verlag-theme'));

/**
 * Inject localization variables into enqueued scripts.
 */
class LocalizeScripts extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'wp_enqueue_scripts' => 'localize',
    ];

    /**
     * Handles (used to `enqueue`) of the scripts to be localized.
     *
     * @var array
     */
    protected $script_handles = ['theme-script'];

    /**
     * Variable name of the global object under which
     * the strings will appear as properties.
     *
     * @var string
     */
    protected $object_name = 'l10n';

    /**
     * List individual strings here.
     *
     * @return array
     */
    protected function getTranslations()
    {
        return [
            'load_more' => __('Load more', 'wp-starter-theme'),
        ];
    }

    /**
     * Apply localizations to all scripts listed in `$script_handles`.
     *
     * @return void
     */
    public function localize()
    {
        foreach ($this->script_handles as $handle) {
            wp_localize_script($handle , $this->object_name, $this->getTranslations());
        }
    }
}
