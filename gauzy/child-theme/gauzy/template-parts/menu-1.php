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
    <div class="ever-container-b navbar-container">
		<!--<button class="menu-toggle" aria-controls="site-menu" aria-expanded="false">-->
		  <svg id="mini-menu"   width="30" height="30"
                viewBox="0 0 25 23">
                <g id="second-line">
                    <path id="oval" d="M4.5,5a2.5,2.5,0,0,0,0-5C3.119,0,0,2.5,0,2.5S3.119,5,4.5,5Z"
                        transform="translate(18 9)"  />
                    <rect id="line" data-name="Rectangle Copy 15" width="15" height="3" rx="1.5"
                        transform="translate(0 10)"  />
                </g>
                <g id="ex">
                    <rect id="third-line" width="25" height="3" rx="1.5" transform="translate(0 20)"  />
                    <rect id="first-line" data-name="Rectangle Copy 7" width="25" height="3" rx="1.5"  />
                </g>
            </svg>
			<?php //esc_html_e( 'Site Navigation', 'ever' ); ?>
		</button>
		<div class="left">
            <a href="http://test.ever.co/">
			  <svg width="150" height="44" viewBox="0 0 60 45">
                    <g id="Logo" data-name="Logo" transform="translate(-30 10)">
                        <path id="ever-logo" data-name="ever copy 4"
                            d="M66.555,24.8a13.625,13.625,0,0,1-4.8-.8,9.237,9.237,0,0,1-3.415-2.2A10.477,10.477,0,0,1,55.62,14.31,14.372,14.372,0,0,1,59.631,4.151,14.187,14.187,0,0,1,69.885,0a9.82,9.82,0,0,1,6.851,2.3A7.7,7.7,0,0,1,79.065,8.1a15.708,15.708,0,0,1-1.44,6.165h-14a3.552,3.552,0,0,0,.971,2.629,4.872,4.872,0,0,0,3.574,1.241,13.484,13.484,0,0,0,6.345-2.07l2.25,5.94A19.19,19.19,0,0,1,66.555,24.8ZM69.48,6.165a5.041,5.041,0,0,0-4.9,3.42h7.6a3.806,3.806,0,0,0,.225-1.17C72.405,7.027,71.284,6.165,69.48,6.165ZM10.935,24.8a13.625,13.625,0,0,1-4.8-.8,9.237,9.237,0,0,1-3.415-2.2A10.477,10.477,0,0,1,0,14.31,14.372,14.372,0,0,1,4.011,4.151,14.187,14.187,0,0,1,14.265,0a9.82,9.82,0,0,1,6.851,2.3A7.7,7.7,0,0,1,23.445,8.1a15.708,15.708,0,0,1-1.44,6.165H8.01a3.552,3.552,0,0,0,.971,2.629,4.872,4.872,0,0,0,3.574,1.241,13.484,13.484,0,0,0,6.345-2.07l2.25,5.94A19.19,19.19,0,0,1,10.935,24.8ZM13.86,6.165a5.041,5.041,0,0,0-4.905,3.42H16.56a3.806,3.806,0,0,0,.225-1.17C16.785,7.027,15.664,6.165,13.86,6.165Zm24.39,18.45c-3.728,0-6.422-.957-8.007-2.844-1.5-1.782-1.967-4.337-1.4-7.6l.81-4.725c.176-.88.145-1.405-.1-1.7a.859.859,0,0,0-.711-.276,5.584,5.584,0,0,0-2.2.495l.945-6.84a15.538,15.538,0,0,1,5.58-.9c2.083,0,3.594.544,4.492,1.618.985,1.178,1.26,3.026.818,5.492l-.99,5.49c-.254,1.609-.119,2.694.412,3.316a1.9,1.9,0,0,0,1.523.6,3.306,3.306,0,0,0,3.054-1.71c.761-1.274,1.131-3.246,1.131-6.03A34.578,34.578,0,0,0,42.435.63H51.39a48.6,48.6,0,0,1,.675,7.56C52.065,18.782,47.159,24.615,38.25,24.615Zm53.5-.45H83.34L85.905,9.45a2.351,2.351,0,0,0-.125-1.723A.844.844,0,0,0,85.1,7.47a7.2,7.2,0,0,0-2.25.495l.99-6.84a17.294,17.294,0,0,1,5.625-.9,6.6,6.6,0,0,1,3.426.793A4,4,0,0,1,94.725,3.6,6.823,6.823,0,0,1,100.71.225a8.314,8.314,0,0,1,3.96.945l-2.385,7.92a10.011,10.011,0,0,0-4.275-.945c-2.732,0-3.738,2.34-4.1,3.735l-2.16,12.284Z"
                           ></path>
                        <g id="Group_4_Copy_2" data-name="Group 4 Copy 2" transform="translate(101 15)">
                            <path id="ever-logo-2" data-name="Combined Shape"
                                d="M0,5a5,5,0,1,1,5,5A5.006,5.006,0,0,1,0,5ZM.667,5A4.333,4.333,0,1,0,5,.667,4.338,4.338,0,0,0,.667,5ZM3.4,7.5H2.713l.926-5.332,1.6,0A1.8,1.8,0,0,1,6.521,2.6a1.333,1.333,0,0,1,.37,1.147,1.526,1.526,0,0,1-.365.882,2.012,2.012,0,0,1-.862.575l.827,2.253,0,.046H5.756L5.009,5.343H3.778L3.4,7.5h0Zm.473-2.732,1.011,0a1.424,1.424,0,0,0,.89-.28A1.1,1.1,0,0,0,6.2,3.743a.867.867,0,0,0-.184-.718.983.983,0,0,0-.725-.274l-1.066,0Z"
                                ></path>
                        </g>
                    </g>
                </svg>
            </a>
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
</nav><!-- .menu-1 -->
	<div class="hidden-menu">
        <?php // Show primary menu on mobile
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'mobile-menu',
					'menu_class'      => 'col',
				)
			);
		
		?>
		<div class="switch-field row m-i">
            <input type="radio" id="radio-t" name="switch-t" value="day" checked class="m-i"/>
				<label for="radio-t" class="row m-i" >
                	<h1 class="m-i">Light Theme</h1>
					<svg width="21.363" height="21.363" viewBox="0 0 21.363 21.363" class="m-i">
  						<g id="sunny" transform="translate(0 0)">
    						<path id="Path" d="M.729,0A.729.729,0,0,0,0,.729V2.8a.729.729,0,1,0,1.458,0V.729A.729.729,0,0,0,.729,0Z" transform="translate(9.951 17.832)" />
    						<path id="Path-2" data-name="Path" d="M.729,3.531A.729.729,0,0,0,1.458,2.8V.729A.729.729,0,0,0,0,.729V2.8A.729.729,0,0,0,.729,3.531Z" transform="translate(9.951 0)" />
    						<path id="Path-3" data-name="Path" d="M1.68.213.214,1.679A.729.729,0,0,0,1.244,2.71L2.711,1.245A.729.729,0,1,0,1.68.213Z" transform="translate(2.915 15.524)" />
    						<path id="Path-4" data-name="Path" d="M.729,2.923a.727.727,0,0,0,.515-.213L2.71,1.245A.729.729,0,1,0,1.68.214L.214,1.679A.729.729,0,0,0,.729,2.923Z" transform="translate(15.524 2.915)"/>
    						<path id="Path-5" data-name="Path" d="M3.531.729A.729.729,0,0,0,2.8,0H.729a.729.729,0,0,0,0,1.458H2.8A.729.729,0,0,0,3.531.729Z" transform="translate(0 9.953)"/>
    						<path id="Path-6" data-name="Path" d="M2.8,0H.729a.729.729,0,0,0,0,1.458H2.8A.729.729,0,1,0,2.8,0Z" transform="translate(17.832 9.953)" />
    						<path id="Path-7" data-name="Path" d="M1.679,2.71A.729.729,0,1,0,2.71,1.679L1.244.214A.729.729,0,0,0,.214,1.244Z" transform="translate(2.915 2.915)" />
    						<path id="Path-8" data-name="Path" d="M1.245.214A.729.729,0,0,0,.214,1.244L1.679,2.71A.729.729,0,0,0,2.71,1.679Z" transform="translate(15.524 15.524)" />
    						<path id="Shape" d="M0,5.674a5.674,5.674,0,1,1,5.674,5.674A5.68,5.68,0,0,1,0,5.674Z" transform="translate(5.007 5.008)" />
  						</g>
					</svg>
                </label>
            <input type="radio"   id="radio-o" name="switch-t" value="night" checked class="m-i"/>
                <label for="radio-o" class="row dark-label m-i" >
                	<h1 class="m-i">Dark Theme</h1>
                    <svg  width="19" height="19" viewBox="0 0 19 19" class="m-i">
                        <path id="moon" d="M9.866,19a9.906,9.906,0,0,1-6.925-2.823A9.6,9.6,0,0,1,0,9.392,9.745,9.745,0,0,1,6.589.084a1.517,1.517,0,0,1,1.48.277A1.464,1.464,0,0,1,8.555,1.77a7.952,7.952,0,0,0-.161,1.724,8.008,8.008,0,0,0,7.873,7.832,8.332,8.332,0,0,0,1.082-.041,1.5,1.5,0,0,1,1.371.607,1.467,1.467,0,0,1,.139,1.49,9.8,9.8,0,0,1-3.6,4.061A9.973,9.973,0,0,1,9.892,19Z" transform="translate(0 0)" />
                    </svg>
                </label>
        </div>
            <div class="col m-i">
            <h5 class="text-center m-i">Social</h5>
                <div class=" social-media row m-i">
                    <div class="col text-center social-img m-i">
                        <a href="https://ever.co">
                            <img src="/wp-content/themes/ever-co/assets/img/social/github.svg" alt="" class="ever-bottom-logo">
                        </a>
                    </div>
                    <div class="col text-center social-img m-i">
                        <a href="https://ever.co">
                            <img src="/wp-content/themes/ever-co/assets/img/social/upwork.svg" alt="" class="ever-bottom-logo">
                        </a>
                    </div>
                    <div class="col text-center social-img m-i">
                        <a href="https://ever.co">
                            <img src="/wp-content/themes/ever-co/assets/img/social/facebook.svg" alt="" class="ever-bottom-logo">
                        </a>
                    </div>
                    <div class="col text-center social-img m-i">
                        <a href="https://ever.co">
                            <img src="/wp-content/themes/ever-co/assets/img/social/twitter.svg" alt="" class="ever-bottom-logo">
                        </a>
                    </div>
                    <div class="col text-center social-img m-i">
                        <a href="https://ever.co">
                            <img src="/wp-content/themes/ever-co/assets/img/social/linkedin.svg" alt="" class="ever-bottom-logo">
                        </a>
                    </div>
                </div>
            </div>
	</div>