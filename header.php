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
  <!-- The <title> tag is handled dynamically via add_theme_support( 'title-tag' ) -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--  Fires  (`do_action( 'wp_body_open' )`) hook to allow plugins to add content. -->
    <?php wp_body_open(); ?>

    <header class="site-header">
        <div class="container site-header__container">
            <div class="row site-header__row">
                <!-- Branding -->
                 <div class="col site-header__col site-header__branding">
                    <!-- Logo -->
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <!-- Title & Description -->
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__title"><?php bloginfo( 'name' ); ?></a>
                        <p class="site-header__description"><?php bloginfo( 'description' ); ?></p>
                    <?php endif; ?>
                 </div> <!-- end Branding -->
                 
                 <?php if ( has_nav_menu( 'header' ) ) : ?>
                    <!-- Navigation -->
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
                    </div> <!-- end Navigation -->
                 <?php endif; ?>
            </div> <!-- end site-header__row -->
        </div> <!-- end site-header__container -->
    </header>
