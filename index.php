<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

get_header(); ?>

<div id="content" class="site-content max-width center xl-margins">
	<div id="primary" class="content-area content-area--has-sidebar text-normal">
		<main id="main" class="site-main" role="main">
		
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

					get_template_part( 'components/list/content', 'list' );

			endwhile;

			kbp_page_nav( 'content', 'full' );

		else :

			get_template_part( 'components/content/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div> <!-- #content -->
<?php get_footer();