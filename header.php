<?php
/**
 * The template for displaying the site header
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

    <header class="site-header">
        <div class="container site-header__container">
            <div class="row site-header__row">
                <div class="col site-header__col site-header__branding">
                    <!-- Logo (if available) -->
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    }
                    ?>
                    
                    <!-- Title -->
                    <a href="<?php echo esc_url( home_url( '/' )); ?>" class="site-header__title"><?php bloginfo( 'name' ); ?></a>

                    <!-- Description -->
                    <p class="site-header__description"><?php bloginfo( 'description' ); ?></p>
                </div> <!-- end site-header__branding -->
                
                <!-- Header Menu (if available) -->
                <?php if ( has_nav_menu( 'header' ) ) : ?>

                <div class="col site-header__col site-header__nav-col">
                    <nav class="site-header__nav" role="navigation" aria-label="Header menu">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'header',
                            'menu_class' => 'site-header__menu',
                            'container' => false,
                            'depth' => 1,
                        ));
                        ?>
                    </nav>
                </div> <!-- end site-header__nav-col -->
                
                <?php else : ?>
                No header menu assigned yet. Go to WP Dashboard → Appearance → Menus to assign one.

                <?php endif; ?>
            </div> <!-- end site-header__row -->
        </div> <!-- end site-header__container -->
    </header>
