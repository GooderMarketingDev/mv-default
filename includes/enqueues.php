<?php
/**
 * Theme Asset Enqueueing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

add_action( 'wp_enqueue_scripts', 'mv_enqueue_assets', 90 );
function mv_enqueue_assets() {

	// Bootstrap JS (relies on jQuery)
	wp_enqueue_script(
		'bootstrap-js',
		get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
		[ 'jquery' ],
		'5.3.3',
		true
	);

	// Theme JS (cache-busted with version)
	$theme_js = get_template_directory() . '/assets/js/script.js';
	wp_enqueue_script(
		'mv-script',
		get_template_directory_uri() . '/assets/js/script.js',
		[ 'jquery','slick' ],
		file_exists( $theme_js ) ? filemtime( $theme_js ) : null,
		true
	);

	// Theme CSS (cache-busted with filemtime)
	$theme_css = get_template_directory() . '/assets/css/style.min.css';
	wp_enqueue_style(
		'mv-style',
		get_template_directory_uri() . '/assets/css/style.min.css',
		[],
		file_exists( $theme_css ) ? filemtime( $theme_css ) : '1.0.0'
	);
    


	// Slick CSS/JS (CDN)
	// Used by ACF carousel block - can be removed if not using that block or if you replace it with a different slider library
 	wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1');
    wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', ['slick'], '1.8.1');
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

  
}