<?php
/*
Plugin Name: OM Social Icons
Plugin URI: https://octavemedia.co.uk
Description: Simple Social Icons on the side within circles, hides on mobile views and needs manually editing. admin entry is wip
Version: 0.1
Author: Octave Media Ltd
Author URI: https://octavemedia.co.uk
Text Domain: om-social-icons
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( !class_exists( 'MDE_Octave_SideIcons' ) ) {

	class MDE_Octave_SideIcons {

		public function __construct(){
			$this->actions();
		}

		public function actions(){
			add_action( 'wp_footer', array( __CLASS__, 'socialicons' ), 99 );
		}

		public static function socialicons() {
			?>
			<!-- Manually update the links like a boss -->
			<div class="social">
				<ul>
					<li class="soc"><a class="icon-white" href="/contact/"><ion-icon name="mail"></ion-icon></a></li>
					<li class="soc"><a class="icon-white" href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
					<li class="soc"><a class="icon-white" href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
				</ul>
			</div>

			<!-- Icons for the socials -->
			<script src="https://unpkg.com/ionicons@4.2.6/dist/ionicons.js"></script>

			<!-- Classes for scroll transitions -->
			<script>
			jQuery(window).on('scroll', function () {
				var y_scroll_pos = window.pageYOffset;
				var scroll_pos_test = 150; // set to whatever you want it to be
				if (y_scroll_pos > scroll_pos_test) { 
					jQuery('.social ul li').removeClass('soc').addClass('socp');
					jQuery('.social ul li a').removeClass('icon-white').addClass('icon-color');
					}
				if (y_scroll_pos < scroll_pos_test) { 
					jQuery('.social ul li').removeClass('socp').addClass('soc');
					jQuery('.social ul li a').removeClass('icon-color').addClass('icon-white');
					}
			});
			</script>

			<!-- Said classes -->
			<style>
				.social { 	visibility: hidden;
							display:none; 
						}
				@media only screen and (max-width: 480px) {

				}
				@media (min-width: 992px) {
				.social {
					display: block;
					visibility: visible;
					position: fixed;
					right: 30px;
					top: 220px;
					z-index: 99;
				}
				.social ul {
					display: block;
					list-style: none;
					z-index: 20;
				}
				.social ul li {
					border-radius: 50%;
					/*padding: 7px 10px 1px 10px;*/
					padding: 11px 11px 4px 11px;
					margin: 15px 0;
					color: white;
					font-size: 23px;
					line-height: 30px;
				}
				.icon-white {
					color: white;
					font-size: 23px;
				}
				.icon-color {
					color: white;
				}
				.social ul li:hover {
					color: white;
					border: 2px solid yellow;
					background:#333333; 
					transition: background .2s linear;
				}
				.social ul li a:hover {
					color: white;
					transition: color .2s linear;
				}
				.soc {
					border: 2px solid white;
					background:rgba(0,0,0,0.1);
					transition: background .2s linear;
				}
				.socp{
					border: 2px solid white;
					background: purple;
					transition: background .2s linear;
					padding: 11px 11px 4px 11px;
					font-size: 23px;
				}		
				}
			</style>
			<?php
		}
	}
}
$foo = new MDE_Octave_SideIcons();