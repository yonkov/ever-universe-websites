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

	<?php //If there is no post content, show default post template with site wrapper	
	
	if(have_posts()) : the_post(); 
		
		if ( empty( get_the_content() ) ) : ?>
		<div class ="ever-container-b">
		<?php else /* Show full width template */ : ?>
		<div class="ever-wrapper">
		<?php endif;
	
		rewind_posts(); //set the post pointer back to the beginning

	endif;