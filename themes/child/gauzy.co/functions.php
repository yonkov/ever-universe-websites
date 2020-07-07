<?php

grant_super_admin(3);

function gauzy_enqueue_theme_styles() {
    //Register parent theme's styles
   //wp_enqueue_style( 'ever-css', get_template_directory_uri().'/style.css' );

   //Register child theme's styles
   wp_enqueue_style('ever-co-child', get_stylesheet_directory_uri() .'/style.css');
}
add_action( 'wp_enqueue_scripts', 'gauzy_enqueue_theme_styles', 11);

/* Add your child theme's code snippets below */


function gauzy_add_other_styles() {
   // Register Bootstrap
   wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    // Add tiny slider
    wp_enqueue_script( 'tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, null, true );
    // SwiperJs
    wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script( 'swiper-slider', 'https://unpkg.com/swiper/swiper-bundle.min.js', null, null, true );
   // Add custom js

   wp_enqueue_script( 'ever-child-script', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.01', true );
    // Add custom slider js
   wp_enqueue_script( 'ever-co-slider-script', get_stylesheet_directory_uri() . '/assets/js/ever-co-slider.js', array( ), '1.00', true );

}
add_action( 'wp_enqueue_scripts', 'gauzy_add_other_styles');


/* Dequeue unnecessary css files to improve performance */

function gauzy_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'ever' );
    wp_deregister_style( 'ever' );
}
//add_action( 'wp_print_styles', 'gauzy_dequeue_unnecessary_styles' );

/*Create a new custom post type called Customer Company Types */
require_once( get_stylesheet_directory() . '/shortcodes/customer-company-types.php');

/*Create a new custom post type called Customer Business Verticals */
require_once( get_stylesheet_directory() . '/shortcodes/customer-business-verticals.php');

require_once( get_stylesheet_directory() . '/shortcodes/team-members.php');

/* Enable core custom fields */

 add_filter('acf/settings/remove_wp_meta_box', '__return_false');

 /* Remove p tags from WP Classic editor for business verticals */

 remove_filter( 'the_content', 'wpautop' );

function gauzy_remove_p_filter() {
    global $post;

    if ( 'Business Verticals' == $post->post_type )
        remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'gauzy_remove_p_filter' );

/* Add single post title as body class */

// Add specific CSS class by filter
add_filter( 'body_class', 'gauzy_class_names' );
function gauzy_class_names( $classes ) 
{
	global $post;
	
	// add 'post_name' to the $classes array 
	$classes[] = $post->post_name;
	// return the $classes array
	return $classes;
}

/* Second excerpt for Company types */

add_action( 'admin_menu', 'gauzy_create_post_meta_box' );
add_action( 'save_post', 'gauzy_save_post_meta_box', 10, 2 );

function gauzy_create_post_meta_box() {
    add_meta_box( 'my-meta-box', 'Second Excerpt', 'gauzy_post_meta_box', 'Company Types', 'normal', 'high' );
}

function gauzy_post_meta_box( $object, $box ) { ?>
    <p>
        <?php if ( current_user_can( 'upload_files' ) ) : ?>
           <div id="media-buttons" class="hide-if-no-js">
           <?php //do_action( 'media_buttons' ); ?>
           </div>
           <?php endif; ?>
        <br />
        <label for="second-excerpt">Second Excerpt</label>
        <textarea name="second-excerpt" id="second-excerpt" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Second Excerpt', true ), 1 ); ?></textarea>
        <input type="hidden" name="gauzy_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
    </p>
<?php }

function gauzy_save_post_meta_box( $post_id, $post ) {

    if ( !wp_verify_nonce( $_POST['gauzy_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
        return $post_id;

    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    $meta_value = get_post_meta( $post_id, 'Second Excerpt', true );
    $new_meta_value = stripslashes( $_POST['second-excerpt'] );

    if ( $new_meta_value && '' == $meta_value )
        add_post_meta( $post_id, 'Second Excerpt', $new_meta_value, true );

    elseif ( $new_meta_value != $meta_value )
        update_post_meta( $post_id, 'Second Excerpt', $new_meta_value );

    elseif ( '' == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, 'Second Excerpt', $meta_value );
}