<?php
/**
 * The template for displaying archive pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

require_once 'components/content/includes/page-header.php';
get_header(); ?>
<div id="content" class="site-content">
	<header class="page-header page-header--full-page xxl-padding" <?php echo $page_image; ?>>
		<?php 
			the_archive_description( '<p class="archive-description support-text text-upper s-margin-bottom">', '</p>' );
			the_archive_title( '<h1 class="page-title max-text-width center">', '</h1>' );
		?>
	</header><!-- .page-header -->
	<div id="primary" class="content-area content-area--full xxl-padding has-background">
		

		<?php
		if ( have_posts() ) : ?>
			<?php
			$remove_last_border = ( $GLOBALS['wp_query']->max_num_pages >= 2 ) ? '' : ' no-page-nav'; ?><main id="main" class="site-main max-content-width text-normal<?php echo $remove_last_border; ?>" role="main"><?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'components/content/content', '' );

			endwhile;
			
			kbp_page_nav('');
			
		else :
			?><main id="main" class="site-main max-content-width text-normal" role="main"><?php
			get_template_part( 'components/content/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php get_footer();
