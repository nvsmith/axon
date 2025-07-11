<?php
/**
 * Template part for rendering the content of a generic static page
 *
 * This partial is loaded by `page.php` and is responsible for displaying the main content of a WordPress Page.
 * 
 * Think of it as a direct window into the content you enter via the WordPress Dashboard when editing a page.
 *
 * @package Axon
 */



if ( get_post_type() !== 'page' ) {
    return;
}
?>

<section class="content">
    <?php the_content(); ?>
</section>