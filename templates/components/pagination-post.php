<?php
/**
 * Component: Pagination – Post
 *
 * Outputs pagination links for a single post split into multiple pages, intended to be placed within single post content templates (e.g., content-single.php).
 *
 * Uses `wp_link_pages()` to render links for content separated by <!--nextpage--> tags.
 * WordPress will autogenerate "post-page-numbers" classes for each link.
 *
 * Call within single post content templates using:
 * get_template_part( 'templates/components/pagination', 'post' );
 *
 * @package Axon
 */

global $numpages;
if ( $numpages < 2 ) {
    return;
}
?>

<?php if ( current_user_can( 'edit_posts' ) ) : ?>
    <p class="alert">
        The <strong>pagination</strong> below is configured in <code>templates/components/pagination-post.php</code>, which is called from the <code>content-single.php</code> template. <br> You can safely delete or hide this alert anytime.
    </p>
<?php endif; ?>

<nav class="navigation pagination pagination--post" aria-label="<?php echo esc_attr( 'Page navigation' ); ?>">
    <h2 class="screen-reader-text"><?php echo esc_html( 'Page navigation' ); ?></h2>

    <?php
        wp_link_pages( array(
            'before'           => '<div class="nav-links">' . esc_html( __( 'Pages:', theme_get_text_domain() ) ),
            'after'            => '</div>',
            'next_or_number'   => 'number',
            'pagelink'         => '%',
        ) );
    ?>
</nav>
