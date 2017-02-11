<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

/**
 * Register ACF Fields for the template
 */
class RegisterCustomFields extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'acf/init' => 'registerCustomFields',
    ];

    public function registerCustomFields()
    {
        $this->addDefaultPostFields();
        $this->addDefaultPageFields();
    }

    protected function addDefaultPostFields() { }

    protected function addDefaultPageFields() { }
}
