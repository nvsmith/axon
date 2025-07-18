<?php
/**
 * Template part for displaying the full content of a single post
 *
 * Loaded by `single.php` and any `single-{post_type}.php` templates to output the complete
 * markup for a singular blog post (post type: `post`). Includes title, meta,
 * featured image, content, and footer (tags, navigation, comments).
 *
 * @package Axon
 */

if ( get_post_type() !== 'post' ) {
    return;
}
?>

<section class="single-post" role="region" aria-label="<?php echo esc_attr_x( 'Single post', 'ARIA label for singular post section', theme_get_text_domain() ); ?>">
    <div class="container single-post__container">
        <div class="row single-post__row">
            <div class="col single-post__col">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php if ( current_user_can( 'edit_posts' ) ) : ?>
                        <p class="alert">
                            This content is called from <code>templates/parts/content-single.php</code>, which is loaded from the <code>single.php</code> template. <br> You can safely delete or hide this alert anytime.
                        </p>
                    <?php endif; ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post__article' ); ?> role="article">
                        <div class="single-post__meta">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="single-post__date">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                            
                            <span class="single-post__author">
                                <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                            </span>
                        </div> <!-- end single-post__meta -->

                        <div class="single-post__content">
                            <?php the_content(); ?>

                            <?php get_template_part( 'templates/components/pagination', 'post' ); ?>
                        </div> <!-- end single-post__content -->
                    </article>
                <?php endwhile; ?>
            </div> <!-- end single-post__col -->
        </div> <!-- end single-post__row -->
    </div> <!-- end single-post__container -->
</section>
