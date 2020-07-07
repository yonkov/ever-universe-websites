<?php
/**
 * Template part for displaying single project
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    ever
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>


<h3 class="back">
    <a href="/projects">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
            <path id="_Icon_Сolor" data-name="🎨 Icon Сolor" d="M14.979.993a1,1,0,0,0-1-.993h0a1,1,0,0,0-1,1L13,5.988a1,1,0,0,1-1,1l-8.924.037L5.766,3.649A1,1,0,0,0,4.2,2.41l-3.981,5A1,1,0,0,0,.222,8.659l4.022,4.97A1,1,0,0,0,5.8,12.376L3.086,9.021l8.924-.037a3,3,0,0,0,2.99-3Z" fill="#fff"></path>
        </svg>
    BACK TO WORKS
    </a>
</h3>
<!-- Project Title and Description-->

<article <?php post_class(); ?>>

	<?php ever_thumbnail( 'ever-blog' ); ?>

	<header class="entry-header">

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>

			<div class="entry-meta">
				<?php ever_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( esc_html__( 'Continue reading &rarr;', 'ever' ) );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ever' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ever_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
