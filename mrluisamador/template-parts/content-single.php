<?php
/**
 * Template part for displaying single posts.
 *
 * @package la
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-content'); ?>>
	<div class="entry-header">
		<?php the_title( '<h1 class="entry-title blog-header">', '</h1>' ); ?>
	</div><!-- .entry-header -->

	<div class="entry-content blog-entry">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'la' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-meta">
		Posted on: <?php the_date(); ?>, by <?php the_author(); ?> 
	</div><!-- .entry-meta -->

	<footer class="entry-footer">
		<?php la_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
