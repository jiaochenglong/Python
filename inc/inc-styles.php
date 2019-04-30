<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Enqueue theme styles.
 */
function vestalite_wp_theme_styles() {

	//Bootstrap Core
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', '', 'all' );

	//Fontawesome Core
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( 'bootstrap' ), 'all' );
	
	//Animation Core
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array( 'bootstrap' ), 'all' );

	//WordPress Core
	wp_enqueue_style( 'wp_core', get_template_directory_uri() . '/css/wp-core.css', array( 'bootstrap' ), 'all' );

	//OWL Carousel Core
	wp_enqueue_style( 'owl_carousel', get_template_directory_uri() . '/css/owl.carousel.css', array( 'bootstrap' ), 'all' );

	//OWL Transitions Core
	wp_enqueue_style( 'owl_theme', get_template_directory_uri() . '/css/owl.theme.css', array( 'bootstrap' ), 'all' );

	//Vesta Lite Main Style Sheet
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', '', 'all' );
	
	//General Style Sheet
	wp_enqueue_style( 'general', get_template_directory_uri() . '/css/general.css', array( 'bootstrap', 'main' ), 'all' );
}

add_action( 'wp_enqueue_scripts', 'vestalite_wp_theme_styles' );
