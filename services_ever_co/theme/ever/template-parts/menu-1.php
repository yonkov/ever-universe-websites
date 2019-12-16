<?php
/**
 * Template part for displaying the primary navigation menu.
 *
 * @package    ever
 * @copyright  Copyright (c) 2019, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<nav id="site-navigation" class="menu-1 navbar">
		<!--<button class="menu-toggle" aria-controls="site-menu" aria-expanded="false">-->
			<svg id="mini-menu" data-name="mini-menu" xmlns="http://www.w3.org/2000/svg" width="26" height="22" viewBox="0 0 26 22" transform="translate(10 10)">
				<rect id="Rectangle" width="26" height="2" fill="#d8d8d8"></rect>
				<rect id="Rectangle-2" data-name="Rectangle" width="26" height="2" transform="translate(0 10)" fill="#d8d8d8"></rect>
				<rect id="Rectangle-3" data-name="Rectangle" width="26" height="2" transform="translate(0 20)" fill="#d8d8d8"></rect>
			</svg>
			<?php //esc_html_e( 'Site Navigation', 'scaffold' ); ?>
		</button>
		<div class="left">
			<?php // Insert logo through WP admin here
			scaffold_the_custom_logo(); 
			?>
		</div>
		<?php // Insert menu items through WP admin
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'site-menu',
					'menu_class'      => 'links',
					'container_class' => 'right',
				)
			);
			?>
</nav><!-- .menu-1 -->

        <?php // Show primary menu on mobile
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'mobile-menu',
					'menu_class'      => 'col',
					'container_class' => 'hidden-menu',
				)
			);
		?>