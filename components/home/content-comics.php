<?php
/**
 * Template part for displaying comics on the home page.
 *
 * @package kbp
 */
// New comics query
$comics_args = array ( 
						'post_type' => 'comics',
						'posts_per_page' => 6,
					   );
$comics_query = new WP_Query( $comics_args );
if( $comics_query->have_posts() ) {
		while ( $comics_query->have_posts() ) : $comics_query->the_post();
			get_template_part( 'components/comics/comic', 'cover' );
		endwhile;
}
wp_reset_postdata(); 