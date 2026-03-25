<?php if (have_rows('slides')): ?>
  <div class="mv-slick-wrapper">
    <div class="container-xl">
      <div class="mv-slick-header">
        <div class="mv-slick-arrows">
          <button type="button" class="mv-arrow mv-arrow-prev" aria-label="Previous">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
          </button>
          <button type="button" class="mv-arrow mv-arrow-next" aria-label="Next">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </button>
        </div>
      </div>

      <div class="mv-slick">
        <?php while (have_rows('slides')): the_row();
          $image = get_sub_field('background_image');
          $title = get_sub_field('title');
          $link  = get_sub_field('link'); ?>
          <a href="<?php echo esc_url($link); ?>" 
                class="mv-slide" 
                style="background-image:url('<?php echo esc_url($image['url']); ?>');">
                <span class="mv-slide-title"><?php echo esc_html($title); ?></span>
                </a>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
<?php endif; ?>