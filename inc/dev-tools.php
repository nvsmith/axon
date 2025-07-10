<?php
/**
 * Utility tools for development and debugging
 *
 * @package Axon
 */

// Log the current template to the browser console
add_action( 'wp_footer', 'theme_console_log_template', 100 );

function theme_console_log_template() {
    // Only show this to administrators
    if ( ! current_user_can( 'administrator' ) ) {
        return;
    }

    global $template;

    if ( ! isset( $template ) ) {
        echo '<script>console.log("No template found");</script>';
        return;
    }

    // Normalize path separators and strip the theme root
    $template_path = str_replace( ['\\', get_theme_root()], ['/', ''], $template );

    // Output to browser console (JSON-encoded string to safely escape quotes/backslashes)
    echo '<script>console.log(' . wp_json_encode( 'Current template: ' . $template_path ) . ');</script>';
}
