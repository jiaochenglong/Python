<?php get_header(); ?>

<section id="single">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 blog">
				<?php echo ot_get_option( 'error_404_page_content', '', true ); ?>
			</div><!-- End .blog -->
		</div><!-- End .row -->
	</div><!-- End .container -->
</section>
<!--
	=====================
		End 404
	=====================
-->

<?php get_footer(); ?>