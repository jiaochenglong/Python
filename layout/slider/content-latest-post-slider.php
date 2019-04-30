<?php

$limit = ot_get_option( 'latest_post_slider_recent_posts', '3' );
$args = array(
	'post_type' => 'post',
	'meta_key' => '_thumbnail_id',
	'posts_per_page' => $limit,
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ):

	include(locate_template( 'layout/slider/content-owl-main-slider.php' ));

	wp_reset_postdata();

endif;
?>