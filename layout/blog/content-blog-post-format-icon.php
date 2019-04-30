<?php

/*
 * Set post format custom icons in the begining of the_title.
 */

if ( is_sticky( $post->ID ) ):
		echo '<i class="fa fa-thumb-tack"></i>' . '';
endif;

switch ( get_post_format( $post->ID ) ) {
	case 'video':
		$postformat = '<i class="fa fa-film"></i>';
		break;

	case 'audio':
		$postformat = '<i class="fa fa-volume-up"></i>';
		break;

	case 'image':
		$postformat = '<i class="fa fa-photo"></i>';
		break;

	default:
		$postformat = '<i class="fa fa-file-text-o"></i>';
}

echo $postformat . '';
