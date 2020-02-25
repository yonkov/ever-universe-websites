<?php
/**
 * The template for displaying all single posts
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    scaffold
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
        	else :
              get_template_part( 'template-parts/content', get_post_format() );
        	endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			if( get_post_type() !== 'teammembers' ) :
				scaffold_the_post_navigation();
			endif;
		
		endwhile;
		?>

	</div><!-- .content-area -->

<?php
get_footer();
