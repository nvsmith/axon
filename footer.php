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
                <div class="row site-footer__row">
                    <!-- Footer Sidebar/Widget Area (if available) -->
                    <?php if ( is_active_sidebar( 'footer-area') ) : ?>
                    
                    <div class="col site-footer__col site-footer__widgets-col">
                        <?php dynamic_sidebar( 'footer-area' ); ?>
                    </div> <!-- end site-footer__widgets-col -->
                    
                    <?php endif; ?> 
                    
                    <!-- Footer Menu (if available) -->
                    <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
                    
                    <div class="col site-footer__col site-footer__nav-col">
                        <nav class="site-footer__nav" role="navigation" aria-label="Footer menu">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'footer-menu',
                                'menu_class' => 'footer__menu',
                                'container' => false,
                                'depth' => 1,
                            ));
                            ?>
                        </nav>
                    </div> <!-- end site-footer__nav-col -->
                    
                    <?php endif; ?>
                
                    <!-- Site Attribution -->
                    <div class="col site-footer__col site-footer__attribution-col">
                        <p class="site-footer__text">
                            &copy; <?php echo date( 'Y' ); ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                            </a>. All rights reserved.
                        </p>
                    </div> <!-- end site-footer__attribution-col -->
                </div> <!-- end site-footer__row -->
            </div> <!-- end site-footer__container -->
        </footer>

        <!-- Output footer scripts from 3rd parties -->
        <?php wp_footer(); ?>
    </body>
</html>