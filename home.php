<?php
/**
 * The home template file.
 *
 * This is the template for the posts/blog page. To alter with different looks, set values below.
 *
 * @package kbp
 */

require_once 'components/content/includes/page-header.php';
get_header(); ?>
<header class="page-header page-header--full-page xxl-padding" <?php echo $page_image; ?>>
	<h1 class="page-title max-text-width center"><?php esc_html_e( 'News', 'kbp' ); ?></h1>
</header><!-- .page-header -->
<div id="content" class="site-content max-width center xxl-padding">
	<div id="primary" class="content-area content-area--has-sidebar">
		<main id="main" class="site-main l-padded l-padding has-background half-curved" role="main">
		<?php
			if ( have_posts() ) {
				// Start the Loop
				while ( have_posts() ) : the_post();
					get_template_part( 'components/content/content', '' );
				endwhile; 
				kbp_number_nav();
			} else {
				get_template_part( 'components/content/content', 'none' );
			} 
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- #content -->	
<?php get_footer();
