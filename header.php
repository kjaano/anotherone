<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="" <?php language_attributes(); ?>>
<!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" />
		<?php } ?>

			<title>
				<?php wp_title(); ?>
			</title>


			<meta name="google-site-verification" content="">

			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

			<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/i/favicon.ico">


			<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/app.css">
			
			<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/slick/slick-theme.css"/>


			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

			<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

				<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page-wrap">

		<header id="header">

<div class="row">
					<nav class="top-bar" data-topbar role="navigation">
						<ul class="title-area">
							<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
							<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
						</ul>

						<section class="top-bar-section">
							<!-- Right Nav Section -->
							<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav left', 'theme_location' => 'top-menu' ) ); ?>

								<!-- Left Nav Section -->
								<ul class="right">
									<li>
										<?php do_action('wpml_add_language_selector'); ?>
									</li>
								</ul>
						</section>
			</nav>
			</div>
			<div class="row">
				<div class="large-3 columns"><img src="http://placehold.it/150x50"></div>
				<div class="large-5 columns">
					<?php get_search_form(); ?>
				</div>
				<div class="large-4 columns">
                <button class="btn signup-switch">Anmeldung</button>
				    <ul class="icons">
				        <li><a class="comparison-switch">comparison view</a></li>
				        <li><a class="shopping-switch">Shopping list</a></li>
				        <li><a class="cart-switch">Cart</a>
				        </li>
				    </ul>
				</div>
				<hr>
			</div>
		</header>

		<div class="row">
		<div class="height_as">
			<div class="large-2 medium-3 columns left_side">
			<div class="same_as">
				<?php get_sidebar(); ?>
			</div> <!-- same_as -->
			</div> <!-- left_side -->
			<div class="large-8 medium-6 columns">
			<div class="same_as">