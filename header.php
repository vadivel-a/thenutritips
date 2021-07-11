<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package medspa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid headercontainer">
		<div class="col-sm-12 d-flex align-items-center p-0">
						<div class="logo mr-auto">
							<?php the_custom_logo();
										if ( is_front_page() && is_home() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php endif; ?>
						</div>
						<nav id="site-navigation" class="nav-menu d-lg-block">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary-menu',
									'menu_id'        => 'primary-menu',
									'container_class' => 'navigation_container'
								) );
							?>
						</nav><!-- #site-navigation -->
						<span class="topcontact">
							<a href="#" class="btn btn-primary small my-1 ml-4 rounded-pill white_btn" >+91 9652413255</a>
						<span>

		</div>
    </div>
  </header><!-- End Header -->
