#wp-solidus

This is a headless WordPress theme for use with the [WordPress JSON API](http://wp-api.org/) and [Solidus](https://github.com/solidusjs/solidus). As much presentation and other cruft as possible has been stripped out except for the following:

 - Post formats that match [Tumblr post types][http://www.tumblr.com/docs/en/custom_themes#introduction]. Apply extra styling hooks for these. They should [really be overridden][https://codex.wordpress.org/Post_Formats] on a per site basis however with a [child theme][https://codex.wordpress.org/Child_Themes] to suit your particular requirements.
 - Manual content width to override the [content width global variable][http://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks] which otherwise causes problems with image size settings.
 - Varnish cache purging for WP Engine hosted installs that use the JSON REST API plugin.
 - Redirects to Solidus on post preview links that enable preview mode and autorize with WordPress in order to allow content editors to preview posts directly in a Solidus website.
