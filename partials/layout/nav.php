<!-- Skip link for accessibility -->
<a class="visually-hidden-focusable" href="#main">Skip to content</a>

<?php if ( is_active_sidebar( 'header_pre' ) ) : ?>
	<div class="container-xl py-2">
		<?php dynamic_sidebar( 'header_pre' ); ?>
	</div>
<?php endif; ?>
<header>
	<nav class="navbar navbar-expand-lg" role="navigation" aria-label="Main navigation">
		<div class="container-xl">
			
			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				if ( has_custom_logo() ) {
					$custom_logo_id = get_theme_mod('custom_logo');
					$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

						if (has_custom_logo()) {
							echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="img-fluid site-logo"/>';
						}
				} else {
					echo '<span class="site-title text-light">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
				}
				?>
			</a>

			<!-- Toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#headerNavbar" aria-controls="headerNavbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Collapsible nav (mobile + desktop) -->
			<div class="collapse navbar-collapse" id="headerNavbar">
				<?php
				wp_nav_menu( [
					'theme_location' => 'header-menu',
					'container'      => false,
					'menu_class'     => 'navbar-nav align-items-center ms-auto',
					'fallback_cb'    => 'bs5navwalker::fallback',
					'walker'         => new bs5navwalker(),
				] );
				?>
			</div>

			<div class="wp-block-group">
				<div class="wp-block-button text-nowrap button-wide g-hover-teal">
					<!--a class="wp-block-button__link wp-element-button" href="#quote" data-bs-toggle="modal" data-bs-target="#quote">Get A Quote</a--->
					<a class="wp-block-button__link wp-element-button" href="/contact">Schedule Appointment</a>
				</div>
			</div>
		</div>
	</nav>
</header>