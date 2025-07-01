<?php
/**
 * The main template file
 *
 * Serves as the fallback for all queries when a more specific template isn’t found.
 * Loads header.php, runs The Loop, and loads footer.php.
 *
 * @package Axon
 */

get_header();

// Only render content if there are posts or explicitly handle “no posts” case
if ( have_posts() ) : ?>
    <main class="site-main site-main--has-posts">
        <div class="container site-main__container">
            <div class="row site-main__row">
                <?php
                while ( have_posts() ) :
                    the_post();
                ?>
                    <div class="col site-main__col site-main__col--post">
                        <?php get_template_part( 'templates/parts/content', get_post_type() ); ?>
                    </div> <!-- end site-main__col--post -->
                <?php endwhile; ?>
            </div> <!-- end site-main__row -->

            <nav class="site-pagination" role="navigation" aria-label="<?php esc_attr_e( 'Posts navigation', 'axon' ); ?>">
                <?php
                the_posts_pagination( array(
                    'mid_size'           => 2,
                    'prev_text'          => __( '« Prev', 'axon' ),
                    'next_text'          => __( 'Next »', 'axon' ),
                    'screen_reader_text' => __( 'Posts navigation', 'axon' ),
                ) );
                ?>
            </nav>
        </div> <!-- end site-main__container -->
    </main>

<?php
// Handle the “no posts” scenario
else : ?>
    <main class="site-main site-main--no-posts">
        <div class="container site-main__container">
            <div class="row site-main__row">
                <div class="col site-main__col site-main__col--empty">
                    <?php get_template_part( 'templates/parts/content', 'none' ); ?>
                </div> <!-- end site-main__col--empty -->
            </div> <!-- end site-main__row -->
        </div> <!-- end site-main__container -->
    </main>

<?php
endif;

get_footer();