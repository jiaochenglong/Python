<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Register and load the widget areas.
 */
function vestalite_wp_create_widget() {

	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'vestalite' ),
		'id' => 'blog',
		'description' => __( 'Displays on the right of the blog posts', 'vestalite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title font-alt">',
		'after_title' => '</h5>'
	) );

	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'vestalite' ),
		'id' => 'page',
		'description' => __( 'Displays on the right of the pages', 'vestalite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title font-alt">',
		'after_title' => '</h5>'
	) );
}

add_action( 'widgets_init', 'vestalite_wp_create_widget' );
