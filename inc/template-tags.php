<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kbp
 */

// Social share buttons
if ( ! function_exists( 'kbp_social_share' ) ) :
/**
 * Displays social buttons for use in page/post templates, before or after posts
 * @param string $size Number of buttons to show, either six, four or default - three
 * @param string $display Used to set display styles for button shape
 * @param string $color Used to set styles that call specific CSS color schemes
 * @param string $center Used to set alignment styles, defaults to fill container width
 */
function kbp_social_share($size, $display, $color, $center) {
	echo '<div class="share-buttons-container l-margin-bottom ';

	if ( $center == 'left' ) {
		echo 'share--left';
	} else if ( $center == 'right' ) {
		echo 'share--right';
	} else if ( $center == 'lined' ) {
		echo 'share--lined';
	} else if ( $center == 'center' ) {
		echo 'share--center';
	} else {
		echo 'share--full';
	}
	echo '">';

	$social_data = array(
		"twitter" => "kingbonepress",
		"hashtags" => "",
	);

	$post_data = array(
		"link" => urlencode( get_the_permalink() ),
		"title" => urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ),
	);

	$social_links = array(
		'start' => '<a href="',
		'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $post_data['link'] . '" title="Share on Facebook" class="share-link share-facebook"',
		'twitter' => 'https://twitter.com/intent/tweet/?text=' . $post_data['title'] . '&url=' . $post_data['link'] . '&via=' . $social_data['twitter'] . '&hashtags=' . $social_data['hashtags'] . '" title="Tweet it" class="share-link share-twitter"',
		'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_data['link'] . '&title=' . $post_data['title'] . '&source=' . $post_data['link'] . '" title="Share on LinkedIn" class="share-link share-linkedin"',
		'gplus' => 'https://plus.google.com/share?url=' . $post_data['link'] . '" title="Share on Google+" class="share-link share-gplus"',
		'reddit' => 'http://www.reddit.com/submit/?url=' . $post_data['link'] . '&title=' . $post_data['title'] . '" title="Share on reddit" class="share-link share-reddit"',
		'mail' => 'mailto:?subject=' . $post_data['title'] . '&amp;body=' . $post_data['link'] . '" title="Share via e-mail" class="share-link share-email"',
		'end' => ' target="_blank">',
	);

	$icon_names_six = array('facebook','twitter', 'gplus', 'linkedin', 'reddit', 'mail');
	$icon_verbs_six = array('Share', 'Tweet', 'Share', 'Submit', 'Post', 'E-mail');
	$icon_names_four = array('facebook', 'twitter', 'gplus', 'mail');
	$icon_verbs_four = array('Share', 'Tweet', 'Share', 'E-mail');
	$icon_names_three = array('facebook', 'twitter', 'mail');
	$icon_verbs_three = array('Share', 'Tweet', 'E-mail');

	$social_buttons = array(
		'start' => '<li class="share-button">',
		'label' => '<span class="share-label">',
		'end' => '</span></a></li>',
	);

	echo '<ul class="share-buttons small-margin-top ';

	if( $display == 'square' ) {
		echo 'share--square ';
	} else if( $display == 'circle' ) {
		echo 'share--circle ';	} 
	else if( $display == 'rectangle' ) {
		echo 'share--rectangle ';
	} else {
		echo 'share--default ';
	}

	if( $color == 'color' ) {
		echo 'share--color ';
	} else if( $color == 'hover' ) {
		echo 'share--hover ';
	} else if( $color == 'ghost' ) {
		echo 'share--ghost ';
	} else {
		echo 'share--highlight ';
	}

	if( $size == 'six' ) { 
		echo 'share--six ';
	} else if( $size == 'four' ) {
		echo 'share--four ';
	} else {
		echo 'share--three ';
	}

	echo 'clear">';

	// display buttons
	// i'm doing this at 2am, so this seems ugly now, but at the time, it was a quick fix
	if( $size == 'six' ) {
		for( $i = 0; $i <= 5; $i++ ) {
			echo $social_buttons['start'] . $social_links['start'] . $social_links[ $icon_names_six[$i] ] . $social_links['end'] . '<i class="icon-' . $icon_names_six[$i] . ' share-icon"></i>' . $social_buttons['label'] . $icon_verbs_six[$i] . $social_buttons['end'];
		}
	} else if( $size == 'four' ) {
		for( $i = 0; $i <= 3; $i++ ) {
			echo $social_buttons['start'] . $social_links['start'] . $social_links[ $icon_names_four[$i] ] . $social_links['end'] . '<i class="icon-' . $icon_names_four[$i] . ' share-icon"></i>' . $social_buttons['label'] . $icon_verbs_four[$i] . $social_buttons['end'];
		}
	} else {
		for( $i = 0; $i <= 2; $i++ ) {
			echo $social_buttons['start'] . $social_links['start'] . $social_links[ $icon_names_three[$i] ] . $social_links['end'] . '<i class="icon-' . $icon_names_three[$i] . ' share-icon"></i>' . $social_buttons['label'] . $icon_verbs_three[$i] . $social_buttons['end'];
		}
	}

	echo '</ul></div>';
}
endif;

