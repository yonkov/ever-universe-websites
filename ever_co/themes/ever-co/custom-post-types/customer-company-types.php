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


    
	<div class="row flex-nowrap text-center m-auto slider">

	<?php  while(  $recent->have_posts() ) : $recent->the_post(); ?>
	
        <!--Columns-->
        <div class="col-sm-4 mr-2 customer-card">
            
			<div class="ml-2 mr-2">

                <div class="oval-icons">
				
				<?php /* If there is a featured image, display it */
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('small'); 
				}?>
                
                </div>
				
				<h4><?php the_title(); ?></h4>
                
				<h5><?php the_excerpt(); ?></h5>

                <?php the_content();?>

                <a href="<?php the_permalink(); ?>">
                    <button class="btn btn-light btn-lg ever-button transparent-btn-ever">Explore</button>
                </a>
            
			</div>
        
		</div>
        
    <?php endwhile; wp_reset_postdata(); ?>
	</div>
	<div class="client-feedback-arrows">
        <svg class="ever-co-prev" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
            <path id="arrow" data-name="arrow" transform="translate(16 15) rotate(180)" d="M1,8H12.865L9.232,12.36a1,1,0,0,0,1.537,1.28l5-6a.936.936,0,0,0,.087-.154.947.947,0,0,0,.071-.124A.986.986,0,0,0,16,7V7a.986.986,0,0,0-.072-.358.947.947,0,0,0-.071-.124.936.936,0,0,0-.087-.154l-5-6A1,1,0,0,0,9.232,1.64L12.865,6H1A1,1,0,0,0,1,8" fill="#000"></path>
        </svg>
        <svg class="ever-co-next" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
            <path id="arrow" data-name="arrow" d="M1,8H12.865L9.232,12.36a1,1,0,0,0,1.537,1.28l5-6a.936.936,0,0,0,.087-.154.947.947,0,0,0,.071-.124A.986.986,0,0,0,16,7V7a.986.986,0,0,0-.072-.358.947.947,0,0,0-.071-.124.936.936,0,0,0-.087-.154l-5-6A1,1,0,0,0,9.232,1.64L12.865,6H1A1,1,0,0,0,1,8" fill="#000"></path>
        </svg>
    </div>
	

    <?php return ob_get_clean(); 
}

add_shortcode( 'ever_co_company_types', 'ever_co_company_types' );