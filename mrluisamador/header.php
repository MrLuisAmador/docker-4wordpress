<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package la
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="google-site-verification" content="C-v4RZjQrrpwy2e93NZLiASkmAXoHdQVmJ3jezScn2c" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script  src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/ie.css">
 <![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<div class="hidden-nav-wrapper">
		<div class="site-branding">
			<div class="hidden-mugshot">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/mugshot.png" alt="" />
			</div>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="hidden-navigation" role="navigation">
			<a class="menu-toggle">&#9776; Menu</a>

			<?php wp_nav_menu( array( 'theme_location' => 'hidden-nav', 'container' => false ) ); ?>
		</nav><!-- #site-navigation -->
	</div>

	<header id="masthead" class="site-header scrollto" role="banner">
		<?php if ( is_front_page() ) : ?>
			<div class="site-header__center">
				<h1 class="header-title"><?php bloginfo( 'name' ); ?></h1>

				<h2 class="header-subtitle"><span class="typejs"></span></span></h2>

				<div class="mugshot-wrap">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/mugshot.png" alt="" />
				</div>

				<a class="header-cta" href="#contact-me">Let's Talk!</a>
			</div>
		<?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => false,
			) );

			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
