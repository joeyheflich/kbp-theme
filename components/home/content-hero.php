<?php
/**
 * Template part for displaying the hero section on the home page.
 *
 * @package kbp
 */

// Get all of the data from ACF
$front_page_id = get_option( 'page_on_front' );
$hero_image = esc_attr( get_field('hero_image', $front_page_id ) );
$hero_title = esc_html( get_field('hero_title', $front_page_id ) );
$hero_copy = esc_html( get_field('hero_copy', $front_page_id ) );
$hero_button = esc_html( get_field('hero_button', $front_page_id ) );
$hero_url = esc_url( get_field('hero_url', $front_page_id ) );

if ( ! empty( $hero_image ) ) : 
	$hero_bg = 'style="background-image:url(' . esc_attr( $hero_image ) . ')" '; ?>

	<section id="hero" class="home-section home-hero clear" <?php echo $hero_bg; ?>>
		<div class="hero-modal xxl-padding">
			<h3 class="hero-title header-xxlarge max-content-width m-padding-bottom xl-margin-top"><?php echo esc_html( $hero_title ); ?></h3>
			<p class="hero-copy max-text-width text-large s-padding-bottom"><?php echo esc_html( $hero_copy ); ?></p>
			<a href="<?php echo $hero_url; ?>" class="button hero-button button--featured xl-margin-bottom"><?php echo $hero_button; ?></a>
		</div>
	</section>
<?php endif; ?>