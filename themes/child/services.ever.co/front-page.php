<?php
/**
 * The template for displaying the home page
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    ever
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

	<div class="content-area-ever">

		<?php
		while ( have_posts() ) :

			the_post();

			?>

			<article <?php post_class(); ?>>

				<?php ever_thumbnail( 'ever-blog' ); ?>

				<?php
				if ( get_edit_post_link() ) :

					edit_post_link( esc_html__( '(Edit)', 'ever' ), '<p class="edit-link">', '</p>' );

				endif;
				?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ever' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</div><!-- .content-area -->

<?php
get_footer();
