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

if ( get_post_type() !== 'post' ) {
    return;
}
?>

<section class="post-list" role="region" aria-label="<?php echo esc_attr_x( 'Post content', 'ARIA label for dynamic posts section', theme_get_text_domain() ); ?>">
    <div class="container post-list__container">
        <div class="row post-list__row">
            <div class="col post-list__col">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-preview' ); ?>>
                        <div class="post-preview__title-wrap">
                            <h3 id="post-title-<?php the_ID(); ?>" class="post-preview__title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <div class="post-preview__meta">
                                <span class="post-preview__date"><?php echo esc_html( get_the_date() ); ?></span>
                        
                                <span class="post-preview__author"><?php echo esc_html( get_the_author() ); ?></span>
                            </div>
                        </div>
                
                        <div class="post-preview__body">
                            <?php the_excerpt(); ?>
                        </div>
                
                        <div class="post-preview__readmore-wrap">
                            <a class="post-preview__readmore" href="<?php the_permalink(); ?>" rel="bookmark" aria-describedby="post-title-<?php the_ID(); ?>">
                                <?php esc_html_e( 'Read More', theme_get_text_domain() ); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div> <!-- end post-list__col -->
        </div> <!-- end post-list__row -->
    </div> <!-- end post-list__container -->
</section>