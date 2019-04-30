<ul>
	<?php
	$target = '';
	$social_links = ot_get_option( 'header_social_links', '', false );
	if ( !empty( $social_links ) ):
		foreach ( $social_links as $key => $icon ):
			$target = '';
			if ( isset( $icon['header_social_target'][0] ) && !empty( $icon['header_social_target'][0] ) ):
				$target = "target=\"_blank\"";
			else:
				$target = "target=\"_self\"";
			endif;
			?>
			<li>
				<a href="<?php echo $icon['header_social_link']; ?>" <?php echo $target; ?>>
					<i class="fa <?php echo $icon['header_social_icon']; ?>"></i>
				</a>
			</li>
			<?php
		endforeach;
	endif;
	?>
</ul>