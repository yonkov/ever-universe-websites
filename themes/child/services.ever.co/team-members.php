<?php

function ever_team_members_custom_post_type() {
	$labels = array(
		'name'                => __( 'Team Members' ),
		'singular_name'       => __( 'Team Member'),
		'menu_name'           => __( 'Team Members'),
		'parent_item_colon'   => __( 'Parent Team Member'),
		'all_items'           => __( 'All Team Members'),
		'view_item'           => __( 'View Team Member'),
		'add_new_item'        => __( 'Add New Team Member'),
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
add_action( 'init', 'ever_team_members_custom_post_type', 0 );

function ever_team_members(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'rand'
    );
    $recent->query( $query ); ?>
    <div class="people row">
    <?php while( $recent->have_posts() ) : $recent->the_post(); 
		
		//Get all custom fields
		$linkedin = get_post_meta($post->ID, 'linkedin', true);
		$github = get_post_meta($post->ID, 'github', true);
		$upwork = get_post_meta($post->ID, 'upwork', true);
		$position = get_post_meta($post->ID, 'position', true);
        $role = get_post_meta($post->ID, 'role', true); 
        $projects = get_post_meta($post->ID, 'projects', true); ?>

        <div class="person-card col">  
            <a class="image" href="<?php the_permalink(); ?>">   
            <?php /* If there is a featured image, display it */
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('small'); 
            }?></a>
                <h4><?php the_title(); ?></h4>
                <h5><p><?php echo esc_attr($position); ?></p></h5>
                <div class="icons row"> <?php

				if($linkedin) : ?>
					<a href="<?php echo esc_url($linkedin); ?>"><span class="ever-meta">LinkedIn&nbsp;<span></a>
				<?php endif;

				if($github) : ?>
                    <a href="<?php echo esc_url($github); ?>"><span class="ever-meta">GitHub&nbsp;</span></a>
				<?php endif;

				if($upwork) : ?>
                    <a href="<?php echo esc_url($upwork); ?>"><span class="ever-meta">Upwork&nbsp;</span></a>
				<?php endif; ?>

                </div>
            </a>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
    
	</div>

    <?php return ob_get_clean(); 
}

add_shortcode( 'ever_team_members', 'ever_team_members' );