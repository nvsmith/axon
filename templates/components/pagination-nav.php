<?php
/**
 * Component: Pagination Nav
 *
 * Renders pagination links using WordPress’s the_posts_pagination().
 * WP Core automatically includes a <nav> element and a hidden <h2> screen reader text
 *
 * Designed to be placed inside a layout wrapper (e.g., container, sidebar).
 * Recommended usage:
 *     get_template_part( 'templates/components/pagination', 'nav' );
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

<div class="pagination-nav">
    <?php the_posts_pagination( array(
        'mid_size'           => 2,
        'prev_text'          => __( '« Prev', theme_get_text_domain() ),
        'next_text'          => __( 'Next »', theme_get_text_domain() ),
        'screen_reader_text' => $screen_reader_label,
    ) ); ?>
</div>
