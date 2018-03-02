<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clm
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'clm' ); ?></a>

	<header id="masthead" class="site-header">
		<h4 class="header-title"><?php the_category(); ?></h4>
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<div class="accounts">
			<a target="_blank" href="https://form.myjotform.com/73382290037556" class="btn-secondary" data-toggle="modal">
				Open An Account
			</a>
			<a target="_blank" href="https://coolwinestradezone.co.za/" class="btn-secondary" data-toggle="modal">
				Place An Order
			</a>
		</div>

		<div class="menu-icon">
			<button class="btn" data-toggle="modal" data-target="#searchModal">
				<i class="fa fa-search" aria-hidden="true"></i>
			</button>
			<button class="btn" data-toggle="modal" data-target="#navModal">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<div class="mobile-search">
				<?php echo do_shortcode( '[aws_search_form]' ); ?>
			</div>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'clm' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'mobile-menu',
				) );
			?>
		</nav><!-- #site-navigation -->


<!-- Modal -->
<div class="modal fade" id="navModal" tabindex="-1" role="dialog" aria-labelledby="navModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<div class="modal-header">
        <h3 class="modal-title" id="modalLabel">MENU</h3>
				<?php
				$themeURL = get_template_directory_uri();
				echo '<img class="close" data-dismiss="modal" aria-label="Close" src="' . $themeURL . '/assets/img/close.png" alt="close"/>';
				?>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class="col-md-4 col-md-inset-1 menu-image">

								<img src="<?php the_field('menu_image', 'option'); ?>" />


					</div>
					<div class="col-md-7 menu-custom">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</div>
				</div>
      </div>
			<div class="wine">
				<h6><a href="https://coolwinestradezone.co.za/" target="_blank">CoolWines Tradezone<i style="font-size: 1rem;" class="fa fa-external-link" aria-hidden="true"></i></a></h6>
			</div>
    </div>
  </div>
</div>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
<div class="container product-aux search-box" id="navModal">
	<?php echo do_shortcode( '[aws_search_form]' ); ?>
</div>
</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
