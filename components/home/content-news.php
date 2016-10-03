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
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="news-item-link">'; ?>
		<div class="news-image">
		<i class="icon-angle-circled-right news-item-icon"></i>
		<?php 
			if ( has_post_thumbnail() ) { ?>
			<?php
				the_post_thumbnail('post-image');
			} else {
				echo '<img src="#" class="">';
			} ?>
		</div>
		<?php the_title( '<h3 class="news-title heading-xsmall xxs-padding">', '</h3>' ); ?>
		<?php echo '</a>'; // close the header link ?>
	</header><!-- .news-header -->
	<div class="news-content support-text s-padded xs-padding excerpt-spacing">
		<?php
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kbp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .news-content -->
	<footer class="news-footer is-meta clear">
		<div class="news-tags dark js-tag-display s-padded xxs-padding"><?php 
			echo esc_html( 'Tags: ', 'kbp' );
			$tags_list = get_the_tag_list( '#', esc_html__( ', #', 'kbp' ) );
			echo $tags_list;
			?></div>
		<div class="news-meta xs-padded xxs-padding">
			<?php kbp_posted_on(); ?>
			<div class="tag-button"><?php
				// count the tags, return a string with icon and link to tags
				echo kbp_tag_counter(); ?></div>
		</div>
	</footer><!-- .news-footer -->

</article><!-- #post-## -->
