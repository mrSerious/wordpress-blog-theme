<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Wordpress_Blog_Theme
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="site-sidebar col-sm-12 col-md-4">
	<?php get_template_part('template-parts/content', 'sidebar'); ?>
</aside><!-- #secondary -->
</div>
</div>
