<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */


/*
 * Recommended: Remove title tag from navigation, page menu, list categories.
 */

function vestalite_wp_my_menu_notitle( $menu ) {
	return $menu = preg_replace( '/ title=\"(.*?)\"/', '', $menu );
}

add_filter( 'wp_nav_menu', 'vestalite_wp_my_menu_notitle' );
add_filter( 'wp_page_menu', 'vestalite_wp_my_menu_notitle' );
add_filter( 'wp_list_categories', 'vestalite_wp_my_menu_notitle' );

/*
 * Recommended: Change post default excerpt length.
 */

function vestalite_wp_custom_excerpt_length( $length ) {
	return 25;
}

add_filter( 'excerpt_length', 'vestalite_wp_custom_excerpt_length', 999 );

/*
 * Recommended: Change post default more symbol.
 */

function vestalite_wp_new_excerpt_more( $more ) {
	return ' ...';
}

add_filter( 'excerpt_more', 'vestalite_wp_new_excerpt_more' );

/*
 * Required: WP_TITLE filter.
 */
add_filter( 'wp_title', 'vestalite_wp_filter_pagetitle' );

function vestalite_wp_filter_pagetitle( $title ) {
	//check if its a blog post
	if ( !is_single() )
		return $title;

	//if you get here then its a blog post so change the title
	global $wp_query;
	if ( isset( $wp_query->post->post_title ) ) {
		return $wp_query->post->post_title;
	}

	//if wordpress can't find the title return the default
	return $title;
}

/*
 * Required: Increases your website's upload max filesize limit on your server.
 */

function vestalite_wp_upload_size_limit_filterw( $size ) {
	return 1536000 * 34; //Your Size in kb (50 MB)
}

add_filter( 'upload_size_limit', 'vestalite_wp_upload_size_limit_filterw', 12 );

/*
 * Required: Filter default WordPress gallery style sheet
 */

function vestalite_wp_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'vestalite_wp_remove_gallery_css' );

/*
 * Required: Remove the 28px Push Down from the Admin Bar.
 */
add_action( 'get_header', 'my_filter_head' );

function my_filter_head() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}

/*
 * Required: Change html output in categories widget
 */

add_filter( 'wp_list_categories', 'vestalite_wp_add_span_cat_count' );

function vestalite_wp_add_span_cat_count( $links ) {
	$links = str_replace( '</a> (', '</a> <span class="cat-count">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
