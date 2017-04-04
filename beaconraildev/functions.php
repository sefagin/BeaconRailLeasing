<?php
/**
 * BeaconRail functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BeaconRail
 */

if ( ! function_exists( 'beaconraildev_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beaconraildev_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BeaconRail, use a find and replace
	 * to change 'beaconraildev' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beaconraildev', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'beaconraildev' ),
		'menu-2' => esc_html__( 'Phone', 'beaconraildev' )
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
	add_theme_support( 'custom-background', apply_filters( 'beaconraildev_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'beaconraildev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beaconraildev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beaconraildev_content_width', 640 );
}
add_action( 'after_setup_theme', 'beaconraildev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beaconraildev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'beaconraildev' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'beaconraildev' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'beaconraildev_widgets_init' );


/* Function to stop page scrolling on more links*/
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

/**
 * Enqueue scripts and styles.
 */
function beaconraildev_scripts() {
	wp_enqueue_style( 'beaconraildev-style', get_stylesheet_uri() );

	// Add Google Fonts: Fira sans
	//wp_enqueue_style('beaconraildev-google-fonts', 'https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,700,700i');
	wp_enqueue_style('beaconraildev-local-fonts', get_template_directory_uri() . '/fonts/custom-fonts.css');

	//wp_enqueue_script( 'beaconraildev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'beaconraildev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), null, false);

	wp_enqueue_script( 'beaconrail-expanding-panels', get_template_directory_uri() . '/js/expandable_panels.js', array('jquery'), '20170315', false);

	wp_enqueue_script( 'beaconrail-product-panels', get_template_directory_uri() . '/js/products_panels.js', array('jquery'), '20170315', false);

	wp_enqueue_script( 'beaconrail-navigation-script', get_template_directory_uri() . '/js/navigation_script.js', array(), '20170315', false);

	wp_enqueue_script( 'beaconrail-overlay-script', get_template_directory_uri() . '/js/js-image-slider.js', array(), '20170315', false);

	wp_enqueue_script( 'beaconrail-overlay-script', get_template_directory_uri() . '/js/overlay_script.js', array(), '20170315', false);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'beaconraildev_scripts' );

/**
 * remove_filter( 'the_content', 'wpautop' );
 * remove_filter( 'the_excerpt', 'wpautop' );
 */

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
