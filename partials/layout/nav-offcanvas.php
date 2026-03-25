<!-- Skip link for accessibility -->
<a class="visually-hidden-focusable" href="#main">Skip to content</a>

<?php if ( is_active_sidebar( 'header_pre' ) ) : ?>
	<div class="container-xl py-2">
		<?php dynamic_sidebar( 'header_pre' ); ?>
	</div>
<?php endif; ?>

<nav class="navbar navbar-expand-lg bg-white" role="navigation" aria-label="Main navigation">
	<div class="container-xl d-flex align-items-center">

		<!-- Logo -->
		<a class="navbar-brand me-auto" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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

		<!-- Mobile toggle -->
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#headerNavOffcanvas" aria-controls="headerNavOffcanvas" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Desktop menu -->
		<div class="d-none d-lg-block">
			<?php
			wp_nav_menu( [
				'theme_location' => 'header-menu',
				'container'      => false,
				'menu_class'     => 'navbar-nav flex-row gap-4',
				'fallback_cb'    => 'bs5navwalker::fallback',
				'walker'         => new bs5navwalker(),
			] );
			?>
		</div>
	</div>

	<!-- Mobile offcanvas menu -->
	<div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="headerNavOffcanvas" aria-labelledby="headerNavOffcanvasLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="headerNavOffcanvasLabel">Menu</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<?php
			wp_nav_menu( [
				'theme_location' => 'header-menu',
				'container'      => false,
				'menu_class'     => 'navbar-nav align-items-center',
				'fallback_cb'    => 'bs5navwalker::fallback',
				'walker'         => new bs5navwalker(),
			] );
			?>
		</div>
	</div>
</nav>