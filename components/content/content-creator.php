<?php
/**
 * Template part for displaying content from the post-type creators.
 * @package kbp
 */

$creator = array();
$creator['name'] = get_the_title();
$creator['image'] = get_field('creator_image');
$creator['fb'] = get_field('creator_fb');
$creator['twitter'] = get_field('creator_twitter');
$creator['insta'] = get_field('creator_insta');
$creator['slug'] = get_field('creator_slug');
?>

<article id="creator-<?php echo esc_attr($creator['slug']); ?>" class="creator curved l-padded l-padding xl-margin-bottom">
	<header class="creator-header clear">
		<img src="<?php echo esc_url( $creator['image'] ); ?>" class="creator-image half-curved" alt="<?php echo esc_attr( $creator['name'] ); ?>"><h2 class="creator-name"><?php echo esc_html( $creator['name']); ?></h2><button type="button" data-toggle="collapse" aria-expanded="false" class="creator-button button--reset js-open-creator"><i class="icon-up-open creator-icon"></i></button>
	</header>
	<div class="creator-info js-collapse-creator m-margin-top text-normal">
		<?php 
			the_content();
			// Get all of the comics this creator is credited on
			$credits_cat = array ( 
									array (	
											'taxonomy' => 'credit',
											'field' => 'slug',
											'terms' => $creator['slug'], 
										  )
									);
			$credits_args = array ( 
										'post_type' => 'comics',
										'tax_query' => $credits_cat,
										'posts_per_page' => -1,
								   );
			$credits_query = new WP_Query( $credits_args );
			if( $credits_query->have_posts() ) {
				echo '<div class="creator-credits s-padding-top support-text"><h3 class="creator-credits-title heading-small xxs-margin-bottom">Credits</h3>';
				$i = 0;		
				while ( $credits_query->have_posts() ) : $credits_query->the_post();
					echo '<a href="' . esc_url( get_permalink() ) . '" class="creator-credit">' . get_the_title() . '</a>';
					$i++;
				endwhile;
				echo '</div>';
			}
			wp_reset_postdata();

			// Creator social media buttons
			if(  $creator['fb'] || $creator['twitter'] || $creator['insta'] ) {
				echo '<footer class="creator-social xxs-padding-top">';
				if( $creator['fb'] ) {
					echo '<a href="' . esc_url( $creator['fb'] ) . '" class="creator-social-link"><i class="icon-facebook-squared creator-social-icon"></i></a>';
				}
				if( $creator['twitter'] ) {
					echo '<a href="' . esc_url( $creator['twitter'] ) . '" class="creator-social-link"><i class="icon-twitter-squared creator-social-icon"></i></a>';
				}
				if( $creator['insta'] ) {
					echo '<a href="' . esc_url( $creator['insta'] ) . '" class="creator-social-link"><i class="icon-instagram creator-social-icon"></i></a>';
				}
				echo '</footer>';
			}
		?>
	</div>
</article><!-- #creator-## - -->