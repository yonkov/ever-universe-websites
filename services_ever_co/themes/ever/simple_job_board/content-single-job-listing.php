<?php
/**
 * Single view Job Fetures
 * 
 * The template for displaying job content in the single-jobpost.php template
 * 
 * Override this template by copying it to yourtheme/simple_job_board/content-single-job-listing.php
 * 
 * @author 	PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     1.0.0
 * @since       2.1.0
 * @since       2.2.3   Added the_content function.
 * @since       2.3.0   Added "sjb_single_job_listing_template" filter.
 */
ob_start();
?>

<!-- Start Job Details
================================================== -->

<?php
/**
 * single_job_listing_start hook
 *
 * @hooked job_listing_meta_display - 20 ( Job Listing Company Meta )
 * 
 * @since   2.1.0
 */
do_action('sjb_single_job_listing_start');
?>

<div class="job-description">

    <h3 class="back">
    <a href="/career">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
            <path id="_Icon_Сolor" data-name="🎨 Icon Сolor" d="M14.979.993a1,1,0,0,0-1-.993h0a1,1,0,0,0-1,1L13,5.988a1,1,0,0,1-1,1l-8.924.037L5.766,3.649A1,1,0,0,0,4.2,2.41l-3.981,5A1,1,0,0,0,.222,8.659l4.022,4.97A1,1,0,0,0,5.8,12.376L3.086,9.021l8.924-.037a3,3,0,0,0,2.99-3Z" fill="#fff"></path>
        </svg>
        BACK
    </a>
    </h3>

    <article class="current-position-container row">
        <section class="col">

        <div class="highlighted">
            <h1><?php 
                /**
                * Display the post title.
                *
                */
                the_title();?>
            </h1>
            <span class="location"> <?php sjb_the_job_location(); ?></span>
            <p>
                <b>
                <?php 
                /**
                * Display the post excerpt.
                *
                */
                the_excerpt();?>
                </b>
            </p>
        </div>

        <?php
        /**
        * Display the post content.
        * 
        * The "the_content" is used to filter the content of the job post. Also make other plugins shortcode compatible with job post editor. 
        */
        the_content();
        ?>
        </section>
        <!-- Job details -->
        <section class="col">
            <img src="/wp-content/themes/ever/assets/images/selected-position/location.png" alt="">
            <div class="location-descr">
                <h5>
                    Blvd. “Simeonovsko Shose”, 104, 3rd floor
                    <br>
                    Sofia, Bulgaria
                </h5>
            </div>
            <div class="pics">
                <img src="/wp-content/themes/ever/assets/images/career-images/picture2.png" alt="" id="pic">
                <div class="row">
                    <img src="/wp-content/themes/ever/assets/images/career-images/picture3.png" alt="">
                    <img src="/wp-content/themes/ever/assets/images/career-images/picture4.png" alt="">
                </div>
            </div>
        </section>
    </article>

    <!--Contact form -->
    <div class="small-form row">
    <div class="t-description col">
            <h2>
                        Interested? <br>
                        Apply now!
                    </h2>
            <p>
                Please send us your Resume / CV and leave your contact information. Note: only shortlisted candidates will be contacted.
            </p>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="1282" title="Contact Form SJobBoard" html_class="contact-form col"]'); ?>
    </div>
</div>
<div class="clearfix"></div>

<?php
/**
 * single-job-listing-end hook
 * 
 * @hooked job_listing_features - 20 ( Job Features )
 * @hooked job_listing_application_form - 30 ( Job Application Form )
 * 
 * @since   2.1.0
 */
do_action('sjb_single_job_listing_end');
?>
<!-- ==================================================
End Job Details -->

<?php
$html = ob_get_clean();

/**
 * Modify the Single Job Listing Template. 
 *                                       
 * @since   2.3.0
 * 
 * @param   html    $html   Single Job Listing HTML.                   
 */
echo apply_filters('sjb_single_job_listing_template', $html);