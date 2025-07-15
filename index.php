<?php
/**
 * Main fallback template.
 *
 * This file serves as the final fallback in the WordPress Template Hierarchy.
 * It is used when no more specific template matches a given query.
 * 
 * Loads the global header and footer, and renders post content via template parts.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Axon
 */


get_header();
?>

<main class="site-main" role="main" aria-label="<?php echo esc_attr_x( 'Main content', 'ARIA label for main region', theme_get_text_domain() ); ?>">
    <?php get_template_part( 'templates/parts/hero', 'global' ); ?>

    <?php
        if ( have_posts() ) {
            get_template_part( 'templates/parts/content', 'post' );
            get_template_part( 'templates/parts/pagination', 'section' );
        }
    ?>
</main>

<?php get_footer(); ?>