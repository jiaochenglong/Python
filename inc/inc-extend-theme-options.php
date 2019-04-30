<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

if ( !defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}

/**
 * Required: Remove Option Tree Settings Menu.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: Enable OT Meta Boxes for post formats.
 */
add_filter( 'ot_post_formats', '__return_true' );

/*
 * Required: Bring Theme Option page from sub menu to admin menu
 */

add_filter( 'ot_theme_options_parent_slug', '__return_false' );

/**
 * Required: Set Google Fonts Api key
 */
function vestalite_wp_google_fonts_api_key( $key ) {
	return ot_get_option( 'google_fonts_api_key', 'AIzaSyAsudOJ8DmkYuZZixfcfeadgCa1njo97ZY' );
}

add_filter( 'ot_google_fonts_api_key', 'vestalite_wp_google_fonts_api_key', 10, 1 );

/**
 * Required: Add links to theme options header.
 */
function vestalite_wp_theme_option_header( $page_id ) {
	echo '<div style="width: 100%"><a href="' . esc_url('http://mypreview.net/product/vesta-minimal-wordpress-blog-theme/') . '" target="_blank"><img src="http://www.mediafire.com/convkey/9cc9/835h8d8db056c3uzg.jpg" alt="Buy Vesta PRO"/></a></div>';
}

add_action( 'ot_header_list', 'vestalite_wp_theme_option_header', 10, 1 );

/**
 * Required: Change version from header
 */
function vestalite_wp_theme_version() {
	$my_theme = wp_get_theme();
	return $my_theme->get( 'Name' ) . " is version " . $my_theme->get( 'Version' );
}

add_filter( 'ot_header_version_text', 'vestalite_wp_theme_version', 10 );

/**
 * Required: Remove logo from header
 */
function vestalite_wp_theme_logo() {
	return '';
}

add_filter( 'ot_header_logo_link', 'vestalite_wp_theme_logo', 10 );

/**
 * Required: Set the text for the upload button used on theme options
 */
function vestalite_wp_upload_text( $text ) {
	return __( 'Use This', 'vestalite' );
}

add_filter( 'ot_upload_text', 'vestalite_wp_upload_text', 10, 1 );

/**
 * Required: Set the slug of the theme options page
 */
function vestalite_wp_theme_options_menu_slug( $text ) {
	return 'vestalite-theme-options';
}

add_filter( 'ot_theme_options_menu_slug', 'vestalite_wp_theme_options_menu_slug', 10, 1 );

/**
 * Recommended: Replace some translated text with new one
 */
function vestalite_wp_replace_translated_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Option Tree' :
			$translated_text = __( 'Options', 'vestalite' );
			break;
	}
	return $translated_text;
}

add_filter( 'gettext', 'vestalite_wp_replace_translated_strings', 20, 3 );

/**
 * Enqueue Vesta Lite Panel styles
 */
function vestalite_wp_admin_styles() {
	wp_enqueue_style( 'vestalite_panel', get_template_directory_uri() . '/inc/admin-style/vestalite-admin.css', array( 'ot-admin-css' ), '1.0.0' );
}

add_action( 'admin_enqueue_scripts', 'vestalite_wp_admin_styles' );

/**
 * Required: Run a filter and set to false to disable OptionTree child theme mode.
 */
add_filter( 'ot_child_theme_mode', '__return_false' );

/*
 * Required: Hide "New Layout" section at the top of the theme options page
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: Hide the Documentation.
 */
add_filter( 'ot_show_docs', '__return_false' );

/**
 * Required: Add Header code to every page
 */
function vestalite_wp_header_code() {
	if ( ot_get_option( 'additional_javascript_header', '' ) != '' ):
		echo ot_get_option( 'additional_javascript_header', '' );
	endif;
}

add_action( 'wp_head', 'vestalite_wp_header_code' );

/**
 * Required: Add Footer code to every page
 */
function vestalite_wp_footer_code() {
	if ( ot_get_option( 'additional_javascript_footer', '' ) != '' ):
		echo ot_get_option( 'additional_javascript_footer', '' );
	endif;
}

add_action( 'wp_footer', 'vestalite_wp_footer_code' );

/**
 * Required: Remove WordPress generator
 */
function vestalite_wp_wp_generator() {
	if ( ot_get_option( 'remove_generator', 'off' ) == 'on' ) {
		remove_action( 'wp_head', 'wp_generator' );
	}
}

add_action( 'after_setup_theme', 'vestalite_wp_wp_generator' );

/**
 * Required: Change wordpress login logo
 */
function vestalite_wp_wp_login_logo() {
	$wp_login_logo = ot_get_option( 'wp_login_logo', '' );
	if ( $wp_login_logo ) {
		echo "<style>
		body.login div#login h1 a {
			background-image: url('" . esc_url( $wp_login_logo ) . "');
			width: 100%;
			margin: 0 auto 25px;
			padding: 0;
			height: 67px;
			background-size: 320px auto;
		}
		</style>";
	}
}

add_action( "login_enqueue_scripts", "vestalite_wp_wp_login_logo" );

/**
 * Required: Change wordpress login logo link
 */
