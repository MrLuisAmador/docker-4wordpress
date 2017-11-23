<?php
/**
 * la functions and definitions
 *
 * @package la
 */

if ( ! function_exists( 'la_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function la_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on la, use a find and replace
	 * to change 'la' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'la', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'la' ),
		'hidden-nav' => esc_html__( 'Hidden Menu', 'la' ),
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
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'la_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // la_setup
add_action( 'after_setup_theme', 'la_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function la_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'la_content_width', 640 );
}
add_action( 'after_setup_theme', 'la_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function la_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'la' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'la_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function la_scripts() {
	wp_enqueue_style( 'font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'header-font','https://fonts.googleapis.com/css?family=Playfair+Display' );

	wp_enqueue_style( 'body-font','https://fonts.googleapis.com/css?family=Alice' );

	wp_enqueue_style( 'la-slick-css','https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css' );

	wp_enqueue_style( 'la-main-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_style( 'la-style', get_stylesheet_uri() );

	wp_enqueue_script( 'la-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'la-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'la-height-js', get_template_directory_uri() . '/js/jquery.equalheights.min.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'la-stickyNavbar-js', get_template_directory_uri() . '/js/jquery.stickyNavbar.min.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'la-isotype-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'la-main-js', get_template_directory_uri() . '/assets/js/bundle.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'la-slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'la_scripts' );

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


// Adding custom sized feature images to the My Project Post Type
add_image_size( 'my-project-customize-size', 800, 389, true );