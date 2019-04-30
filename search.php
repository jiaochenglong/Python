<?php get_header(); ?>

<?php
/*
 * Main Blog Layout
 */
if ( have_posts() ):
	?>

	<section id="blog" class="text-left">
		<div class="container">
			<div class="section-title center wow fadeIn">
				<h2>
					<?php _e( 'Results for: ', 'vestalite' ); ?>
					<?php echo '&nbsp;&nbsp;' . $_GET['s']; ?>
				</h2>
			</div><!-- End .section-title -->
			<div class="space"></div>
			<?php get_template_part( 'layout/blog/content', 'blog-loop' ); ?>
		</div><!-- End .container -->
	</section>
	<!--
		=========================
			End Search Result
		=========================
	-->

	<?php get_template_part( 'layout/blog/content', 'blog-pagination' ); ?>

	<?php
	wp_reset_postdata();

else :

	/*
	 * Redirect to 404
	 * This set_404() call ensures the correct class is added to
	 * the body tag without which the error page wouldn't look quite right.
	 */

	global $wp_query;
	$wp_query->set_404();
	header( 'HTML/1.1 404 Not Found', true, 404 );
	header( 'Status: 404 Not Found' );
	include(get_template_directory() . '/404.php');

endif;
?>

<?php get_footer(); ?>