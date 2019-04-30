<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Pagination
 */
if ( !function_exists( 'my_pagination' ) ) :

	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $wp_query->max_num_pages,
			'add_fragment' => '',
			'type' => 'array'
		) );

		if ( is_array( $pages ) ) {
			$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
			echo '<ul class="pagination font-alt">';
			foreach ( $pages as $page ) {
				echo "<li>$page</li>";
			}
			echo '</ul>';
		}
	}
    
endif;