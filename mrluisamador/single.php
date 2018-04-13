<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package la
 */

get_header('blog'); ?>


<div id="primary" class="content-area blog-container">
	<main id="main" class="site-main blog-wrapper" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'single' ); ?>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

	<?php get_sidebar(); ?>

	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
</div><!-- #primary -->


<?php get_footer(); ?>
