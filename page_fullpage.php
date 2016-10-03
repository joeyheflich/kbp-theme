<?php
/**
 * Template Name: Full Page
 * The template for displaying a full page with no sidebar.
 *
 * @package kbp
 */

get_header(); ?>
<div id="content" class="site-content max-width center xl-margins">
	<div id="primary" class="content-area max-content-width content-area--no-sidebar">
		<main id="main" class="site-main" role="main">
		
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php get_footer();
