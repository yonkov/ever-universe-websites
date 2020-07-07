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
		'capability_type'     => 'page',
		'rewrite'     => array( 'slug' => 'verticals' )
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

add_shortcode( 'ever_co_business_verticals', 'ever_co_business_verticals' );