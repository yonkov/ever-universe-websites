<?php
// Creating a Projects Custom Post Type

function ever_projects_custom_post_type() {
	$labels = array(
		'name'                => __( 'Projects' ),
		'singular_name'       => __( 'Project'),
		'menu_name'           => __( 'Projects'),
		'parent_item_colon'   => __( 'Parent Project'),
		'all_items'           => __( 'All Projects'),
		'view_item'           => __( 'View Project'),
		'add_new_item'        => __( 'Add New Project'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Project'),
		'update_item'         => __( 'Update Project'),
		'search_items'        => __( 'Search Project'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Projects'),
		'description'         => __( 'Best Ever Projects'),
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
	register_post_type( 'Projects', $args );
}
add_action( 'init', 'ever_projects_custom_post_type', 0 );

/* Query the last two projects from categories open-source and customers */

function ever_recent_projects($atts) {
global $post;
// Instantate on object. We need this for the shortcode to work
ob_start();
$atts = shortcode_atts(
array( /* Display the 4 latest posts */
        'posts_per_page' => '4',
), $atts, 'ever_recent_projects' );

// Get the categories with ids 2 and 3 from the Custom Post Type Projects
// Include categories that correspond to the other languages
$cat_args = array(
	'include' => '2,3, 48, 50, 52, 54',
	'post_type' => 'Projects',
	'orderby' => 'id',
	'order' => 'ASC'
); ?>
<div class="h-second col">
  <div class="row">
<?php $categories = get_categories( $cat_args );
// Loop through these two specific categories and deliver the projects
foreach ($categories as $category) {
?>
    <!-- Get the category title -->
      <section class="col">
        <h3 class="title"><?php echo __('Our', 'ever')?> <?php echo $category->name; ?> <?php echo __(' projects', 'ever')?></h3>
          <?php
                          // Get the two latest projects from each specific category
              $project_args = array(
                  'post_type' => 'Projects',
                  'orderby'      => 'ID',
                  'order'         => 'ASC',
                  'post_status'   => 'publish',
                  'posts_per_page' => 2,
                  'category_name' => $category->slug //passing the slug of the current category
              );
              $project_list = new WP_Query ( $project_args );
          ?>

          <?php while ( $project_list -> have_posts() ) : $project_list -> the_post(); ?>
            
            <?php //Get the custom meta field statistics for a project:
                $stats = json_decode(get_post_meta($post->ID, 'statistics', true));
                //Get all meta fields
                $meta = get_post_meta($post->ID);
                ?>
                
          <div class="project col">
              <a class="row" href="<?php the_permalink(); ?>">
                  <?php /* If there is a featured image, display it */
      if ( has_post_thumbnail() ) {
          the_post_thumbnail('medium'); 
      }?>
              </a>
              <a class="project-descr" href="<?php the_permalink(); ?>">
                  <?php //Display the statistics
                  if (isset($stats)) { 
                     foreach($stats as $stat) { ?>
                        <span class="ever-meta"><?php echo $stat->name;?> </span> 
                        <?php echo '<img src="'.$stat->imgUrl.'">';
                    } 
                  }?>
                  <h4><?php /*Get project title*/ the_title(); ?></h4>
                  <span><i><?php /*Get the excerpt content*/ the_excerpt(); ?></i></span>
                    <?php $post_tags = get_the_tags();
                    if ( $post_tags ) { ?> 
                    <div> <?php //Display all project tags
                        foreach( $post_tags as $tag ) {?>
                            <span class="ever-meta"><?php echo $tag->name;?>, </span> <?php
                        }
                    } ?>
                    </div>

                <?php //Display other post meta
                    foreach($meta as $key=>$val){
                        if ($key!=='statistics' && $key!=='_edit_lock'&& $key!=='_edit_last' && $key!=='_thumbnail_id' && $key!=='_wp_old_slug' && $key!=='_wp_old_slug_thumbnail_id'){
                            foreach($val as $vals){
                                echo '<img src="'.$vals.'">';
                            }
                        }  
                    }?>
              </a>
          </div>

          <?php endwhile; wp_reset_postdata(); ?>
      </section>
<?php
        }?>
    </div>
</div> <?php
		return ob_get_clean(); 
}

add_shortcode( 'ever_recent_projects', 'ever_recent_projects' );