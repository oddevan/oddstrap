<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oddStrap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'oddstrap' ); ?></a>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>
	
		<?php
			wp_nav_menu( array(
				'menu'							=> 'primary',
				'theme_location'		=> 'primary',
				'depth'							=> 2,
				'container'					=> 'div',
				'container_class'		=> 'collapse navbar-collapse',
				'container_id'			=> 'bs-example-navbar-collapse-1',
				'menu_class'				=> 'nav navbar-nav navbar-right',
				'fallback_cb'				=> 'wp_bootstrap_navwalker::fallback',
				'walker'						=> new wp_bootstrap_navwalker())
			);
		?>
		</div>
	</nav>

	<div id="content" class="site-content">
