<?php
/**
 * Theme Image Configuration
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// -----------------------------------------------------------------------------
// Theme Support for Media
// -----------------------------------------------------------------------------

add_action( 'after_setup_theme', 'mv_setup_image_support' );
function mv_setup_image_support() {

	// Enable support for featured images and custom logos
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

	// Custom image sizes
	add_image_size( 'small', 200, 200, false );
	add_image_size( 'feed', 600, 600, false );
	add_image_size( 'med', 300, 300, [ 'center', 'center' ] );
	add_image_size( 'masthead', 1920, 1000, true );
	add_image_size( 'big', 1920, 1920, true );
}

// -----------------------------------------------------------------------------
// Register Custom Sizes in Gutenberg Editor
// -----------------------------------------------------------------------------

add_filter( 'image_size_names_choose', 'mv_custom_image_sizes' );
function mv_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, [
		'small'    => __( 'Small', 'mv' ),
		'masthead' => __( 'Masthead', 'mv' ),
	] );
}

// -----------------------------------------------------------------------------
// Allow SVG Uploads (with basic admin security check)
// -----------------------------------------------------------------------------

add_filter( 'upload_mimes', 'mv_allow_svg_uploads' );
function mv_allow_svg_uploads( $mimes ) {
	if ( current_user_can( 'manage_options' ) ) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}

add_filter( 'wp_lazy_loading_enabled', '__return_true' );