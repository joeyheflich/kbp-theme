<?php
/**
 * Template part for displaying comic covers.
 * @package kbp
 */

?>
<?php 
	$class_array = array( 'comic-cover' );
	$credits = array();
	$details = array();
	$buttons = array();
	$credits['story'] = get_field('comic_writer');
	$credits['edited'] = get_field('comic_editor');
	$credits['art'] = get_field('comic_artist');
	$credits['colors'] = get_field('comic_colorist');
	$credits['letters'] = get_field('comic_letterer');
	$credits['featuring'] = get_field('comic_contributor');
	$credits['cover'] = get_field('comic_cover');
	$details['review'] = get_field('comic_review');
	$buttons['print'] = get_field('comic_print');
	$buttons['digital'] = get_field('comic_digital');
	$buttons['comix'] = get_field('comic_comixology');
	$details['genre'] = get_field('comic_genre');
	$details['fans'] = get_field('comic_fans');
	$details['age'] = get_field('comic_age');
?>
<article id="cover-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<div class="comic-col comic-col--single">
	<?php
		echo '<a href="' . get_the_permalink() . '" class="comic-link">'; 
		the_post_thumbnail('comic-cover'); 
		echo '</a>';
	?>
	<?php 
		if( $buttons['print'] ) {
			echo '<a href="' . esc_url( $buttons['print'] ) . '" class="button comic-button button--full button--print" target="_blank">Print</a>';  
		} 
		if( $buttons['digital'] ) {
			echo '<a href="' . esc_url( $buttons['digital'] ) . '" class="button comic-button button--full button--digital" target="_blank">Digital</a>';  
		} 
		if( $buttons['comix'] ) {
			echo '<a href="' . esc_url( $buttons['comix'] ) . '" class="button comic-button button--full button--comix" target="_blank">Comixology</a>';  
		} 
	?>
	</div>
</article><!-- #cover-## -->