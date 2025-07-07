<?php
/**
 * Template part for rendering the content of a static page
 *
 * This file is loaded by `page.php` to output the main content of a WordPress Page.
 * It is responsible for rendering the page's title and content inside a structured <article> element.
 *
 * Includes a safeguard to exit early if the current post type is not 'page'.
 * This ensures the template part is not used in other contexts accidentally.
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
