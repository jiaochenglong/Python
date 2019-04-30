<div id="blog-masonry">
	<?php
	$counter = 0.2;
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="col-md-4 col-sm-6 blog wow fadeIn" data-wow-duration="0.02s" data-wow-delay="<?php echo $counter; ?>s">
				<?php get_template_part( 'layout/blog/content', 'blog-post-format' ); ?>
				<h3>
					<a href="<?php the_permalink(); ?>" target="_self">
						<?php the_title(); ?>
					</a>
				</h3>
				<h4>
					<?php
					get_template_part( 'layout/blog/content', 'blog-post-format-icon' );
					_e( 'By ', 'vestalite' );
					the_author();
					echo '&nbsp;.&nbsp;';
					comments_number( __( '', 'vestalite' ), __( '', 'vestalite' ), __( '%', 'vestalite' ) );
					?>
				</h4>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" target="_blank" class="read-more">
					<?php _e( '&#x67E5;&#x770B;&#x66F4;&#x591A;', 'vestalite' ); ?>
					<i class="fa fa-angle-right"></i>
				</a><!-- End .read-more -->
			</div><!-- End .blog -->
		</article>
		<!--
			=====================
				End Article
			=====================
		-->
		<?php
		$counter = $counter + 0.2;
	endwhile;
	?>
</div><!-- End #blog-masonry -->