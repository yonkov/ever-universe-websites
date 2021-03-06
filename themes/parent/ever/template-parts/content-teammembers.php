<?php
/**
 * Template part for displaying single team member
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    ever
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<article <?php post_class('row'); ?>>
	<div class="team-members-meta-wrapper">
	<?php ever_thumbnail('ever-blog'); ?>

            <div class="icons row">
                <?php $linkedin = get_post_meta($post->ID, 'linkedin', true);
                    $github = get_post_meta($post->ID, 'github', true);
                    $upwork = get_post_meta($post->ID, 'upwork', true);
                              $position = get_post_meta($post->ID, 'position', true);
                 ?>
                    <a href="<?php echo $linkedin; ?>"><span class="ever-meta">LinkedIn<span></a>
                    <a href="<?php echo $github; ?>"><span class="ever-meta">GitHub</span></a>
                    <a href="<?php echo $upwork; ?>"><span class="ever-meta">Upwork</span></a>
            </div>
		</div>

	<div class="team-members-meta-content">
		<!--Team Member Title --> 
		<header class="entry-header">

		<?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>

			<div class="entry-meta">
				<?php ever_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

		</header><!-- .entry-header -->
		<!--Team Member content --> 
		<div class="entry-content">
		<h5 class="position"><p><?php echo $position; ?></p></h5>
		<?php
        the_content(esc_html__('Continue reading &rarr;', 'ever'));

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ever'),
                'after'  => '</div>',
            )
        );
        ?>
		</div><!-- .entry-content -->

	</div>

</article><!-- #post-## -->

<!-- Team members project list -->
<?php echo do_shortcode('[ever_teammember_projects]'); ?>