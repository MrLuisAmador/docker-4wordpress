<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package la
 */

get_header('blog'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
			
				<h1 class="page-title">
					<?php esc_html_e( 'Oops! You seem lost.', 'la' ); ?>	
				</h1>
				
				<h2 class="page-subtitle">No worries, just click to go back to the <a href="<?php echo get_home_url(); ?>">homepage</a> or take a look at the links below.</h2>

				<div class="page-content">

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( la_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'la' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
