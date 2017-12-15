<?php
/*
 * Template Name: Homepage Template
 *
 * @package Paul_Shryock_2018
*/

get_header(); ?>

	<section class="main-content">
		
		<?php
		// Show page content
		if ( ! get_theme_mod( 'paul_shryock_2018_hide_portfolio_page_content' ) ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
		endif; ?>

		<div class="portfolio-filter">
			<ul>
				<li id="filter--all" class="filter active" data-filter="*"><?php _e( 'View All', 'paul_shryock_2018' ) ?></li>
				<?php 
					// list terms in a given taxonomy
					$taxonomy = 'jetpack-portfolio-type';
					$tax_terms = get_terms( $taxonomy );

					foreach ( $tax_terms as $tax_term ) {
					echo '<li class="filter" data-filter=".'. $tax_term->slug.'">' . $tax_term->slug .'</li>';
					}
				?>
			</ul>
		</div><!-- .portfolio-filter -->

		<div class="portfolio">
			
			<?php
			if ( get_query_var( 'paged' ) ) :
				$paged = get_query_var( 'paged' );
			elseif ( get_query_var( 'page' ) ) :
				$paged = get_query_var( 'page' );
			else :
				$paged = -1;
			endif;

			$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '-1' );

			$args = array(
				'post_type'      => 'jetpack-portfolio',
				'paged'          => $paged,
				'posts_per_page' => $posts_per_page,
			);

			$project_query = new WP_Query ( $args );

			if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

				while ( $project_query -> have_posts() ) : $project_query -> the_post();

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

				paul_shryock_2018_paging_nav( $project_query->max_num_pages );
				wp_reset_postdata();

			else : ?>

				<section class="no-results not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'No Project Found', 'paul_shryock_2018' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<?php if ( current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'paul_shryock_2018' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

						<?php else : ?>

							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'paul_shryock_2018' ); ?></p>

						<?php endif; ?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->

			<?php
			endif; ?>

		</div><!-- .portfolio -->

	</section><!-- .main-content -->

<?php
// get_sidebar();
get_footer();
