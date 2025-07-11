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