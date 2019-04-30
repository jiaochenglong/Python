<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 * Vesta Lite functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 */

ob_start();

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/option-tree/ot-loader.php' );

/**
 * Required: Theme Options.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-theme-options.php');

/**
 * Required: Theme Options Import & Export.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-import-export-theme-options.php');

/**
 * Required: Post Types.
 */
add_theme_support( 'post-formats', array( 'image', 'video', 'audio' ) );

/**
 * Recommended: Title Tag.
 */
add_theme_support( "title-tag" );

/**
 * Recommended: Content Width.
 */
if ( !isset( $content_width ) ):

	$content_width = 1140;

endif;

/**
 * Required: Menu.
 */
add_theme_support( 'menus' );

function register_theme_menus() {
	register_nav_menus(
			array(
				'header_menu_first' => __( 'Header First Menu', 'vestalite' ),
				'header_menu_second' => __( 'Header Second Menu', 'vestalite' )
			)
	);
}

add_action( 'init', 'register_theme_menus' );

require_once( trailingslashit( get_template_directory() ) . 'inc/inc-wp-bootstrap-navwalker.php');

/**
 * Required: Post thumbnails.
 */
add_theme_support( 'post-thumbnails' );

/**
 * Recommended: Automatic Feed.
 */
add_theme_support( 'automatic-feed-links' );

/*
 * Required: HTML5 markup for the search forms.
 */
add_theme_support( 'html5', array( 'search-form' ) );

/**
 * Recommended: Languages.
 */
add_action( 'after_setup_theme', 'vestalite_theme_setup' );

function vestalite_theme_setup() {

	load_theme_textdomain( 'vestalite', get_template_directory() . '/languages' );
}

/**
 * Required: Enqueue theme styles.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-styles.php');

/**
 * Required: Enqueue theme JavaScript.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-js.php');

/**
 * Required: Widgets.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-widgets.php');

/**
 * Required: Search form widget.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/vw-widgets/widget-search.php');

/**
 * Required: Popular Posts widget.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/vw-widgets/widget-popular-posts.php');

/**
 * Required: Recent posts widget.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/vw-widgets/widget-recent-posts.php');

/**
 * Required: Instagram feed widget.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/vw-widgets/widget-instagram-feed.php');

/**
 * Required: Facebook Like Box widget.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/vw-widgets/widget-facebook.php');

/**
 * Required: Vesta Lite Theme Filters
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-vw-filters.php');

/**
 * Required: Custom Comments.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-comments.php');

/*
 * Required: My Pagination.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-my-pagination.php');

/**
 * Required: Customize Search Results To Posts.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-search.php');

/*
 * Required: Flush rewrite rules for custom post types.
 */
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

/* Flush your rewrite rules */

function bt_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/**
 * Required: Webmaster Tools.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-webmaster-tools.php');

/**
 * Required: Extend user default social profiles.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-author-social-icons.php');

/**
 * Required: Theme Update Notification.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-update-notification.php');