<?php
/**
 * Vashishta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vashishta
 */

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'home-course', 600, 352, true ); // (cropped)
    add_image_size( 'testimony-photo', 	120, 120, true ); // (cropped)
    add_image_size( 'teacher-photo', 	80, 80, true ); // (cropped)
    add_image_size( 'gallery-thumb', 	200, 200, true ); // (cropped)
}

function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        'Newsletter emails',
        'Newsletter',
        'edit_posts',
        'newsletter-admin',
        'newsletter_function',
        'dashicons-email-alt',
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
function newsletter_function() {
	global $title;

    print '<div class="wrap">';
    print "<h1>$title</h1>";

    $file = plugin_dir_path(__FILE__) . "newsletter-admin.php";
    //var_dump($file);
    if (file_exists($file)) {
    	require $file;
    }
}


function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Calendar (retraits/cours)';
    $submenu['edit.php'][5][0] = 'Calendar item (retrait/cours)';
    $submenu['edit.php'][10][0] = 'Add Calendar item (retrait/cours)';
    $submenu['edit.php'][16][0] = 'Tags';
    echo '';
}
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Calendar (retrait/cours)';
    $labels->singular_name = 'Calendar item (retrait/cours)';
    $labels->add_new = 'Add';
    $labels->add_new_item = 'Add';
    $labels->edit_item = 'Edit';
    $labels->new_item = 'New';
    $labels->view_item = 'View';
    $labels->search_items = 'Search';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in trash';
}

add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');

