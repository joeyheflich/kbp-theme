<?php
/**
 * Template part for displaying page content in page-creators.php.
 *
 * @package kbp
 */

require_once 'includes/page-header.php';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<header class="page-header page-header--full-page xxl-padding xl-margin-bottom" <?php echo $page_image; ?>>
		<?php the_title( '<h1 class="page-title max-text-width center">', '</h1>' ); ?>
	</header><!-- .page-header -->
	<section id="creators-area" class="creators-section max-width center">
		<?php			
			$creators_args = array ( 
									'post_type' => 'creators',
									'posts_per_page' => -1,
									'orderby' => 'title', 
									'order' => 'ASC',
								 );
			$creators_query = new WP_Query( $creators_args );
			if( $creators_query->have_posts() ) {
					while ( $creators_query->have_posts() ) : $creators_query->the_post();
						get_template_part( 'components/content/content', 'creator' );
					endwhile;
			}
			wp_reset_postdata();
		?>
	</section><!-- .entry-content -->
</article><!-- #post-## -->