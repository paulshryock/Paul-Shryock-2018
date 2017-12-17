<?php
/**
 * The sidebar containing the hero widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paul_Shryock_2018
 */

if ( ! is_active_sidebar( 'sidebar-hero' ) ) {
	return;
}
?>

<section class="site-hero">
	<?php dynamic_sidebar( 'sidebar-hero' ); ?>
</section><!-- .site-hero -->