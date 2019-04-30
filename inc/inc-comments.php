<?php
/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/*
 * Required: Add Class to Comment Reply Link
 */
add_filter( 'comment_reply_link', 'vestalite_wp_reply_link_class' );

function vestalite_wp_reply_link_class( $class ) {
	$class = str_replace( "class='comment-reply-link", "class='comment-reply-link btn-xs", $class );
	return $class;
}

/*
 * Required: Customize Comment Output
 */

function vestalite_wp_comment_format( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<div class="comment clearfix">	
		<div class="comment-avatar">
			<?php echo get_avatar( $comment, 128 ); ?>
		</div><!-- End .comment-avatar -->
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment-content clearfix' ); ?>>
			<h5 class="comment-author font-alt">
				<?php comment_author_link(); ?>
			</h5><!-- End .comment-author -->
			<div class="comment-body">
				<?php if ( $comment->comment_approved == '0' ): ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'vestalite' ) ?></em>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div><!-- End .comment-body -->
			<div class="comment-meta font-alt">
				<?php echo human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) . __( ' ago', 'vestalite' ); ?>
				<?php echo '&nbsp;-&nbsp;'; ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i>&nbsp;Reply', 'vestalite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- End .comment-meta -->
		</div><!-- End .comment-content -->
	</div><!-- End .comment -->
	<?php
}

/*
 * Required: Remove required fields notice from comment form
 */
add_filter( 'comment_form_defaults', 'vestalite_wp_changing_comment_form_defaults' );

function vestalite_wp_changing_comment_form_defaults( $defaults ) {
	$defaults['comment_notes_before'] = '';
	return $defaults;
}
