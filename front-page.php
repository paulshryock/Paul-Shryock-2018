<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paul_Shryock_2018
 */

get_header(); ?>

	<section class="main-content">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.

		$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
		if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile; endif; ?>
		
	</section><!-- .main-content -->

<?php
// get_sidebar();
get_footer();
