<?php
/**
 * Component: Pagination – Archive
 *
 * Outputs pagination links for multi-post pages (e.g., blog archives, search results).
 *
 * Uses `the_posts_pagination()`, which includes a <nav> element and hidden <h2> for screen readers. WordPress will autogenerate "page-numbers" classes for each link.
 *
 * Call within archive templates using:
 * get_template_part( 'templates/components/pagination', 'archive' );
 *
 * @package Axon
 */

// Only output if there's more than one page of results
if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
    return;
}

// Set screen reader label contextually
if ( is_search() ) {
    $screen_reader_label = __( 'Search results navigation', theme_get_text_domain() );
} elseif ( is_archive() ) {
    $screen_reader_label = __( 'Archive navigation', theme_get_text_domain() );
} else {
    $screen_reader_label = __( 'Posts navigation', theme_get_text_domain() );
}
?>

<?php if ( current_user_can( 'edit_posts' ) ) : ?>
    <p class="alert">
        The <strong>pagination</strong> below is configured in <code>templates/components/pagination-archive.php</code>, which is called from the <code>single.php</code> template. <br> You can safely delete or hide this alert anytime.
    </p>
<?php endif; ?>

<?php 
    the_posts_pagination( array(
        'mid_size'           => 2,
        'prev_text'          => __( '« Prev', theme_get_text_domain() ),
        'next_text'          => __( 'Next »', theme_get_text_domain() ),
        'screen_reader_text' => $screen_reader_label,
    ) ); 
?>