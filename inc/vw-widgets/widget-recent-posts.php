<?php
/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Recent Posts With Thumbnails
 */
Class vestalite_recent_posts_widget extends WP_Widget_Recent_Posts {

	public function __construct() {
		WP_Widget::__construct(
				'vw-recent-posts', 'Vesta Lite: ' . __( 'Recent Posts', 'vestalite' ), array(
			'classname' => 'vw_recent_post_with_thumbs_widget',
			'description' => __( 'Your site’s most recent posts.', 'vestalite' )
				)
		);
	}

	// Before and after widget arguments are defined by themes
	function widget( $args, $instance ) {

		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'vestalite' ) : $instance['title'], $instance, $this->id_base );

		if ( empty( $instance['number'] ) || !$number = absint( $instance['number'] ) )
			$number = 10;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ( $r->have_posts() ) :

			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;
			?>
			<ul class="widget-posts">
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>	

					<li class="clearfix">
						<div class="widget-posts-image">
							<a href="<?php the_permalink(); ?>" target="_self">
								<?php the_post_thumbnail( 'medium', array( 'class' => "img-responsive" ) ); ?>
							</a>
						</div><!-- End .widget-posts-image -->
						<div class="widget-posts-body">
							<h6 class="widget-posts-title font-alt">
								<a href="<?php the_permalink(); ?>" target="_self">
									<?php the_title(); ?>
								</a>
							</h6><!-- End .widget-posts-title -->
							<div class="widget-posts-meta">
								<?php _e( 'By ', 'vestalite' ); ?>
								<?php the_author(); ?>
								<?php echo ',&nbsp;'; ?>
								<?php echo the_time( 'M j' ); ?>
							</div><!-- End .widget-posts-meta -->
						</div><!-- End .widget-posts-body -->
					</li><!-- End .clearfix -->
				<?php endwhile; ?>
			</ul>

			<?php
			echo $after_widget;

			wp_reset_postdata();

		endif;
	}

}

function vestalite_recent_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'vestalite_recent_posts_widget' );
}

add_action( 'widgets_init', 'vestalite_recent_widget_registration' );
