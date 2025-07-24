<?php
/**
 * Global Hero Section
 *
 * Outputs a context-aware hero section with title and optional description.
 *
 * @package Axon
 */

 $title = '';
 $description = get_bloginfo( 'description' );

// Detect page contexts
if ( is_front_page() && is_home() ) {
    // Homepage is set to display latest posts
	$title = get_bloginfo( 'name' );
    
} elseif ( is_front_page() ) {
    // Homepage is set to display a static front page
	$title = get_the_title();

} elseif ( is_home() ) {
	// Blog index (set via "Posts page" in Settings → Reading)
	$posts_page_id = get_option( 'page_for_posts' );
	$title = $posts_page_id ? get_the_title( $posts_page_id ) : __( 'Blog', theme_get_text_domain() );

} elseif ( is_archive() ) {
	$title = get_the_archive_title();

} elseif ( is_search() ) {
	$title = __( 'Search', theme_get_text_domain() );

} elseif ( is_404() ) {
	$title = __( 'Page Not Found', theme_get_text_domain() );

} else {
	// Default: use current page/post title
	$title = get_the_title();
}

?>

<section class="hero" role="region" aria-label="<?php echo esc_attr_x( 'Hero section', 'ARIA label for hero section', theme_get_text_domain() ); ?>">
	<div class="container hero__container">
		<div class="row hero__row">
			<div class="col hero__col">
				<h1 class="hero__title"><?php echo esc_html( $title ); ?></h1>

				<?php if ( $description && is_front_page() ) : ?>
					<p class="hero__description">
                        <?php echo esc_html( $description ); ?>
                    </p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>