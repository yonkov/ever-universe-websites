<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    ever
 * @copyright  Copyright (c) 2019-2020, Ever Co
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
 <script type="text/javascript" src="https://cdn.goodfirms.co/assets/js/widget.min.js"></script> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_template_part( 'template-parts/menu-1' ); ?>
	<header class="site-header">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/branding' ); ?>
		</div><!-- .wrapper -->
	</header><!-- .site-header -->

	<div class="site-content">

		<div class="<?php echo ( is_front_page() || is_archive() || is_page() ) ?  '' : 'ever-wrapper'; ?>">
