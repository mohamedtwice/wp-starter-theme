<?php

namespace Sehrgut\StarterTheme\Tasks;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'zs-verlag-theme'));

/**
 * Base Class for a task.
 *
 * A task is a single feature to be added or a single modification to be made.
 * You can bind public methods to action/filters hooks via the $hooks array.
 */
class Task
{
    /**
     * A reference to the site.
     */
    protected $site;

    /**
     * Bind methods to hooks like this:
     *
     *     'hook_name' => 'method_name'
     *         or
     *     'hook_name' => ['method_name', prio, arguments]
     *
     * Methods must be public.
     *
     * @var array
     */
    protected $hooks = [];

    /**
     * Construct a new instance of the task.
     *
     * @param &$site A reference to the site
     */
    public function __construct(&$site)
    {
        $this->site = $site;
        $this->registerHooks();
        $this->justDoIt();
    }

    /**
     * Some tasks don't have to be hooked to anything. To just run theme
     * put them in here...
     *
     * @return void
     */
    public function justDoIt()
    {
        // add stuff
    }

    /**
     * Loop through $hooks and bind methods.
     *
     * @return $this
     */
    private function registerHooks()
    {
        foreach ($this->hooks as $hook => $method) {
            if (is_string($method)) {
                add_filter($hook, [$this, $method]);
            }
            elseif (is_array($method)) {
                add_filter($hook, [$this, $method[0]], $method[1], $method[2]);
            }
        }
        return $this;
    }
}
