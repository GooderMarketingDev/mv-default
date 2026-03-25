<?php
/**
 * 
 * Template Name: Brand Header
 */
get_template_part('partials/layout/header'); 
get_template_part('partials/layout/nav'); 

if ( have_posts() ) : while ( have_posts() ) : the_post();            
    $posttype = get_post_type() ? : 'post';
    get_template_part( 'partials/content/content', $posttype );
endwhile; endif;
get_template_part('partials/layout/footer');