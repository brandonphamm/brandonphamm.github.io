<?php

/**
 * School Demo Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package School_Demo_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function school_demo_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on School Demo Theme, use a find and replace
		* to change 'school-demo-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('school-demo-theme', get_template_directory() . '/languages');

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


	// 200x300 crop size for students WxL
	add_image_size(
		'portrait-blog',
		300,
		200,
		true
	);

	// 300x200 crop size for students picture taxonomy
	add_image_size(
		'portrait-blog-tax',
		200,
		300,
		true
	);



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'school-demo-theme'),
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
			'school_demo_theme_custom_background_args',
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
			'height'      => 200,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,

		)

	);

	// block editor for homepage wide and full alignment
	add_theme_support( 'align-wide' );
	add_theme_support( 'align-full' );

}
add_action('after_setup_theme', 'school_demo_theme_setup');


// Changing excerpt to 25 words
//source, https://developer.wordpress.org/reference/functions/the_excerpt/
function fwd_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'fwd_excerpt_length', 999);

// exercpt only for Archive-fwd-students
function fwd_excerpt_more($more)
{
	if (is_archive('fwd-students')) {
		$more = '... <a class="read-more" href="' . esc_url(get_permalink()) . '"> Read more about the student...</a>';
	}
	return $more;
}
add_filter('excerpt_more', 'fwd_excerpt_more');


// To remove archive title
// source https://make.wordpress.org/core/2020/07/30/filtering-archive-pages-headings-in-wordpress-5-5/
function mytheme_archive_title_prefix($prefix)
{
	$prefix = __('');
	return $prefix;
}
add_filter('get_the_archive_title_prefix', 'mytheme_archive_title_prefix');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_demo_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('school_demo_theme_content_width', 640);
}
add_action('after_setup_theme', 'school_demo_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_demo_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'school-demo-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'school-demo-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'school_demo_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function school_demo_theme_scripts()
{
	wp_enqueue_style('school-demo-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('school-demo-theme-style', 'rtl', 'replace');

	wp_enqueue_script('school-demo-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'school_demo_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Registered custom post types and custom taxonomy
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';


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

add_theme_support('post-thumbnails');

function custom_excerpt_length($length)
{
	if (is_page('news')) { // Replace 'your-page-slug' with the slug of your page
		return 50; // Change this to the number of words you want
	} else {
		return $length; // Return the default length for other pages
	}
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


function enqueue_aos_theme_scripts()
{
	wp_enqueue_script('aos-init-script', get_stylesheet_directory_uri() . '/scripts/aos_init.js', array(), _S_VERSION, true);

	wp_enqueue_script('aos-script', get_stylesheet_directory_uri() . '/scripts/aos.js', array(), _S_VERSION, true);

	wp_enqueue_style('aos-styles', get_stylesheet_directory_uri() . '/aos.css');
}
add_action('wp_enqueue_scripts', 'enqueue_aos_theme_scripts');
