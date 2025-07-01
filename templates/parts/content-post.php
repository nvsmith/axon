<?php
/**
 * Template part for displaying a post preview in archive or blog index views
 *
 * This partial is used inside The Loop to display a summarized version 
 * of each post — typically including the title, excerpt, thumbnail, and 
 * metadata — on pages like the blog index, category archives, or search results.
 *
 * @package Axon
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-post' ); ?>>
    <div class="content-post__title-wrap">
        <h2 class="content-post__title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>

        <?php if ( get_post_type() === 'post' ) : ?>
            <div class="content-post__meta">
                <span class="content-post__date"><?php echo get_the_date(); ?></span>
                <span class="content-post__author"><?php the_author(); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <div class="content-post__body">
        <?php the_excerpt(); ?>
    </div>

    <div class="content-post__readmore-wrap">
        <a class="content-post__readmore" href="<?php the_permalink(); ?>">
            <?php esc_html_e( 'Read More', 'axon' ); ?>
        </a>
    </div>
</article>