function vestalite_wp_wp_login_logo_link( $url ) {
	$wp_login_logo_link = ot_get_option( 'wp_login_logo_link', '' );
	if ( $wp_login_logo_link ) {
		return esc_url( $wp_login_logo_link );
	}
	return $url;
}

add_filter( 'login_headerurl', 'vestalite_wp_wp_login_logo_link' );

/**
 * Required: Change wordpress login logo link title
 */
function vestalite_wp_wp_login_logo_link_title( $title ) {
	$wp_login_logo_link_title = ot_get_option( 'wp_login_logo_link_title', '' );
	if ( $wp_login_logo_link_title ) {
		return esc_attr( $wp_login_logo_link_title );
	}
	return $title;
}

add_filter( 'login_headertitle', 'vestalite_wp_wp_login_logo_link_title' );

/**
 * Required: Change admin footer text
 */
function vestalite_wp_change_admin_footer_text( $text ) {
	$text = 'Thanks for using Vesta Lite - Upgrade to Vesta PRO <a href="http://mypreview.net/product/vesta-minimal-wordpress-blog-theme/">Buy Now!</a>';
	return $text;
}

add_filter( 'admin_footer_text', 'vestalite_wp_change_admin_footer_text', 10, 1 );

/**
 * Required: Enqueue Custom Login Stylesheet
 * Vesta Lite Edit
 */
function vestalite_wp_login_theme_styles() {
	wp_register_style( 'login_style', get_template_directory_uri() . '/css/login-style.min.css', '', 'all' );
	wp_enqueue_style( 'login_style' );
}

add_action( 'login_head', 'vestalite_wp_login_theme_styles' );

/**
 * Required: Customize WordPress Login Page
 */
function vestalite_wp_custom_login() {
	echo '<style type="text/css">' . PHP_EOL;
	//Add Custom Background Image
	if ( ot_get_option( 'wp_login_bg', '' ) != '' ) {
		echo 'body.login{background-image: url(' . ot_get_option( 'wp_login_bg', '' ) . ')}' . PHP_EOL;
	}
	//Remove Lost Password Link
	if ( ot_get_option( 'remove_lost_pass_link', '' ) != 'off' ) {
		echo 'p#nav{display: none;}' . PHP_EOL;
	}
	//Remove Lost Back to Link
	if ( ot_get_option( 'remove_back_to_link', '' ) != 'off' ) {
		echo 'p#backtoblog{display: none;}' . PHP_EOL;
	}
	echo '</style>' . PHP_EOL;
}

add_action( 'login_head', 'vestalite_wp_custom_login' );

/**
 * Required: Add Custom Text To WordPress Login Page
 */
function vestalite_wp_login_message( $message ) {
	if ( empty( $message ) && ot_get_option( 'wp_login_message', '' ) != '' ) {
		return '<p class=\'message\'>' . ot_get_option( 'wp_login_message', '' ) . '</p>';
	} else {
		return $message;
	}
}

add_filter( 'login_message', 'vestalite_wp_login_message' );

/**
 * Required: Add Global CSS
 */
function vestalite_wp_global_css_code() {
	if ( ot_get_option( 'global_css', '' ) != '' ):
		echo '<style type="text/css">' . PHP_EOL . ot_get_option( 'global_css', '' ) . PHP_EOL . '</style>' . PHP_EOL;
	endif;
}

add_action( 'wp_head', 'vestalite_wp_global_css_code' );

/**
 * Required: Add Tablet CSS
 */
function vestalite_wp_tablet_css_code() {
	if ( ot_get_option( 'tablets_css', '' ) != '' ):
		echo '<style type="text/css">' . PHP_EOL . '@media screen and (min-width: 768px) and (max-width: 985px) { ' . PHP_EOL . ot_get_option( 'tablets_css', '' ) . PHP_EOL . ' }' . PHP_EOL . '</style>' . PHP_EOL;
	endif;
}

add_action( 'wp_head', 'vestalite_wp_tablet_css_code' );

/**
 * Required: Add Wide Phones CSS
 */
function vestalite_wp_wide_phones_css_code() {
	if ( ot_get_option( 'wide_phones_css', '' ) != '' ):
		echo '<style type="text/css">' . PHP_EOL . '@media screen and (min-width: 480px) and (max-width: 767px) { ' . PHP_EOL . ot_get_option( 'wide_phones_css', '' ) . PHP_EOL . ' }' . PHP_EOL . '</style>' . PHP_EOL;
	endif;
}

add_action( 'wp_head', 'vestalite_wp_wide_phones_css_code' );

/**
 * Required: Add Phones CSS
 */
function vestalite_wp_phones_css_code() {
	if ( ot_get_option( 'phones_css', '' ) != '' ):
		echo '<style type="text/css">' . PHP_EOL . '@media screen and (min-width: 320px) and (max-width: 479px) { ' . PHP_EOL . ot_get_option( 'phones_css', '' ) . PHP_EOL . ' }' . PHP_EOL . '</style>' . PHP_EOL;
	endif;
}

add_action( 'wp_head', 'vestalite_wp_phones_css_code' );