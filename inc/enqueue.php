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

function axon_enqueue_styles() {
    wp_enqueue_style( 'axon-style', get_stylesheet_uri() );
};

add_action( 'wp_enqueue_scripts', 'axon_enqueue_styles' );