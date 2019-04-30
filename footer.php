<div id="go-top">
	<div class="go-totop wow fadeInUp">
		<a class="page-scroll" href="#_">
			<i class="fa fa-angle-double-up"></i>
		</a><!-- End .page-scroll -->
	</div><!-- End #go-totop -->
</div><!-- End #go-top -->
<footer id="footer">
	<div class="container">
		<?php if ( ot_get_option( 'copyright_text', '', true ) != '' ): ?>
			<p>
				<?php echo ot_get_option( 'copyright_text', '', true ); ?>
			</p><!-- End .copyright -->
		<?php endif; ?>
		<?php get_template_part( 'layout/footer/content', 'footer-share' ); ?>
	</div><!-- End .container -->
</footer>
<!--
	=====================
		End Footer
	=====================
-->

<?php wp_footer(); ?>

</body>
</html>