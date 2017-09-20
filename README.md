
# The Timber Starter Theme

## Features

- HTML5 semantic markup
- Uses Twitter Bootstrap v4 (fully customizable thanks to SCSS)
- Sticky main navigation
- Footer menu location
- Social links with fontawesome icons
- OpenGraph and SEO Metadata

## Installing the Theme

1. Clone this themes in your themes directory.
2. `composer install`
3. `npm install`
4. Install and activate [timber-library](https://wordpress.org/plugins/timber-library) and [advanced-custom-fields](https://wordpress.org/plugins/advanced-custom-fields) (or acf pro)
5. Activate the theme in Appearance >  Themes.
6. Do your thing!

## What's here?

`static/` is where you can keep your static front-end scripts, styles, or images.
`assets` is where you can store your development assets like sass, uncompiled es6 etc.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used. Just an FYI.

`bin/` and `tests/` ... basically don't worry about (or remove) these unless you know what they are and want to.

## Development

In order to compile the assets (namely the scss) into `/static`, run `gulp`. Gulp will continuously watch for changes and rebuild the assets.

## Other Resources

The [main Timber Wiki](https://github.com/jarednova/timber/wiki) is super great, so reference those often. Also, check out these articles and projects for more info:

* [This branch](https://github.com/laras126/timber-starter-theme/tree/tackle-box) of the starter theme has some more example code with ACF and a slightly different set up.
* [Twig for Timber Cheatsheet](http://notlaura.com/the-twig-for-timber-cheatsheet/)
* [Timber and Twig Reignited My Love for WordPress](https://css-tricks.com/timber-and-twig-reignited-my-love-for-wordpress/) on CSS-Tricks
* [A real live Timber theme](https://github.com/laras126/yuling-theme).
