<?php
/**
 * Search results template. 
 * 
 * Loads content from `content-search.php` to display the content of each matching post.
 *
 * @package Axon
 */

get_header();
?>

<main class="site-main" role="main" aria-label="<?php echo esc_attr_x( 'Main content', 'ARIA label for main region', theme_get_text_domain() ); ?>">
    <?php get_template_part( 'templates/parts/hero', 'global' ); ?>

    <section class="search" role="region" aria-label="<?php echo esc_attr_x( 'Search results content region', 'ARIA label for search results content region', theme_get_text_domain() ); ?>">
        <div class="container search__container">
            <div class="row search__header-row">
                <div class="col search__header-col">
                    <h2 class="search__title">
                        <?php echo sprintf( esc_html__( 'Search results for: %s', theme_get_text_domain() ), get_search_query() ); ?>
                    </h2>
                </div> <!-- end search__header-col -->
            </div> <!-- end search__header-row -->

            <div class="row search__results-row">
                <div class="col search__results-col">
                    <?php if ( have_posts() ) {
                        while ( have_posts() ) {
                                the_post();
                                get_template_part( 'templates/parts/content', 'search' );
                        }
                    } else { ?>
                        <p class="search__empty">
                            <?php esc_html_e( 'Sorry, no results found.', theme_get_text_domain() ); ?>
                        </p>
                    <?php } ?>
                </div> <!-- end search__results-col -->
            </div> <!-- end search__results-row -->
        </div> <!-- end search__container -->
    </section>

    <?php
        if ( have_posts() ) {
            get_template_part( 'templates/parts/pagination', 'section' );
        }
    ?>
</main>

<?php get_footer(); ?>