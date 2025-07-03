<?php
/**
 * Theme Enqueue Scripts and Styles
 *
 * Registers and enqueues stylesheets and JavaScript files.
 *
 * @package Groundwork
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue stylesheets
function axon_enqueue_styles() {
    // Get theme version
    $theme = wp_get_theme();
    $theme_version = $theme->get( 'Version' );

    // Enqueue root stylesheet first
    wp_enqueue_style( 
        'axon-style', 
        get_stylesheet_uri(),
        [], // No dependencies
        $theme_version
    );

    /*
    // Enqueue additional stylesheet in assets/css
    wp_enqueue_style(
        // Create a theme-prefixed handle with the name of the stylesheet and update the directory URI below
        'axon-addStylesheetNameHere',
        get_template_directory_uri() . '/assets/css/addStylesheetNameHere.css',
        // List stylesheets in order by which they should be loaded, starting with the root stylesheet
        [ 'axon-style' ],
        // Version of this CSS file
        '1.0.0'
    );
    */
}
add_action( 'wp_enqueue_scripts', 'axon_enqueue_styles' );

// Enqueue scripts
function axon_enqueue_scripts() {
    // Enqueue the `main.js` file
    wp_enqueue_script(
        'axon-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        null, // Don't add a version
        true // Load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'axon_enqueue_scripts' );