<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Paul_Shryock_2018
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function paul_shryock_2018_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'paul_shryock_2018_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details' => array(
			'stylesheet' => 'paul-shryock-2018-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
	) );

	/*
	 * Enable support for Jetpack testimonials.
	 */
	add_theme_support( 'jetpack-testimonial' );
	add_post_type_support( 'jetpack-testimonial', 'excerpt' );

	/*
	 * Enable support for Jetpack portfolio.
	 */
	add_theme_support( 'jetpack-portfolio', array(
		'title'          => true,
		'content'        => true,
		'featured-image' => true,
	) );
	add_post_type_support( 'jetpack-portfolio', 'excerpt' );
	
}
add_action( 'after_setup_theme', 'paul_shryock_2018_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function paul_shryock_2018_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
