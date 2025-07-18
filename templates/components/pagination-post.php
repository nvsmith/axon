<?php
/**
 * Component: Pagination – Post
 *
 * Outputs pagination links for a single post split into multiple pages.
 *
 * Uses `wp_link_pages()` to render links for content separated by <!--nextpage--> tags.
 * Intended to be placed within the single post content template (e.g., content-single.php).
 *
 * Usage: Call using:
 * get_template_part( 'templates/components/pagination', 'post' );
 *
 * @package Axon
 */

global $numpages;
if ( $numpages < 2 ) {
    return;
}
?>

<nav class="navigation pagination pagination--post" aria-label="<?php echo esc_attr( 'Page navigation' ); ?>">
    <h2 class="screen-reader-text"><?php echo esc_html( 'Page navigation' ); ?></h2>
    
    <?php
        wp_link_pages( array(
            'before'           => '<div class="nav-links">' . esc_html( __( 'Pages:', theme_get_text_domain() ) ),
            'after'            => '</div>',
            'link_before'      => '<span class="page-numbers">',
            'link_after'       => '</span>',
            'next_or_number'   => 'number',
            'pagelink'         => '%',
            'separator'        => '<span class="page-links-separator"> | </span>',
        ) );
    ?>
</nav>
