<?php
/**
 * Template Part: Pagination Layout
 *
 * Wraps the pagination navigation in a standard layout container.
 * Intended for use inside sections on templates such as archives, search results, or anywhere you need pagination.
 *
 * @package Axon
 */
?>

<div class="container pagination__container">
    <div class="row pagination__row">
            <div class="col pagination__col">
                <?php get_template_part( 'templates/components/pagination', 'nav' ); ?>
        </div> <!-- end pagination__col -->
    </div> <!-- end pagination__row -->
</div> <!-- end pagination__container -->
