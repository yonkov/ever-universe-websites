<?php

function gauzy_features_post_type() {
	$labels = array(
		'name'                => __( 'Features' ),
		'singular_name'       => __( 'feature'),
		'menu_name'           => __( 'Features'),
		'parent_item_colon'   => __( 'Parent Features'),
		'all_items'           => __( 'All Features'),
		'view_item'           => __( 'View Features'),
		'add_new_item'        => __( 'Add Feature'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Feature'),
		'update_item'         => __( 'Update Feature'),
		'search_items'        => __( 'Search Feature'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Features'),
		'description'         => __( 'Features of Gauzy Platform'),
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
	register_post_type( 'Features', $args );
}
add_action( 'init', 'gauzy_features_post_type', 0 );

/* Create Shortcode to display Customer Business Verticals archives */

function gauzy_features(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Features',
        // 'orderby' => 'title'
    );
    $recent->query( $query ); ?>

    <div class="e-row-wrap">
        <!--Columns-->
    <?php while( $recent->have_posts() ) : $recent->the_post();
        $dark_icon = get_field("feature_icon_light_theme");
        $light_icon = get_field("feature_icon_dark_theme");
        $size = "full";
       ?>	
  
        <div class="feature-card ">

            <?php /* If there is a featured image, display it */
                
                if (  $dark_icon || $light_icon ) {
                    echo wp_get_attachment_image( $dark_icon, $size,"",["class"=>"dark-features-icon"] );
                    echo wp_get_attachment_image( $light_icon, $size,"",["class"=>"light-features-icon"] );

                }
            ?>
              
            <div class="">  
             <h4><?php the_title(); ?></h4>

               <p><?php the_excerpt();?></p>
              
               <div class="features-extra ">
                    <div class="features-colored-block e-row">
                        <div class="blue"></div>
                        <div class="red"></div>
                        <div class="l-blue"></div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="w-arrow">Read More</a>
                </div>
            </div>

			
          
        </div>        
        
    <?php endwhile; wp_reset_postdata(); ?>
    
    </div>


    <?php return ob_get_clean(); 
}

add_shortcode( 'gauzy_features', 'gauzy_features' );


function gauzy_features_slider(){
    global $post;
    ob_start();
    $recent = new WP_Query(); 
    $query = array( 
        'post_type' => 'Features',
    );
    $recent->query( $query ); ?>
<div class="home-features-slider">
    <div class="ever-container-b swiper-container features-slider-container">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="features-slider swiper-wrapper">
        <?php while( $recent->have_posts() ) : $recent->the_post();
        // Get dark/white icons

        $dark_icon = get_field("feature_icon_light_theme");
        $light_icon = get_field("feature_icon_dark_theme");
        $size = "full";
        
        ?>	
            <div class="feature-slide swiper-slide text-center">
                <a href="<?php the_permalink(); ?> " class="e-col align-center ">
                    <?php /* If there is a featured image, display it */
                
                        if (  $dark_icon || $light_icon ) {
                            echo wp_get_attachment_image( $dark_icon, $size,"",["class"=>"dark-features-icon"] );
                            echo wp_get_attachment_image( $light_icon, $size,"",["class"=>"light-features-icon"] );

                        }
                    ?>
                        <p><?php the_title(); ?></p>
                </a>
            </div>        
        <?php endwhile; wp_reset_postdata(); ?>
        
        </div>
    </div>
</div>
    <?php return ob_get_clean(); 
}

add_shortcode( 'gauzy_features_slider', 'gauzy_features_slider' );


