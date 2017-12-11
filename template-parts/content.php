<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paul_Shryock_2018
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

	<section class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'paul-shryock-2018' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'paul-shryock-2018' ),
			'after'  => '</div>',
		) ); ?>

	</section><!-- .entry-content -->
		
	<?php
	if ( is_singular() ) : ?>
	<footer class="entry-footer">
		<?php paul_shryock_2018_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
