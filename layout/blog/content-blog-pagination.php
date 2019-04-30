<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center m-t-90 m-b-110 wow fadeIn">
			<?php my_pagination(); ?>
		</div>
	</div><!-- End .row -->
</div><!-- End .container -->

<?php

$defaults = array(
	'before' => '<p>' . __( 'Pages:', 'vestalite' ),
	'after' => '</p>',
	'link_before' => '',
	'link_after' => '',
	'next_or_number' => 'number',
	'separator' => ' ',
	'nextpagelink' => __( 'Next page', 'vestalite' ),
	'previouspagelink' => __( 'Previous page', 'vestalite' ),
	'pagelink' => '%',
	'echo' => 0
);

wp_link_pages( $defaults );

?>