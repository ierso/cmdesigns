<?php
/**
 * cmdesigns functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cmdesigns
 */

if ( ! function_exists( 'cmdesigns_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cmdesigns_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cmdesigns, use a find and replace
	 * to change 'cmdesigns' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cmdesigns', get_template_directory() . '/languages' );

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
	function register_my_menus() {
	  	register_nav_menus(
		    array(
		      'primary-menu' => __( 'Primary Menu' ),
		      'top-menu' => __( 'Top Menu' ),
					'middlesex-menu' => __( 'Middlesex Menu' ),
					'somerset-menu' => __( 'Somerset Menu' ),
					'union-menu' => __( 'Union Menu' ),
					'monmouth-menu' => __( 'Monmouth Menu' )
		    )
	  	);
	}
	add_action( 'init', 'register_my_menus' );

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
	add_theme_support( 'custom-background', apply_filters( 'cmdesigns_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'cmdesigns_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cmdesigns_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cmdesigns_content_width', 640 );
}
add_action( 'after_setup_theme', 'cmdesigns_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cmdesigns_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cmdesigns' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cmdesigns' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
        'name'          => __( 'kitchen-service', 'cmdesigns' ),
        'id'            => 'service-kitchen',
        'description'   => 'Kitchen Service Column',
        'before_widget' => '<aside id="kitchen-service" class="kitchen-service">',
        'after_widget'  => '</aside>',
    ) );

		register_sidebar( array(
	        'name'          => __( 'bathrooms-built-service', 'cmdesigns' ),
	        'id'            => 'bathrooms-built-service',
	        'description'   => 'Bathrooms Built Service Column',
	        'before_widget' => '<aside id="bathrooms-built-service" class="bathrooms-built-service">',
	        'after_widget'  => '</aside>',
	    ) );

		register_sidebar( array(
	        'name'          => __( 'custom-mill-service', 'cmdesigns' ),
	        'id'            => 'custom-mill-service',
	        'description'   => 'Custom Mill Service Column',
	        'before_widget' => '<aside id="custom-mill-service" class="custom-mill-service">',
	        'after_widget'  => '</aside>',
	    ) );

		register_sidebar( array(
	        'name'          => __( 'decks-ext-service', 'cmdesigns' ),
	        'id'            => 'decks-ext-service',
	        'description'   => 'Decks Exteriors Service Column',
	        'before_widget' => '<aside id="decks-ext-service" class="decks-ext-service">',
	        'after_widget'  => '</aside>',
	    ) );
}
add_action( 'widgets_init', 'cmdesigns_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cmdesigns_scripts() {
	wp_enqueue_style( 'cmdesigns-style', get_stylesheet_uri() );

	//load jquery//
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'cp-slider', get_template_directory_uri() . '/js/slider.js', array(), '20120206', true );

	wp_enqueue_script( 'cmdesigns-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cmdesigns-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cmdesigns_scripts' );

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
