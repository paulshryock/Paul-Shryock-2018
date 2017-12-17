<?php
/**
 * The sidebar containing the hero widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paul_Shryock_2018
 */

if ( ! is_front_page() ) {
	return;
}

if ( ! is_active_sidebar( 'sidebar-hero' ) ) {
	return;
}
?>

<section class="site-hero">
	<div class="hero-content">
		<?php dynamic_sidebar( 'sidebar-hero' ); ?>
	</div><!-- .hero-content -->
</section><!-- .site-hero -->