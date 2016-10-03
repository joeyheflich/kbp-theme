<?php
/**
 * The home page template for the default layout.
 *
 * @package kbp
 */
 ?>

<div id="content" class="site-content max-width center xl-margins">
	<div id="primary" class="content-area content-area--has-sidebar text-normal">
		<main id="main" class="site-main" role="main">
			<?php		
		        $feat_args = array(
		            'post_type' => array( 'post', 'articles' ),
		            'posts_per_page' => 3,
            		'no_found_rows' => true,
            		'ignore_sticky_posts' => true,
            		'category_name' => 'featured',
		        );

		        $feat_query = new WP_Query( $feat_args );
		        
		        // Start query
		        if ( $feat_query->have_posts() ) {
					?><section class="featured-posts row clear xl-margin-bottom"><?php
					// Start the Loop
					while ( $feat_query->have_posts() ) : $feat_query->the_post();
						get_template_part( 'components/grid/featured', 'three' );
					endwhile;
					?></section><?php
				} 
				wp_reset_postdata();
			?>
			<?php		
				// fix static front page pagination, https://codex.wordpress.org/Pagination#static_front_page
				if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
				else { $paged = 1; }

		        $query_args = array(
		            'post_type' => array( 'post', 'articles' ),
		            'paged' => $paged,
					'page' => 1,
		        );

		        query_posts( $query_args );
		        $template_type = get_field('blog_format', get_option('page_for_posts') );
		        $template_slug = '';
				$template_name = '';

		        switch ( $template_type ) {
					case 'full':
						$template_slug = 'components/content/content';
						$template_name = 'full';
						break;
					case 'list':
						$template_slug = 'components/list/content';
						$template_name = 'list';
						break;
					default:
						$template_slug = 'components/content/content';
						$template_name = '';
				}

				// Start query
		        if ( have_posts() ) : 
					// Start the Loop
					while ( have_posts() ) : the_post();
						get_template_part( $template_slug, $template_name );
					endwhile; 
					kbp_page_nav( 'content', 'full' );
				else :
					get_template_part( 'components/content/content', 'none' );
				endif; ?>
				
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- #content -->