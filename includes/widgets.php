<?php
/**
 * Widget Areas Registration
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

add_action( 'widgets_init', 'mv_register_widget_areas' );

function mv_register_widget_areas() {

	register_sidebar( [
		'name'          => __( 'Pre Header', 'mv' ),
		'id'            => 'header_pre',
		'before_widget' => '<div class="widget header-pre">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	] );

	register_sidebar( [
		'name'          => __( 'Post Menu', 'mv' ),
		'id'            => 'menu_post',
		'before_widget' => '<div class="widget post-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	] );

	register_sidebar( [
		'name'          => __( 'Footer Area', 'mv' ),
		'id'            => 'footer_area',
		'before_widget' => '<div class="widget footer-area">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	] );

	register_sidebar( [
		'name'          => __( 'Copyright Area', 'mv' ),
		'id'            => 'copyright_area',
		'before_widget' => '<div class="widget copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	] );

	register_sidebar( [
		'name'          => __( 'Blog Sidebar', 'mv' ),
		'id'            => 'blog_sidebar', // fixed typo
		'before_widget' => '<div class="widget sidebar-widget mb-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="h3 widget-title">',
		'after_title'   => '</h2>',
	] );
}