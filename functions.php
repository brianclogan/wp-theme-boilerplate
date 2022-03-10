<?php

/**
 * Setup the current version of the theme here along with the style.css version and other details.
 */
define('WP_THEME_BOILERPLATE_GITHUB_REPO', 'brianclogan/wp-theme-boilerplate');
define('WP_THEME_BOILERPLATE_GITHUB_REPO_URL', 'https://github.com/brianclogan/wp-theme-boilerplate');
define('WP_THEME_BOILERPLATE_SLUG', 'wp-theme-boilerplate');
define('WP_THEME_BOILERPLATE_NAME', 'WP Theme Boilerplate');
define('WP_THEME_BOILERPLATE_VERSION', '0.3.1');

/**
 * Setup the theme.
 */
add_action('after_setup_theme', function () {
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
});

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('fse-tailwind-style', get_stylesheet_uri());
});

/**
 * Register Cusomizer and the Updater
 */
require_once 'includes/customizer.php';
add_action( 'after_setup_theme', function() {
    require_once 'includes/updater.php';
    $data = [
        'name' => WP_THEME_BOILERPLATE_NAME,
        'repo' => WP_THEME_BOILERPLATE_GITHUB_REPO,
        'slug' => WP_THEME_BOILERPLATE_SLUG,
        'url'  => 'https://brianclogan.com',
        'ver'  => WP_THEME_BOILERPLATE_VERSION,
    ];
    new Updater($data);
});
