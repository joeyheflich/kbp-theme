<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kbp
 */

get_header(); ?>
<div id="content" class="site-content max-width center xl-margins">
	<div id="primary" class="content-area content-area--has-sidebar">
		<main id="main" class="site-main has-background l-padded l-padding half-curved" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'components/content/content', 'single' );

			echo '<div class="single-post-footer">';
			kbp_social_share('four', 'rectangle', 'hover', 'center');
			// Call custom post nav
			kbp_post_nav('');
			// 
			if( get_field('show_relevant') ) {
				kbp_more_posts('popular');
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			echo '</div><!-- .single-post-footer -->';

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div><!-- #content -->	
<?php get_footer();
