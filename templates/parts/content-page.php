<?php
/**
 * Template part for displaying page content
 *
 * Used in page.php.
 *
 * @package Axon
 */

if ( get_post_type() !== 'page' ) {
    return;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page' ); ?>>
    <header class="page__header">
        <h1 class="page__title"><?php the_title(); ?></h1>
    </header>

    <div class="page__content">
        <?php the_content(); ?>
    </div>
</article>
