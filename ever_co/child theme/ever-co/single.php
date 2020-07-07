<?php
/**
 * The template for displaying all single posts
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    ever
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

<div class="content-area">

    <?php
		while ( have_posts() ) :

			the_post();
			if( get_post_type() === 'teammembers' ) :
              get_template_part( 'template-parts/content', get_post_type() );

            elseif( get_post_type() === 'projects' ) :
              get_template_part( 'template-parts/content', get_post_type() );
        	
            else :
              get_template_part( 'template-parts/content', get_post_format() );
        	endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			if( get_post_type() !== 'teammembers' ) :
				
                //ever_the_post_navigation();
				
			endif;

			if( get_post_type() == 'businessverticals' ) :

				$recent = new WP_Query(); 
				$query = array( 
					'post_type' => 'Business Verticals',
					'orderby' => 'publish_date', 
					'order' => 'ASC',
					'posts_per_page'=>'-1'
				);
				$recent->query( $query ); ?>
    <div class="ever-container-b all-pages-slider-container">
    <div class="header-w-description-bv-container">
        <h2>Want to see even more?</h2>
        <p>Browse through our different verticals and find the one that best suits your needs </p>
    </div>
    <div class="swiper-container">
       <svg width="1101" height="1019" viewBox="0 0 1101 1019" class="single-verticals-svg">
        <defs>
            <linearGradient id="groceryGradient" x1="0.135" y1="0.13" x2="0.931" y2="0.949" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="#d1913c" stop-opacity="0.902" />
                <stop offset="1" stop-color="#ffd194" stop-opacity="0.902" />
            </linearGradient>
            <linearGradient id="beautyGradient" x1="0.137" y1="0.91" x2="1.367" y2="-0.326" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="#ad8d47" />
                <stop offset="1" stop-color="#d2c699" />
            </linearGradient>
             <linearGradient id="restaurantsGradient" x1="-0.116" y1="-0.332" x2="0.641" y2="0.863" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="#d24f45" />
                <stop offset="1" stop-color="#ed4b49" />
            </linearGradient>
             <linearGradient id="restaurantsGradientDark" x1="-0.116" y1="-0.332" x2="0.641" y2="0.863" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-opacity="0.702" />
                <stop offset="1" stop-color="#3d5a72" stop-opacity="0.502" />
            </linearGradient>
         <linearGradient id="cleaningGradient" x1="1.027" y1="1.507" x2="0.201" y2="0.101" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="var(--svg-fill-t-1)" />
                <stop offset="1" stop-color="var(--svg-fill-t-2)" />
            </linearGradient>
            <linearGradient id="massageGradient" x1="-0.116" y1="-0.332" x2="0.641" y2="0.863" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="var(--svg-fill-1)" />
                <stop offset="0.409" stop-color="var(--svg-fill-2)" />
                <stop offset="0.732" stop-color="var(--svg-fill-3)" />
                <stop offset="1" stop-color="var(--svg-fill-4)" />
            </linearGradient>
            <filter id="b" x="0" y="0" width="1101" height="1019" filterUnits="userSpaceOnUse">
                <feOffset input="SourceAlpha" />
                <feGaussianBlur stdDeviation="75" result="c" />
                <feFlood flood-color="#bcd0e5" flood-opacity="0.188" />
                <feComposite operator="in" in2="c" />
                <feComposite in="SourceGraphic" />
            </filter>
        </defs>
                <g class="b" transform="matrix(1, 0, 0, 1, 0, 0)">
                  <path class="a"
                d="M604.61,319.971c-18.762,28.146-42.046,55.18-67.83,80.029-1.167,1.154-2.39,2.32-3.606,3.473-3.673,3.479-7.462,6.965-11.251,10.316-6.533,5.988-13.262,11.781-20.106,17.335-3.606,3.052-7.327,6.049-11,8.973-42.651,33.7-88.241,63.182-133.166,85.395-13.928,6.965-27.862,13.185-41.612,18.556-71.753,28.39-138.544,35.043-184.623,6.9-14.673-8.912-27.2-21.364-37.163-37.778q-2.383-3.946-4.767-7.874c-14.722-24.605-28.784-49.32-41.129-74.17-2.933-5.8-5.677-11.53-8.366-17.335-44.8-96.138-61.853-193.436,1.644-289.146,24.69-37.228,65.214-66.222,113.854-86.738a401.476,401.476,0,0,1,43.4-15.5c7.395-2.32,14.844-4.334,22.484-6.159q14.4-3.662,29.273-6.415c7.584-1.459,15.156-2.741,22.8-3.846Q278.2,5.35,282.971,4.7A578.118,578.118,0,0,1,351.119.067C354.107,0,357.1,0,360.041,0c13.75.067,27.373.61,40.818,1.715,3.606.244,7.211.549,10.817.971,68.63,6.659,131.577,26.308,174.356,58.91a167.686,167.686,0,0,1,25,23.2c1.351,1.526,2.634,3.052,3.85,4.633.428.488.8.977,1.222,1.471a163.522,163.522,0,0,1,21.274,34.3c27.2,59.148,11.3,124.393-26.59,185.189C608.766,313.623,606.755,316.8,604.61,319.971Z"
                transform="translate(876 794) rotate(180)" />
               </g>
            </svg>
     <div class="swiper-wrapper">
        <!--Columns-->
       
        <?php while( $recent->have_posts() ) : $recent->the_post(); ?>
        <div class="swiper-slide">
          <div class="slider-content">
           
            <?php $postNavigationImage = get_post_meta( get_the_ID(), 'single-post-navigation-image', true ); ?>
            <?php	if($postNavigationImage) : ?>
            <img src="<?php echo esc_url($postNavigationImage);?>" />
            <?php endif; ?>
            <a href="<?php the_permalink();?>" class="slider-link">
				<?php $postNavigationDescription = get_post_meta( get_the_ID(), 'single-post-navigation-description', true ); ?>		
		 			<?php	if($postNavigationDescription) : ?>
            		<?php echo $postNavigationDescription ?>
					<?php else : ?>
               <?php the_title(); ?>
            	<?php endif; ?>

            </a>
            </div>
        </div>
        <?php endwhile; ?>
        
    </div>
        <div class="swiper-button-prev">
          <h5 class="bold"> 
            <svg width="25.6" height="12.4" viewBox="0 0 25.6 12.4" class="r-arr slider-fill">
                <path id="arrow"  transform="scale(.5) translate(0 6)" d="M25.307,5.492h0L20.081.291A1,1,0,0,0,18.67,1.709L22.178,5.2H1a1,1,0,0,0,0,2H22.178L18.67,10.691a1,1,0,0,0,1.411,1.418l5.225-5.2h0A1,1,0,0,0,25.307,5.492Z" />
            </svg>
            Previous Vertical
            </h5>
        </div>
        <div class="swiper-button-next">
            <h5 class="bold">
                  Next Vertical
              <svg width="25.6" height="12.4" viewBox="0 0 25.6 12.4" class="r-arr slider-fill">
                      <path id="arrow"  transform="scale(.5) translate(0 6)" d="M25.307,5.492h0L20.081.291A1,1,0,0,0,18.67,1.709L22.178,5.2H1a1,1,0,0,0,0,2H22.178L18.67,10.691a1,1,0,0,0,1.411,1.418l5.225-5.2h0A1,1,0,0,0,25.307,5.492Z" />
               </svg>
            </h5>
        </div>
        
        </div>
    </div>
    <?php endif;


	endwhile;
					?>
</div>
    <!-- .content-area -->


    <?php  
get_footer();