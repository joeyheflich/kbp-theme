<?php
/**
 * Template part for displaying news posts on the home page.
 *
 * @package kbp
 */


$class_array = array( 'news-item', 'm-margin-bottom' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_array ); ?>>
	<header class="news-header">
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="news-link">'; ?>
		<div class="news-image">
		<?php 
			if ( has_post_thumbnail() ) { ?>
			<?php
				the_post_thumbnail('post-image');
			} else {
				echo '<img src="#" class="">';
			} ?>
		</div>
		<?php the_title( '<h2 class="news-title heading-normal xxs-padding">', '</h2>' ); ?>
		<?php echo '</a>'; // close the header link ?>
	</header><!-- .entry-header -->

	<footer class="news-footer is-meta xxs-padded xxs-padding">
		<?php kbp_posted_on(); ?>
					<?php
   				  // if it has categories, display them
				  $categories = get_the_category();
				  if( $categories && kbp_categorized_blog() ) {
					echo ' / ';
					// call categories function, max displayed 8
					echo kbp_categories( $categories, 8 );
				  } 
			?>
	</footer><!-- .news-footer -->

</article><!-- #post-## -->
