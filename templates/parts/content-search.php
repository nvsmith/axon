<?php
/**
 * Template part for displaying a single search result item.
 *
 * Called from `search.php` to show each matching post.
 *
 * @package Axon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-preview' ); ?>>
    <div class="search-result-preview__title-wrap">
        <h3 id="search-title-<?php the_ID(); ?>" class="search-result-preview__title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h3>
    </div>
        
    <div class="search-result-preview__meta">
        <span class="search-result-preview__date"><?php echo esc_html( get_the_date() ); ?></span>

        <span class="search-result-preview__author"><?php echo esc_html( get_the_author() ); ?></span>
    </div>

    <div class="search-result-preview__body">
        <?php the_excerpt(); ?>
    </div>
</article>