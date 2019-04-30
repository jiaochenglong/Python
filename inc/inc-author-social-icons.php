<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

if (!function_exists('vestalite_wp_get_social')) :

    function vestalite_wp_get_social($existing = false) {
        $social = array(
            '0' => 'None',
            'dribbble' => 'Dribbble',
            'facebook' => 'Facebook',
            'flickr' => 'Flickr',
            'github' => 'Github',
            'googleplus' => 'GooglePlus',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIN',
            'pinterest' => 'Pinterest',
            'skype' => 'Skype',
            'tumblr' => 'Tumblr',
            'twitter' => 'Twitter',
            'vimeo' => 'Vimeo',
            'wordpress' => 'WordPress',
            'yahoo' => 'Yahoo',
            'youtube' => 'Youtube',
        );

        if ($existing) {
            $new_social = array();
            foreach ($social as $key => $soc) {
                if ($key && vestalite_wp_get_option('soc_' . $key . '_url')) {
                    $new_social[$key] = $soc;
                }
            }
            $social = $new_social;
        }

        return $social;
    }

endif;

/* Extend user default social profiles  */
if (!function_exists('vestalite_wp_user_social_profiles')):

    function vestalite_wp_user_social_profiles($contactmethods) {

        unset($contactmethods['aim']);
        unset($contactmethods['yim']);
        unset($contactmethods['jabber']);

        $social = vestalite_wp_get_social();
        foreach ($social as $soc_id => $soc_name) {
            if ($soc_id) {
                $contactmethods[$soc_id] = $soc_name;
            }
        }
        return $contactmethods;
    }

endif;
add_filter('user_contactmethods', 'vestalite_wp_user_social_profiles');
