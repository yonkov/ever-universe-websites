<?php

//Register parent theme's styles
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

//Register ever theme's scripts
function ever_enqueue_scripts(){
    wp_enqueue_script( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, null, true );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ),'',true);
    wp_enqueue_style( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css"' );
}
add_action( 'wp_enqueue_scripts', 'ever_enqueue_scripts');

/* Make the child theme translatable with text domain "ever" */
add_action( 'after_setup_theme', function () {
    load_child_theme_textdomain( 'ever', get_stylesheet_directory() . '/languages' );
} );

/*Create a new custom post type called Projects */
require_once( get_stylesheet_directory() . '/projects.php');

/* Create custom post type testimonials */
require_once( get_stylesheet_directory() . '/testimonials.php');

/* Create Custom Post Type Team Members */
require_once( get_stylesheet_directory() . '/team-members.php');