<?php
/**
 * Single Post Template
 * 
 * The generic/fallback template for a single, standard post and any custom post type without its own `single-*.php` template. (Post type: `post`).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package Axon
 */

get_header();
?>

<main class="site-main" role="main" aria-label="<?php echo esc_attr_x( 'Main content', 'ARIA label for main region', theme_get_text_domain() ); ?>">
    <?php get_template_part( 'templates/parts/hero', 'global' ); ?>

    <?php
        if ( have_posts() ) {
            get_template_part( 'templates/parts/content', 'single' );
        }
    ?>
</main>

<?php get_footer(); ?>