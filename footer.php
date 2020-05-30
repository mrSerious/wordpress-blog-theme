<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Wordpress_Blog_Theme
 */

?>
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="footer-pre">
			<ul class="social-links list-inline">
				<li class="list-inline-item"><i class="fab fa-facebook-f"></i></li>
				<li class="list-inline-item"><i class="fab fa-twitter"></i></li>
				<li class="list-inline-item"><i class="fab fa-instagram"></i></li>
			</ul>

			<?php wp_nav_menu(array(
				'theme_location'    => 'menu-1',
				'menu_id'           => 'footer-menu',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'footer-nav-menu',
				'menu_class'        => 'nav justify-content-center',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			));
			?>

		</div>
		<div class="rights">
			<span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</span>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>