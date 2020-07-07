<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    ever
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

//Get all meta fields
$meta = get_post_meta($post->ID);
//Get stats post meta
$stats = json_decode(get_post_meta($post->ID, 'statistics', true));
?>

<article class="row">
    <div class="projects-slider">
        <?php ever_thumbnail(); //Default project thumbnail
            
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