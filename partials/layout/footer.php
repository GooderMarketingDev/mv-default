<footer class="footer py-5">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-12 col-md-6 ">
                <?php
                $logo = get_field('logo', 'option');
                if ($logo) {
                    echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr($logo['alt']) . '" class="footer-logo img-fluid mb-3"/>';
                }
                $description = get_field('description', 'option');
                if ($description) {
                    echo '<div class="has-size-1-font-size">' . $description . '</div>';
                }
                ?>
               
            </div>
            <div class="col-6">
            </div>  
            <div class="col-12 col-md-4 mt-4">
                <h2 class="has-size-2-font-size">Contact Us</h2>
                <?php
                $phone = get_field('phone', 'option');
                $email = get_field('email', 'option');
                $address = get_field('address', 'option');
                $hours = get_field('hours', 'option');
                if ($phone) {
                    echo '<p class="mb-1"><a href="tel:' . esc_html($phone) . '" class="text-decoration-none text-light">' . esc_html($phone) . '</a></p>';
                }
                if ($email) {       
                    echo '<p class="mb-1"><a href="mailto:' . esc_html($email) . '" class="text-light">' . esc_html($email) . '</a></p>';
                }
                if ($address) {
                    $address = nl2br(esc_html($address));
                    echo '<p class="mt-4">' . $address . '</p>';
                }
                if ($hours) {
                    // Preserve line breaks in hours
                    $hours = nl2br(esc_html($hours));
                    echo '<p class="mt-1">' . $hours . '</p>';
                }
                ?>
            </div>
            <div class="col-6 col-md-4 mt-4">
                <h2 class="has-size-2-font-size">Services</h2>
                <?php
                // footer menu
                if (has_nav_menu('footer-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => 'nav',
                        'container_class' => 'footer-menu',
                        'menu_class' => 'list-unstyled',
                        'depth' => 1,

                    ));
                }
                ?>
            </div>
            <div class="col-6 col-md-4 mt-4">
                <h2 class="has-size-2-font-size">Company</h2>
                <?php
                // footer menu
                if (has_nav_menu('company-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'company-menu',
                        'container' => 'nav',
                        'container_class' => 'footer-menu',
                        'menu_class' => 'list-unstyled',
                        'depth' => 1,
                    ));
                }
                ?>
            </div>
        </div>
         <!-- Row for Copyright -->
        <div class="footer-copyright pt-3">
                <?php
                if (is_active_sidebar('copyright_area')) {
                    dynamic_sidebar('copyright_area');
                }
                ?>
            </div>
        </div>
    </div>

       

</footer>
<?php wp_footer(); ?>
</body>
</html>
