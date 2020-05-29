<?php

function ever_co_customer_business_vertical_custom_post_type() {
	$labels = array(
		'name'                => __( 'Business Verticals' ),
		'singular_name'       => __( 'Business Vertical'),
		'menu_name'           => __( 'Business Verticals'),
		'parent_item_colon'   => __( 'Parent Business Vertical'),
		'all_items'           => __( 'All Business Verticals'),
		'view_item'           => __( 'View Business Vertical'),
		'add_new_item'        => __( 'Add New Business Vertical'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Business Vertical'),
		'update_item'         => __( 'Update Business Vertical'),
		'search_items'        => __( 'Search Business Vertical'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Business Verticals'),
		'description'         => __( 'Best Ever Business Verticals'),
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
	register_post_type( 'Business Verticals', $args );
}
add_action( 'init', 'ever_co_customer_business_vertical_custom_post_type', 0 );

/* Create Shortcode to display Customer Business Verticals archives */

function ever_co_business_verticals(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Business Verticals',
        'orderby' => 'publish_date', 
		'order' => 'ASC',
		'posts_per_page'=>'-1'
    );
    $recent->query( $query ); ?>
    <div class="row text-center  m-auto slider">
        <!--Columns-->
    <?php while( $recent->have_posts() ) : $recent->the_post(); ?>

        <div class="col business-card"
		     	<?php
  			// $solutionTypes = get_post_meta( get_the_ID(), 'business-type', false );
			  $new_solution_types = get_field('verticals', false);
  			
			  if( !empty( $new_solution_types ) ) {
    			foreach( $new_solution_types as $solutionType ) {
    		 		echo ' data-solution-'.$solutionType.'='.esc_attr($solutionType=$solutionType);
			
			}
 		 }
		?>
		>
             <div class="oval-icons">
				 <a href="<?php the_permalink(); ?>">
                    <?php 
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('small');  
                        }
                    ?>
					</a>
                </div>
                
                <h4><?php the_title(); ?></h4>
                <p class="card-descr"><?php the_excerpt();?></p>
                <a href="<?php the_permalink(); ?>">
                    <button class="btn btn-light btn-lg ever-button container-btn-ever">More</button>
                </a>
            
        
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

add_shortcode( 'ever_co_business_verticals', 'ever_co_business_verticals' );