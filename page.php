<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	<section id="single-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 blog">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'post post-single' ); ?>>
							<?php if ( has_post_thumbnail() ): ?>
								<div class="post-media wow fadeIn" data-wow-duration="0.01s" data-wow-delay="0.01s">
									<?php
									$thumbnail_id = get_post_thumbnail_id();
									$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
									$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
									?>
									<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>" class="post-img" />
								</div><!-- End .post-media -->
							<?php endif; ?>
							<div class="post-entry">
								<?php the_content(); ?>
							</div><!-- End .post-entry -->
						</article><!-- End .post-single -->
					<?php endwhile; ?>
					<?php comments_template( '', true ); ?>
				</div><!-- End .blog -->
				<?php get_sidebar( 'page' ); ?>
			</div><!-- End .row -->
		</div><!-- End .container -->
	</section>
	<!--
		=====================
			End Single
		=====================
	-->

	<?php
	wp_reset_postdata();
elseif ( isset( $_GET['s'] ) ):
	/*
	 * Redirect to 404
	 * This set_404() call ensures the correct class is added to
	 * the body tag without which the error page wouldn't look quite right.
	 */

	global $wp_query;
	$wp_query->set_404();
	include(get_template_directory() . '/404.php');
else:
	/*
	 * Redirect to 404
	 * This set_404() call ensures the correct class is added to
	 * the body tag without which the error page wouldn't look quite right.
	 */

	global $wp_query;
	$wp_query->set_404();
	include(get_template_directory() . '/404.php');
endif;
?>

<?php get_footer(); ?>