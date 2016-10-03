<?php
/**
 * Template part for displaying page content in page-comics.php.
 *
 * @package kbp
 */

require_once 'includes/page-header.php';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<header class="page-header page-header--full-page xxl-padding" <?php echo $page_image; ?>>
		<?php the_title( '<h1 class="page-title max-text-width center">', '</h1>' ); ?>
	</header><!-- .page-header -->
	<section id="series" class="series-section xxl-padding xl-margin-bottom">
		<ul class="series-menu max-width m-padded center clear">
			<?php
				$comics_series = get_terms('series');

				foreach ( $comics_series as $series ) {
					$comic_count = $series->count . ' ' . (  $series->count > 1 ? 'Comics' : 'Comic');
					echo '<li class="series-menu-item"><a href="' . esc_url( get_permalink( get_page_by_path( 'comics' ) ) ) . $series->slug . '" class="series-menu-link"><img src="' . z_taxonomy_image_url($series->term_id) . '" class="series-menu-image"><i class="icon-angle-circled-right series-menu-icon"></i><h3 class="series-menu-title s-padded xxs-padding">' . $series->name . '</h3><p class="series-count xxs-padding s-padded is-meta">'. $comic_count .'</p></a></li>';
				}
			?>
		</ul>	
	</section>
	<section class="recent-comics text-normal xxl-margin-bottom">
		<?php			
			$comics_args = array ( 
										'post_type' => 'comics',
										'posts_per_page' => 5,
								   );
			$comics_query = new WP_Query( $comics_args );
			if( $comics_query->have_posts() ) {
					while ( $comics_query->have_posts() ) : $comics_query->the_post();
						get_template_part( 'components/comics/comic', 'single' );
					endwhile;
			}
			wp_reset_postdata();
		?>
	</section><!-- .page-content -->
</article><!-- #post-## -->