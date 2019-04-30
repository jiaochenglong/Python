<?php
/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

// Register and load the widget
add_action( 'widgets_init', 'vestalite_wp_facebook_widget_box' );

function vestalite_wp_facebook_widget_box() {
	register_widget( 'vestalite_wp_facebook_widget' );
}

class vestalite_wp_facebook_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				// Base ID of your widget
				'facebook-widget',
				// Widget name will appear in UI
				'Vesta Lite: ' . __( 'Facebook Like Box', 'vestalite' ),
				// Widget description
				array( 'description' => __( 'Display Facebook like box in your website.', 'vestalite' ), 'id_base' => 'facebook-widget', 'classname' => 'facebook-widget' )
		);
	}

	// Before and after widget arguments are defined by themes
	function widget( $args, $instance ) {
		extract( $args );

		$color = 'light';
		if ( !empty( $instance['dark'] ) ) {
			$color = 'dark';
		}
		$title = apply_filters( 'widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$protocol = is_ssl() ? 'https' : 'http';

		echo $before_widget;

		// Before and after widget arguments are defined by themes
		if ( $title ) {
			echo $before_title;
			echo $title;
			echo $after_title;
		}
		?>
		<div class="facebook-box">
			<iframe src="<?php echo $protocol ?>://www.facebook.com/plugins/likebox.php?href=<?php echo $page_url ?>&amp;width=300&amp;height=250&amp;colorscheme=<?php echo $color; ?>&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; max-width:300px; height:210px;"></iframe>
		</div>
		<?php
		echo $after_widget;
	}

	// Widget Backend 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['dark'] = strip_tags( $new_instance['dark'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => __( 'Find us on Facebook', 'vestalite' ), 'page_url' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title : ', 'vestalite' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e( 'Page Url : ', 'vestalite' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dark' ); ?>"><?php _e( 'Dark Skin ?', 'vestalite' ) ?></label>
			<input id="<?php echo $this->get_field_id( 'dark' ); ?>" name="<?php echo $this->get_field_name( 'dark' ); ?>" value="true" <?php if ( !empty( $instance['dark'] ) ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>

		<?php
	}

}
