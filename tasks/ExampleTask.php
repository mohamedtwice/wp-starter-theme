<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

/**
 * <task_description_here>
 *
 * TODO: Don't forget to "require" this file and register the task
 *       in the `$tasks` array in your main plugin php file.
 */
class ExampleTask extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'init' => 'myCallback',
        'some_filter' => ['myCallbackWithParameters', 10, 2],
    ];

    public function myCallback()
    {
        //
    }

    public function myCallbackWithParameters($param1, $param2)
    {
        //
    }
}
