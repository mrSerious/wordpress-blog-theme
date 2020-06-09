<?php

/**
 * A Wordpress Blog Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package A_Wordpress_Blog_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('awordpressblogtheme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function awordpressblogtheme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on A Wordpress Blog Theme, use a find and replace
		 * to change 'awordpressblogtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('awordpressblogtheme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'awordpressblogtheme'),
			)
		);

		register_nav_menus(
			array(
				'menu-2' => esc_html__('Footer', 'awordpressblogtheme'),
			)
		);
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'awordpressblogtheme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'awordpressblogtheme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function awordpressblogtheme_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('awordpressblogtheme_content_width', 640);
}
add_action('after_setup_theme', 'awordpressblogtheme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function awordpressblogtheme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'awordpressblogtheme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'awordpressblogtheme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p class="widget-title section-title">',
			'after_title'   => '</p>',
		)
	);
}
add_action('widgets_init', 'awordpressblogtheme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function awordpressblogtheme_scripts()
{
	wp_enqueue_style('awordpressblogtheme-fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.css', array(), '5.13.0');
	wp_enqueue_style('awordpressblogtheme-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '4.5.1');
	wp_enqueue_style('awordpressblogtheme-style', get_stylesheet_uri(), array('awordpressblogtheme-bootstrap'), _S_VERSION);
	wp_style_add_data('awordpressblogtheme-style', 'rtl', 'replace');

	wp_enqueue_script('awordpressblogtheme-jQuery', get_template_directory_uri() . '/assets/js/jquery-3.5.1.slim.js', array(), '3.5.1', true);
	wp_enqueue_script('awordpressblogtheme-bootstrapjs', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array('awordpressblogtheme-jQuery'), '4.5.1', true);
	wp_enqueue_script('awordpressblogtheme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('awordpressblogtheme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'awordpressblogtheme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

