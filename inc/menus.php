<?php
/**
 * Custom functions related to the menus for this theme.
 *
 * @package kbp
 */

if ( ! function_exists( 'kbp_social_menu' ) ) :
/**
 * Displays the social menu
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 * @param string $type Display type
*/
function kbp_social_menu( $type ) {
    switch( $type ) {
    	case 'encircled':
    		$container = 'social--encircled';
    		break;
    	case 'circled':
    		$container = 'social--circled';
    		break;
    	case 'squared':
    		$container = 'social--squared';
    		break;
    	default: 
    		$container = 'social--default';
    }
    if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'container'       => 'div',
			'container_id'    => 'menu-social',
			'container_class' => $container,
			'menu_id'         => 'menu-social-items',
			'menu_class'      => 'social-menu-items',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
	);
    }
}
endif;

if ( ! function_exists( 'kbp_social_footer_menu' ) ) :
/**
 * A simple function to update the social menu for the footer
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */
function kbp_social_footer_menu() {
    if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'container'       => 'div',
			'container_id'    => 'menu-circled-social',
			'container_class' => 'social--circled',
			'menu_id'         => 'menu-circled-social-items',
			'menu_class'      => 'social-menu-items',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
	);
    } // By default, this is a circle border icon menu
}
endif;

if ( ! function_exists( 'kbp_primary_menu' ) ) :
/**
 * Displays the main menu
 */
function kbp_primary_menu() {
    if ( has_nav_menu( 'primary' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container'       => 'div',
			'container_id'    => 'menu-primary',
			'container_class' => 'primary-menu',
			'menu_id'         => 'menu-primary-items',
			'menu_class'      => 'primary-menu-items',
			'depth'           => 1,
			'fallback_cb'     => '',
		)
	);
    }
}
endif;

if ( ! function_exists( 'kbp_footer_menu' ) ) :
/**
 * Displays the footer menu
 */
function kbp_footer_menu() {
    if ( has_nav_menu( 'footer' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'footer',
			'container'       => 'div',
			'container_id'    => 'menu-footer',
			'container_class' => 'menu-footer',
			'menu_id'         => 'menu-footer-items',
			'menu_class'      => 'footer-menu-items',
			'depth'           => 1,
			'fallback_cb'     => '',
		)
	);
    }
}
endif;

?>