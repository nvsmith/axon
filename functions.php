<?php
// Enqueue theme stylesheet
function axon_enqueue_styles() {
    wp_enqueue_style( 'axon-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'axon_enqueue_styles' );