<?php

grant_super_admin(3);

function ever_co_enqueue_theme_styles() {
    //Register parent theme's styles
   //wp_enqueue_style( 'ever-css', get_template_directory_uri().'/style.css' );

   //Register child theme's styles
   wp_enqueue_style('ever-co-child', get_stylesheet_directory_uri() .'/style.css');
}
add_action( 'wp_enqueue_scripts', 'ever_co_enqueue_theme_styles', 11);

/* Add your child theme's code snippets below */


function ever_co_add_other_styles() {
   // Register Bootstrap
   wp_enqueue_style( 'bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    // Add tiny slider
    wp_enqueue_script( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, null, true );
   // Add custom js
   wp_enqueue_script( 'ever-child-script', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.01', true );
    // Add custom slider js
   wp_enqueue_script( 'ever-co-slider-script', get_stylesheet_directory_uri() . '/assets/js/ever-co-slider.js', array( ), '1.00', true );

}
add_action( 'wp_enqueue_scripts', 'ever_co_add_other_styles');


/* Dequeue unnecessary css files to improve performance */

function ever_co_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'ever' );
    wp_deregister_style( 'ever' );
}
//add_action( 'wp_print_styles', 'ever_co_dequeue_unnecessary_styles' );

/*Create a new custom post type called Customer Company Types */
require_once( get_stylesheet_directory() . '/custom-post-types/customer-company-types.php');

/*Create a new custom post type called Customer Business Verticals */
require_once( get_stylesheet_directory() . '/custom-post-types/customer-business-verticals.php');

require_once( get_stylesheet_directory() . '/custom-post-types/team-members.php');

/* Enable core custom fields */

 add_filter('acf/settings/remove_wp_meta_box', '__return_false');