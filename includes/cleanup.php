<?php
// -----------------------------------------------------------------------------
// Prevent Direct Access
// -----------------------------------------------------------------------------
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct access not allowed.' );
}

// -----------------------------------------------------------------------------
// WordPress Cleanup & Optimization
// -----------------------------------------------------------------------------

add_action( 'after_setup_theme', 'mv_cleanup_setup' );
function mv_cleanup_setup() {
    // Prevent fallback to deprecated the_block_template_skip_link()
    add_theme_support( 'block-template-skip-link' );

    // Disable Gutenberg layout styles (if not using WP layout engine)
    add_theme_support( 'disable-layout-styles' );

    // Early enqueue of block template skip link to suppress deprecated fallback
    if ( function_exists( 'wp_enqueue_block_template_skip_link' ) ) {
        wp_enqueue_block_template_skip_link();
    }

}

add_action( 'init', 'mv_cleanup_init' );
function mv_cleanup_init() {
    // Remove unnecessary <head> output
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

    // Remove emoji scripts/styles
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );


    add_filter( 'tiny_mce_plugins', function( $plugins ) {
        return is_array( $plugins ) ? array_diff( $plugins, [ 'wpemoji' ] ) : [];
    });

    add_filter( 'wp_resource_hints', function( $urls, $relation_type ) {
        if ( 'dns-prefetch' === $relation_type ) {
            $emoji_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
            return array_diff( $urls, [ $emoji_url ] );
        }
        return $urls;
    }, 10, 2 );

    // Disable XML-RPC
    add_filter( 'xmlrpc_enabled', '__return_false' );

    // Disable all comment functionality
    mv_disable_comments();
}

// -----------------------------------------------------------------------------
// Disable Comments Completely (Frontend + Admin)
// -----------------------------------------------------------------------------

function mv_disable_comments() {

    // Remove comment support from all post types
    add_action( 'admin_init', function() {
        foreach ( get_post_types() as $type ) {
            if ( post_type_supports( $type, 'comments' ) ) {
                remove_post_type_support( $type, 'comments' );
                remove_post_type_support( $type, 'trackbacks' );
            }
        }
    });

    // Always close comments/pings
    add_filter( 'comments_open', '__return_false', 20, 2 );
    add_filter( 'pings_open', '__return_false', 20, 2 );
    add_filter( 'comments_array', '__return_empty_array', 10, 2 );

    // Remove comment admin pages and links
    add_action( 'admin_menu', function() {
        remove_menu_page( 'edit-comments.php' );
    });

    add_action( 'admin_init', function() {
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    });

    add_action( 'wp_before_admin_bar_render', function() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'comments' );
    });

    add_action( 'admin_init', function() {
        global $pagenow;
        if ( in_array( $pagenow, [ 'edit-comments.php', 'comment.php', 'options-discussion.php' ], true ) ) {
            wp_redirect( admin_url() );
            exit;
        }
    });
}

// -----------------------------------------------------------------------------
// Disable layout option for blocks
// -----------------------------------------------------------------------------

// Adjustments to block editor (aka Gutenberg)
// Remove layout option
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'block-editor-adjustments',
        get_stylesheet_directory_uri() . '/assets/js/block-editor-adjustments.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
    );
});