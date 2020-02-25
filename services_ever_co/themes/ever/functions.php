<?php

/**
 * Ever functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

//Register parent theme's styles
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

//Register ever theme's scripts
function ever_enqueue_scripts(){
    wp_enqueue_script( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, null, true );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/ever.js', array( 'jquery' ),'',true);
    wp_enqueue_style( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css"' );
}
add_action( 'wp_enqueue_scripts', 'ever_enqueue_scripts');

/* Make the child theme translatable with text domain "ever" */
add_action( 'after_setup_theme', function () {
    load_child_theme_textdomain( 'ever', get_stylesheet_directory() . '/languages' );
} );

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
require_once( get_stylesheet_directory() . '/projects.php');

/* Create custom post type testimonials */
require_once( get_stylesheet_directory() . '/testimonials.php');

/* Create Custom Post Type Team Members */
require_once( get_stylesheet_directory() . '/team-members.php');

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