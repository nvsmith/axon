<?php
/**
 * Template part for rendering the content of a generic static page
 *
 * This partial is loaded by `page.php` and is responsible for displaying the main content of a WordPress Page.
 * 
 * Think of it as a direct window into the content you enter via the WordPress Dashboard when editing a page.
 *
 * @package Axon
 */



if ( get_post_type() !== 'page' ) {
    return;
}
?>

<section class="content" role="region" aria-label="<?php echo esc_attr_x( 'Page content', 'ARIA label for static page section', theme_get_text_domain() ); ?>">
    <?php the_content(); ?>
</section>