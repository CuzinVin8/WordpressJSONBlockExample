<?php
/**
 * EFKGroup Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EFKGroup
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_EFKGROUP_VERSION', '1.0.0' );

if ( ! function_exists( 'efktheme_setup' ) ) :
	function efktheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CyberSecurityDegreeTheme, use a find and replace
		 * to change 'cybersecuritydegreetheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'efktheme', get_template_directory() . '/languages' );
		/**
		 * Include file that registers new post types
		 */
		include_once dirname( __FILE__ ) . '/inc/post-types.php';
		include_once dirname( __FILE__ ) . '/inc/shortcodes.php';
	}
endif;
add_action( 'after_setup_theme', 'efktheme_setup' );

/**
 * Register EFK Block Category
 */
function efktheme_block_categories( $categories, $post ) {
	/*if ( $post->post_type !== 'post' ) {
		return $categories;
	}*/
	return array_merge(
		array(
			array(
				'slug' => 'efk-acf-blocks',
				'title' => __( 'EFK Blocks', 'efk-acf-blocks' ),
				'icon'  => 'welcome-learn-more',
			),
		),
		$categories
		
	);
}
add_filter( 'block_categories', 'efktheme_block_categories', 10, 2 );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'efkgroup-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_EFKGROUP_VERSION, 'all' );
	wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css');
	wp_enqueue_style('AOS_animate', '//cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
	wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css');
	wp_enqueue_style( 'lightbox-css', get_stylesheet_directory_uri() . '/js/mklb/css/mklb.css');

}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function efktheme_enqueue_scripts() {
	wp_register_script(
		'custom-js',
		get_stylesheet_directory_uri() . '/js/custom.js',
		array( 'jquery' ),
		null,
		true
	);
	wp_enqueue_script( 'custom-js' );

	wp_register_script(
		'lightbox-js',
		get_stylesheet_directory_uri() . '/js/mklb/js/mklb.js',
		array( 'jquery' ),
		null,
		true
	);
	wp_enqueue_script( 'lightbox-js' );

	wp_register_script(
		'slick-js',
		'//cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js',
		array('jquery'), 
		true
	);
	wp_enqueue_script( 'slick-js');

	wp_register_script(
		'gsap-js',
		'//cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js',
		array('jquery'), 
		true
	);
	wp_enqueue_script( 'gsap-js');

	wp_register_script(
		'scrolltrigger-js',
		'//cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js',
		array('jquery'), 
		true
	);
	wp_enqueue_script( 'scrolltrigger-js');

	wp_register_script(
		'waypoint-js',
		'//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js',
		array('jquery'), 
		true
	);
	wp_enqueue_script( 'waypoint-js');

	
	wp_register_script(
		'aos-js',
		'//cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js',
		array('jquery'), 
		true
	);
	wp_enqueue_script( 'aos-js');

}
add_action( 'enqueue_block_assets', 'efktheme_enqueue_scripts' );


/**
 * Register Blocks
 */
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/videogrid' );
}