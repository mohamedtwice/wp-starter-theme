<?php

if (! class_exists('Timber')) {
	add_action('admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
	});

	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

Timber::$dirname = ['templates', 'views'];

/**
 * Our Theme class.
 */
class StarterSite extends TimberSite
{

	/**
	 * Holds the title of the currently viewed page.
	 *
	 * @var string
	 */
	public $title;

	function __construct() {
		add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');

		add_filter('timber_context', [$this, 'addToContext']);
		add_filter('get_twig', [$this, 'addToTwig']);

		add_action('admin_enqueue_scripts', [$this, 'limit_menu_depth']);

		parent::__construct();
	}

	/**
	* Limit max menu depth in admin panel to 2
	*/
	function limit_menu_depth( $hook ) {
		if ( $hook != 'nav-menus.php' ) return;

		// override default value right after 'nav-menu' JS
		wp_add_inline_script('nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after');
	}


	/**
	 * Hook to add variables to the global template context.
	 *
	 * @param array  $context The original context
	 * @return array Context with additional data
	 */
	function addToContext($context)
	{
		$context['foo'] = 'bar';

		$context['menu'] = new TimberMenu();

		$title = wp_title('–', false, 'right');
		$this->title = $title ? $title.$this->name : $this->name;
		$context['site'] = $this;

		return $context;
	}

	/**
	 * This is a custom filter.
	 *
	 * It can be used in twig templates like so: `{{ post.content|myfoo }}`.
	 * `myfoo` is the identifier passed in as the first parameter to
	 * `$twig->addFillter`, called in `addToTwig` in this example.
	 *
	 * @param  string $text The text piped into the filter
	 * @return string       The filtered text
	 */
	function myfoo($text)
	{
		$text .= ' bar!';
		return $text;
	}

	/**
	 * This is where you can register filters with twig.
	 *
	 * @param Twig $twig The twig instance gets passed in
	 */
	function addToTwig($twig)
	{
		$twig->addExtension(new Twig_Extension_StringLoader());
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', [$this, 'myfoo']));
		return $twig;
	}

}

new StarterSite();
