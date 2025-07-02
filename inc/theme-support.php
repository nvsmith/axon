<?php
/**
 * Theme Support Features
 * 
 * Enables translation support using load_theme_textdomain().
 *
 * Enables support for core WordPress features using add_theme_support().
 *
 * Declares WooCommerce compatibility (prevents default styles from loading).
 *
 * @package Axon
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Load theme textdomain for translation support
function axon_load_textdomain() {
	load_theme_textdomain( 'axon', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'axon_load_textdomain', 0 );

// Load basic theme support & WooCommerce compatibility
function axon_theme_support() {
    // Add dynamic <title> tag support in <head>
    add_theme_support( 'title-tag' );
    
    // Enable automatic feed links in <head>
    add_theme_support( 'automatic-feed-links' );

    // Add support for post thumbnails (feature images)
    add_theme_support( 'post-thumbnails' );

    // Enable HTML5 markup for various types of content
    add_theme_support( 'html5', array( 
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'video' 
    ) );

    // Add support for a custom logo
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height' => true
    ) );

    // Add support for WooCommerce
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'axon_theme_support' );