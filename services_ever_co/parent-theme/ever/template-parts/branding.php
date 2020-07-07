<?php
/**
 * Template part for displaying the logo and site title.
 *
 * @package    ever
 * @copyright  Copyright (c) 2019, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<div class="site-branding">

	<?php if ( is_front_page() && is_home() ) : ?>

		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>

	<?php else : ?>

		<p class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</p>

	<?php endif; ?>

	<?php

	$description = get_bloginfo( 'description', 'display' );

	if ( $description || is_customize_preview() ) :
		?>

		<p class="site-description">
			<?php echo $description; /* WPCS: xss ok. */ ?>
		</p>

	<?php endif; ?>

</div><!-- .site-branding -->