// Fix titles for mobile
if ( ! function_exists( 'kbp_parse_title' ) ) :
/**
 * Splits up the title for proper display on mobile devices
 * @param string $title The post title
 * @return string $title The parsed post title, wrapped properly in tags
 */
function kbp_parse_title($title) {
	// Remove possible ...
	if ( strpos( $title, '&hellip;' ) !== false ) {
		$title = str_replace( '&hellip;', '', $title );
		$has_ellip = true;
	} else {
		$has_ellip = false;
	}
	// Grab the first twelve characters as a chunk, apply tags
	$chunk_one = '<div class="title-chunk title-chunk--one">' . substr( $title, 0, 12 ) . '</div>';
	// Grab second chunk, check if it exists due to length, apply tags, add the ... back 
	$chunk_two = substr( $title, 16 );
	if ( $chunk_two ) {
		// Check if first character is a space, if so - mark it properly
		if ( substr( $chunk_two, 0, 1 ) === ' ' ) {
			$chunk_two = substr( $chunk_two, 1);
			$chunk_two = '&nbsp;' . $chunk_two;
		}
		$chunk_two = '<div class="title-chunk title-chunk--two">' . $chunk_two;
		$chunk_two .= ( $has_ellip ) ? '&hellip;</span>' : '</div>';
	}

	$title = $chunk_one . $chunk_two;
	return $title;
}
endif;

// Paginated nav
if ( ! function_exists( 'kbp_number_nav' ) ) :
/**
 * Echoes paginated links for news, etc.
 */
function kbp_number_nav(){
	// For more customization, pass args
	// https://codex.wordpress.org/Function_Reference/paginate_links
	$args = array(
	'show_all'           => false,
	);
	echo '<nav class="navigation nav--numbered m-padding-bottom" role="navigation">', paginate_links( $args ), '</nav>';
}
endif;

// Page nav
if ( ! function_exists( 'kbp_page_nav' ) ) :
/**
 * Echoes a simple page nav
 * @param string $width Sets the container of nav to either text, content or max width
 */
