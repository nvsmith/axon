<?php
/**
 * Template Part: Pagination Wrapper
 *
 * Wraps the Pagination Archive component in a standard section.
 * Intended for use in templates such as archives, search results, or anywhere you need multi-post pagination.
 *
 * @package Axon
 */
?>

<section class="pagination" role="region" aria-label="<?php echo esc_attr_x( 'Pagination', 'ARIA label for pagination section', theme_get_text_domain() ); ?>">
    <div class="container pagination__container">
        <div class="row pagination__row">
                <div class="col pagination__col">
                    <?php get_template_part( 'templates/components/pagination', 'archive' ); ?>
            </div> <!-- end pagination__col -->
        </div> <!-- end pagination__row -->
    </div> <!-- end pagination__container -->
</section>
