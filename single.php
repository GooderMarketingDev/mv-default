<?php 
get_template_part('partials/layout/header'); 
get_template_part('partials/layout/nav'); ?>

<main class="single-post container-xl">
  <div class="row">
    <div class="col-12 col-md-8 pt-5 pb-5">
      <article class="border rounded p-4 px-md-5 shadow-sm bg-white">

        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();            
            $posttype = get_post_type() ? : 'post';
            get_template_part( 'partials/content/content', $posttype );
        endwhile; endif;
        ?>
      </article>
    </div>
    <div class="col-12 col-md-4 pt-5 pb-5 has-grey-light-background-color has-background">
        <?php if (is_active_sidebar('bog_sidebar')) dynamic_sidebar('bog_sidebar'); ?>
      </div>
  </div>
</main>

<?php get_template_part('partials/layout/footer'); ?>
