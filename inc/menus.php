<?php
/**
 * Theme Navigation Menus
 *
 * Registers navigation menu locations for use with wp_nav_menu().
 *
 * @package Groundwork
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function axon_register_menus() {
     // Register navigation menus
    register_nav_menus( array(
        'header' => __( 'Header Menu', 'axon' ),
        'footer'  => __( 'Footer Menu', 'axon' ),
        'primary' => __( 'Primary Navigation Menu', 'axon' ),
        'secondary' => __( 'Secondary Navigation Menu', 'axon' ),
        'social' => __( 'Social Media Menu', 'axon' ),
        'utility' => __( 'Utility Menu', 'axon' )
    ) );
}

add_action( 'after_setup_theme', 'axon_register_menus' );