<?php
/**
 * Template part for displaying comic data.
 * @package kbp
 */

?>
<?php 
	$class_array = array( 'comic-single', 'max-width', 'center', 'l-padded', 'l-padding', 'xl-margin-bottom', 'clear', 'half-curved' );
	$credits = array();
	$details = array();
	$buttons = array();
	$preview_pages = array();
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
	$buttons['pdf'] = get_field('comic_pdf');
	$details['genre'] = get_field('comic_genre');
	$details['fans'] = get_field('comic_fans');
	$details['age'] = get_field('comic_age');

	/* Optional Comic Preview Images */
	$preview_pages[0] = get_field('comic_preview_page_one');
	$preview_pages[1] = get_field('comic_preview_page_two');
	$preview_pages[2] = get_field('comic_preview_page_three');
	$preview_pages[3] = get_field('comic_preview_page_four');
	$preview_size = 'thumbnail';
?>
<article id="comic-<?php the_ID(); ?>" <?php post_class( $class_array );  ?>>
	<div class="comic-col comic-col--one">
	<?php the_post_thumbnail('comic-cover'); ?>
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
		if( $buttons['pdf'] ) {
			echo '<a href="' . esc_url( $buttons['pdf'] ) . '" class="button comic-button button--full button--pdf" target="_blank">Free PDF</a>';  
		} 
	?>
	</div>
	<div class="comic-col comic-col--two">
		<?php the_title( '<h2 class="comic-title xs-margin-bottom">', '</h2>' ); ?>
		<?php	
			if( $details['review'] ) {
				echo '<h4 class="comic-review xs-margin-bottom heading-small">' . esc_html( $details['review'] ) . '</h4>'; 
			} 
		?>
		<?php 
			foreach( $credits as $key => $credit ) {
				if( $credit ) {
					echo '<span class="comic-credit support-text comic-'. $key .'">';
					if( $key == 'featuring' ) {
						echo ucfirst( $key ) . ' ';
					} else {
						echo ucfirst( $key ) . ' by ';
					}
					echo $credit . '</span>';
				}
			}
		?>
		<div class="comic-description m-margins">
			<?php the_content(); ?>
		</div>
		<?php
			if( $details['genre'] ) {
				echo '<span class="comic-meta support-text comic-genre">Genre: ' . esc_html( $details['genre'] ) . '</span>';
			}
			if( $details['fans'] ) {
				echo '<span class="comic-meta support-text comic-fans">For Fans Of: ' . esc_html ( $details['fans'] ) . '</span>';
			}
			if( $details['age'] ) {
				echo '<span class="comic-meta support-text comic-age">Age Range: ' . esc_html( $details['age'] ) . '</span>';
			}
			
			if( $preview_pages ) {
				$preview_count = 0;
				$preview_gallery = '[gallery ids="';
				foreach ($preview_pages as $preview_page) {
					if( $preview_page ) {
						$preview_gallery .= $preview_page['id'] . ',';
						$preview_count++;
					} else {
						break;
					}
				}
				if( $preview_count > 0 ) {
					$preview_gallery .= '" columns="' . $preview_count . '"]';
					echo '<div class="comic-pages s-margin-top m-padded m-padding-top pages-gallery-' .$preview_count . '">';
					print apply_filters( 'the_content', $preview_gallery );
					echo '</div>';
				}
			}
		?>

	</div>
</article><!-- #comic-## -->