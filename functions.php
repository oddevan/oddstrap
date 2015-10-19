<?php
/**
 * oddStrap functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oddStrap
 */

if ( ! function_exists( 'oddstrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oddstrap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on oddStrap, use a find and replace
	 * to change 'oddstrap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'oddstrap', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'oddstrap' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'oddstrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // oddstrap_setup
add_action( 'after_setup_theme', 'oddstrap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oddstrap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oddstrap_content_width', 640 );
}
add_action( 'after_setup_theme', 'oddstrap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oddstrap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oddstrap' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="panel-heading"><h3 class="panel-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'oddstrap' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div class="col-sm-6 col-md-4 col-lg-3"><div id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading"><h3 class="panel-title">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'oddstrap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oddstrap_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//code.jquery.com/jquery-2.1.1.min.js', false, '2.1.1', false );
	wp_enqueue_script( 'jquery' );

	wp_deregister_script( 'bootstrap3js' );
	wp_register_script( 'bootstrap3js', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array( 'jquery' ), '3.2.0', false );
	wp_enqueue_script( 'bootstrap3js' );

	wp_register_style( 'bootstrap3css', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false, '3.2.0' );
	wp_enqueue_style( 'bootstrap3css' );

	wp_enqueue_style( 'oddstrap-style', get_stylesheet_uri(), array( 'bootstrap3css' ), 1.0, false );

	//wp_enqueue_script( 'oddstrap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'oddstrap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'oddstrap-bsfixes', get_template_directory_uri() . '/js/bsfixes.js', array( 'bootstrap3js' ), '20151019', true );
}
add_action( 'wp_enqueue_scripts', 'oddstrap_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Bootstrap menu walker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
