<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	<section id="single">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 blog">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'post post-single' ); ?>>
							<div class="post-media wow fadeIn" data-wow-duration="0.01s" data-wow-delay="0.02s">
								<?php get_template_part( 'layout/blog/content', 'blog-post-format' ); ?>
							</div><!-- End .post-media -->
							<div class="post-meta font-alt">
								<h5>
									<?php
									get_template_part( 'layout/blog/content', 'blog-post-format-icon' );
									_e( 'By ', 'vestalite' );
									the_author();
									echo '&nbsp;&nbsp;';
									echo the_time( 'Y/m/d' );
									echo '&nbsp;&nbsp;';
									the_category( ', ' );
									echo '&nbsp;&nbsp;';
									comments_number( __( '', 'vestalite' ), __( '', 'vestalite' ), __( '', 'vestalite' ) );
									?>
								</h5>
							</div><!-- End .font-alt -->
							<div class="post-header">
								<h2 class="post-title font-alt">
									<?php the_title(); ?>
								</h2><!-- End .post-title -->
							</div><!-- End .post-header -->
							<div class="post-entry">
								<?php the_content(); ?>
							</div><!-- End .post-entry -->
							<?php
							$thumbnail_id = get_post_thumbnail_id();
							$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full', true );
							$shortURL = esc_url( get_permalink() );
							$shortTitle = strip_tags( get_the_title() );
							$newShortTitle = str_replace( ' ', '%20', $shortTitle );
							$protocol = is_ssl() ? 'https' : 'http';
							$twitterURL = 'https://twitter.com/intent/tweet?text=' . $newShortTitle . '&amp;url=' . $shortURL . '&amp;source=webclient';
							$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $shortURL;
							$googleURL = 'https://plus.google.com/share?url=' . $shortURL;
							$pintrestURL = 'http://pinterest.com/pin/create/button/?url=' . $shortURL . '&amp;description=' . $newShortTitle . '&amp;media=' . $thumbnail_url[0];
							$linkedinURL = 'http://www.linkedin.com/shareArticle?url=' . $shortURL . '&amp;title=' . $newShortTitle . '';
							$emailURL = 'mailto:?Subject=' . $newShortTitle . '&amp;' . 'Body=' . $shortURL;
							$rssURL = $shortURL . 'feed';
							?>
							<ul class="social-icon-links socicon-round">
								<li><a href="<?php echo $facebookURL; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo $twitterURL; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo $googleURL; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="<?php echo $pintrestURL; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
								<li><a href="<?php echo $linkedinURL; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="<?php echo $emailURL; ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
								<li><a href="<?php echo $rssURL; ?>"><i class="fa fa-rss"></i></a></li>
							</ul><!-- End .social-icon-links -->
							<?php the_tags( '<div class="tags m-t-20">', '', '</div>' ); ?>
						</article><!-- End .post-single -->
					<?php endwhile; ?>
					<div class="post-author">
						<h4 class="post-author-title font-alt">
							<?php _e( 'Author', 'vestalite' ); ?>
						</h4><!-- End .post-author-title -->
						<hr class="divider m-b-30">
						<div class="author-bio">
							<div class="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bswp_author_bio_avatar_size', 128 ) ); ?>
							</div><!-- End .author-avatar -->
							<div class="author-content">
								<h5 class="author-name font-alt"><?php printf( __( 'About %s', 'vestalite' ), get_the_author() ); ?></h5>
								<p><?php the_author_meta( 'description' ); ?></p>
								<ul class="social-icon-links socicon-round">
									<?php $user_social = vestalite_wp_get_social(); ?>			
									<?php foreach ( $user_social as $soc_id => $soc_name ): ?>
										<?php if ( $social_meta = get_the_author_meta( $soc_id ) ) : ?>
											<?php
											if ( $soc_id == 'googleplus' ):
												$soc_id = 'google-plus';
											endif;
											?>
											<li><a href="<?php echo $social_meta; ?>" target="_blank"><i class="fa fa-<?php echo $soc_id; ?>"></i></a></li>
												<?php endif; ?>			
											<?php endforeach; ?>
								</ul><!-- End .social-icon-links -->
							</div><!-- End .author-content -->
						</div><!-- End .author-bio -->
					</div><!-- End .post-author -->
					<?php comments_template( '', true ); ?>
				</div><!-- End .blog -->
				<?php get_sidebar(); ?>
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