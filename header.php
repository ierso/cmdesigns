<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cmdesigns
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<a href="<?php bloginfo( 'url' ); ?>">
				<img id="logo" src="<?php bloginfo('template_directory'); ?>/img/cm_logo.gif" alt="logo">
			</a>

		</div><!-- .site-branding -->

		<nav id="top-navigation" class="top-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<section id="services">
		<div class="service">
			<?php if ( ! dynamic_sidebar('kitchen-service') ) : ?>

			<?php endif; ?>
		</div>
		<div class="service">
			<?php if ( ! dynamic_sidebar('bathrooms-built-service') ) : ?>

			<?php endif; ?>
		</div>
		<div class="service">
			<?php if ( ! dynamic_sidebar('custom-mill-service') ) : ?>

			<?php endif; ?>
		</div>
		<div class="service">
			<?php if ( ! dynamic_sidebar('decks-ext-service') ) : ?>

			<?php endif; ?>
		</div>
	</section>

	<hr class="pageBreak">

	<div id="content" class="site-content">
