<?php
/**
 * Theme Navigation Menus
 *
 * Registers navigation menu locations for use with wp_nav_menu().
 * 
 * Adds dynamic classes to menu items & links based on menu location.
 *
 * @package Axon
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register navigation menus
function axon_register_menus() {
    register_nav_menus( array(
        'header' => __( 'Header Menu', 'axon' ),
        'footer'  => __( 'Footer Menu', 'axon' ),
        'social' => __( 'Social Media Menu', 'axon' ),
        'top-bar' => __( 'Top Bar Menu', 'axon' )
    ) );
}
add_action( 'after_setup_theme', 'axon_register_menus' );

// Add menu item classes based on menu location
function axon_menu_item_classes( $classes, $item, $args, $depth ) {
    if ( isset( $args->theme_location ) ) {
        $classes[] = $args->theme_location . '-menu__item';
    }

    return $classes;
}

// 10 = standard priority, 4 = number of args from above function that `add_filter` needs to pass
add_filter( 'nav_menu_css_class', 'axon_menu_item_classes', 10, 4 );

// Add link classes for menu items based on menu location
function axon_menu_link_attributes( $atts, $item, $args, $depth ) {
    if ( isset( $args->theme_location ) ) {
        $atts['class'] = $args->theme_location . '-menu__link';
    }
    
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'axon_menu_link_attributes', 10, 4 );