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
                <p><?php the_content(); ?></p>
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
    <!--Slider Arrows -->
    <div class="client-feedback-arrows">
        <svg class="prev" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
            <path id="arrow" data-name="arrow" transform="translate(16 15) rotate(180)" d="M1,8H12.865L9.232,12.36a1,1,0,0,0,1.537,1.28l5-6a.936.936,0,0,0,.087-.154.947.947,0,0,0,.071-.124A.986.986,0,0,0,16,7V7a.986.986,0,0,0-.072-.358.947.947,0,0,0-.071-.124.936.936,0,0,0-.087-.154l-5-6A1,1,0,0,0,9.232,1.64L12.865,6H1A1,1,0,0,0,1,8" fill="#fff"></path>
        </svg>
        <svg class="next" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
            <path id="arrow" data-name="arrow" d="M1,8H12.865L9.232,12.36a1,1,0,0,0,1.537,1.28l5-6a.936.936,0,0,0,.087-.154.947.947,0,0,0,.071-.124A.986.986,0,0,0,16,7V7a.986.986,0,0,0-.072-.358.947.947,0,0,0-.071-.124.936.936,0,0,0-.087-.154l-5-6A1,1,0,0,0,9.232,1.64L12.865,6H1A1,1,0,0,0,1,8" fill="#fff"></path>
        </svg>
    </div>
    <?php return ob_get_clean(); 
}
/* Register the function as a shortcode to use anywhere you want in the WordPress editor */
add_shortcode( 'ever_testimonials', 'ever_testimonials' );