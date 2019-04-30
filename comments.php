<?php
// Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<?php if ( get_comments_number() != 0 ): ?>

	<div class="comments">
		<h4 class="comment-title font-alt">
			<?php comments_number( __( 'No Comments', 'vestalite' ), __( '1 Comment', 'vestalite' ), __( '% Comments', 'vestalite' ) ); ?>
		</h4><!-- End .comment-title -->
		<hr class="divider m-b-30">
		<?php wp_list_comments( 'type=comment&callback=vestalite_wp_comment_format' ); ?>
		<ul class="pager">
			<li><?php previous_comments_link( __( '<i class="fa fa-chevron-left"></i>&nbsp; Older Comments', 'vestalite' ) ); ?></li>
			<li><?php next_comments_link( __( 'Newer Comments &nbsp;<i class="fa fa-chevron-right"></i>', 'vestalite' ) ); ?></li>
		</ul><!-- End .pager -->
	</div>!-- End .comments -->
<?php endif; ?>
<?php if ( comments_open() ): ?>
	<div class="comment-form">
		<h4 class="comment-form-title font-alt">
			<?php _e( 'Leave a comment', 'vestalite' ); ?>
			<?php echo '&nbsp;'; ?>
			<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
				<?php _e( 'You must be', 'vestalite' ); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e( 'logged in', 'vestalite' ); ?></a> <?php _e( 'to post a comment.', 'vestalite' ); ?>
			<?php endif; ?>
		</h4>
		<hr class="divider m-b-30">
		<div class="row">
			<?php
			$aria_req = 'required="required"';

			$args = array(
				'fields' => apply_filters(
						'comment_form_default_fields', array(
					'author' => '<div class="col-md-4"><div class="form-group">' . '<input id="author" placeholder="' . __( '* Name', 'vestalite' ) . '" class="form-control" name="author" type="text" value="' .
					esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />' .
					'</div></div>'
					,
					'email' => '<div class="col-md-4"><div class="form-group">' . '<input id="email" placeholder="' . __( '* Email', 'vestalite' ) . '" name="email" type="email" class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' .
					$aria_req . ' />' .
					'</div></div>',
					'url' => '<div class="col-md-4"><div class="form-group">' .
					'<input id="url" name="url" placeholder="' . __( 'Website', 'vestalite' ) . '" type="url" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /> ' .
					'</div></div>'
						)
				),
				'comment_field' => '<div class="col-md-12"><div class="form-group">' .
				'<textarea id="comment" name="comment" class="form-control" placeholder="' . __( '* Message', 'vestalite' ) . '" rows="6" ' . $aria_req . '></textarea>' .
				'</div></div>',
				'class_form' => '',
				'title_reply_to' => __( 'Reply to %s', 'vestalite' ),
				'comment_notes_after' => '',
				'class_submit' => 'btn btn-round btn-d',
				'title_reply' => ''
			);
			comment_form( $args, $post->ID );
			?>
		</div><!-- End .row -->
	</div><!-- End .comment-form -->

<?php endif; ?>