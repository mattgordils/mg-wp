<?php
/*
Plugin Name: Force ImageMagick
Plugin URI: https://wordpress.org/plugins/mhm-forceimagemagick/
Description: Forces WordPress to use ImageMagick instead of the PHP GD image library. This allows EXIF and IPTC data to be retained - for example, those containing GEO data and copyright information - but can lead to slightly larger file sizes.
Author: Mark Howells-Mead
Version: 1.0.6
Author URI: https://markweb.ch/
*/

class MHMForceImageMagick
{
    public function __construct()
    {
        $this->key = basename(__DIR__);
        add_filter('wp_image_editors', array($this, 'allowedEditors'));
    }

    public function allowedEditors()
    {
        return array('WP_Image_Editor_Imagick');
    }
}

new MHMForceImageMagick();
