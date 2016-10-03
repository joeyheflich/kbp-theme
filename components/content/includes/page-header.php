<?php 
$class_array = array( 'page-full', 'center' );
$header_image = esc_attr( get_field('header_image') );
if( is_home() ) {
	$header_image = esc_attr( get_field( 'header_image', get_option( 'page_for_posts' ) ) );
}
$page_image = 'style="background-image:url(';
if ( is_search() || is_archive() ) {
	$page_image .= $page_image .= get_template_directory_uri() . '/images/archive-header.jpg)"';
} else if ( $header_image ) {
	$page_image .= $header_image . ')"';
} else if ( has_post_thumbnail() ) {
	$page_image .= get_the_post_thumbnail_url() . ')"';
} else {
	if ( is_404() ) {
		$page_image .= get_template_directory_uri() . '/images/404-header.jpg)"';
	} else {
		$page_image .= get_template_directory_uri() . '/images/default-header.jpg)"';		
	}
}