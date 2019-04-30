<?php

$limit = ot_get_option( 'posts_count_custom_slider', '3' );
$categories = implode( ',', ot_get_option( 'categories_custom_slider', '' ) );
$order = ot_get_option( 'order_custom_slider', 'rand' );

if ( $order == 'rand' ):

	$args = array(
		'post_type' => 'post',
		'cat' => $categories,
		'meta_key' => '_thumbnail_id',
		'posts_per_page' => $limit,
		'orderby' => 'rand',
	);

else:
	$args = array(
		'post_type' => 'post',
		'cat' => $categories,
		'meta_key' => '_thumbnail_id',
		'posts_per_page' => $limit,
	);

endif;

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ):

	include(locate_template( 'layout/slider/content-owl-main-slider.php' ));

	wp_reset_postdata();

endif;
?>