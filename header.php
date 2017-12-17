<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paul_Shryock_2018
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class( 'site' ); ?>>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'paul-shryock-2018' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			// $description = get_bloginfo( 'description', 'display' );
			// if ( $description || is_customize_preview() ) : ?>
				<!--<p class="site-description">--><?php // echo $description; /* WPCS: xss ok. */ ?><!--</p>-->
			<?php
			// endif; ?>

			<nav id="site-navigation" class="header-nav">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'paul-shryock-2018' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'			 => 'ul',
					) );
				?>
			</nav><!-- .header-nav -->
		</header><!-- .site-header -->
		<?php get_sidebar( 'hero' ); ?>
		<main class="site-main">