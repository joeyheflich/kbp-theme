<?php
/**
 * The template for displaying archive pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

get_header(); ?>
<div class="content-wrapper max-width clear">
	<div id="primary" class="content-area content-area--has-sidebar">
		<main id="main" class="site-main" role="main">
		
		<?php
			if ( have_posts() ) {
				get_template_part( 'components/blog/blog', 'layouts' ); 
			} else {
				get_template_part( 'components/content/content', 'none' );
			} 
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</div>
<?php get_footer();
