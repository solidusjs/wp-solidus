# `wp-solidus`

> A headless WordPress theme for use with the [WordPress JSON API](http://wp-api.org/) and [Solidus](https://github.com/solidusjs/solidus).

Presentation and everything else you'd normally expect in a WordPress theme has been stripped out. This theme has the following features;

- [WP REST API Support](#usage)
- [Redirects to Solidus](#redirects-to-solidus)
- [Manual content width](#manual-content-width)
- A helper to flush WP API content from the Varnish cache on WP Engine.
- [A modified admin menu with redirect to posts on login](#modified-admin-menu)
- [Theme support for Post Thumbnails, Post Formats and media taxonomies](#enabled-features)
- [Markdown support for excerpts](#markdown-support-for-excerpts) (Requires Jetpack)
- [Add custom fields to API response](#add-custom-fields-to-api-response)

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Contribute](#contribute)
- [License](#license)

## Installation

To install and activate this theme with [`WP-CLI`][wp-cli] use [the theme command][wp-theme] on your WordPress server;

```bash
wp theme install https://github.com/solidusjs/wp-solidus/archive/v1.0.0.zip --activate
```

Change the version number in the URL to match the version number you want to install and activate.

If you prefer to install using the WordPress GUI, download the ZIP of [the latest release][releases] and [install it using the WordPress Admin][theme-installation-instructions].

## Usage

Usage of this theme requires the [WP REST API][wp-api-docs], which makes content available in JSON format at `examplewordpressdomain.com/wp-json/posts`. Solidus sites use [a fork of the WP REST API plugin][wp-api-plugin] which enables Solidus-related features. WordPress version 4.5 and greater includes the WP REST API, but you need to install the fork for use with Solidus sites.

When this theme is enabled, the site is not visible on the front end. Instead, pages are [redirected to Solidus](#redirects-to-solidus).

## Features

### Redirects to Solidus

Post preview links redirect to the corresponding page on the Solidus site. The redirects allow content editors to see updates on the Solidus site before they have been published.

Aside from preview links, other redirects exist but are not extensive. When there's no corresponding Solidus page, redirects take the user either to the Solidus site's home page or 404 page. Consider the WordPress URL to be wrong. Don't share the original WordPress URLs to posts, share the Solidus URL instead.

### Manual Content Width

This theme overrides the [content width global variable][content-width] because it causes problems with image size settings.

### Modified Admin menu

This theme modifies the admin menu removing links to the Dashboard, Comments, Themes, Tools and Feedback, and adding a link the WP REST API documentation. The removed pages are accessible via their URL. For example; use `/wp-admin/themes.php` to access theme settings.

### Enabled Features

This theme has [support turned on][add-theme-support] for [Post Thumbnails][post-thumbnails], and image, quote, link, chat, audio and video [Post Formats][post-formats]. Category and tag [taxonomies][register-taxonomy] are turned on for media attachments.

### Markdown Support for Excerpts

This theme enables markdown support for post excerpts, which parses markdown and returns HTML markup in the API response. In order for markdown support to work, [Jetpack][jetpack] must be installed and activated.

### Add Custom Fields to API Response

If the [Types plugin][types-plugin] is installed, any custom fields created by the Types plugin or [added to Types' control][add-types-control] are added to the API response at `post.types_custom_meta.field_name`.

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
[content-width]:http://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks
[add-theme-support]:https://developer.wordpress.org/reference/functions/add_theme_support/
[post-thumbnails]:https://codex.wordpress.org/Post_Thumbnails
[post-formats]:https://codex.wordpress.org/Post_Formats
[register-taxonomy]:https://developer.wordpress.org/reference/functions/register_taxonomy_for_object_type/
[jetpack]:https://jetpack.com/
[types-plugin]:https://wordpress.org/plugins/types/
[add-types-control]:https://wp-types.com/faq/how-do-i-convert-existing-custom-types-and-fields-to-types-control/
