<section id="about">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 photo">
				<?php if ( ot_get_option( 'header_about_pic', '', false ) != '' ): ?>
					<img src="<?php echo ot_get_option( 'header_about_pic', '', true ); ?>" alt="" class="img-responsive img-about wow fadeIn" data-wow-duration="0.02s" data-wow-delay="0.01s" />
				<?php endif; ?>
			</div><!-- End .photo -->
			<div class="col-md-6 col-sm-6 bio">
				<div class="about-text">
					<div class="section-title">
                        <h3><?php echo ot_get_option( 'header_about_name', '', true ); ?></h3>
                        <hr>
                        <div class="clearfix"></div>
					</div><!-- End .section-title -->
					<p class="intro">
						<?php echo nl2br( ot_get_option( 'header_about_desc', '', true ) ); ?>
					</p><!-- End .intro -->
					<div class="social">
						<?php get_template_part( 'layout/about/content', 'about-share' ); ?>
					</div><!-- End .social -->
				</div><!-- End .about-text -->
			</div><!-- End .bio --> 
		</div><!-- End .row -->
	</div><!-- End .container -->
</section>
<!--
	=====================
		End About Bio
	=====================
-->