<?php

use WPThemeBoilerplate\Includes\Updater;

if ( ! function_exists( 'fse_tailwind_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support for post thumbnails.
     */
    function fse_tailwind_theme_setup() {
        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'editor-styles' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'fse_tailwind_theme_setup' );

/**
 * Enqueue theme scripts and styles.
 */
function fse_tailwind_theme_scripts() {
    wp_enqueue_style( 'fse-tailwind-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'fse_tailwind_theme_scripts' );

require_once 'includes/customizer.php';
require_once 'includes/Updater.php';
add_action( 'after_setup_theme', function() {
    new Updater(
        [
            'name' => 'WP Theme Boilerplate',
            'repo' => 'brianclogan/wp-theme-boilerplate',
            'slug' => 'wp-theme-boilerplate',
            'url'  => 'https://brianclogan.com',
            'ver'  => 0.2,
        ]
    );
});