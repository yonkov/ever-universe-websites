<?php

function ever_co_team_member_custom_post_type() {
	$labels = array(
		'name'                => __( 'Team Members' ),
		'singular_name'       => __( 'Team Member'),
		'menu_name'           => __( 'Team Members'),
		'parent_item_colon'   => __( 'Parent Team Member'),
		'all_items'           => __( 'All Team Members'),
		'view_item'           => __( 'View Team Member'),
		'add_new_item'        => __( 'Add Team Member'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Team Member'),
		'update_item'         => __( 'Update Team Member'),
		'search_items'        => __( 'Search Team Member'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Team Members'),
		'description'         => __( 'Best Ever Team Members'),
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
	register_post_type( 'Team Members', $args );
}
add_action( 'init', 'ever_co_team_member_custom_post_type', 0 );

/* Create Shortcode to display Customer Business Verticals archives */

function ever_co_team_members(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'title'
    );
    $recent->query( $query ); ?>
<div class="container">
    <div class="row  text-center justify-content-center">
        <!--Columns-->
    <?php while( $recent->have_posts() ) : $recent->the_post(); ?>

        <div class="col-2 core-card mr-3 col-md-3">
            
            

        
                    <?php /* If there is a featured image, display it */
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('small'); 
                        }
                    ?>
              
              <div class="main-title-container mt-2 mb-4">  
                <h4><?php the_title(); ?></h4>

               <?php the_excerpt();?>
              
            </div>
          
        
        </div>        
        
    <?php endwhile; wp_reset_postdata(); ?>
    
	</div>
</div>
    <?php return ob_get_clean(); 
}

add_shortcode( 'ever_co_team_members', 'ever_co_team_members' );


