<?php

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    add_filter('template_include', function ($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;
}

// Timber Config
Timber::$dirname = ['templates', 'views'];

// Dependencies & Tasks
require_once 'lib/BlocksManager.php';
require_once 'lib/Guard.php';
require_once 'lib/QueryParser.php';
require_once 'lib/SocialSharingHelper.php';
require_once 'tasks/Task.php';
require_once 'tasks/AddThemeSupports.php';
require_once 'tasks/RegisterNavs.php';
require_once 'tasks/AddToContext.php';
require_once 'tasks/AddToTwig.php';
require_once 'tasks/EnqueueResources.php';
require_once 'tasks/CreateOptionsPages.php';
require_once 'tasks/LocalizeScripts.php';
require_once 'tasks/RegisterFieldsForBlocksPage.php';
require_once 'tasks/RegisterFieldsForSeoMeta.php';
require_once 'tasks/RegisterFieldsForFooterContent.php';
require_once 'tasks/RegisterFieldsForSocialSharing.php';
require_once 'tasks/FriendlyLayoutTitles.php';

/**
 * Our Theme class.
 */
class StarterSite extends TimberSite
{
    /**
     * List all the tasks to be loaded.
     *
     * @var array
     */
    protected $tasks = [
        Sehrgut\StarterTheme\Tasks\AddThemeSupports::class,
        Sehrgut\StarterTheme\Tasks\RegisterNavs::class,
        Sehrgut\StarterTheme\Tasks\AddToContext::class,
        Sehrgut\StarterTheme\Tasks\AddToTwig::class,
        Sehrgut\StarterTheme\Tasks\EnqueueResources::class,
        Sehrgut\StarterTheme\Tasks\CreateOptionsPages::class,
        Sehrgut\StarterTheme\Tasks\LocalizeScripts::class,
        Sehrgut\StarterTheme\Tasks\RegisterFieldsForBlocksPage::class,
        Sehrgut\StarterTheme\Tasks\RegisterFieldsForSeoMeta::class,
        Sehrgut\StarterTheme\Tasks\RegisterFieldsForFooterContent::class,
        Sehrgut\StarterTheme\Tasks\RegisterFieldsForSocialSharing::class,
        Sehrgut\StarterTheme\Tasks\FriendlyLayoutTitles::class,
    ];

    /**
     * Contains the instantiated tasks.
     *
     * @var array
     */
    protected $task_instances = [];

    /**
     * Set up the Site
     */
    public function __construct()
    {
        $this->loadTasks();

        parent::__construct();
    }

    /**
     * Load all the individual tasks in the stated order.
     *
     * @return void
     */
    protected function loadTasks()
    {
        foreach ($this->tasks as $task) {
            $this->task_instances[] = new $task($this);
        }
    }
}

new StarterSite();
