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
        	<?php while ( have_posts() ) : the_post(); ?>
	          <div class="about-me__content">
							<?php the_field('about_me'); ?>
	          </div>

  				<?php endwhile; wp_reset_postdata(); // End of the loop. ?>
				</div>
      </section><!-- End About Me Section -->

			<!-- Skills Section | This is a Custom Post Type -->
      <section id="skills" class="scrollto">
        <?php $query = new WP_query(array('post_type' => 'skill', 'posts_per_page' => 4)); ?>

				<h1 class="blog-title">My Skills</h1>

				<div class="skills-wrapper">
        	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="skills-inner-wrap">
						<h1 class="skills-title"><?php the_title(); ?></h1>

						<div class="skills-content">
	            <?php the_content(); ?>
	          </div>
					</div>

					<?php endwhile; wp_reset_postdata(); // End of the loop. ?>
				</div>
      </section><!-- End Skills Section -->

			<!-- Blog Section | This is WordPress Code to display the newest two blogs on the Home Page -->
			<section id="blog" class="scrollto">

				<h1 class="blog-title">Latest Blog</h1>

        <?php $query = new WP_query(array( 'posts_per_page' => 2)); ?>
					<div class="blog-outer-wrap">
		        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<div class="blog-inner-wrap">
								<h1><?php the_title(); ?></h1>

								<p class="blog-content">
			                        <?php the_excerpt(); ?>
			                    </p>

								<a class="read-more-link" href="<?php echo get_permalink(); ?>"> Read More...</a>
							</div>

						<?php endwhile; wp_reset_postdata(); // End of the loop. ?>
					</div>
      </section><!-- End Blog Section -->

			<!-- Contact Section | This is a Custom Field for HomePage -->
      <section id="contact-me" class="scrollto">
        <div class="contact">
          <?php $query = new WP_query('pagename=contact-me'); ?>

          <?php while ( have_posts() ) : the_post(); ?>
            <p>
              <?php the_field('contact_me'); ?>
            </p>

    			<?php endwhile; wp_reset_postdata(); // End of the loop. ?>
        </div>
      </section><!-- Contact Section -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
