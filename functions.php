<?php

// Do not allow direct access to this file
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cannot connect to database' );
}
// Load modular theme files
$includes = [
	'cleanup.php',
	'enqueues.php',
	'images.php',
	'navbar.php',
	'secure.php',
	'seo.php',
	'shortcodes.php',
	'widgets.php',
    'acf.php',
];

foreach ( $includes as $file ) {
	require_once get_template_directory() . '/includes/' . $file;
}