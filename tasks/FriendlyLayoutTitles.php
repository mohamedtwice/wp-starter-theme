<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

/**
 * Override the title of each block in a flexible content field.
 *
 * This is to allow the user to know what section they
 * are looking at, even when the secion is collapsed.
 */
class FriendlyLayoutTitles extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'acf/fields/flexible_content/layout_title' => ['layoutTitle', 10, 4],
    ];

    public function layoutTitle($title, $field, $layout, $i)
    {
        return get_sub_field('field_section_title') ?? $title;
    }
}
