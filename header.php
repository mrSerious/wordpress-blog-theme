<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Wordpress_Blog_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'awordpressblogtheme'); ?></a>

		<header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-lg">
				<div class='container'>
					<div class="site-branding">
						<?php
						the_custom_logo();
						if (is_front_page() && is_home()) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<a class="navbar-brand" href="#">Navbar</a>
						<?php
						else :
						?>
							<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
							<!-- <a class="navbar-brand" href="#">Navbar</a> -->
						<?php
						endif;
						// $awordpressblogtheme_description = get_bloginfo('description', 'display');
						if ($awordpressblogtheme_description || is_customize_preview()) :
						?>
							<p class="site-description"><?php echo $awordpressblogtheme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																					?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-controls="bs-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					wp_nav_menu(array(
						'theme_location'    => 'menu-1',
						'menu_id'           => 'primary-menu',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav ml-auto',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					));
					?>
				</div>
			</nav>

		</header><!-- #masthead -->