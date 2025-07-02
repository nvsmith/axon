<?php
/**
 * Theme Functions File
 *
 * The main entry point for theme-specific PHP logic.
 * Loads modular setup files for support features, menus, widgets, assets, and WooCommerce.
 *
 * Each file inside the `/inc` directory handles a specific aspect of the theme.
 * 
 * @package Axon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load theme support features
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/widgets.php';

// Handle theme styles/scripts
require get_template_directory() . '/inc/enqueue.php';

// WooCommerce-specific hooks and overrides (loaded only if WooCommerce is active)
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce-hooks.php';
}