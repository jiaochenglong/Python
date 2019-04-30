<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Enqueue theme JavaScript
 */
function vestalite_wp_theme_js() {

	// Conditional polyfills
	$conditional_scripts = array(
		'html5shiv' => get_template_directory_uri() . '/js/html5shiv.min.js',
		'html5shiv-printshiv' => get_template_directory_uri() . '/js/html5shiv-printshiv.js',
		'respond' => get_template_directory_uri() . '/js/respond.min.js'
	);
	foreach ( $conditional_scripts as $handle => $src ) {
		wp_enqueue_script( $handle, $src, array(), '', false );
	}
	add_filter( 'script_loader_tag', function( $tag, $handle ) use ( $conditional_scripts ) {
		if ( array_key_exists( $handle, $conditional_scripts ) ) {
			$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
		}
		return $tag;
	}, 10, 2 );

	//Bootstrap Core
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );

	//ImagesLoaded Core
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array( 'jquery', 'bootstrap' ), '', true );

	//jQuery Easing Core
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.js', array( 'jquery', 'bootstrap' ), '', true );

	//SmoothScroll Core
	wp_enqueue_script( 'smooth_scroll', get_template_directory_uri() . '/js/SmoothScroll.js', array( 'jquery', 'bootstrap' ), '', true );

	//Isotope Core
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array( 'jquery', 'bootstrap' ), '', true );

	//Fitvids Core
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery', 'bootstrap' ), '', true );

	//WOW Core
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery', 'bootstrap' ), '', true );

	//OWL Core
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery', 'bootstrap' ), '', true );

	//Retina Ready Core
	wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/retina.min.js', array( 'jquery', 'bootstrap' ), '', true );

	//Vesta Lite JS
	wp_enqueue_script( 'mytheme', get_template_directory_uri() . '/js/mytheme.js', array( 'jquery', 'bootstrap' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'vestalite_wp_theme_js' );