function kbp_page_nav( $width ){
 	if ( $width != '' ) {
 		if( $width == 'max' ) {
 			$content_width = 'max-width';
 		} else {
 			$content_width = 'max-' . $width . '-width';
 			// And just in case something ugly gets passed in, let's escape it
 			$content_width = esc_attr($content_width);
 		}
 	} else {
 		$content_width = '';
 	}

 	$post_nav_begin = '<nav class="navigation page-navigation nav--full l-margin-bottom';
 	$post_nav_begin .= ( is_archive() || is_search() ) ? ' l-margin-top"' : '"';
 	$post_nav_begin .= ' role="navigation"><h3 class="screen-reader-text">Post navigation</h3><div class="nav-links clear ' . $content_width . '">';
 	$post_nav_end = '</div></nav>';

 	$navigation = $previous = $next = '';
 	$newer_page_url = get_previous_posts_page_link();
 	$older_page_url = get_next_posts_page_link();
 	if ( is_search() || is_archive() ) {
 		$post_type = '<span class="search-type">Results</span>';
 	} else {
 		$post_type = '<span class="search-type">Page</span>';
 	}

	// Get text sorted
	$older_post_text = '<div class="nav-text nav-text--right"><div class="nav-meta">' . __( 'Older', 'kbp' ) . '</div><h4 class="nav-title">' . __( 'Next', 'kbp' ) . ' ' . $post_type . '</h4></div>';
	$newer_post_text = '<div class="nav-text nav-text--left"><div class="nav-meta">' . __( 'Newer', 'kbp' ) . '</div><h4 class="nav-title">' . __( 'Previous', 'kbp' ) . ' ' . $post_type . '</h4></div>';

	// Combine text with icon, container
	$older_post_info = '<i class="nav-icon icon-right-open"></i>';
	$newer_post_info = '<i class="nav-icon icon-left-open"></i>';
	$newer_post_info = '<div class="nav-direction nav-direction--left">' . $newer_post_info . '</div>' . $newer_post_text;
	$older_post_info = $older_post_text . '<div class="nav-direction nav-direction--right">' . $older_post_info . '</div>';

	// Assemble it all 
    if ( get_previous_posts_link() ) {
	   	$previous = '<div class="nav-previous"><a href="' . $newer_page_url . '" class="nav-button">' . '<div class="nav-container nav-left">' . $newer_post_info . '</div></a></div>';
	}
	if ( get_next_posts_link() ) {
	    $next = '<div class="nav-next"><a href="' . $older_page_url . '" class="nav-button">' . '<div class="nav-container nav-right">' . $older_post_info . '</div></a></div>';
	}

    // Only add markup if there's somewhere to navigate to.
    if ( $previous || $next ) {
        $navigation =  $post_nav_begin . $previous . $next . $post_nav_end;
    }

    echo $navigation;
}
endif;

if ( ! function_exists( 'kbp_post_nav' ) ) :
/**
 * Echoes post nav with title and post type
 * @param string $width Sets the post nav to either content or max width
 */
function kbp_post_nav( $width ){
	if ( $width != '' ) {
		if( $width == 'max' ) {
		$content_width = 'max-width';
		} else {
		$content_width = 'max-' . $width . '-width';
		// And just in case something ugly gets passed in, let's escape it
		$content_width = esc_attr($content_width);
		}
	} else {
		$content_width = '';
	}
 	$post_nav_begin = '<nav class="navigation post-navigation l-margin-bottom nav--full" role="navigation"><h3 class="screen-reader-text">Post navigation</h3><div class="nav-links clear ' . $content_width . '">';
 	$post_nav_end = '</div></nav>';

 	// Post type info
 	$post_type = ( get_post_type() ) ? get_post_type() : false;

	if ( $post_type ) {
		if ( substr( $post_type, -1 ) == "s" ) {
			$post_type = substr_replace( $post_type, "", -1 );
		}
		$post_type = strtolower( $post_type );
		$post_type = ucfirst( $post_type );
	} else {
		$post_type = 'Page';
	}

	// Getting previous and next post data
 	$prev_post = get_previous_post();
 	$next_post = get_next_post();
 	if( !empty( $prev_post ) ) {
 		$prev_post_url = get_permalink( $prev_post->ID );
 		$prev_post_title =  wp_trim_words( $prev_post->post_title, 6 );
 		$prev_post_title = kbp_parse_title( $prev_post_title );
 		$prev_post_text = '<div class="nav-text nav-text--left"><div class="nav-meta">Previous ' . $post_type . '</div>' . '<h4 class="nav-title">' . $prev_post_title . '</h4></div>';
 		$prev_post_info = '<i class="nav-icon icon-left-open"></i>';
 		$prev_post_info = '<div class="nav-direction nav-direction--left">' . $prev_post_info . '</div>' . $prev_post_text;
 	}
 	if( !empty( $next_post ) ) {
		$next_post_url = get_permalink( $next_post->ID );
		$next_post_title =  wp_trim_words( $next_post->post_title, 6 );
		$next_post_title = kbp_parse_title( $next_post_title );
		$next_post_text = '<div class="nav-text nav-text--right"><div class="nav-meta">Next ' . $post_type . '</div>' . '<h4 class="nav-title">' . $next_post_title . '</h4></div>';
		$next_post_info = '<i class="nav-icon icon-right-open"></i>';
		$next_post_info = $next_post_text . '<div class="nav-direction nav-direction--right">' . $next_post_info . '</div>'; 		
 	}

	// Assemble it all
	$navigation = $previous = $next = '';   
    if ( get_previous_post_link() ) {
	   	$previous = '<div class="nav-previous"><a href="' . $prev_post_url . '" class="nav-button">' . '<div class="nav-container nav-left">' . $prev_post_info . '</div></a></div>';
	}
	if ( get_next_post_link() ) {
	    $next = '<div class="nav-next"><a href="' . $next_post_url . '" class="nav-button">' . '<div class="nav-container nav-right">' . $next_post_info . '</div></a></div>';
	}
    
    // Only add markup if there's somewhere to navigate to.
    if ( $previous || $next ) {
        $navigation =  $post_nav_begin . $previous . $next . $post_nav_end;
    }

    echo $navigation;
}
endif;

