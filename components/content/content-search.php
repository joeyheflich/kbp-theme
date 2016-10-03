<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kbp
 */

?>

<?php $class_array = array( 'list-item', 'search-item', 'm-padding-top', 'xxl-padding-bottom', 'm-margin-bottom' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<header class="list-header">
		<?php the_title( sprintf( '<h2 class="list-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="list-meta is-meta">
		<?php 
			// display type
			echo ucwords( get_post_type( $post ) ) . ' / ';
			kbp_posted_on();
			// if it has categories, display them
			$categories = get_the_category();
			if( $categories && kbp_categorized_blog() ) {
				echo ' / ';
				// call categories function, max displayed 4
				echo kbp_categories( $categories, 6 );
			}
		?>
		</div>
	</header><!-- .list-header -->

	<div class="list-content excerpt-content text-content s-padding-top" > 
		<?php the_excerpt(); ?>
	</div><!-- .list-content -->

	<footer class="list-footer">
		<?php kbp_read_more_button(); ?>
	</footer>

</article><!-- #post-## -->