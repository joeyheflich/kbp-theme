<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

require_once 'includes/page-header.php';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<header class="page-header page-header--full-page xxl-padding xl-margin-bottom" <?php echo $page_image; ?>>
		<?php the_title( '<h1 class="page-title max-text-width center">', '</h1>' ); ?>
	</header><!-- .page-header -->
	<div class="page-content page-content--full-page max-padding-width xl-padding xl-padded xl-margin-bottom center text-normal">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kbp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .page-content -->
	<footer class="page-footer text-center xl-margin-bottom footer-text">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'kbp' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .page-footer -->

</article><!-- #post-## -->
