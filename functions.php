<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Load theme support features, navigation menus, sidebars, and assets.
 *
 * Each file inside /inc handles a specific aspect of the theme.
 */

require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/widgets.php';

// Handle theme styles/scripts
require get_template_directory() . '/inc/enqueue.php';
