<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package la
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<!-- About Me Section | This is a Custom Field for HomePage -->
		<section id="about-me" class="scrollto">
			<div class="about-me__wrapper">
				<div class="about-me__content">
					<?php the_field( 'about_me' ); ?>
				</div>
			</div>
		</section><!-- End About Me Section -->

		<!-- Skills Section | This is a Custom Post Type -->
		<section id="skills" class="scrollto">
			<h1 class="blog-title">My Expertise</h1>

			<div class="skills-wrapper">
				<?php
				$args = array(
					'post_type'      => 'skill',
					'posts_per_page' => 4,
				);

				$query = new WP_query( $args );
				?>

				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
				?>

				<div class="skills-inner-wrap">
					<h1 class="skills-title"><?php the_title(); ?></h1>

					<div class="skills-content">
						<?php the_content(); ?>
					</div>
				</div>

				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section><!-- End Skills Section -->

		<!-- Projects Section | This is a Custom Field for HomePage -->
		<section id="projects" class="projects scrollto">
			<div class="projects__title-title-wrap">
				<h2 class="projects__title">Projects</h2>

				<h3 class="projects__sub-title">List of all the Projects I have been a part of.</h3>
			</div>

			<div class="filter-btn">
				<button data-filter="*">All</button>

				<button data-filter=".magento-projects">Magento</button>

				<button data-filter=".wordpress-projects">WordPress</button>

				<button data-filter=".misc-projects">Misc</button>
			</div>

			<?php
			$args = array(
				'post_type' => 'my_projects',
				'posts_per_page' => -1,
			);
			$query = new WP_query( $args );
			?>

			<div class="grid">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
				?>

					<div class="grid-item
						<?php
						$terms = get_the_terms( $post->ID, 'my_projects_categories' );
						foreach ( $terms as $term ) {
							echo esc_html( $term->slug );
						}
						?>
						">

						<a class="grid-item__link" target="_blank" href="<?php the_field( 'platform_link' ); ?>">
							<div class="project-box">
								<div class="project-box__img">
									<?php the_post_thumbnail( 'my-project-customize-size' ); ?>
								</div>

								<ul class="project-box__content">
									<li class="content__item project-box__tax">Platform:</li>
									<li class="content__item project-box__tax"><?php the_field( 'platform_type' ); ?></li>
								</ul>
							</div>
						</a>
					</div>

				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>

		<!-- Blog Section | This is WordPress Code to display the newest two blogs on the Home Page -->
		<section id="blog" class="scrollto">
			<h1 class="blog-title">Latest Blog</h1>

			<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 2,
			);

			$query = new WP_query( $args );
			?>

			<div class="blog-outer-wrap">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
				?>

					<div class="blog-inner-wrap">
						<h1><?php the_title(); ?></h1>

						<p class="blog-content">
							<?php the_excerpt(); ?>
						</p>

						<a class="read-more-link" href="<?php echo esc_attr( get_permalink() ); ?>"> Read More...</a>
					</div>

				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section><!-- End Blog Section -->

		<!-- Contact Section | This is a Custom Field for HomePage -->
		<section id="contact-me" class="scrollto">
			<div class="contact">
				<p>
					<?php the_field( 'contact_me' ); ?>
				</p>
			</div>
		</section><!-- Contact Section -->
	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
