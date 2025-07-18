<?php
/**
 * The template for displaying 404 (Not Found) pages.
 *
 * @package Axon
 */

get_header();
?>

<main class="site-main" role="main" aria-label="<?php echo esc_attr_x( 'Main content: Page not found (404 error)', 'ARIA label for page not found (404 error)', theme_get_text_domain() ); ?>">
    <?php get_template_part( 'templates/parts/hero', 'global' ); ?>

    <section class="error-404" role="region" aria-label="<?php echo esc_attr_x( '404 Error content region', 'ARIA label for 404 error content region', theme_get_text_domain() ); ?>">
        <div class="container error-404__container">
            <div class="row error-404__row">
                <div class="col error-404__col">
                    <p class="error-404__message">
                        <?php esc_html_e( '404 Error: It looks like nothing was found at this location. Please go back or return to the homepage.', theme_get_text_domain() ); ?>
                    </p>

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="error-404__link">
                        <?php esc_html_e( 'Return to homepage', theme_get_text_domain() ); ?>
                    </a>
                </div> <!-- end error-404__col -->
            </div> <!-- end error-404__row -->
        </div> <!-- end error-404__container -->
    </section>
</main>

<?php get_footer(); ?>