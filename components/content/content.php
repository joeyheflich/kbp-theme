<?php
/**
 * Template part for displaying posts.
 * Has fallbacks/checks for single posts, if you need it.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

?>
<?php 
	$is_single = is_single();
	$class_array = array( 'xxl-margin-bottom' );
	if ( ! $is_single ) {
		$class_array[] = 'post-type-excerpt';
		$class_array[] = 'xxl-padding-bottom';
	} else {
		$class_array[] = 'post-type-single';
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array ); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) {
			?><div class="entry-image s-margin-bottom"><?php
				the_post_thumbnail('post-image');
			?></div><?php }
			if ( is_single() ) {
				the_title( '<h1 class="entry-title heading-normal">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title heading-normal"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="entry-link">', '</a></h2>' );
			} ?>
		<div class="entry-meta is-meta">
			<?php kbp_posted_on();
   				  // if it has categories, display them
				  if( has_category() && kbp_categorized_blog() ) {
					// get categories, call categories function, max displayed 8
					$categories = get_the_category();
					echo '<span class="meta-categories">';
					kbp_categories( $categories, 2 );
					echo '</span>';
				  } 
				  if( has_tag() ) {
				  	// count the tags, return a string with icon and link to tags
				  	echo '<span class="meta-tags">' , kbp_tag_counter() , '</span>';
				  }
 			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content text-normal excerpt-spacing m-margin-bottom">
		<?php
			if ( $is_single ) {
				the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kbp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			} else {
				the_excerpt();
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kbp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( ! $is_single ) : ?>
	<footer class="entry-footer">
		<?php kbp_read_more_button(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-## -->