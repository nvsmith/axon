<?php
/**
 * Template part for rendering the content of a generic static page.
 *
 * This partial is loaded by `page.php` and serves as a minimal, unopinionated container 
 * for displaying the main content of any WordPress Page (post type: `page`).
 * 
 * It outputs only a semantic `<section>` wrapper around the content entered in the 
 * WordPress page editor. This gives users full control over the layout and structure 
 * of their page content.
 * 
 * Recommended usage: Turn on the Code Editor when editing a Page in the Dashboard 
 * and build custom Bootstrap-like layouts as needed (using .container → .row → .col classes to define structure and flow of content).
 *
 * This template assumes the user wants to define their own layout grid directly in the editor,
 * making it ideal for flexible, layout-driven page designs without hardcoded structure.
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