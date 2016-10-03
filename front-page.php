<?php
/**
 * The front page template file.
 *
 * This is the template for the home page.
 *
 * @package kbp
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area content-area--no-sidebar clear">
		<main id="main" class="site-main" role="main">
			<section id="news" class="home-section home-news xxl-margin-top xxl-margin-bottom max-width center clear">
				<header class="home-section-header xxl-margin-bottom">
					<h1 class="section-title heading-xlarge page-title max-text-width center text-center">News</h1>
				</header>
				<div class="home-section-content clear">
					<?php		
						// fix static front page pagination, https://codex.wordpress.org/Pagination#static_front_page
						if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
						elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
						else { $paged = 1; }

				        $query_args = array(
				            'post_type'      => array( 'post' ),
				            'posts_per_page' => 6,
				            'paged'          => $paged,
							'page'           => 1,

				        );

				        query_posts( $query_args );

						// Start query
				        if ( have_posts() ) : 
							// Start the Loop
							while ( have_posts() ) : the_post();
								get_template_part( 'components/home/content', 'news' );
							endwhile;
						else :
							get_template_part( 'components/content/content', 'none' );
						endif; 
					?>
				</div>
				<footer class="home-section-footer l-padding-top text-center"><a href="<?php get_permalink( get_option( 'page_for_posts' ) ); ?>" class="button more-news-button">Read More News</a></footer>
			</section>
			<section id="comics" class="home-section home-comics dark xxl-padding clear">
				<header class="home-section-header xl-margin-bottom">
					<h2 class="section-title heading-xlarge max-text-width center text-center">New Comics</h2>
				</header>
				<div class="home-section-content center max-width clear">
					<?php get_template_part( 'components/home/content', 'comics' ); ?>
				</div>
			</section>
			<?php get_template_part( 'components/home/content', 'hero' ); ?>
			<section id="social" class="home-section home-social xxl-padding max-width center clear">
				<header class="home-section-header xl-margin-bottom">
					<h2 class="section-title heading-xlarge max-text-width center text-center">Social</h2>
				</header>
				<div class="home-section-content clear">
					<?php dynamic_sidebar( 'social-widget' ); ?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->	
<?php get_footer();