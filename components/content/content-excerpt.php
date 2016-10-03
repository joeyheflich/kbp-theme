<?php
/**
 * Template part for displaying excerpts.
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

?>
<?php 
	$class_array = array( 'xl-margin-bottom', 'post-type-excerpt', 'xl-padding-bottom' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<header class="entry-header">
		<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="entry-link">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta is-meta">
			<?php kbp_posted_on(); 
   				  // if it has categories, display them
				  $categories = get_the_category();
				  if( $categories && kbp_categorized_blog() ) {
					echo ' / ';
					// call categories function, max displayed 4
					echo kbp_categories( $categories, 4 );
				  } 
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content" >
		<?php
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kbp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php kbp_read_more_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->