<?php
/**
 * Vashishta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vashishta
 */

if ( ! function_exists( 'vashishta_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vashishta_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Vashishta, use a find and replace
		 * to change 'vashishta' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vashishta', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'vashishta' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'vashishta_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'vashishta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vashishta_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'vashishta_content_width', 640 );
}
add_action( 'after_setup_theme', 'vashishta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vashishta_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vashishta' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vashishta' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vashishta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vashishta_scripts() {
	wp_enqueue_script('jquery-custom','https://code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1', true);
	wp_enqueue_script('owl-carousel','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), '3.3.1', true);
	wp_enqueue_script('moment','https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js', array(), '3.3.1', true);
	wp_enqueue_script('calendar','https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js', array(), '3.3.1', true);

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20180603', true );

}
add_action( 'wp_enqueue_scripts', 'vashishta_scripts' );

// Load theme styles
function theme_styles()
{	

	wp_register_style('fonts','https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Quicksand:300,400,500,700', array(), '1.0', 'all');
    wp_enqueue_style('fonts'); // Enqueue it!
    wp_register_style('normalize','https://unpkg.com/normalize.css@8.0.0/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!
    wp_register_style('calendar','https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css');
    wp_enqueue_style('calendar'); // Enqueue it!
    wp_register_style('owl','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('owl'); // Enqueue it!
    wp_register_style('theme', get_template_directory_uri() . '/css/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('theme'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'theme_styles'); // Add Theme Stylesheet
// theme navigation
function theme_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

