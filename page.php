<?php
/**
 * Template for rendering static WordPress Pages
 *
 * This is the default template used for all pages created via the WordPress Dashboard (Pages → Add New),
 * unless a more specific template is available (e.g., `page-slug.php`, `page-{id}.php`, or `front-page.php`).
 * 
 * Responsible for assembling the structure of standard pages (such as About, Contact, or FAQ)
 * while deferring the actual content output to `content-page.php` in the `templates/parts` directory.
 *
 * @package Axon
 */

get_header();
?>

<main class="site-main">
    <?php get_template_part( 'templates/parts/hero', 'global' ); ?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'templates/parts/content', 'page' ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>