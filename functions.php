<?php
/**
 * Setup the current version of the theme here along with the style.css version
 */
define('WP_THEME_BOILERPLATE_VERSION', '0.2.5');

/**
 * Setup the rest of the defines here that are used throughout the theme.
 */
define('WP_THEME_BOILERPLATE_URL', get_template_directory_uri());
define('WP_THEME_BOILERPLATE_PATH', get_template_directory());
define('WP_THEME_BOILERPLATE_INC_PATH', WP_THEME_BOILERPLATE_PATH . '/includes');
define('WP_THEME_BOILERPLATE_GITHUB_REPO', 'brianclogan/wp-theme-boilerplate');
define('WP_THEME_BOILERPLATE_GITHUB_REPO_URL', 'https://github.com/brianclogan/wp-theme-boilerplate');
define('WP_THEME_BOILERPLATE_SLUG', 'wp-theme-boilerplae');
define('WP_THEME_BOILERPLATE_NAME', 'WP Theme Boilerplate');

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
require_once 'includes/updater.php';