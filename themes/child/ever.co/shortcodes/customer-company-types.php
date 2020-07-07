<?php

function ever_co_customer_company_type_custom_post_type() {
	$labels = array(
		'name'                => __( 'Company Types' ),
		'singular_name'       => __( 'Company Type'),
		'menu_name'           => __( 'Company Types'),
		'parent_item_colon'   => __( 'Parent Company Type'),
		'all_items'           => __( 'All Company Types'),
		'view_item'           => __( 'View Company Type'),
		'add_new_item'        => __( 'Add New Company Type'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Company Type'),
		'update_item'         => __( 'Update Company Type'),
		'search_items'        => __( 'Search Company Type'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Company Types'),
		'description'         => __( 'Best Ever Company Types'),
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
	register_post_type( 'Company Types', $args );
}
add_action( 'init', 'ever_co_customer_company_type_custom_post_type', 0 );

/* Create Shortcode to display Customer Company Types archives */

function ever_co_company_types(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Company Types',
        'orderby' => 'publish_date', 
		'order' => 'ASC'
    );
    $recent->query( $query ); ?>


    
	<div class="text-center m-auto slider">

	<?php  while(  $recent->have_posts() ) : $recent->the_post(); ?>

    <?php $second_excerpt = get_post_meta( get_the_ID(), 'Second Excerpt', true ); ?>
	
        <!--Columns-->
        <div class="customer-card">
            
			<div class="customer-text">

                <div class="oval-icons">
				
				<?php /* If there is a featured image, display it */
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('small'); 
				}?>
                
                </div>
				
				<h4><?php the_title(); ?></h4>
                
				<h5><?php the_excerpt(); ?></h5>

                <?php echo wp_kses( $second_excerpt, 
                    // Only allow <div>, <ul>, and <li> tags - nothing else allowed!
                    array(
                        'div' => array(
                        // Here, we whitelist 'class' attribute - nothing else allowed!
                        'href' => array(),
                        'class' => array()
                        ),
                        'ul' => array(),
                        'li' => array()
                    )
                ); ?>

                <a href="<?php the_permalink(); ?>">
                    <button class="btn btn-light btn-lg ever-button transparent-btn-ever">Explore</button>
                </a>
            
			</div>
        
		</div>
        
    <?php endwhile; wp_reset_postdata(); ?>
	</div>
<div class="client-feedback-arrows">
    <svg class="ever-co-prev"
        xmlns="http://www.w3.org/2000/svg" width="28.542" height="46.222" viewBox="0 0 28.542 60">
        <g id="icon_arrow_company_type" transform="translate(28.542 46.222) rotate(180)">
            <path id="arrow" d="M11.431,7.84l17.68,17.641L46.791,7.84l5.431,5.431L29.111,36.382,6,13.271Z" transform="translate(-7.84 52.222) rotate(-90)" fill="#DFE9F3"/>
        </g>
    </svg>
    <svg class="ever-co-next"
        xmlns="http://www.w3.org/2000/svg" width="28.542" height="46.222" viewBox="0 0 28.542 60">
        <g id="icon_arrow_company_type" transform="translate(0 0) rotate(0)">
            <path id="arrow" d="M11.431,7.84l17.68,17.641L46.791,7.84l5.431,5.431L29.111,36.382,6,13.271Z" transform="translate(-7.84 52.222) rotate(-90)" fill="#DFE9F3"/>
        </g>
    </svg>
</div>
	

    <?php return ob_get_clean(); 
}

add_shortcode( 'ever_co_company_types', 'ever_co_company_types' );