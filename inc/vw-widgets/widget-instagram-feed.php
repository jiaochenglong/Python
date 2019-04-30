<?php
/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

// Register and load the widget
add_action('widgets_init', 'vestalite_wp_instagram_photos_widget');

function vestalite_wp_instagram_photos_widget() {
    register_widget('vestalite_wp_instagram_photos');
}

class vestalite_wp_instagram_photos extends WP_Widget {

    function __construct() {
        parent::__construct(
                // Base ID of your widget
                'instagram_photos-widget',
                // Widget name will appear in UI
                'Vesta Lite: ' . __('Instagram Feeds', 'vestalite'),
                // Widget description
                array('description' => __('Showing your latest Instagram photos.', 'vestalite'), 'id_base' => 'instagram-widget', 'classname' => 'instagram-widget')
        );
    }

    // Before and after widget arguments are defined by themes
    function widget($args, $instance) {
        extract($args);

        $instagram_title = apply_filters('widget_instagram_title', $instance['instagram_title']);
        $no_of_photos = $instance['no_of_photos'];
        $instagram_id = $instance['instagram_id'];
        $instagram_tag = $instance['instagram_tag'];

        echo $before_widget;
        
        // Before and after widget arguments are defined by themes
        if ($instagram_title) {
            echo $before_title;
            echo $instagram_title;
            echo $after_title;
        }
        
        wp_register_script('instafeed_core', get_template_directory_uri() . '/js/instafeed.min.js', array('jquery'), '', true);
        wp_register_script('instagram_feed', get_template_directory_uri() . '/js/instagram-feed.js', array('jquery', 'instafeed_core'), '', true);
        
        $translation_array = array(
            'access_token' => $instagram_id,
            'tag_name' => $instagram_tag,
            'limit' => $no_of_photos
        );
        wp_localize_script('instagram_feed', 'instagram_keys_widget', $translation_array);

        wp_enqueue_script('instafeed_core');
        wp_enqueue_script('instagram_feed');
        ?>

        <div id="widgetInsta"></div>

        <div class="clear"></div>
        <?php
        echo $after_widget;
    }

    // Widget Backend 
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['instagram_title'] = strip_tags($new_instance['instagram_title']);
        $instance['no_of_photos'] = strip_tags($new_instance['no_of_photos']);
        $instance['instagram_id'] = strip_tags($new_instance['instagram_id']);
        $instance['instagram_tag'] = strip_tags($new_instance['instagram_tag']);
        return $instance;
    }

    function form($instance) {
        $defaults = array('instagram_id' => '', 'instagram_title' => __('Instagram', 'vestalite'), 'no_of_photos' => '6', 'instagram_tag' => '', 'instagram_display' => 'latest');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('instagram_title'); ?>">Title : </label>
            <input id="<?php echo $this->get_field_id('instagram_title'); ?>" name="<?php echo $this->get_field_name('instagram_title'); ?>" value="<?php echo $instance['instagram_title']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_id'); ?>">Access Token : </label>
            <input id="<?php echo $this->get_field_id('instagram_id'); ?>" name="<?php echo $this->get_field_name('instagram_id'); ?>" value="<?php echo $instance['instagram_id']; ?>" class="widefat" type="text" />
            <small> <?php _e('Find Your Access Token at', 'vestalite'); ?> (<a href="http://instagram.pixelunion.net" target="_blank"><?php _e('Pixelunion', 'vestalite'); ?></a>)</small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_tag'); ?>">Tag : </label>
            <input id="<?php echo $this->get_field_id('instagram_tag'); ?>" name="<?php echo $this->get_field_name('instagram_tag'); ?>" value="<?php echo $instance['instagram_tag']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('no_of_photos'); ?>">Number of photos to show : </label>
            <input id="<?php echo $this->get_field_id('no_of_photos'); ?>" name="<?php echo $this->get_field_name('no_of_photos'); ?>" value="<?php echo $instance['no_of_photos']; ?>" type="text" size="3" />
        </p>

        <?php
    }

}
