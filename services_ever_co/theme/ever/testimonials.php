<?php
function ever_testimonials_custom_post_type() {
	$labels = array(
		'name'                => __( 'Testimonials' ),
		'singular_name'       => __( 'Testimonial'),
		'menu_name'           => __( 'Testimonials'),
		'parent_item_colon'   => __( 'Parent Testimonial'),
		'all_items'           => __( 'All Testimonials'),
		'view_item'           => __( 'View Testimonial'),
		'add_new_item'        => __( 'Add New Testimonial'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Testimonial'),
		'update_item'         => __( 'Update Testimonial'),
		'search_items'        => __( 'Search Testimonial'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Testimonials'),
		'description'         => __( 'Best Ever Testimonials'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
            //Allow for taxonomies categories and tags
		'taxonomies' 	      => array('post_tag', 'category'),
		'publicly_queryable'  => true,
		'capability_type'     => 'page'
);
	register_post_type( 'Testimonials', $args );
}
add_action( 'init', 'ever_testimonials_custom_post_type', 0 );

function ever_testimonials(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Testimonials',
        'order'   => 'ASC'
    );
    $recent->query( $query ); ?>
    <div class="clients-feedback row">
        <?php while( $recent->have_posts() ) : $recent->the_post(); ?>
        <div class="person-card col"> 
            <?php /* If there is a featured image, display it */
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('small'); 
                }
            ?>
            <div class="feedback-txt">
                <p><?php the_excerpt(); ?></p>
                <div class="row">
                    <div class="feedback-company-name">
                <h5><?php the_title(); ?></h5>
                <?php 
                    $company = get_post_meta($post->ID, 'company', true);
                    $country = get_post_meta($post->ID, 'country', true);
                ?>
                <span class="ever-meta">Company: <?php echo $company; ?></span>
                <br>
                <span class="ever-meta">Country: <?php echo $country; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php return ob_get_clean(); 
}
/* Register the function as a shortcode to use anywhere you want in the WordPress editor */
add_shortcode( 'ever_testimonials', 'ever_testimonials' );