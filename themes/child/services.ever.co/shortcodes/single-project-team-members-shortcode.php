<?php

function ever_team_members_single_project(){

    global $post;
    ob_start();
    // Get project title
    $project_title = esc_html( get_the_title() );

    /***
    * query core team members
    */

    $core_query = new WP_Query(); 
    $core_members_query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'projects',
            'value' => $project_title,
            'compare' => 'LIKE'
            ),
        array(
            'key' => 'role',
            'value' => 'core',
            'compare' => 'LIKE'
            )
        )
    );
    $core_query ->query( $core_members_query );

    /***
    * query developers
    */

    $developers_query = new WP_Query(); 
    $developer_members_query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'projects',
            'value' => $project_title,
            'compare' => 'LIKE'
            ),
        array(
            'key' => 'role',
            'value' => 'developer',
            'compare' => 'LIKE'
            )
        )
    );
    $developers_query->query( $developer_members_query );

    /***
    * query designers and qa
    */

    $designers_query = new WP_Query(); 
    $designer_members_query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'projects',
            'value' => $project_title,
            'compare' => 'LIKE'
            ),
        array(
            'key' => 'role',
            'value' => 'designer',
            'compare' => 'LIKE'
            )
        )
    );
    $designers_query->query( $designer_members_query );


    /***
    * query contractors
    */

    $contractors_query = new WP_Query();
    $contractor_members_query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'projects',
            'value' => $project_title,
            'compare' => 'LIKE'
            ),
        array(
            'key' => 'role',
            'value' => 'contractor',
            'compare' => 'LIKE'
            )
        )
    );
    $contractors_query->query( $contractor_members_query ); ?>

    <!--Start of team container-->
    <div class="about team-w-ninjas-container">
        <!--Core Team Members-->
        <div class="h-titles-w-b col">
            <h2>Core</h2>
            <hr>
        </div>
        <div class="people row">
        
        <?php while( $core_query->have_posts() ) : $core_query->the_post(); 

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
                }?>
                <h4><?php the_title(); ?></h4></a>
                
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

            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        
        </div>

        <!--Developers Team Members-->
        <div class="h-titles-w-b col">
            <h2>Developers</h2>
            <hr>
        </div>
        
        <div class="people row">
        
        <?php while( $developers_query->have_posts() ) : $developers_query->the_post(); 

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
                }?>
                <h4><?php the_title(); ?></h4></a>
                
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

            </div>

        <?php endwhile; wp_reset_postdata(); ?>
        
        </div>

        <!--Designers Team Members-->
        <div class="h-titles-w-b col">
            <h2>Designer & QA</h2>
            <hr>
        </div>

        <div class="people row">
        
        <?php while( $designers_query->have_posts() ) : $designers_query->the_post(); 

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
                }?>
                <h4><?php the_title(); ?></h4></a>
                
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

            </div>
        
        <?php endwhile; wp_reset_postdata(); ?>
        
        </div>

        <?php if ($contractors_query->have_posts()) : ?>
        <!--Contractors Team Members-->
        <div class="h-titles-w-b col">
            <h2>Contractors</h2>
            <hr>
        </div>
       <?php endif;  ?>
        <div class="people row">
        
        <?php while( $contractors_query->have_posts() ) : $contractors_query->the_post(); 

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
                }?>
                <h4><?php the_title(); ?></h4></a>
                
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

            </div>

        <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <a href="/hire-us"
            <button class="hire-us-btn">
            HIRE US
            </button>
        </a>
        <br>
        <a href="/projects">SEE MORE PROJECTS</a>
    </div> <!--End of team container-->

    <?php return ob_get_clean(); 
}

add_shortcode( 'ever_team_members_single_project', 'ever_team_members_single_project' );