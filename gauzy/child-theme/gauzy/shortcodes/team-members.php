<?php

function gauzy_team_member_custom_post_type() {
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
//add_action( 'init', 'gauzy_team_member_custom_post_type', 0 );

/* Create Shortcode to display Customer Business Verticals archives */

function gauzy_team_members(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'title'
    );
    $recent->query( $query ); ?>
<div class="ever-container-b">
    <div class="row  text-center justify-content-center">
        <!--Columns-->
    <?php while( $recent->have_posts() ) : $recent->the_post();

		//Get social media custom fields
        $linkedin = get_post_meta($post->ID, 'linkedin', true);
        $github = get_post_meta($post->ID, 'github', true);
        $upwork = get_post_meta($post->ID, 'upwork', true);
		$position = get_post_meta($post->ID, 'position', true); ?>	

        <div class="core-card ">

            <?php /* If there is a featured image, display it */
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('small'); 
                }
            ?>
              
              <div class="main-title-container">  
                <h4><?php the_title(); ?></h4>

               <?php the_excerpt();?>
              
            </div>

				<div class="icons"> <?php
					if($github) : ?>
                        <a href="<?php echo esc_url($github); ?>"><span class="ever-meta-l">
                        <svg width="26" height="26" viewBox="0 0 26 26" class="ever-bottom-logo">
                            <path fill="var(--details-color)" d="M13 0C5.82 0 0 5.82 0 13s5.82 13 13 13 13-5.82 13-13S20.18 0 13 0zm3.642 22.904c-.075-1.018-.159-2.278-.164-2.788-.032-.392-.075-1.388-1.02-2.024 3.754-.315 5.54-2.39 5.67-5.132.107-1.561-.514-2.935-1.617-4.043.056-1.185-.035-2.59-.112-3.207-.846-.244-2.82.798-3.372 1.244-1.164-.452-4.012-.61-5.742 0C9.058 6.091 7.66 5.558 6.9 5.707c-.703 1.558-.251 3.03-.114 3.205-.905.828-2.168 1.846-1.825 3.978.55 3.128 2.75 4.814 6.293 5.227-.756.155-.883.718-.947.963-2.379.981-3.059-.606-3.36-1.02-.998-1.236-1.894-.877-1.95-.858-.053.02-.094.098-.088.135.05.267.594.537.62.56.738.548 1.01 1.54 1.179 1.823 1.057 1.738 3.514 1.017 3.538 1.032.001.152-.018 1.43-.032 2.426-4.48-1.223-7.777-5.31-7.777-10.178C2.437 7.166 7.167 2.438 13 2.438c5.834 0 10.562 4.728 10.562 10.562 0 4.552-2.884 8.419-6.92 9.904z" />
                        </svg>
                        </span></a>
					<?php endif;

                    if($upwork) : ?>
                        <a href="<?php echo esc_url($upwork); ?>">
                            <span class="ever-meta-l">
                                <svg width="34" height="24" viewBox="0 0 34 24" class="ever-bottom-logo">
                                    <path fill="var(--details-color)" fill-rule="evenodd" d="M26.102 13.714c-1.542 0-2.988-.65-4.301-1.712l.319-1.501.01-.059c.29-1.595 1.188-4.27 3.972-4.27 2.085 0 3.78 1.691 3.78 3.772 0 2.079-1.695 3.77-3.78 3.77zm-.33-11.562c-3.492 0-6.203 2.327-7.302 6.158-1.677-2.587-2.953-5.693-3.694-8.31h-3.762v10.032c-.002 1.983-1.569 3.59-3.502 3.593-1.932-.004-3.498-1.61-3.5-3.593V0H.25v10.032c0 4.109 3.259 7.48 7.262 7.48 4.005 0 7.264-3.371 7.264-7.48v-1.68c.728 1.562 1.625 3.144 2.714 4.543L15.19 24h3.846l1.669-8.054c1.46.958 3.141 1.565 5.067 1.565 4.125 0 7.479-3.459 7.479-7.688 0-4.231-3.354-7.671-7.479-7.671z"/>
                                </svg>
                            </span>
                        </a>
					<?php endif;
					
                        
					if($linkedin) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>"><span class="ever-meta-l">
                        <svg width="26" height="26" viewBox="0 0 26 26" class="ever-bottom-logo">
                            <g >
                                <path fill="var(--details-color)" d="M25.594 25.6v-.001h.006V16.21c0-4.593-.989-8.131-6.358-8.131-2.582 0-4.314 1.416-5.021 2.76h-.075V8.507H9.055v17.09h5.301v-8.462c0-2.228.423-4.383 3.182-4.383 2.72 0 2.76 2.543 2.76 4.526V25.6h5.296zM.422 8.509L5.73 8.509 5.73 25.6.422 25.6zM3.074 0C1.377 0 0 1.377 0 3.074c0 1.697 1.377 3.103 3.074 3.103 1.697 0 3.074-1.406 3.074-3.103C6.148 1.377 4.77 0 3.074 0z"/>
                            </g>
                        </svg>
                        <span></a>

                    <?php endif; ?>

				</div>
          
        </div>        
        
    <?php endwhile; wp_reset_postdata(); ?>
    
	</div>

</div>
    <?php return ob_get_clean(); 
}

add_shortcode( 'gauzy_team_members', 'gauzy_team_members' );