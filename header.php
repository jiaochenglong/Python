<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]> <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php if ( ot_get_option( 'favicon_general', '' ) != '' ): ?>
			<!-- icons & favicons -->
			<link rel="shortcut icon" href="<?php echo ot_get_option( 'favicon_general', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'apple_iphone_icon', '' ) != '' ): ?>
			<!-- For iPhone -->
			<link rel="apple-touch-icon-precomposed" href="<?php echo ot_get_option( 'apple_iphone_icon', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'apple_iphone_retina_icon', '' ) != '' ): ?>
			<!-- For iPhone 4 Retina display -->
			<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo ot_get_option( 'apple_iphone_retina_icon', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'apple_ipad_icon', '' ) != '' ): ?>
			<!-- For iPad -->
			<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo ot_get_option( 'apple_ipad_icon', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'apple_ipad_retina_icon', '' ) != '' ): ?>
			<!-- For iPad Retina display -->
			<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo ot_get_option( 'apple_ipad_retina_icon', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'google_meta_id', '', false ) != '' ): ?>
			<meta name="google-site-verification" content="<?php echo ot_get_option( 'google_meta_id', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'bing_meta_id', '', false ) != '' ): ?>
			<meta name="msvalidate.01" content="<?php echo ot_get_option( 'bing_meta_id', '', true ); ?>" />
		<?php endif; ?>
		<?php if ( ot_get_option( 'alexa_meta_id', '', false ) != '' ): ?>
			<meta name="alexaVerifyID" content="<?php echo ot_get_option( 'alexa_meta_id', '', true ); ?>" />
		<?php endif; ?>
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
		<!-- Preloader -->
		<div class="preloader">
			<div class="loader"><?php __( 'Loading...', 'vestalite' ); ?></div>
		</div><!-- End .page-loader -->
		<div id="overlay-menu" class="overlay-menu">
			<a href="#_" id="overlay-menu-hide" class="navigation-hide">
				<i class="fa fa-times"></i>
			</a><!-- End .navigation-hide -->
			<div class="overlay-menu-inner">
				<nav class="overlay-menu-nav">
					<?php
					if ( has_nav_menu( 'header_menu_second' ) ):
						$args = array(
							'theme_location' => 'header_menu_second',
							'depth' => 2,
							'container' => '',
							'menu_id' => 'nav',
							'menu_class' => '',
							'walker' => new vestalite_bootstrap_walker
						);
						wp_nav_menu( $args );
					endif;
					?>
				</nav><!-- End .overlay-menu-nav -->
			</div><!-- End .overlay-menu-inner -->
			<div class="overlay-navigation-footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<?php if ( ot_get_option( 'copyright_text', '', true ) != '' ): ?>
								<p class="copyright font-alt m-b-0">
									<?php echo ot_get_option( 'copyright_text', '', true ); ?>
								</p><!-- End .copyright -->
							<?php endif; ?>
						</div><!-- End .text-center -->
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .overlay-navigation-footer -->
		</div><!-- End #overlay-menu -->
		<div class="wrapper">
			<nav class="navbar navbar-custom navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" target="_self">
							<?php if ( ot_get_option( 'logo_image_status', 'off' ) != 'off' ): ?>
							<img src="<?php echo ot_get_option( 'logo_image', '', true ); ?>" width="95" alt="<?php echo bloginfo( 'name' ); ?> <?php __( 'Logo', 'vestalite' ); ?>" />
							<?php else: ?>
								<?php echo ot_get_option( 'logo_text', '', false ); ?>
							<?php endif; ?>
						</a><!-- End .navbar-brand -->
					</div><!-- End .navbar-header -->
					<ul id="icons-navbar" class="nav navbar-nav navbar-right">
						<li class="top-search">
							<a href="#_" id="lnk-show-search"><i class="fa fa-search"></i></a>
						</li>
						<li>
							<a href="#_" id="toggle-menu" class="show-overlay" title="<?php __( 'Menu', 'vestalite' ); ?>">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a><!-- End .show-overlay -->
						</li>
					</ul><!-- End .navbar-nav -->
					<div id="search-box">
						<div class="container">
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<div class="row search-row">
										<div class="col-xs-10 pull-left">
											<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
												<div class="search-input">
													<input type="search" name="s" id="search-field" class="form-control col-sm-10" required="required" title="<?php echo esc_attr_x( 'Search for:', 'label', 'vestalite' ) ?>" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( '&#x5F88;&#x591A;&#x4E1C;&#x897F;&#xFF0C;&#x5982;&#x679C;&#x4E0D;&#x662F;&#x6015;&#x522B;&#x4EBA;&#x6361;&#x53BB;&#xFF0C;&#x6211;&#x4EEC;&#x4E00;&#x5B9A;&#x4F1A;&#x6254;&#x6389;&#x3002;', 'placeholder', 'vestalite' ) ?>" />
												</div><!-- End .search-input -->	
											</form><!-- End #searchform -->
										</div>
										<div class="col-xs-2 pull-left text-center">
											<a id="lnk-hide-search" href="#_">
												<i class="fa fa-times"></i>
											</a><!-- End #lnk-hide-search -->
										</div>
									</div><!-- End .row -->
								</div>
							</div><!-- End .row -->
						</div><!-- End .container -->
					</div><!-- End #search-box -->
					<?php
					if ( has_nav_menu( 'header_menu_first' ) ):
						$args = array(
							'theme_location' => 'header_menu_first',
							'depth' => 1,
							'container' => '',
							'menu_class' => 'extra-navbar nav navbar-nav navbar-right',
						);
						wp_nav_menu( $args );
					endif;
					?>
				</div><!-- End .container -->
			</nav><!-- End .navbar-custom -->
		</div><!-- End .wrapper -->
		<!--
			=====================
				End Header
			=====================
		-->