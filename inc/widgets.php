<?php
/**
 * Theme Widget Areas
 *
 * Registers widget areas (sidebars) used in various parts of the theme layout,
 * such as footer, sidebars, and header utility bar.
 *
 * @package Groundwork
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function axon_widgets_init() {
    
    // Modify, add, or delete any widget areas (AKA sidebars) as needed:

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

    // Top Bar Utility Area (Used in header.php)
    register_sidebar( array(
        'name'          => __( 'Top Bar Area', 'axon' ),
        'id'            => 'top-bar',
        'description'   => __( 'Widgets added here will appear in the top bar above the header.', 'axon' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'axon_widgets_init' );