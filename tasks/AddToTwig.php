<?php

namespace Sehrgut\StarterTheme\Tasks;

use \Twig_Extension_StringLoader;
use \Twig_SimpleFilter;

// Prevent user from directly executing this file.
defined('ABSPATH') or die(__('Mach koan Schmarrn!', 'wp-starter-theme'));

/**
 * Add Functions and Extensions to Twig
 */
class AddToTwig extends Task
{
    /**
     * {@inheritdoc}
     */
    protected $hooks = [
        'get_twig' => 'addToTwig',
    ];

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

}
