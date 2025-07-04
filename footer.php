<?php
/**
 * The template for displaying the footer
 * 
 * Contains closing HTML and `wp_footer()` hook to output footer scripts from 3rd parties
 *
 * @package Axon
 */
?>

        <footer class="site-footer" role="contentinfo" aria-label="Site Footer">
            <div class="container site-footer__container">
                <!-- Footer Sidebar (Widget Area) -->
                <?php if ( is_active_sidebar( 'footer-area')) : ?>
                
                <div class="row site-footer__row">
                    <div class="col site-footer__col site-footer__widgets">
                        <?php dynamic_sidebar( 'footer-area' ); ?>
                    </div> <!-- end site-footer__widgets -->
                </div> <!-- end site-footer__row -->
               
                <?php endif; ?>

                <!-- Footer Menu (if available) -->
                <?php if (has_nav_menu( 'footer-menu' ) ) : ?>
                
                <div class="row site-footer__row">
                    <div class="col site-footer__col site-footer__nav-col">
                        <nav class="site-footer__nav" role="navigation" aria-label="Footer menu">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'footer-menu',
                                'menu_class' => 'site-footer__menu',
                                'container' => false,
                                'depth' => 1,
                            ));
                            ?>
                        </nav>
                    </div> <!-- end site-footer__nav-col -->
                </div> <!-- end site-footer__row -->
                
                <?php endif; ?>
                
                <!-- Site Info / Attribution -->
                <div class="row site-footer__row">
                    <div class="col site-footer__col site-footer__attribution">
                        <p class="site-footer__text">
                            &copy; <?php echo date( 'Y' ); ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php bloginfo( 'name' ); ?>
                            </a>. All rights reserved.
                        </p>
                    </div> <!-- end site-footer__attribution -->
                </div> <!-- end site-footer__row -->

            </div> <!-- end site-footer__container -->
        </footer>

        <!-- Output footer scripts from 3rd parties -->
        <?php wp_footer(); ?>
    </body>
</html>