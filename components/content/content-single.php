<?php
/**
 * Template part for displaying single posts.
 *
 * @package kbp
 */

?>
<?php 
	$class_array = array( 'l-padding-bottom', 'post-type-full' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array ); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) {
			?><div class="entry-image s-margin-bottom"><?php
				the_post_thumbnail('post-image');
			?></div><?php } ?>
		<?php the_title( '<h1 class="entry-title heading-normal">', '</h1>' ); ?>
		<div class="entry-meta is-meta">
			<?php kbp_posted_on();
   				  // if it has categories, display them
				  if( has_category() && kbp_categorized_blog() ) { ?>
					<span class="meta-categories"><?php
					// get categories, call categories function, max displayed 8
					$categories = get_the_category();
					kbp_categories( $categories, 8 ); ?>
					</span><?php
				  } 
				  if( has_tag() ) { ?>
				  	<span class="meta-tags"><?php
				  	// count the tags, return a string with icon and link to tags
				  	echo kbp_tag_counter(); ?>
				  	</span><?php
				  }
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content text-normal" >
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kbp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kbp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer footer-text m-margin-top">
		<?php kbp_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
