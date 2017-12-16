<?php
/**
 * Template part for displaying Jetpack portfolio projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paul_Shryock_2018
 */

$thumbnail = '';

if ( ! has_post_thumbnail() ) :
	$thumbnail = array(
		'no-thumbnail',
	);
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $thumbnail ); ?>>
	<header class="entry-header">
		
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( has_post_thumbnail() ) :
			if ( is_singular() ) :
				the_post_thumbnail();
			else :
				echo '<a class="entry-image-link" href="' . esc_url( get_permalink() ) . '" alt="' . get_the_title() . '">';
					the_post_thumbnail();
				echo '</a>';
			endif;
		endif; ?>

	</header><!-- .entry-header -->
		
	<footer class="entry-footer">
		<?php paul_shryock_2018_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
