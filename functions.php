<?php
/**
 * Theme Functions File
 *
 * The main entry point for theme-specific PHP logic.
 * 
 * Loads modular setup files for support features, menus, widgets, assets, and WooCommerce from the `/inc` directory.
 *
 * Each file inside the `/inc` directory handles a specific aspect of the theme.
 * 
 * @package Axon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load core functionality and features
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/widgets.php';

// Load theme styles/scripts
require get_template_directory() . '/inc/enqueue.php';

// Load WooCommerce-specific hooks and overrides if WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce-hooks.php';
}