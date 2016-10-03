<?php
/**
 * Template part for displaying content from the post-type comics.
 * @package kbp
 */

$class_array = array( 'page-full', 'center' ); 
$series = get_the_terms( get_the_ID(), 'series');
$series_name = $series[0]->name;
$series_slug = $series[0]->slug;
$series_url = get_term_link( $series_slug, 'series' );
if ( has_post_thumbnail() ) {
	$header_image = 'style="background-image:url(' . get_the_post_thumbnail_url() . ')"';
} else {
	$header_image = '';
}
?>

<section id="comic" <?php post_class( $class_array );  ?>>
	<header class="comic-header page-header xxl-padding xl-margin-bottom">
		<div class="header-background-image" <?php echo $header_image; ?>></div>
		<a href="<?php echo esc_url($series_url); ?>"><h1 class="page-title comic-title max-text-width center"><?php echo $series_name; ?></h1></a>
	</header><!-- .comic-header -->

	<div class="comic-content text-normal">
		<?php
			get_template_part( 'components/comics/comic', 'single' );

			// Other comics in this series
			$current_comic = get_the_ID();
			$comics_cat = array ( 
									array (	
											'taxonomy' => 'series',
											'field' => 'slug',
											'terms' => $series_slug, 
										  )
									);
			$comics_args = array ( 
										'post_type' => 'comics',
										'tax_query' => $comics_cat,
										'posts_per_page' => -1,
										'post__not_in' => array( $current_comic ),
										'orderby' => 'date', 
										'order' => 'ASC',
								   );
			$comics_query = new WP_Query( $comics_args );
			if( $comics_query->have_posts() ) {
				echo '<section class="comic-series xl-padding">';
				echo '<header class="comic-series-header max-width center xl-padded"><h4 class="comic-series-title heading-small s-margin-bottom max-width center">';
				_e( 'More from this Series', 'kbp' );
				echo '</h4></header><div class="comic-series-content clear max-width center xl-padded">';
					while ( $comics_query->have_posts() ) : $comics_query->the_post();
						get_template_part( 'components/comics/comic', 'cover' );
					endwhile;
				echo '</div></section>';
			}
			wp_reset_postdata();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kbp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .comic-content -->
	<footer class="comic-footer">
	</footer><!-- .comic-footer -->
</section><!-- #post-## -->