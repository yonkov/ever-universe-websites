<?php

/**
 * Ever functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    ever
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'ever_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ever_setup() {

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'ever' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ever_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add image size for blog posts, 600px wide (and unlimited height).
		add_image_size( 'ever-blog', 600 );
		// Add image size for full width template, 1040px wide (and unlimited height).
		add_image_size( 'ever-full-width', 1040 );



		// Add support for custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		// Add support for WooCommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif;
add_action( 'after_setup_theme', 'ever_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ever_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ever_content_width', 1040 );
}
add_action( 'after_setup_theme', 'ever_content_width', 0 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * If the WooCommerce plugin is active, load the related functions.
 */
if ( class_exists( 'WooCommerce' ) ) {

	if ( ! function_exists( 'ever_wc_checkout_link' ) ) {
		/**
		* If there are products in the cart, show a checkout link.
		*/
		function ever_wc_checkout_link() {
			global $woocommerce;

			if ( count( $woocommerce->cart->cart_contents ) > 0 ) :

				echo '<a href="' . esc_url( $woocommerce->cart->get_checkout_url() ) . '" title="' . esc_attr__( 'Checkout', 'ever' ) . '">' . esc_html__( 'Checkout', 'ever' ) . '</a>';

			endif;
		}
	}	
}

//Register ever theme's scripts
function ever_enqueue_scripts(){
	/**
	* Enqueue Tiny Slider Vanilla js lightweight slider
	* @link https://github.com/ganlanyuan/tiny-slider
	* @license    https://opensource.org/licenses/mit-license.php MIT License
	*/
    wp_enqueue_script( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, null, true );
    //Enqueue theme's main js file
	wp_enqueue_script( 'ever-main-script', get_template_directory_uri() . '/assets/js/ever.js', array( 'jquery' ), '1.01', true );
	//Enqueue slider js file
	wp_enqueue_script( 'ever-slider', get_template_directory_uri() . '/assets/js/ever-slider.js', array(),NULL,true);
    wp_enqueue_style( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css"' );
	wp_enqueue_style( 'ever', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'ever_enqueue_scripts');

/* Make the child theme translatable with text domain "ever" */
add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'ever', get_template_directory() . '/languages');
} );

/* Dequeue unnecessary css files to improve performance */

function ever_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'scaffold-style' );
        wp_deregister_style( 'scaffold-style' );

    wp_dequeue_style('wpsm_counter-font-awesome-front');
    wp_dequeue_style('simple-job-board-jquery-ui');
}
add_action( 'wp_print_styles', 'ever_dequeue_unnecessary_styles' );

/* Custom functions */

/* Display custom fields with all project icons 
* associated for a specific project	*/

function ever_get_techstack_project_icons(){

    //Get all meta fields
	global $post;
    $meta = get_post_meta($post->ID);
	
	//Display all project icons
	foreach($meta as $key=>$val){
    	//exclude hidden custom fields and statistics
        if ($key!=='statistics' && $key[0]!== "_"){
            foreach($val as $vals){
            	//If it is image url, display it!
                if (strpos($vals, 'wp-content') !== false) {
                    echo '<img src="'.esc_url($vals).'">';
                }
            }
        }                    
	}
		
}

function ever_get_project_stats(){
	
	//Get the custom meta field statistics for a project:
	global $post;
    $stats = json_decode(get_post_meta($post->ID, 'statistics', true));

	//Display the statistics
    if (isset($stats)) {
        foreach($stats as $stat) {?>
            <div class="gh-dets">
            <?php echo '<img src="'.esc_url($stat->imgUrl).'">'; ?>
            <strong><?php echo esc_attr($stat->value); ?></strong>
            <p><?php echo esc_attr($stat->name); ?></p>
            </div> <?php
        } 
    }

}

/*Create a new custom post type called Projects */
require_once( get_template_directory() . '/projects.php');

/* Create custom post type testimonials */
require_once( get_template_directory() . '/testimonials.php');

/* Create Custom Post Type Team Members */
require_once( get_template_directory() . '/team-members.php');

/* Add shortcode to display teammembers on single project page */
require_once( get_template_directory() . '/shortcodes/single-project-team-members-shortcode.php');

/* Add shortcode to display project stats on single project page */
require_once( get_template_directory() . '/shortcodes/single-project-stats-shortcode.php');

/* Add shortcode to display projects on single teammember page */
require_once( get_template_directory() . '/shortcodes/single-team-member-projects-shortcode.php');

/* Add shortcode to display team members on the page */
require_once( get_template_directory() . '/shortcodes/about-team-members.php');

//Allow Gutenberg Editor for custom post types
add_action( 'init', 'ever_cpt_init' );
function ever_cpt_init() {
	$labels = array(
		// not revelant for this article
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'textdomain' ),
		'public'             => true,		
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'show_in_rest'       => true,
	);
	register_post_type( 'mycpt', $args );
}

// Change default excerpt length of posts and custom post types
add_filter( 'excerpt_length', function($length) {
    return 20;
} );

// Project featured image Slider
if (class_exists('MultiPostThumbnails')) {
 
	new MultiPostThumbnails(array(
		'label' => 'Second Featured Image',
		'id' => 'secondary-image',
		'post_type' => 'projects'
		) );

	new MultiPostThumbnails(array(
		'label' => 'Third Featured Image',
		'id' => 'third-image',
		'post_type' => 'projects'
		) );
 
 }