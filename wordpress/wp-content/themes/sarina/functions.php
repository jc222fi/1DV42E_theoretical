<?php
/**
 * sarina functions and definitions
 *
 * @package sarina
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sarina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sarina_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sarina, use a find and replace
	 * to change 'sarina' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sarina', get_template_directory() . '/languages' );

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
	add_image_size( 'side-thumb', 80, 80 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sarina' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sarina_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // sarina_setup
add_action( 'after_setup_theme', 'sarina_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sarina_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sarina' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sarina_widgets_init' );
/**
 * Enqueue fonts
 */
function sarina_font_scripts(){
	wp_enqueue_style( 'sarina-googlefont', 'http://fonts.googleapis.com/css?family=Lora|Lato', array(), null );

	wp_enqueue_style( 'sarina-fontawesome', get_template_directory_uri().'/assets/css/font-awesome.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'sarina_font_scripts' );
/**
 * Enqueue scripts and styles.
 */
function sarina_scripts() {
	wp_enqueue_style( 'sarina-bootcss', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'sarina-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sarina-bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sarina_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom recent posts widget for this theme.
 */
require get_template_directory() . '/inc/sarina-recent-posts-widget.php';
add_action( 'widgets_init', create_function( '', 
			'register_widget( "Sarina_Widget_Recent_Posts" );' ) );
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
 * Bootstrap navwalker
 */
require get_template_directory() . '/inc/navwalker.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
