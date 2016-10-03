<?php
/**
 * The template for displaying 404 pages (not found).
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kbp
 */

require_once 'components/content/includes/page-header.php';
get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header page-header--full-page xxl-padding xl-margin-bottom" <?php echo $page_image; ?>>
					<h1 class="page-title max-text-width center"><?php esc_html_e( '404: Not Found', 'kbp' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content has-background half-curved text-normal max-content-width center l-padding l-padded xl-margin-bottom">
					<h2 class="error-message text-center m-margin-bottom"><?php esc_html_e( 'Oh, no. There\'s no page here. (Run.)', 'kbp' ); ?></h2>
					<p><?php esc_html_e( 'Despite our best efforts, we were unable to find the stuff you wanted. I mean, we have some great stuff here, but the stuff at this location? Well, it\'s not here.', 'kbp' ); ?></p>
					<p><?php esc_html_e( 'Hence this error page.', 'kbp' ); ?></p>
					<p><?php esc_html_e( 'Maybe it was moved. Maybe someone typed something in wrong somewhere. Maybe it was never here.', 'kbp' ); ?></p>
					<p><?php esc_html_e('Did you follow a link from somewhere only to find this disappointing error page? If so, please ', 'kbp' ); ?><a href="<?php echo get_home_url(); ?>/contact/">contact me.</a></p>
					<p><?php esc_html_e( 'If not, try searching the site for what you wanted.', 'kbp' ); ?></p>
					<div class="error-search m-margin-bottom">
						<?php get_search_form(); ?>
					</div>
					<p><?php esc_html_e( 'Or, if you feel completely lost, go back to the home page:', 'kbp' ); ?></p>
					<div class="error-return-home text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button" rel="bookmark">Go Home</a></div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
