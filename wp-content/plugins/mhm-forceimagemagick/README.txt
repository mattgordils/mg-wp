=== Force use of ImageMagick image library ===
Contributors: markhowellsmead
Donate link: https://www.paypal.me/mhmli
Tags: images, image generation, imagemagick, exif, iptc, copyright, meta data, gdlib, gd
Requires at least: 4.5
Tested up to: 4.7.0
Stable tag: 1.0.6
License: GPL v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Forces WordPress to use ImageMagick instead of the PHP GD image library.

== Description ==

Forces WordPress to use ImageMagick instead of the PHP GD image library. This allows EXIF and IPTC data to be retained - for example, those containing GEO data and copyright information - but can lead to slightly larger file sizes.

This plugin only instructs WordPress to use the ImageMagick library. It doesn't change how (or when) WordPress generates images, and it doesn't provide any additional functionality for creating or resizing images.

If you need to know more about ImageMagick, then visit [the official website](http://www.imagemagick.org/). Full information about [Post Thumbnails](https://codex.wordpress.org/Post_Thumbnails) and [image size and quality](https://codex.wordpress.org/Image_Size_and_Quality) are in the WordPress Codex.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it.

== Changelog ==

= 1.0.6 =
* Confirmation of compatibility with WordPress 4.7.
* No functional changes.

= 1.0.5 =
* No functional changes.
* Improve PHP function naming.
* Remove unnecessary (unused) PHP class variables.

= 1.0.4 =
* Extend README.
* Update author website link to new site.

= 1.0.3 =
* Confirms compatibility with WordPress 4.6.
* Fixes erroneous README.
* Removes delivered license file: see GPL v3 instead.
