<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Search results per page
 */
function vestalite_wp_change_wp_search_size( $query ) {
	if ( $query->is_search ):
		$query->query_vars['posts_per_page'] = ot_get_option( 'search_results_per_page', '10', true );
	endif;
	return $query;
}

add_filter( 'pre_get_posts', 'vestalite_wp_change_wp_search_size' );

/**
 * Exclude pages from search result
 */
function vestalite_wp_search_filter( $query ) {

	if ( $query->is_search ):
		$query->set( 'post_type', 'post' );
	endif;
	return $query;
}

add_filter( 'pre_get_posts', 'vestalite_wp_search_filter' );
