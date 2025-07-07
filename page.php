<?php
/**
 * The template for rendering static pages.
 *
 * Used for all WordPress Pages (created via Admin → Pages),
 * unless a more specific template is defined (e.g., `page-slug.php`, `front-page.php`, etc).
 * 
 * This template defines where things go, but not necessarily what the content is.
 *
 * @package Axon
 */

get_header();

if ( have_posts() ) : ?>
    <main class="site-main">
        <div class="container site-main__container">
            <div class="row site-main__row">
                <?php while ( have_posts() ) : the_post(); ?>
                
                <div class="col site-main__col site-main__col--page">
                    <?php get_template_part( 'templates/parts/content', 'page' ); ?>
                </div> <!-- end site-main__col--post -->
               
                <?php endwhile; ?>
            </div> <!-- end site-main__row -->
        </div> <!-- end site-main__container -->
    </main>
<?php endif;

get_footer();