<?php
/**
 * Basic SEO Configuration
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// -----------------------------------------------------------------------------
// Enable <title> tag output from WordPress (for SEO plugins or themes)
// -----------------------------------------------------------------------------

add_action( 'after_setup_theme', function() {
	add_theme_support( 'title-tag' );
} );

// -----------------------------------------------------------------------------
// Optional: Clean Up Archive Titles (remove "Category:", "Tag:", etc.)
// -----------------------------------------------------------------------------

// Uncomment to customize archive page titles
/*
add_filter( 'get_the_archive_title', function ( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}

	return $title;
});
*/