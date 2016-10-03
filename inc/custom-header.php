<?php
/**
 * Custom Header
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package kbp
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses kbp_header_style()
 */
function kbp_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kbp_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'wp-head-callback'       => 'kbp_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'kbp_custom_header_setup' );
