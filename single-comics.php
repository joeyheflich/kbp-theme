<?php
/**
 * The template for displaying all single comics.
 *
 * @package kbp
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area content-area--no-sidebar clear">
		<main id="main" class="site-main" role="main">
			<?php 
				while ( have_posts() ) : the_post();

					get_template_part( 'components/content/content', 'comic' );

				endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->	
<?php get_footer();