<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

/**
 * Google Webmaster Tools
 */
function vestalite_wp_google_webmaster_tools() {
    $google_webmaster_tools = ot_get_option('google_webmaster_tools', '', false);
    if (!empty($google_webmaster_tools)) {
        echo "\n" . '<meta name="google-site-verification" content="' . esc_attr($google_webmaster_tools) . '">';
    }
}

add_action('wp_head', 'vestalite_wp_google_webmaster_tools');

/**
 * Bing Webmaster Tools
 */
function vestalite_wp_bing_webmaster_tools() {
    $bing_webmaster_tools = ot_get_option('bing_webmaster_tools', '', false);
    if (!empty($bing_webmaster_tools)) {
        echo "\n" . '<meta name="msvalidate.01" content="' . esc_attr($bing_webmaster_tools) . '" />';
    }
}

add_action('wp_head', 'vestalite_wp_bing_webmaster_tools');

/**
 * Alexa Verification ID
 */
function vestalite_wp_alexa_verification_id() {
    $alexa_verification_id = ot_get_option('alexa_verification_id', '', false);
    if (!empty($alexa_verification_id)) {
        echo "\n" . '<meta name="alexaVerifyID" content="' . esc_attr($alexa_verification_id) . '" />';
    }
}

add_action('wp_head', 'vestalite_wp_alexa_verification_id');

/**
 * Add Google Analytics Code to head
 */
function vestalite_wp_google_analytics_code() {
    $google_analytics_ua_code = ot_get_option('google_analytics_ua_code', '', false);
    if (!empty($google_analytics_ua_code)) {
        ?>
        <script type="text/javascript">
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '<?php echo esc_attr($google_analytics_ua_code); ?>', 'auto');
            ga('send', 'pageview');

        </script>

        <?php
    }
}

add_action('wp_head', 'vestalite_wp_google_analytics_code');

/**
 * Display SEO meta data
 */
function vestalite_wp_seo_meta_data() {
    $site_tagline = get_bloginfo('description', 'display');
    $general_description = ot_get_option('seo_description', '');
    $general_eywords = ot_get_option('seo_keywords', '');

    if (empty($general_description)) {
        $general_description = $site_tagline;
    }
    if (!empty($general_description)) {
        echo '<meta name="description" content="' . esc_attr($general_description) . '" />' . PHP_EOL;
    }
    if (!empty($general_eywords)) {
        echo '<meta name="keywords" content="' . esc_attr($general_eywords) . '" />' . PHP_EOL;
    }
}

if (!defined('WPSEO_VERSION')) {
    add_action('wp_head', 'vestalite_wp_seo_meta_data');
}