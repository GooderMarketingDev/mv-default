<?php
/**
 * Optional Security & Output Cleanups
 * Only needed for stricter security, audits, or performance tweaks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// -----------------------------------------------------------------------------
// OPTIONAL: Disable WP-generated inline <style> from theme.json
// -----------------------------------------------------------------------------

// Uncomment below only if you're manually managing all styles
// remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );

// -----------------------------------------------------------------------------
// OPTIONAL: Remove block support styles injected in footer
// -----------------------------------------------------------------------------

// Uncomment if not using Gutenberg block supports
// add_action( 'wp_footer', function() {
//     wp_dequeue_style( 'core-block-supports' );
// }, 100 );


// -----------------------------------------------------------------------------
// OPTIONAL: Security Hardening (Headers)
// These can also be handled via .htaccess or server config
// -----------------------------------------------------------------------------

// Add security headers to all frontend responses
add_action( 'send_headers', 'mv_security_headers' );
function mv_security_headers() {
	if ( ! is_admin() ) {
		header( 'X-Content-Type-Options: nosniff' );
		header( 'X-Frame-Options: SAMEORIGIN' );
		header( 'Referrer-Policy: no-referrer-when-downgrade' );
		header( 'X-XSS-Protection: 1; mode=block' );
	}
}

// -----------------------------------------------------------------------------
// OPTIONAL: Remove Unused REST API Endpoints (if REST isn't needed)
// -----------------------------------------------------------------------------

// Disable REST API for non-logged-in users (breaks Gutenberg!)
/*
add_filter( 'rest_authentication_errors', function( $result ) {
	if ( ! is_user_logged_in() ) {
		return new WP_Error( 'rest_disabled', 'REST API restricted.', [ 'status' => 403 ] );
	}
	return $result;
});
*/