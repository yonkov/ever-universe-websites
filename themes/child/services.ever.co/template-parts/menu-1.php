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
			<?php //esc_html_e( 'Site Navigation', 'ever' ); ?>
		</button>
		<div class="nav-container"> 
		<div class="left">
			<?php // Insert logo through WP admin here
			ever_the_custom_logo(); 
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
			</div>
			<div class="switch-field">
                <input type="radio" id="radio-o" name="switch-o" value="night" class="night-theme-input"  />
                <label for="radio-o">
                    <svg width="35" height="39" viewBox="0 0 35 39">
                        <g id="night" transform="translate(10 10)">
                            <path id="Shape" d="M9.372,18H9.347a9.392,9.392,0,0,1-6.56-2.675A9.091,9.091,0,0,1,0,8.9,9.228,9.228,0,0,1,6.242.08a1.436,1.436,0,0,1,1.4.262,1.39,1.39,0,0,1,.461,1.336A7.451,7.451,0,0,0,7.952,3.31a7.587,7.587,0,0,0,7.459,7.42l.206,0a7.968,7.968,0,0,0,.819-.042,1.425,1.425,0,0,1,1.3.575,1.388,1.388,0,0,1,.13,1.41,9.283,9.283,0,0,1-3.406,3.848A9.448,9.448,0,0,1,9.372,18ZM6.348,1.839A7.521,7.521,0,0,0,1.7,8.876a7.642,7.642,0,0,0,7.646,7.447h.02A7.7,7.7,0,0,0,16.1,12.4c-.173.009-.331.012-.482.012q-.126,0-.253,0a9.392,9.392,0,0,1-6.4-2.739A9.095,9.095,0,0,1,6.348,1.839Z" fill="#1f1f27"></path>
                        </g>
                    </svg>
                </label>
                <input type="radio" id="radio-t" name="switch-o" class="day-theme-input" value="day" />
                <label for="radio-t">
                    <svg width="35" height="39" viewBox="40 0 35 39">
                        <g id="sunny-day" transform="translate(44 6)">
                            <path id="Path" d="M.92,0A.92.92,0,0,0,0,.92V3.537a.92.92,0,0,0,1.841,0V.92A.92.92,0,0,0,.92,0Z" transform="translate(12.565 22.516)" fill="#9ba4b7"></path>
                            <path id="Path-2" data-name="Path" d="M.92,4.458a.92.92,0,0,0,.92-.92V.92A.92.92,0,0,0,0,.92V3.538A.92.92,0,0,0,.92,4.458Z" transform="translate(12.565 0)" fill="#9ba4b7"></path>
                            <path id="Path-3" data-name="Path" d="M2.121.269.27,2.12a.92.92,0,0,0,1.3,1.3l1.851-1.85a.92.92,0,1,0-1.3-1.3Z" transform="translate(3.68 19.601)" fill="#9ba4b7"></path>
                            <path id="Path-4" data-name="Path" d="M.92,3.691a.918.918,0,0,0,.651-.27l1.851-1.85a.92.92,0,1,0-1.3-1.3L.27,2.12A.92.92,0,0,0,.92,3.691Z" transform="translate(19.601 3.681)" fill="#9ba4b7"></path>
                            <path id="Path-5" data-name="Path" d="M4.458.92A.92.92,0,0,0,3.537,0H.92a.92.92,0,0,0,0,1.841H3.537A.92.92,0,0,0,4.458.92Z" transform="translate(0 12.567)" fill="#9ba4b7"></path>
                            <path id="Path-6" data-name="Path" d="M3.539,0H.92a.92.92,0,0,0,0,1.841H3.539A.92.92,0,0,0,3.539,0Z" transform="translate(22.515 12.567)" fill="#9ba4b7"></path>
                            <path id="Path-7" data-name="Path" d="M2.12,3.422a.92.92,0,0,0,1.3-1.3L1.571.27a.92.92,0,0,0-1.3,1.3Z" transform="translate(3.681 3.681)" fill="#9ba4b7"></path>
                            <path id="Path-8" data-name="Path" d="M1.571.27a.92.92,0,0,0-1.3,1.3l1.85,1.85a.92.92,0,1,0,1.3-1.3Z" transform="translate(19.601 19.601)" fill="#9ba4b7"></path>
                            <path id="Shape-2" data-name="Shape" d="M7.164,14.329a7.164,7.164,0,1,1,7.165-7.165A7.173,7.173,0,0,1,7.164,14.329Zm0-12.488a5.324,5.324,0,1,0,5.324,5.323A5.33,5.33,0,0,0,7.164,1.841Z" transform="translate(6.322 6.323)" fill="#9ba4b7"></path>
                        </g>
                    </svg>

                </label>
            </div>
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
