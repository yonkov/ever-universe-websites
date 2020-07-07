<?php

/*
 * Shortcode that displays team members on the about page.
 * It has two queries - one for all the employees 
 * and one for all the contractors
 * 
 */


function ever_team_members_about(){
    
    global $post;
    
    ob_start();
    
    /***
    * query employees
    */

    $employees_query = new WP_Query();

    $employees_members_query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'rand',
        'meta_query' => array(
        array(
            'key' => 'role',
            'value' => array('core', 'designer', 'developer'),
            'compare' => 'IN'
            )
        )
    );

    $employees_query ->query( $employees_members_query );

    /***
    * query contractors
    */

    $contractors_query = new WP_Query();
    $contractor_members_query = array( 
        'post_type' => 'Team Members',
        'orderby' => 'rand',
        'meta_query' => array(
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
        <!--Employees-->
        <div class="h-titles-w-b col">
            <h2>Our Employees</h2>
            <hr>
        </div>
        <div class="people row">
        <?php while( $employees_query->have_posts() ) : $employees_query->the_post(); 

            //Get social media custom fields
            $linkedin = get_post_meta($post->ID, 'linkedin', true);
            $github = get_post_meta($post->ID, 'github', true);
            $upwork = get_post_meta($post->ID, 'upwork', true);
			$position = get_post_meta($post->ID, 'position', true); ?>

            <div class="person-card col">  
                <a class="image" href="<?php the_permalink(); ?>">
                <?php /* If there is a featured image, display it */
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('small'); 
                }?>
                
				<h4><?php the_title(); ?></h4>
				</a>
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

       <!--Contractors-->
        <div class="h-titles-w-b col">
            <h2>Our Contractors</h2>
            <hr>
        </div>
        
        <div class="people row">
        
        <?php while( $contractors_query->have_posts() ) : $contractors_query->the_post(); 

            //Get social media custom fields
            $linkedin = get_post_meta($post->ID, 'linkedin', true);
            $github = get_post_meta($post->ID, 'github', true);
            $upwork = get_post_meta($post->ID, 'upwork', true); 
			$position = get_post_meta($post->ID, 'position', true); ?>

            <div class="person-card col">  
                <a class="image" href="<?php the_permalink(); ?>">
                <?php /* If there is a featured image, display it */
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('small'); 
                }?>
                
				<h4><?php the_title(); ?></h4>
				</a>
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
        <!--Call to action-->
        <div class="btns row">
            <a class="join-btn" href="/careers">Join Our team</a>
            <a class="hire-us-btn" href="/hire-us">Hire us</a>
        </div>

    </div>

    <?php return ob_get_clean(); 
}

add_shortcode( 'ever_team_members_about', 'ever_team_members_about' );