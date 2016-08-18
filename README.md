# `wp-solidus`

> A headless WordPress theme for use with the [WordPress JSON API](http://wp-api.org/) and [Solidus](https://github.com/solidusjs/solidus).

Presentation and everything else you'd normally expect in a WordPress theme has been stripped out except;

- [WP REST API Support](#usage)
- [Redirects to Solidus](#redirects-to-solidus)
- [Manual content width](#manual-content-width)
- A helper to clear WP API content from the Varnish cache on WP Engine.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Other Notes](#other-notes)
- [Contribute](#contribute)
- [License](#license)

## Installation

This theme can be installed and activated with [`WP-CLI`][wp-cli] by running [the theme command][wp-theme] on your WordPress server;

```bash
wp theme install https://github.com/solidusjs/wp-solidus/archive/v1.0.0.zip --activate
```

Change the version number in the URL to match the version number you want to install and activate.

If you prefer, you can download the ZIP of [the latest release][releases] and [install it using the WordPress Admin][theme-installation-instructions].

## Usage

Usage of this theme requires the [WP REST API][wp-api-docs], which makes content available in JSON format at `examplewordpressdomain.com/wp-json/posts`. Solidus sites use [a fork of the WP REST API plugin][wp-api-plugin] which enables Solidus-related features. WordPress version 4.5 and greater includes the WP REST API, but you need to install the fork for use with Solidus sites.

When this theme is enabled, the site is not visible on the front end. Instead, pages are [redirected to Solidus](#redirects-to-solidus).

## Other Notes

### Redirects to Solidus

Post preview links redirect to the corresponding page on the Solidus site. The redirects allow content editors to see updates on the Solidus site before they have been published.

Aside from preview links, other redirects exist but are not extensive. When there's no corresponding Solidus page, redirects take the user either to the Solidus site's home page or 404 page. Consider the WordPress URL to be wrong. Don't share the original WordPress URLs to posts, share the Solidus URL instead.

### Manual Content Width

This theme overrides the [content width global variable][content-width] because it causes problems with image size settings.

## Contribute

If you have problems or need support, [open an issue][issues]. If you want to contribute or make changes, you are welcome to [open a pull request][pulls].

## License

[MIT &copy; 2014-2016 Sparkart Group Inc.](./LICENSE.txt)

[wp-cli]:http://wp-cli.org/
[wp-theme]:http://wp-cli.org/commands/theme/install/
[wp-api-docs]:http://v2.wp-api.org/
[wp-api-plugin]:https://github.com/sparkartgroup/WP-API
[releases]:https://github.com/solidusjs/wp-solidus/releases
[issues]:https://github.com/solidusjs/wp-solidus/issues
[pulls]:https://github.com/solidusjs/wp-solidus/pulls
[theme-installation-instructions]:https://codex.wordpress.org/Using_Themes#Adding_New_Themes_using_the_Administration_Panels
[tumblr-types]:http://www.tumblr.com/docs/en/custom_themes#introduction
[post-formats]:https://codex.wordpress.org/Post_Formats
[child-theme]:https://codex.wordpress.org/Child_Themes
[content-width]:http://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks
