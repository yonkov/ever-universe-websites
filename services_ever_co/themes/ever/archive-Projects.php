<?php
/**
 * The template for displaying archive pages
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>
<header class="row">
    <h1>Case studies</h1>
    <p>We create high-quality software with high ambitions</p>
</header>
<div class="projects-container">

    <?php //Get the categories
    global $post;
    $cat_args = array(
        'include' => '2,3, 48, 50, 52, 54',
        'post_type' => 'Projects',
        'orderby' => 'id'
    );
    $categories = get_categories($cat_args);
    //Loop through categories open-source and customers
        foreach ($categories as $category) {
            echo "<h5 id='$category->name'>Our $category->name projects</h5>";

            $catPosts = new WP_Query(array( 'post_type' => 'Projects', 'category_name' => $category->slug, 'orderby' => 'date' ));

            if ($catPosts->have_posts()) {
                while ($catPosts->have_posts()) :

                $catPosts->the_post();

                get_template_part('template-parts/content', 'archive');

                endwhile;
                scaffold_the_posts_navigation();
            }//end if
            else {
                get_template_part('template-parts/content', 'none');
            }
        } //end foreach

    ?>
</div><!-- .projects-container -->

<div class="message-us ">
    <div class="message-us-container row">
        <div class="message-us-txt-container col">
            <h1>Need something? <br>
                Let’s talk</h1>
            <span>Write us quick</span>
            <h3 class="red-contact">
                ever@ever.co
            </h3>
            <span>Call us, it’s realy quick </span>
            <h3 class="red-contact"> +359 879 000 000 </h3>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="1047" title="Contact Form Home" html_class="contact-form col"]'); ?>
    </div>
</div>

<?php
get_footer();