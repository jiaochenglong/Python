<?php get_header(); ?>

<?php
/*
 * Main Slider
 */
if ( ot_get_option( 'header_slider', 'no_slider' ) == 'latest_post_slider' && is_home() ):
	get_template_part( 'layout/slider/content', 'latest-post-slider' );
elseif ( ot_get_option( 'header_slider', 'no_slider' ) == 'custom_post_slider' && is_home() ):
	get_template_part( 'layout/slider/content', 'custom-post-slider' );
elseif ( ot_get_option( 'header_slider', 'no_slider' ) == 'no_slider' && is_home() ):
	echo '<div class="clearfix"></div>';
endif;

/*
 * About Me
 */
if ( ot_get_option( 'header_about_area', 'off', false ) != 'off' && is_home() ):
	get_template_part( 'layout/about/content', 'about-me' );
endif;
?>

<?php
/*
 * Main Blog Layout
 */
if ( have_posts() ):
	?>

	<section id="blog" class="text-left">
		<div class="container">
			<div class="space"></div>
			<?php get_template_part( 'layout/blog/content', 'blog-loop' ); ?>
		</div><!-- End .container -->
	</section>
	<!--
		=====================
			End Blog
		=====================
	-->
	
	<?php get_template_part( 'layout/blog/content', 'blog-pagination' ); ?>

	<?php
	wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>
