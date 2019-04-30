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
					<?php _e('Monthly Archives for ', 'vestalite'); ?>
					<?php single_month_title(); ?>
				</h2>
			</div><!-- End .section-title -->
			<div class="space"></div>
			<?php get_template_part( 'layout/blog/content', 'blog-loop' ); ?>
		</div><!-- End .container -->
	</section>
	<!--
		=====================
			End Archive
		=====================
	-->
	
	<?php get_template_part( 'layout/blog/content', 'blog-pagination' ); ?>

	<?php
	wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>