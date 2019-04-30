
<section id="mainslider" class="text-center">
	<div class="overlay">
		<div class="container">
			<div class="mainslider owl-carousel owl-theme">
				<?php
				$counter = 0.2;
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					?>
					<div class="item wow fadeIn" data-wow-duration="0.01s" data-wow-delay="<?php echo $counter; ?>s">
						<div class="thumbnail">
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
							?>
							<div class="social">
								<div class="icon facebook">
									<a href="<?php echo $facebookURL; ?>" target="_blank">
										<i class="fa fa-facebook"></i>
									</a>
								</div><!-- End .facebook -->
								<div class="icon twitter">
									<a href="<?php echo $twitterURL; ?>" target="_blank">
										<i class="fa fa-twitter"></i>
									</a>
								</div><!-- End .twitter -->
								<div class="icon google-plus">
									<a href="<?php echo $googleURL; ?>" target="_blank">
										<i class="fa fa-google-plus"></i>
									</a>
								</div><!-- End .google-plus -->
								<div class="icon pinterest">
									<a href="<?php echo $pintrestURL; ?>" target="_blank">
										<i class="fa fa-pinterest-p"></i>
									</a>
								</div><!-- End .pinterest -->
							</div><!-- End .social -->
							<div class="post-img" style="background-image: url('<?php echo $thumbnail_url[0]; ?>');"></div>
							<div class="caption">
								<h3>
									<a href="<?php the_permalink(); ?>" target="_self">
										<?php the_title(); ?>
									</a>
								</h3>
								<p><?php the_category( ', ' ); ?></p>
							</div><!-- End .caption -->
						</div><!-- End .thumbnail -->
					</div><!-- End .item -->
					<?php
					$counter = $counter + 0.2;
				endwhile;
				?>
			</div><!-- End .mainslider -->
		</div><!-- End .container -->
	</div><!-- End .overlay -->
</section>
<!--
	=====================
	  End Main Slider
	=====================
-->