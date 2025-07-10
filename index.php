<?php
/**
 * The default template file.
 *
 * Serves as the fallback for all queries when a more specific template isn’t found.
 * 
 * Loads `header.php` and `footer.php`
 * 
 * Runs The Loop to render either `templates/parts/content-post.php` or `templates/parts/content-none.php`.
 *
 * @package Axon
 */

get_header();
?>

<main class="site-main" role="main" aria-label="<?php echo esc_attr( __( 'Main content', 'axon' ) ); ?>">
    <?php get_template_part( 'templates/parts/hero', 'global' ); ?>

    <div class="container site-main__container">
        <div class="row site-main__row">
            <!-- If posts exist -->
            <?php if ( have_posts() ) : ?>
                <div class="col site-main__col site-main__col--post">
                    <?php while ( have_posts() ) :
                        the_post();
                    ?>
                        <article class="post-item">
                            <?php get_template_part( 'templates/parts/content', get_post_type() ); ?>
                        </article>
                    <?php endwhile; ?>
                </div> <!-- end site-main__col--post -->

                <div class="col site-main__col site-main__nav-col">
                    <nav class="site-pagination" role="navigation" aria-label="<?php echo esc_attr_e( 'Posts navigation', 'axon' ); ?>">
                        <?php
                            the_posts_pagination( array(
                                'mid_size'           => 2,
                                'prev_text'          => __( '« Prev', 'axon' ),
                                'next_text'          => __( 'Next »', 'axon' ),
                                'screen_reader_text' => __( 'Posts navigation', 'axon' ),
                            ) );
                        ?>
                    </nav>
                </div><!-- end site-main__nav-col -->
                
            <!-- If no posts exist -->
            <?php else : ?>
                <div class="col site-main__col site-main__col--empty">
                    <?php get_template_part( 'templates/parts/content', 'none' ); ?>
                </div> <!-- end site-main__col--empty -->
            <?php endif; ?>
        </div> <!-- end site-main__row -->
    </div> <!-- end site-main__container -->
</main>

<?php
get_footer();