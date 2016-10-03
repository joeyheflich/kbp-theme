<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kbp
 */

require_once 'components/content/includes/page-header.php';
get_header(); ?>
<div id="content" class="site-content">
	<header class="page-header page-header--full-page xxl-padding" <?php echo $page_image; ?>>
		<p class="search-results-title support-text text-upper s-margin-bottom"><?php esc_html_e( 'Search Results for', 'kbp' ); ?></p>
		<h1 class="page-title max-text-width center"><?php printf( esc_html__( '%s', 'kbp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header><!-- .page-header -->
		<section id="primary" class="content-area content-area--full xxl-padding has-background">
			<main id="main" class="site-main max-content-width text-normal" role="main">

			<?php
			if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'components/content/content', 'search' );

				endwhile;

				kbp_page_nav( '' );

			else :

				get_template_part( 'components/content/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
</div><!-- #content -->
<?php get_footer();