<?php
/**
 * Theme Support Features
 *
 * Enables support for core WordPress features like title tag, thumbnails, HTML5 markup,
 * custom logo, and more using add_theme_support().
 *
 * @package Groundwork
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

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
}

add_action( 'after_setup_theme', 'axon_theme_support' );

