<?php
/**
 * Template Name: Has Blog Sidebar
 * The template for displaying a page with the blog sidebar.
 *
 * @package kbp
 */

get_header(); ?>
<div id="content" class="site-content max-width center xl-margins">
	<div id="primary" class="content-area content-area--has-sidebar">
		<main id="main" class="site-main" role="main">
		
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/content/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</div><!-- #content -->
<?php get_footer();
