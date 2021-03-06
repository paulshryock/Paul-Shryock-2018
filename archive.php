<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paul_Shryock_2018
 */

get_header(); ?>

	<section class="main-content">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				$post_suffix = get_post_format();
				if ( is_post_type_archive( 'jetpack-testimonial' ) || is_post_type_archive( 'jetpack-portfolio' ) ) :
					$post_suffix = get_post_type();
				endif;
				get_template_part( 'template-parts/content', $post_suffix );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</section><!-- .main-content -->

<?php
// get_sidebar();
get_footer();
