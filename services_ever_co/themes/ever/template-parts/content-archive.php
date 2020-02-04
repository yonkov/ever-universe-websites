<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

//Get all meta fields
$meta = get_post_meta($post->ID);
//Get stats post meta
$stats = json_decode(get_post_meta($post->ID, 'statistics', true));
?>

<article class="row">
    <?php scaffold_thumbnail(); ?>
        <section>
            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                <p>
                    <i><?php the_excerpt(); ?></i>
                </p>
                <div class="project-icons">
                    <?php //Display other post meta
                foreach($meta as $key=>$val){
                    if ($key!=='statistics' && $key!=='_edit_lock'&& $key!=='_edit_last' && $key!=='_thumbnail_id' && $key!=='_wp_old_slug' && $key!=='_wp_old_slug_thumbnail_id'){
                        foreach($val as $vals){
                            echo '<img src="'.$vals.'">';
                        }
                    }  
                }?>
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
                if (isset($stats)) {
                    foreach($stats as $stat) {?>
                <div class="gh-dets">
                    <?php echo '<img src="'.$stat->imgUrl.'">'; ?>
                        <p>
                            <?php echo $stat->name; ?>
                        </p>
                </div>
                <?php
                    } 
                }?>
        </div>
</article>