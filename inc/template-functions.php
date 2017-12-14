<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Paul_Shryock_2018
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function paul_shryock_2018_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'paul_shryock_2018_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function paul_shryock_2018_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'paul_shryock_2018_pingback_header' );

/**
 * Filter the except length to a modified number of words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function paul_shryock_2018_custom_excerpt_length( $length ) {
		return 30;
}
add_filter( 'excerpt_length', 'paul_shryock_2018_custom_excerpt_length', 999 );

/**
 * If on a post type archive, use the post type archive title.
 */
function paul_shryock_2018_archive_title( $title ) {
	if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}

	if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
		$jetpack_portfolio_title = get_option( 'jetpack_portfolio_title' );
		if ( isset( $jetpack_portfolio_title ) && '' != $jetpack_portfolio_title ) :
			$title = esc_html( $jetpack_portfolio_title );
		endif;
	}

	if ( is_post_type_archive( 'jetpack-testimonial' ) ) {
		$jetpack_testimonials = get_theme_mod( 'jetpack_testimonials' );
		if ( isset( $jetpack_testimonials[ 'page-title' ] ) && '' != $jetpack_testimonials[ 'page-title' ] ) :
			$title = esc_html( $jetpack_testimonials[ 'page-title' ] );
		endif;
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'paul_shryock_2018_archive_title' );