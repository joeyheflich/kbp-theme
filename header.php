<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kbp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php 
		// Check for custom header options
		$header_image = get_header_image();
		$header_bg = '';
		$header_classes = 'site-header';
		if ( ! empty( $header_image ) ) {
			$header_bg = 'style="background-image:url(' . $header_image . ')" ';
			$header_classes .= ' has-header-bg-image';
		}
	?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kbp' ); ?></a>

	<header id="masthead" class="<?php echo $header_classes; ?>" role="banner" >
			<div class="site-branding" <?php echo $header_bg; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo-link"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo( 'name' ); ?>" class="site-logo"></a></div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation clear" role="navigation" >
				<button id="main-menu-toggle" class="menu-toggle" aria-controls="main-menu" aria-expanded="false"><span class="menu-toggle-icon"></span><span class="menu-toggle-text"><?php _e('Menu', 'kbp'); ?></span></button>
				<div id="main-menu" class="main-menu" aria-expanded="true"><?php kbp_primary_menu(); ?>
				<?php kbp_social_menu('squared'); ?></div>
			</nav><!-- #site-navigation -->
	</header><!-- #masthead -->