<?php
/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

// Register and load the widget
add_action( 'widgets_init', 'vestalite_wp_search_widget' );

function vestalite_wp_search_widget() {
	register_widget( 'vestalite_wp_search' );
}

class vestalite_wp_search extends WP_Widget {

	function __construct() {
		parent::__construct(
				// Base ID of your widget
				'widget-search',
				// Widget name will appear in UI
				'Vesta Lite: ' . __( 'Search Form', 'vestalite' ),
				// Widget description
				array( 'description' => __( 'Show WordPress search form in your website.', 'vestalite' ), 'id_base' => 'widget-search', 'classname' => 'widget-search' )
		);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		// Before and after widget arguments are defined by themes
		if ( $title ) {
			echo $before_title;
			echo $title;
			echo $after_title;
		}
		vestalite_wp_search_form();
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => __( 'Search', 'vestalite' ) );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'vestalite' ) ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if ( !empty( $instance['title'] ) ) echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<?php
	}

}

/* ----------------------------------------------------------------------------------- */
# Search Form
/* ----------------------------------------------------------------------------------- */

function vestalite_wp_search_form() {
	?>
	<form method="get" action="<?php echo home_url( '/' ); ?>">
		<div class="search-box">
				<input type="search" class="form-control" name="s" required="required" title="<?php echo esc_attr_x( 'Search for:', 'label', 'vestalite' ) ?>" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'vestalite' ) ?>" />
				<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
		</div><!-- End .search-box -->
	</form>
	<?php
}
