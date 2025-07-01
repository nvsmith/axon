<?php
/**
 * Theme Setup
 *
 * Registers theme support features, nav menus, sidebars (widget areas/containers), etc.
 *
 * @package Axon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function axon_theme_setup(){
    // Optional: Make theme available for translation
    load_theme_textdomain( 'axon', get_template_directory() . '/languages' );

    // Add dynamic <title> tag support
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails (feature images)
    add_theme_support( 'post-thumbnails' );

    // Enable HTML5 markup for search form, comment form, comment list, gallery, caption, and video
    add_theme_support( 'html5', array( 
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'video' 
    ) );

    // Enable automatic feed links in <head>
    add_theme_support( 'automatic-feed-links' );

    // Optional: Add support for a custom logo
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height' => true
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'header' => __( 'Header Menu', 'axon' ),
        'footer'  => __( 'Footer Menu', 'axon' )
    ) );
    
    // Optional: Add support for WooCommerce
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'axon_theme_setup' );

/**
 * Register sidebars (widget containers). 
 * 
 * These are optional, and will only appear on templates/pages that call the
 * dynamic_sidebar() function.
 * 
 */

function axon_widgets_init() {
    
    // Footer Area (Used in footer.php)
    register_sidebar( array(
        'name'          => __( 'Footer Area', 'axon' ),
        'id'            => 'footer-area',
        'description'   => __( 'Widgets added here will appear in the site footer.', 'axon' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Left Sidebar
    register_sidebar( array(
        'name'          => __( 'Left Sidebar', 'axon' ),
        'id'            => 'left-sidebar',
        'description'   => __( 'Widgets added here will appear in the left sidebar.', 'axon' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Right Sidebar
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'axon' ),
        'id'            => 'right-sidebar',
        'description'   => __( 'Widgets added here will appear in the right sidebar.', 'axon' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Top Bar Utility Area
    register_sidebar( array(
        'name'          => __( 'Top Bar Area', 'axon' ),
        'id'            => 'top-bar',
        'description'   => __( 'Widgets added here will appear in the top bar above the header.', 'axon' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // You can register more sidebars (widget containers) here if needed,
    // or delete/modify any of the existing ones as needed.
}

add_action( 'widgets_init', 'axon_widgets_init' );