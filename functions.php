<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kbp
 */

if ( ! function_exists( 'kbp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */

function kbp_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register image sizes
	add_image_size( 'post-image', 1280, 9999 );
	add_image_size( 'results', 400, 400, true );
	add_image_size( 'nav-image', 64, 64, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kbp' ),
		'social' => esc_html__( 'Social Menu', 'kbp' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kbp_custom_background_args', array(
			'default-image' => '',
	) ) );
	add_theme_support( 'custom-header' );
	
	// Remove unused sections from the customizer, so as not to confuse anyone
	function kbp_clean_customizer( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
	}
	add_action( 'customize_register', 'kbp_clean_customizer' );

	// Disable Contact Form 7 CSS to reduce bloat
	add_filter( 'wpcf7_load_css', '__return_false' );
}
endif;
add_action( 'after_setup_theme', 'kbp_setup', 5 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kbp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kbp_content_width', 960 );
}
add_action( 'after_setup_theme', 'kbp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kbp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kbp' ),
		'id'            => 'sidebar-1',
		'description'   => 'Widget area for blog. 27% of screen on tablet and desktop, max width of 320px.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Social', 'kbp' ),
		'id'            => 'social-widget',
		'description'   => 'Social widget area on the home page. Should be just Facebook.',
		'before_widget' => '<section id="%1$s" class="widget social-widget has-background xl-padding xl-padded support-text %2$s">',
		'after_widget'  => '<footer class="social-button text-center"><a href="https://www.facebook.com/KingBonePress/" class="button">More Posts</a></footer></section>',
		'before_title'  => '<h4 class="social-widget-title s-margin-bottom text-center">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu One', 'kbp' ),
		'id'            => 'footer-widgets-1',
		'description'   => 'First footer menu. Typically KBP pages, similar to main menu.',
		'before_widget' => '<section id="%1$s" class="footer-menu footer-widget clear %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span class="footer-title-text">',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu Two', 'kbp' ),
		'id'            => 'footer-widgets-2',
		'description'   => 'Second footer menu. Typically popular or recent KBP series.',
		'before_widget' => '<section id="%1$s" class="footer-menu footer-widget clear %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span class="footer-title-text">',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu Three', 'kbp' ),
		'id'            => 'footer-widgets-3',
		'description'   => 'Third footer menu. Typically links to other sites.',
		'before_widget' => '<section id="%1$s" class="footer-menu footer-widget clear %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span class="footer-title-text">',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'kbp' ),
		'id'            => 'footer-widgets-4',
		'description'   => 'Footer widgets. Typically a search area and the social media links in button form.',
		'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span class="footer-title-text">',
		'after_title'   => '</span></h2>',
	) );

}
add_action( 'widgets_init', 'kbp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kbp_scripts() {
	wp_enqueue_style( 'kbp-style', get_stylesheet_uri() ); // Will minify CSS in plugin
	wp_enqueue_script( 'kbp-js', get_template_directory_uri() . '/js/kbp.js', array(), '20160223', true); 

	wp_enqueue_script( 'kbp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kbp_scripts' );

// Enqueue Google Fonts
function kbp_google_fonts() {
	wp_register_style( 'googlefonts-kbp', 'http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Roboto+Condensed:400,700' );
	wp_enqueue_style( 'googlefonts-kbp' );
}
add_action( 'wp_print_styles', 'kbp_google_fonts' );

// Add editor styles
function kbp_add_editor_styles() {
    add_editor_style( '/css/editor-style.css' );
}
add_action( 'admin_init', 'kbp_add_editor_styles' );

// Update Editor Font
function kbp_add_editor_fonts() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Roboto+Condensed:400,700' );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'kbp_add_editor_fonts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom menus for this theme.
 */
require get_template_directory() . '/inc/menus.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Requires Advanced Custom Fields
add_action( 'admin_notices', 'kbp_theme_dependencies' );
function kbp_theme_dependencies() {
  if( ! function_exists('get_field') ) {
  	echo '<div class="error"><p>' . __( 'Warning: The theme needs Advanced Custom Fields to function', 'kbp' ) . '</p></div>';
  } 
  if ( ! function_exists('z_taxonomy_image_url') ) {
  	echo '<div class="error"><p>' . __( 'Warning: The theme needs Categories Images to function', 'kbp' ) . '</p></div>';
  }
  if ( ! function_exists('display_instagram') ) {
  	echo '<div class="error"><p>' . __( 'Warning: The theme needs Instagram Feed to function', 'kbp' ) . '</p></div>';
  }
}