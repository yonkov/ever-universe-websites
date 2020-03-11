<?php
/* 
* Shortcode to display all projects associated with a particular employee
* Can be used on single teammember page
*/

function ever_teammember_projects() {
    global $post;
    // Instantate on object. We need this for the shortcode to work
    ob_start();

    // Get the categories with ids 2 and 3 from the Custom Post Type Projects
    // Include categories that correspond to the other languages
    $cat_args = array(
    'include' => '2,3, 48, 50, 52, 54',
    'post_type' => 'Projects',
    'orderby' => 'id',
    'order' => 'ASC'
    ); 
    
    //Get team member project names
    $projects = get_post_meta($post->ID, 'projects', false);

    $categories = get_categories($cat_args);
        // Loop through these two specific categories and deliver the projects
        foreach ($categories as $category) {

            ?>
            <div class="projects-container">
                <h3 class="title"><?php echo $category->name; ?>
                    <?php echo __(' projects', 'ever')?></h3>
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
            $project_list = new WP_Query($project_args); ?>

                <?php //Start project query

                while ($project_list -> have_posts()) : $project_list -> the_post();
                
                //Loop through the list of projects associated with a particular employee
                
                foreach($projects as $project) {
                
                //Get the project title
                $project_title = esc_html( get_the_title() );
                
                //Compare the project title with the values in the team member's projects list
                
                if($project==$project_title) {
                
                ?>
                
                <article class="row">
                    <div class="projects-slider">
                        <?php scaffold_thumbnail(); //Default project thumbnail
                            
                        if (class_exists('MultiPostThumbnails')) : //Second project thumbnail ?>
                        
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); ?>
                            </a>
                        </div>
                        
                        <?php endif; ?>
                    </div>   
                        <section>
                            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                <p>
                                    <i><?php the_excerpt(); ?></i>
                                </p>
                                <div class="project-icons">
                                    <?php //Get all techstack icons 
                                    ever_get_techstack_project_icons() ?>
                                </div>
                                
                                <a href="<?php echo esc_url( get_permalink() )?>" class="yellow-link" rel="bookmark">
                                    Visit Project
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
                                        <path id="link-arrow" data-name="link-arrow"
                                            d="M1,8H12.865L9.232,12.36a1,1,0,0,0,1.537,1.28l5-6a.936.936,0,0,0,.087-.154.947.947,0,0,0,.071-.124A.985.985,0,0,0,16,7s0,0,0,0,0,0,0,0a.985.985,0,0,0-.072-.358.947.947,0,0,0-.071-.124.936.936,0,0,0-.087-.154l-5-6A1,1,0,0,0,9.232,1.64L12.865,6H1A1,1,0,0,0,1,8"
                                            fill="#b8a633" ></path>
                                    </svg>
                                </a>
                        </section>
                        <div class="github-rate col">
                            <?php //Display the statistics
                                ever_get_project_stats() ?>
                        </div>
                </article>

                <?php 
                
                } // End team member project check
            
            }// End projects for a particular employee loop
            
            endwhile; //End project query
            
            wp_reset_postdata(); //Clean up data ?>
            
            </div>
            
        <?php
        
    } //End category loop ?>
    <?php return ob_get_clean();
}

add_shortcode('ever_teammember_projects', 'ever_teammember_projects');