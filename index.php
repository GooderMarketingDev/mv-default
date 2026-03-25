<?php 
get_template_part('partials/layout/header'); 
get_template_part('partials/layout/nav'); 
?>
<div class="page-content index" role="main" id="main">
    <?php

    if ( have_posts() ) : while ( have_posts() ) : the_post();            
      $posttype = get_post_type() ? : 'post';
      get_template_part( 'partials/content/content-feed', $posttype );
    endwhile; endif;

    ?>

<!-- Sidebar -->
<div class="col-12 col-md-4 pt-5 pb-5 has-grey-light-background-color has-background">
  <?php if (is_active_sidebar('bog_sidebar')) dynamic_sidebar('bog_sidebar'); ?>
</div>
</div>
<?php get_template_part('partials/layout/footer'); ?>