// More posts
if ( ! function_exists( 'kbp_more_posts' ) ) :
/**
 * Prints three posts three columns in a single row, either recent, popular or relevant
 * @param string $query_type Customizes the type of query, setting args to either popular or relevant
 */
function kbp_more_posts( $query_type ) {
    global $wp_query;
    global $post;
    $current_post_id = $wp_query->get_queried_object_id();
	$tags = get_the_tags( $current_post_id );
	$categories = get_the_category( $current_post_id );

	if ( $tags || $categories ) {
		$tag_ids = array();
		$category_ids = array();
		$relevant_args = array();
		if( $tags ) {
			foreach($tags as $single_tag) $tag_ids[] = $single_tag->term_id;
			$relevant_args['tag__in'] = $tag_ids;
		}
		if ( $categories ) {
			foreach($categories as $single_cat) $category_ids[] = $single_cat->term_id;
			$relevant_args['category__in'] = $category_ids;
		}
	}

	$query_args = array(
		'post_type' => array( 'post' ),
		'posts_per_page' => 3,
		'post__not_in' => array( $current_post_id ),
		'ignore_sticky_posts' => true,
		'no_found_rows' => true,
	);

	$popular_args = array( 
		'meta_key' => 'views',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
	);

	if( $query_type == 'popular' ) {
		$query_args = array_merge( $query_args, $popular_args );
	} else if( $query_type == 'relevant' && isset($relevant_args) ) {
		$query_args = array_merge( $query_args, $relevant_args );
	}

	$the_query = new WP_Query( $query_args );
	// Start query
	if ( $the_query->have_posts() ) : 
		echo '<section class="preview-posts xl-margin-top m-padded m-padding clear">'; // first row begin
		echo '<header class="preview-header m-margin-bottom"><h3 class="preview-title text-small-spacing">You might also like</h3></header>';
		echo '<div class="row preview-row">';
		while ( $the_query->have_posts() ) : $the_query->the_post(); 
			echo '<article class="col col--third preview-col preview-post">';
			if ( has_post_thumbnail() ) {
				echo '<div class="preview-thumb xxs-margin-bottom"><a href="' . get_the_permalink() . '" class="preview-thumb-link" rel="bookmark">' . get_the_post_thumbnail( $post->ID, 'grid-preview' ) . '</a></div>';
			}
			echo '<div class="preview-info">';
			echo '<a href="' . get_the_permalink() . '" rel="bookmark"><h4 class="preview-title">' . get_the_title() . '</h4></a>' . '<span class="preview-date">' . get_the_date() . '</span>';
			echo '</div>';
			echo '</article>';
		endwhile;
		echo '</div></section>';
	endif;
	wp_reset_postdata();
}
endif;