function revcon_change_cat_object() {
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['category']->labels;
    $labels->name = 'Type retrait/cours';
    $labels->singular_name = 'Type retrait/cours';
    $labels->add_new = 'Add type retrait/cours';
    $labels->add_new_item = 'Add type retrait/cours';
    $labels->edit_item = 'Edit';
    $labels->new_item = 'New';
    $labels->view_item = 'View';
    $labels->search_items = 'Search';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in Trash';
    $labels->all_items = 'All';
    $labels->menu_name = 'Types retrait/cours';
    $labels->name_admin_bar = 'Types retrait/cours';
}
add_action( 'init', 'revcon_change_cat_object' );


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
show_admin_bar( false );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
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
    wp_register_style('theme', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('theme'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'theme_styles'); // Add Theme Stylesheet

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Register Custom Post Type
function teachers_cpt() {

	$labels = array(
		'name'                  => _x( 'Teachers', 'Post Type General Name', 'vashishta' ),
		'singular_name'         => _x( 'Teacher', 'Post Type Singular Name', 'vashishta' ),
		'menu_name'             => __( 'Teachers', 'vashishta' ),
		'name_admin_bar'        => __( 'Teacher', 'vashishta' ),
		'archives'              => __( 'Teacher Archives', 'vashishta' ),
		'attributes'            => __( 'Teacher Attributes', 'vashishta' ),
		'parent_item_colon'     => __( 'Parent Teacher:', 'vashishta' ),
		'all_items'             => __( 'All Teachers', 'vashishta' ),
		'add_new_item'          => __( 'Add New Teacher', 'vashishta' ),
		'add_new'               => __( 'Add New', 'vashishta' ),
		'new_item'              => __( 'New Teacher', 'vashishta' ),
		'edit_item'             => __( 'Edit Teacher', 'vashishta' ),
		'update_item'           => __( 'Update Teacher', 'vashishta' ),
		'view_item'             => __( 'View Teacher', 'vashishta' ),
		'view_items'            => __( 'View Teachers', 'vashishta' ),
		'search_items'          => __( 'Search Teacher', 'vashishta' ),
		'not_found'             => __( 'Not found', 'vashishta' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'vashishta' ),
		'featured_image'        => __( 'Featured Image', 'vashishta' ),
		'set_featured_image'    => __( 'Set featured image', 'vashishta' ),
		'remove_featured_image' => __( 'Remove featured image', 'vashishta' ),
		'use_featured_image'    => __( 'Use as featured image', 'vashishta' ),
		'insert_into_item'      => __( 'Insert into Teacher', 'vashishta' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Teacher', 'vashishta' ),
		'items_list'            => __( 'Teachers list', 'vashishta' ),
		'items_list_navigation' => __( 'Teachers list navigation', 'vashishta' ),
		'filter_items_list'     => __( 'Filter Teachers list', 'vashishta' ),
	);
	$args = array(
		'label'                 => __( 'Teacher', 'vashishta' ),
		'description'           => __( 'Teachers', 'vashishta' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'teacher', $args );

}
add_action( 'init', 'teachers_cpt', 0 );
add_post_type_support( 'teacher', 'page-attributes' );
// Register Custom Post Type
function testimonails_cpt() {

	$labels = array(
		'name'                  => _x( 'Testimonies', 'Post Type General Name', 'vashishta' ),
		'singular_name'         => _x( 'Testimony', 'Post Type Singular Name', 'vashishta' ),
		'menu_name'             => __( 'Testimonies', 'vashishta' ),
		'name_admin_bar'        => __( 'Testimony', 'vashishta' ),
		'archives'              => __( 'Testimony Archives', 'vashishta' ),
		'attributes'            => __( 'Testimony Attributes', 'vashishta' ),
		'parent_item_colon'     => __( 'Parent Testimony:', 'vashishta' ),
		'all_items'             => __( 'All Testimonies', 'vashishta' ),
		'add_new_item'          => __( 'Add New Testimony', 'vashishta' ),
		'add_new'               => __( 'Add New', 'vashishta' ),
		'new_item'              => __( 'New Testimony', 'vashishta' ),
		'edit_item'             => __( 'Edit Testimony', 'vashishta' ),
		'update_item'           => __( 'Update Testimony', 'vashishta' ),
		'view_item'             => __( 'View Testimony', 'vashishta' ),
		'view_items'            => __( 'View Testimonies', 'vashishta' ),
		'search_items'          => __( 'Search Testimony', 'vashishta' ),
		'not_found'             => __( 'Not found', 'vashishta' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'vashishta' ),
		'featured_image'        => __( 'Featured Image', 'vashishta' ),
		'set_featured_image'    => __( 'Set featured image', 'vashishta' ),
		'remove_featured_image' => __( 'Remove featured image', 'vashishta' ),
		'use_featured_image'    => __( 'Use as featured image', 'vashishta' ),
		'insert_into_item'      => __( 'Insert into Testimony', 'vashishta' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimony', 'vashishta' ),
		'items_list'            => __( 'Testimonies list', 'vashishta' ),
		'items_list_navigation' => __( 'Testimonies list navigation', 'vashishta' ),
		'filter_items_list'     => __( 'Filter Testimonies list', 'vashishta' ),
	);
	$args = array(
		'label'                 => __( 'Testimony', 'vashishta' ),
		'description'           => __( 'Testimonies', 'vashishta' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-status',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimony', $args );

}
add_action( 'init', 'testimonails_cpt', 0 );

add_post_type_support( 'testimony', 'page-attributes' );

function theme_pagination($page = 1, $totalitems, $limit = 5, $adjacents = 1, $targetpage = "/", $pagestring = "?pagination=")
{       
    //defaults
    if(!$adjacents) $adjacents = 1;
    if(!$limit) $limit = 15;
    if(!$page) $page = 1;
    if(!$targetpage) $targetpage = "/";
    
    //other vars
    $prev = $page - 1;                                  //previous page is page - 1
    $next = $page + 1;                                  //next page is page + 1
    $lastpage = ceil($totalitems / $limit);             //lastpage is = total items / items per page, rounded up.
    $lpm1 = $lastpage - 1;                              //last page minus 1
    
    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */

    $pagination = "";
    if($lastpage > 1)
    {   
        //$pagination .= "<ul class=\"pagination center\">";
        

        //previous button
        if ($page > 1) {
            $pagination .= "<a class=\"arrow\" href=\"".$targetpage."".$pagestring."".$prev."\"><img class=\"svg \" src=\"/wp-content/themes/vashishta/assets/svg/icon_pagination_previous.svg\" alt=\"\"></a>";
        }
        else {
            $pagination .= "<a class=\"arrow\" href=\"".$targetpage."".$pagestring."".$prev."\"><img class=\"svg disabled\" src=\"/wp-content/themes/vashishta/assets/svg/icon_pagination_previous.svg\" alt=\"\"></a>";
        }
        $pagination .= "<ul>";
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination .= "<a href=\"\"><li class=\"active\">$counter</li></a>";
                else
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\"><li>$counter</li></a>";                 
            }
        }
        elseif($lastpage >= 7 + ($adjacents * 2))   //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 3))        
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<a href=\"\"><li class=\"active\">$counter</li></a>";
                    else
                        $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\"><li>$counter</li></a>";                 
                }
                $pagination .= "<li>...</li>";
                $pagination .= "<a href=\"" . $targetpage . $pagestring . $lpm1 . "\"><li>$lpm1</li></a>";
                $pagination .= "<a href=\"" . $targetpage . $pagestring . $lastpage . "\"><li>$lastpage</li></a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination .= "<a href=\"" . $targetpage . $pagestring . "1\"><li>1</li></a>";
                $pagination .= "<a href=\"" . $targetpage . $pagestring . "2\"><li>2</li></a>";
                $pagination .= "<li>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<a href=\"\"><li class=\"active\">$counter</li></a>";
                    else
                        $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\"><li>$counter</li></a>";                   
                }
                $pagination .= "<li>...</li>";
                $pagination .= "<a href=\"" . $targetpage . $pagestring . $lpm1 . "\"><li>$lpm1</li></a>";
                $pagination .= "<a href=\"" . $targetpage . $pagestring . $lastpage . "\"><li>$lastpage</li></a>";         
            }
            //close to end; only hide early pages
            else
            {
                $pagination .= "<a href=\"" . $targetpage . $pagestring . "1\"><li>1</li></a>";
                $pagination .= "<a href=\"" . $targetpage . $pagestring . "2\"><li>2</li></a>";
                $pagination .= "<li>...</li>";
                for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination .= "<a href=\"\"><li class=\"active\">$counter</li></a>";
                    else
                        $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\"><li>$counter</li></a>";                       
                }
            }
        }
        $pagination .= "</ul>\n";
        //next button
        if ($page < $counter - 1) 
            $pagination .= "<a class=\"arrow\" href=\"" . $targetpage . $pagestring . $next . "\"><img class=\"svg\" src=\"/wp-content/themes/vashishta/assets/svg/icon_pagination-next.svg\" alt=\"\"></a>";
        else
            $pagination .= "<a class=\"arrow\" href=\"" . $targetpage . $pagestring . $next . "\"><img class=\"svg disabled\" src=\"/wp-content/themes/vashishta/assets/svg/icon_pagination-next.svg\" alt=\"\"></a>";
        
    }
    
    return $pagination;

}