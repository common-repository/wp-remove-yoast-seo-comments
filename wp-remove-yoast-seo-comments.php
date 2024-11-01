<?php
/**
 * Plugin Name: WP Remove Yoast SEO Comments
 * Plugin URI: https://eastsidecode.com
 * Description: Removes HTML comments added by Yoast SEO.
 * Version: 1.0
 * Author: Louis Fico
 * Author URI: http://eastsidecode.com
 * License: GPL12
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function escode_remove_yoast_seo_comments() {
        // if the plugin isnt installed then dont do anything
        if ( ! class_exists( 'WPSEO_Frontend' ) ) {
            return;
        }
        $instance = WPSEO_Frontend::get_instance();
        // if the above is no longer a method, then dont do anything  (makes it not break with future yoast updates)
        if ( ! method_exists( $instance, 'debug_mark') ) {
            return;
        }

        // the fun part, removing the debug_mark
        remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
    }
add_action('template_redirect', 'escode_remove_yoast_seo_comments', 9999);