if ( ! function_exists( 'kbp_read_more_link' ) ) :
/**
 * Prints a link to the full post. Not a button!
 */
function kbp_read_more_link() {
	echo '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" class="read-more-link has-link-line">' . __('Read More', 'kbp') . ' &raquo;</a>';
}
endif;

if ( ! function_exists( 'kbp_read_more_button' ) ) :
/**
 * Prints a button link to the full post.
 */
function kbp_read_more_button() {
	echo '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" class="read-more-button button">' . __('Read More', 'kbp') . '</a>';
}
endif;

if ( ! function_exists( 'kbp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function kbp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'kbp_tag_counter' ) ) :
/**
* Grabs the tags, counts them, returns a string for output in post meta
* @return $tag_info string Tag icon plus the count, wrapped in a link to anchor users to tags
*/
function kbp_tag_counter( ) {
	$tags = get_the_tags();
	$js = '';
	// Check which url to pull
	if( !is_single() ) {
		$url = esc_url( get_permalink() ) . '#tag-list';
		$js = ' js-tag-button';
	} else {
		$url = '#tag-list';
	}
	if( $tags ) {
		$tag_count = count( $tags );
		$tag_info = '<a href="' . $url . '" class="tag-count-link' . $js . '"><i class="icon-tags tag-count-icon"></i> ' . $tag_count . '</a>';
		return $tag_info;
	} else {
		return;
	}
}
endif;

if ( ! function_exists( 'kbp_categories' ) ) :
/**
* Grabs the categories, displays the first three or four, depending on featured category
* @param array $categories Categories for the current post/page 
* @param bool $is_feature Previous check whether or not the post/page has the featured category
* @param bool $display_featured Previously set to display or not display featured category link 
* @param int $display_cats Number of categories to display before exiting loop
*/
function kbp_categories( $categories, $display_cats ) {
	if ( $display_cats <= 0 ) {
		echo 'ERROR: MUST DISPLAY AT LEAST ONE CATEGORY';
		return;
	}

	if ( !empty( $categories ) ) {
		$cat_size = count($categories);

		$category_name = '';
		$category_link = '';
		// Check for undefined offset
		$max_cats = ( $display_cats > $cat_size ) ? $cat_size - 1 : $display_cats - 1;

		$been_featured = false;
		for ( $i = 0; $i <= $max_cats; $i++ ) {
			if ( $categories[$i] ) {
				$category_name = strtolower( $categories[$i]->cat_name );
				if( $category_name != 'featured' ) {
					if( $i != 0 && !$been_featured ) {
						echo ', ';
					} 
					if( $been_featured ) {
						$been_featured = false;
					}
		 			$category_name = ucwords( $category_name );
		 			$category_link = get_category_link($categories[$i]->term_id);
					echo '<a href="'.$category_link.'" class="list-category">'.$category_name.'</a>';
				} else {
					$been_featured = true;
				}
			}
		}
	}
}
endif;

if ( ! function_exists( 'kbp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kbp_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '#', esc_html__( ', #', 'kbp' ) );
		if ( $tags_list && is_single() ) {
			printf( '<section id="tag-list" class="tag-section tags-links m-padded m-padding half-curved"><h6 class="tags-title xxs-margin-bottom">' . __('Tagged', 'kbp') . '</h6>' . esc_html__( '%1$s', 'kbp' ) . '</section>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'kbp' ), esc_html__( '1 Comment', 'kbp' ), esc_html__( '% Comments', 'kbp' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'kbp' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'kbp_categorized_blog' ) ) :
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function kbp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'kbp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kbp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so kbp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so kbp_categorized_blog should return false.
		return false;
	}
}
endif;

if ( ! function_exists( 'kbp_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function kbp_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in kbp_categorized_blog.
 */
function kbp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'kbp_categories' );
}
add_action( 'edit_category', 'kbp_category_transient_flusher' );
add_action( 'save_post',     'kbp_category_transient_flusher' );