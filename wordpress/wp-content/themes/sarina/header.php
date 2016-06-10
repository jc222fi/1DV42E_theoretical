<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sarina
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
<div id="page" class="hfeed site">

	<header class="header">
        <div class="site-head clearfix">
            <div class="container">
	            <div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div><!-- .site-branding -->
				<div class="col-sm-12">
		            <nav class="site-navigation">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menu">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span>MENU</span>
		                </button>
		                
		                <?php
				            wp_nav_menu( array(
				                'theme_location'    => 'primary',
				                'depth'             => 2,
				                'container'         => 'div',
				                'container_class'   => 'collapse navbar-collapse navbar-menu',
				                'menu_class'        => 'nav navbar-nav main-menu',
				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				                'walker'            => new wp_bootstrap_navwalker())
				            );
				        ?>
		            </nav>
		        </div>
        	</div>
        </div><!-- site-head -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
