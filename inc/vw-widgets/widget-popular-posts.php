<?php
/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

// Register and load the widget
add_action( 'widgets_init', 'vestalite_popular_posts_widget' );

function vestalite_popular_posts_widget() {
	register_widget( 'vestalite_wp_popular_posts_widget' );
}

class vestalite_wp_popular_posts_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				// Base ID of your widget
				'widget-popular-posts',
				// Widget name will appear in UI
				'Vesta Lite: ' . __( 'Popular Posts Widget', 'vestalite' ),
				// Widget description
				array( 'description' => __( 'Show your popular posts.', 'vestalite' ), 'id_base' => 'widget-popular-posts', 'classname' => 'widget-popular-posts' )
		);
	}

	// Before and after widget arguments are defined by themes
	function widget( $args, $instance ) {
		extract( $args );

		$title = $instance['title'];
		$postscount = $instance['posts'];

		echo $before_widget;

		// Before and after widget arguments are defined by themes
		if ( $title ) {
			echo $before_title;
			echo $title;
			echo $after_title;
		}
		?>
		<ul class="widget-posts">
			<?php
			/*
			 * SHOW the posts
			 */
			$args = array(
				'posts_per_page' => $postscount,
				'post_type' => 'post',
				'orderby' => 'comment_count',
				'ignore_sticky_posts' => 1,
				'post_status' => 'publish'
			);
			$pc = new WP_Query( $args );

			while ( $pc->have_posts() ) : $pc->the_post();

				?>
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
	}

	// Widget Backend 
	function update( $newInstance, $oldInstance ) {
		$instance = $oldInstance;
		$instance['title'] = strip_tags( $newInstance['title'] );
		$instance['posts'] = $newInstance['posts'];

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Popular Posts', 'posts' => 3 );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title: ', 'vestalite' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if ( !empty( $instance['title'] ) ) echo $instance['title']; ?>" class="widefat" type="text" />
		</p> 

		<p>
			<label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php _e( 'Number of Posts: ', 'vestalite' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'posts' ); ?>" name="<?php echo $this->get_field_name( 'posts' ); ?>" value="<?php if ( !empty( $instance['posts'] ) ) echo $instance['posts']; ?>" class="widefat" type="text" />
		</p> 

		<?php
	}

}
