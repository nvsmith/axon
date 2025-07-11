<?php
/**
 * The template for displaying the global site header
 *
 * Contains the opening HTML structure, <head> metadata, site branding, 
 * and the primary navigation menu.
 *
 * @package Axon
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The <title> tag is handled dynamically (inc/theme-support) -->
    <!-- Output metadata, styles, and scripts from 3rd parties -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- `body_class()` fires the `do_action( 'wp_body_open' )` hook to allow plugins to add content. -->
    <?php wp_body_open(); ?>

    <header class="site-header" role="banner" aria-label="<?php echo esc_attr_x( 'Site Header', 'Document landmark', theme_get_text_domain() ); ?>">
        <div class="container site-header__container">
            <div class="row site-header__row">
                <div class="col site-header__col site-header__branding">
                    <!-- Logo (if available) -->
                    <?php if ( has_custom_logo() ) : 
                        the_custom_logo(); 
                    endif; ?>
                        
                    <!-- Title (change to <h1> if on the front page) -->
                    <?php if ( is_front_page() ) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                            </a>
                        </h1>
                    <?php else : ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <!-- Description -->
                    <p class="site-header__description">
                        <?php echo esc_html( get_bloginfo( 'description' ) ); ?>    
                    </p>
                </div> <!-- end site-header__branding -->
                
                <!-- Header Menu (if available) -->
                <?php if ( has_nav_menu( 'header-menu' ) ) : ?>
                    <div class="col site-header__col site-header__nav-col">
                        <nav class="site-header__nav" role="navigation" aria-label="Header menu">
                            <?php 
                                wp_nav_menu( array(
                                    'theme_location' => 'header-menu',
                                    'menu_class' => 'header__menu',
                                    'container' => false,
                                    'depth' => 1,
                                ));
                            ?>
                        </nav>
                    </div> <!-- end site-header__nav-col -->
                <?php else : ?>
                    <p class="alert">
                        No header menu assigned. Go to WP Dashboard → Appearance → Menus to assign one.
                    </p>
                <?php endif; ?>
            </div> <!-- end site-header__row -->
        </div> <!-- end site-header__container -->
    </header>
