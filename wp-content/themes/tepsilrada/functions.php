<?php

/**
 * tepsilrada functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tepsilrada
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.5');
}

if (!function_exists('tepsilrada_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tepsilrada_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tepsilrada, use a find and replace
		 * to change 'tepsilrada' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('tepsilrada', get_template_directory() . '/languages');

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
				'menu-1' => esc_html__('Primary', 'tepsilrada'),
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
				'tepsilrada_custom_background_args',
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
add_action('after_setup_theme', 'tepsilrada_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tepsilrada_content_width()
{
	$GLOBALS['content_width'] = apply_filters('tepsilrada_content_width', 640);
}
add_action('after_setup_theme', 'tepsilrada_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tepsilrada_widgets_init()
{
	register_sidebar([
			'name'          => esc_html__('Sidebar', 'tepsilrada'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'tepsilrada'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>'
			]
	);
}

add_action('widgets_init', 'tepsilrada_widgets_init');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Iнформацiя',
		'menu_title'	=> 'Iнформацiя',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Шапка',
		'menu_title'	=> 'Шапка',
		'parent_slug'	=> 'theme-general-settings',
		'menu_slug'		=> 'theme-header-settings',
		'redirect'		=> false,
		'capability'	=> 'edit_posts',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Бiчне меню',
		'menu_title'	=> 'Бiчне меню',
		'parent_slug'	=> 'theme-general-settings',
		'menu_slug'		=> 'theme-sidebar-settings',
		'redirect'		=> false,
		'capability'	=> 'edit_posts',

	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Футер',
		'menu_title'	=> 'Футер',
		'parent_slug'	=> 'theme-general-settings',
		'menu_slug'		=> 'theme-footer-settings',
		'redirect'		=> false,
		'capability'	=> 'edit_posts',
	));
}
add_filter('the_content', 'first_paragraph');

function first_paragraph($content)
{
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="post__text">', $content, 1);
}

require get_template_directory() . '/inc/ajax.php';

function wpse_filter_child_cats( $query ) {

if ( $query->is_category ) {
    $queried_object = get_queried_object();
    $child_cats = (array) get_term_children( $queried_object->term_id, 'category' );

    if ( ! $query->is_admin )
        //exclude the posts in child categories
        $query->set( 'category__not_in', array_merge( $child_cats ) );
    }

    return $query;
}
add_filter( 'pre_get_posts', 'wpse_filter_child_cats' ); 

/**
 * Enqueue scripts and styles.
 */
function blog_styles()
{
	wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/app.min.js');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css');
}

add_action('wp_enqueue_scripts', 'blog_styles');

function dump(...$vars)
{
    echo("<pre>");
    var_dump($vars);
    echo("</pre>");

}

if (!is_admin()) {
	function wpb_search_filter($query)
	{
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts', 'wpb_search_filter');
}

function my_editor_settings($settings) {
	$settings['quicktags'] = false;
	return $settings;
	}
	
	add_filter('wp_editor_settings', 'my_editor_settings');



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

set_time_limit(0);

function after_posts_content($posts) {
    $url = esc_url(get_permalink( get_option( 'page_for_posts' ) ));
    echo "<div class='news__all'><a class='button--sm' href='$url'>Усi новини</a></div>";
}
add_filter('after_posts_content', 'after_posts_content');

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
