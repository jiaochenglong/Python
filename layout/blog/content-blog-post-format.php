<?php
/*
 * Video Post Format
 */
if ( get_post_format( $post->ID ) == 'video' ):

	$get_video = get_post_meta( $post->ID, '_format_video_embed', true );
	if ( strpos( $get_video, '[/video]' ) !== false ):
		echo do_shortcode( $get_video );
	else:
		echo $get_video;
	endif;

/*
 * Audio Post Format
 */
elseif ( get_post_format( $post->ID ) == 'audio' ):
	$get_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
	if ( strpos( $get_audio, '[/audio]' ) !== false ):
		echo do_shortcode( $get_audio );
	else:
		echo $get_audio;
	endif;

/*
 * Standard and Image Post Format
 */
else :
	?>
	<?php if ( !is_single() && has_post_thumbnail() ): ?>
	<span><?php echo the_time( 'j' ); ?><br><?php echo the_time( 'M' ); ?></span>
		<a href="<?php the_permalink(); ?>" target="_self">
			<?php
			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
			$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
			?>
			<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>" class="post-img" />
		</a>
	<?php elseif ( is_single() && has_post_thumbnail() ): ?>
	<span><?php echo the_time( 'j' ); ?><br><?php echo the_time( 'M' ); ?></span>
		<?php
		$thumbnail_id = get_post_thumbnail_id();
		$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
		$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		?>
		<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>" class="post-img" />
	<?php endif; ?>
<?php endif; ?>