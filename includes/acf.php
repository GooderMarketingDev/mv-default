<?php
// -----------------------------------------------------------------------------
// Prevent Direct Access
// -----------------------------------------------------------------------------
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct access not allowed.' );
}

// -----------------------------------------------------------------------------
// Custom ACF content blocks
// -----------------------------------------------------------------------------
add_action('init', 'my_acf_init');
function my_acf_init() {
    if( function_exists('acf_register_block') ) {
        acf_register_block(array(
            'name'              => 'mv-carousel',
            'title'             => 'Modev Carousel',
            'description'       => 'Carousel Slider',
            'render_callback'   => 'mv_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'carousel', 'content' ),
        ));
    }
}


function mv_acf_block_render_callback( $block ) {
    
    $slug = str_replace('acf/', '', $block['name']);
    
    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/partials/blocks/{$slug}.php") ) ) {
        include( get_theme_file_path("/partials/blocks/{$slug}.php") );
    }
}
