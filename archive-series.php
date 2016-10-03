<?php
/**
 * The template for displaying archive pages for the 'series' taxonomy.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

get_header();

if ( function_exists('z_taxonomy_image_url') ) {
	$header_image = 'style="background-image:url(' .  z_taxonomy_image_url() . ')"';
} else {
	$header_image = '';
}

?>
<div id="content" class="site-content">
	<header class="page-header series-header xxl-padding xl-margin-bottom">
		<div class="header-background-image" <?php echo $header_image; ?>></div>
		<h1 class="page-title series-title max-text-width center"><?php single_term_title(); ?></h1>
	</header><!-- .page-header -->
	<div id="primary" class="content-area content-area--no-sidebar clear">
		<main id="main" class="site-main" role="main">
			<div class="comic-content text-normal">
			<?php
				if ( have_posts() ) : 
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'components/comics/comic', 'single' );
				endwhile;

				else :
				get_template_part( 'components/content/content', 'none' );

			endif; ?>
			</div><!-- .comic-content -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->	
<?php get_footer();
