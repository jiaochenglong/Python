<?php

/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {

	/* OptionTree is not loaded yet, or this is not an admin request */
	if ( !function_exists( 'ot_settings_id' ) || !is_admin() )
		return false;

	/**
	 * Get a copy of the saved settings array. 
	 */
	$saved_settings = get_option( ot_settings_id(), array() );

	/**
	 * Custom settings array that will eventually be 
	 * passes to the OptionTree Settings API Class.
	 */
	$custom_settings = array(
		'contextual_help' => array(
			'sidebar' => ''
		),
		'sections' => array(
			array(
				'id' => 'header',
				'title' => __( 'Header', 'vestalite' )
			),
			array(
				'id' => 'footer',
				'title' => __( 'Footer', 'vestalite' )
			),
			array(
				'id' => 'favicon_settings',
				'title' => __( 'Favicon', 'vestalite' )
			),
			array(
				'id' => 'fonts_manager',
				'title' => __( 'Fonts Manager', 'vestalite' )
			),
			array(
				'id' => 'typography',
				'title' => __( 'Typography', 'vestalite' )
			),
			array(
				'id' => 'error_404',
				'title' => __( 'Error 404', 'vestalite' )
			),
			array(
				'id' => 'featured',
				'title' => __( 'Featured Post', 'vestalite' )
			),
			array(
				'id' => 'quote',
				'title' => __( 'Quote Post', 'vestalite' )
			),
			array(
				'id' => 'instagram',
				'title' => __( 'Instagram', 'vestalite' )
			),
			array(
				'id' => 'newsletter',
				'title' => __( 'Newsletter', 'vestalite' )
			),
			array(
				'id' => 'webmaster_tools',
				'title' => __( 'Webmaster Tools', 'vestalite' )
			),
			array(
				'id' => 'custom_css',
				'title' => __( 'Custom CSS', 'vestalite' )
			),
			array(
				'id' => 'custom_login',
				'title' => __( 'Custom Login', 'vestalite' )
			),
			array(
				'id' => 'advanced_options',
				'title' => __( 'Advanced Options', 'vestalite' )
			),
			array(
				'id' => 'get_premium',
				'title' => __( 'Get Premium', 'vestalite' )
			)
		),
		'settings' => array(
			array(
				'id' => 'favicon_general',
				'label' => __( 'Favicon', 'vestalite' ),
				'desc' => __( 'You can put url of an ico image that will represent your website\'s favicon (16px x 16px).
<br />
<em>Note: Allowed extensions are .ico, .jpg, .png and .gif</em>', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'favicon_settings',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'apple_iphone_icon',
				'label' => __( 'Apple iPhone Icon', 'vestalite' ),
				'desc' => __( 'Icon for Apple iPhone (57px x 57px).
<br />
<em>Note: Allowed extensions are .ico, .jpg, .png and .gif</em>', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'favicon_settings',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'apple_iphone_retina_icon',
				'label' => __( 'Apple iPhone Retina Icon', 'vestalite' ),
				'desc' => __( 'Icon for Apple iPhone Retina Version (114px x 114px).
<br />
<em>Note: Allowed extensions are .ico, .jpg, .png and .gif</em>', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'favicon_settings',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'apple_ipad_icon',
				'label' => __( 'Apple iPad Icon', 'vestalite' ),
				'desc' => __( 'Icon for Apple iPhone (72px x 72px).
<br />
<em>Note: Allowed extensions are .ico, .jpg, .png and .gif</em>', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'favicon_settings',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'apple_ipad_retina_icon',
				'label' => __( 'Apple iPad Retina Icon', 'vestalite' ),
				'desc' => __( 'Icon for Apple iPad Retina Version (144px x 144px).
<br />
<em>Note: Allowed extensions are .ico, .jpg, .png and .gif</em>', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'favicon_settings',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'navbar_tab_header_options',
				'label' => __( 'Logo', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'logo_image_status',
				'label' => __( 'Add Logo Image', 'vestalite' ),
				'desc' => '',
				'std' => 'off',
				'type' => 'on-off',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'logo_text',
				'label' => __( 'Logo Text', 'vestalite' ),
				'desc' => __( 'Enter your brand here.', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'logo_image_status:is(off)',
				'operator' => 'and'
			),
			array(
				'id' => 'navbar_brand_typography',
				'label' => __( 'Navbar Brand', 'vestalite' ),
				'desc' => __( 'Change default text style for Navbar Brand.', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'logo_image_status:is(off)',
				'operator' => 'and'
			),
			array(
				'id' => 'logo_image',
				'label' => __( 'Logo Image', 'vestalite' ),
				'desc' => __( 'If you would like to use your own custom logo image click the Upload Image button.', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'logo_image_status:is(on)',
				'operator' => 'and'
			),
			array(
				'id' => 'slider_tab_header_options',
				'label' => __( 'Slider', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'header_slider',
				'label' => __( 'Header Slider', 'vestalite' ),
				'desc' => '',
				'std' => 'no_slider',
				'type' => 'select',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and',
				'choices' => array(
					array(
						'value' => 'no_slider',
						'label' => __( 'No Slider', 'vestalite' ),
						'src' => ''
					),
					array(
						'value' => 'latest_post_slider',
						'label' => __( 'Latest Post Slider', 'vestalite' ),
						'src' => ''
					),
					array(
						'value' => 'custom_post_slider',
						'label' => __( 'Custom Post Slider', 'vestalite' ),
						'src' => ''
					)
				)
			),
			array(
				'id' => 'latest_post_slider_recent_posts',
				'label' => __( 'Posts Count', 'vestalite' ),
				'desc' => __( 'Change default items that appear in homepage carousel slider.', 'vestalite' ),
				'std' => '3',
				'type' => 'numeric-slider',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '3,12,1',
				'class' => '',
				'condition' => 'header_slider:is(latest_post_slider)',
				'operator' => 'and'
			),
			array(
				'id' => 'categories_custom_slider',
				'label' => __( 'Categories', 'vestalite' ),
				'desc' => __( 'Choose custom categories to display featured images in slider.', 'vestalite' ),
				'std' => '',
				'type' => 'category-checkbox',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_slider:is(custom_post_slider)',
				'operator' => 'and'
			),
			array(
				'id' => 'order_custom_slider',
				'label' => __( 'Display Order', 'vestalite' ),
				'desc' => __( 'Displaying Posts in Random or Latest order.', 'vestalite' ),
				'std' => 'rand',
				'type' => 'radio',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_slider:is(custom_post_slider)',
				'operator' => 'and',
				'choices' => array(
					array(
						'value' => 'rand',
						'label' => __( 'Random', 'vestalite' ),
						'src' => ''
					),
					array(
						'value' => 'DESC',
						'label' => __( 'Latest', 'vestalite' ),
						'src' => ''
					)
				)
			),
			array(
				'id' => 'posts_count_custom_slider',
				'label' => __( 'Posts Count', 'vestalite' ),
				'desc' => __( 'Change default items that appear in homepage carousel slider.', 'vestalite' ),
				'std' => '3',
				'type' => 'numeric-slider',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '3,12,1',
				'class' => '',
				'condition' => 'header_slider:is(custom_post_slider)',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_tab',
				'label' => __( 'About', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_area',
				'label' => __( 'About Me', 'vestalite' ),
				'desc' => '',
				'std' => 'off',
				'type' => 'on-off',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_name',
				'label' => __( 'Your Name', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'text',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_about_area:is(on)',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_name_typography',
				'label' => __( 'Your Name Typography', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'typography',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_about_area:is(on),header_about_name:not()',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_desc',
				'label' => __( 'Some Words About Yourself', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'header',
				'rows' => '7',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_about_area:is(on),header_about_name:not()',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_desc_typography',
				'label' => __( 'Some Words About Yourself Typography', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'typography',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_about_area:is(on),header_about_name:not()',
				'operator' => 'and'
			),
			array(
				'id' => 'header_about_pic',
				'label' => __( 'Your Picture', 'vestalite' ),
				'desc' => __( 'The size of your picture should be no bigger than 520 x 529 pixels.', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'header_about_area:is(on),header_about_name:not()',
				'operator' => 'and'
			),
			array(
				'id' => 'header_social_links',
				'label' => __( 'Social Links', 'banu' ),
				'desc' => __( 'Create and organize your social links', 'banu' ),
				'std' => '',
				'type' => 'list-item',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and',
				'settings' => array(
					array(
						'id' => 'header_social_icon',
						'label' => __( 'Icon Name', 'banu' ),
						'desc' => __( 'Font Awesome icon names [<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><strong>View all</strong>]</a>', 'banu' ),
						'std' => 'fa-',
						'type' => 'text',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'min_max_step' => '',
						'class' => '',
						'condition' => '',
						'operator' => 'and'
					),
					array(
						'id' => 'header_social_link',
						'label' => __( 'Link', 'banu' ),
						'desc' => __( 'Enter the full url for your icon button', 'banu' ),
						'std' => 'http://',
						'type' => 'text',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'min_max_step' => '',
						'class' => '',
						'condition' => '',
						'operator' => 'and'
					),
					array(
						'id' => 'header_social_target',
						'label' => __( 'Link Options', 'banu' ),
						'desc' => '',
						'std' => '',
						'type' => 'checkbox',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'min_max_step' => '',
						'class' => '',
						'condition' => '',
						'operator' => 'and',
						'choices' => array(
							array(
								'value' => '_blank',
								'label' => __( 'Open in new window', 'banu' ),
								'src' => ''
							)
						)
					)
				)
			),
			array(
				'id' => 'copyright_text',
				'label' => __( 'Copyright', 'vestalite' ),
				'desc' => __( 'Enter your custom copyright message here.', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'footer',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'copyright_typography',
				'label' => __( 'Copyright Typography', 'vestalite' ),
				'desc' => __( 'Change default text style for copyright text.', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'footer',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => 'copyright_text:not()',
				'operator' => 'and'
			),
			array(
				'id' => 'footer_social_links',
				'label' => __( 'Social Links', 'banu' ),
				'desc' => __( 'Create and organize your social links', 'banu' ),
				'std' => '',
				'type' => 'list-item',
				'section' => 'footer',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and',
				'settings' => array(
					array(
						'id' => 'footer_social_icon',
						'label' => __( 'Icon Name', 'banu' ),
						'desc' => __( 'Font Awesome icon names [<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><strong>View all</strong>]</a>', 'banu' ),
						'std' => 'fa-',
						'type' => 'text',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'min_max_step' => '',
						'class' => '',
						'condition' => '',
						'operator' => 'and'
					),
					array(
						'id' => 'footer_social_link',
						'label' => __( 'Link', 'banu' ),
						'desc' => __( 'Enter the full url for your icon button', 'banu' ),
						'std' => 'http://',
						'type' => 'text',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'min_max_step' => '',
						'class' => '',
						'condition' => '',
						'operator' => 'and'
					),
					array(
						'id' => 'footer_social_target',
						'label' => __( 'Link Options', 'banu' ),
						'desc' => '',
						'std' => '',
						'type' => 'checkbox',
						'rows' => '',
						'post_type' => '',
						'taxonomy' => '',
						'min_max_step' => '',
						'class' => '',
						'condition' => '',
						'operator' => 'and',
						'choices' => array(
							array(
								'value' => '_blank',
								'label' => __( 'Open in new window', 'banu' ),
								'src' => ''
							)
						)
					)
				)
			),
			array(
				'id' => 'google_fonts_api_key',
				'label' => __( 'Google Fonts API Key', 'vestalite' ),
				'desc' => __( 'It\'s recommended to enter your own Google Font API Key to make sure Google fonts will work properly and to get google fonts library updates. To learn how to obtain your API key click <a href="http://doc.mypreview.net/vestalite/#GoogleAPIKey" target="_blank">here</a>', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'fonts_manager',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'google_fonts_collection',
				'label' => __( 'Google Fonts Collection', 'vestalite' ),
				'desc' => __( 'Add Google fonts that you will use on the website here. Adding too much fonts will negatively impact your page load speed. After adding the Google fonts and click on "Save Changes" button, Newly added fonts will be automatically populated on all typography options.', 'vestalite' ),
				'std' => '',
				'type' => 'google-fonts',
				'section' => 'fonts_manager',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'general_typography',
				'label' => __( 'General', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'anchor_link_typography',
				'label' => __( 'Anchor Link', 'vestalite' ),
				'desc' => __( 'Change default text style for anchor link (a).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'span_typography',
				'label' => __( 'Span', 'vestalite' ),
				'desc' => __( 'Change default text style for span tag.', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'paragraph_typography',
				'label' => __( 'Paragraph', 'vestalite' ),
				'desc' => __( 'Change default text style for paragraph (P).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'em_typography',
				'label' => __( 'Italic', 'vestalite' ),
				'desc' => __( 'Change default text style for italic font style (em).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_typography',
				'label' => __( 'Heading', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_1_typography',
				'label' => __( 'Heading 1', 'vestalite' ),
				'desc' => __( 'Change default text style for heading 1 (H1).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_2_typography',
				'label' => __( 'Heading 2', 'vestalite' ),
				'desc' => __( 'Change default text style for heading 2 (H2).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_3_typography',
				'label' => __( 'Heading 3', 'vestalite' ),
				'desc' => __( 'Change default text style for heading 3 (H3).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_4_typography',
				'label' => __( 'Heading 4', 'vestalite' ),
				'desc' => __( 'Change default text style for heading 4 (H4).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_5_typography',
				'label' => __( 'Heading 5', 'vestalite' ),
				'desc' => __( 'Change default text style for heading 5 (H5).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'heading_6_typography',
				'label' => __( 'Heading 6', 'vestalite' ),
				'desc' => __( 'Change default text style for heading 6 (H6).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'elements_typography',
				'label' => __( 'Elements', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'blockquote_typography',
				'label' => __( 'Blockquote', 'vestalite' ),
				'desc' => __( 'Change default text style for blockquote.', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'menu_elements_typography',
				'label' => __( 'Menu Elements', 'vestalite' ),
				'desc' => __( 'Change default text style for Main and Footer Navigation.', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'form_elements_typography',
				'label' => __( 'Form Elements', 'vestalite' ),
				'desc' => __( 'Change default text style for Form Elements.
<br />
<strong>input, button, select, textarea</strong>', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'table_typography',
				'label' => __( 'Table Elements', 'vestalite' ),
				'desc' => __( 'Change default text style for table items (th / td / tr).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'unordered__ordered_typography',
				'label' => __( 'Unordered / Ordered List', 'vestalite' ),
				'desc' => __( 'Change default text style for list items (ul / ol / dl).', 'vestalite' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'error_404_page_content',
				'label' => __( '404 Content', 'vestalite' ),
				'desc' => __( 'Enter custom text or media for 404 page content.', 'vestalite' ),
				'std' => '<h1 style="text-align: center;">Oh... 404</h1>
					<h3 style="text-align: center;">The page can not be found</h3>
<h5 style="text-align: center;">The page you are looking for is temporarily unavailable.</h5>',
				'type' => 'textarea',
				'section' => 'error_404',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'upgrade_vestalite_pro_featured',
				'label' => '',
				'desc' => 'Upgrade to Vesta PRO <a href="http://mypreview.net/product/vesta-minimal-wordpress-blog-theme//">Buy Now!</a>',
				'std' => '',
				'type' => 'textblock',
				'section' => 'featured',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'upgrade_vestalite_pro_quote',
				'label' => '',
				'desc' => 'Upgrade to Vesta PRO <a href="http://mypreview.net/product/vesta-minimal-wordpress-blog-theme//">Buy Now!</a>',
				'std' => '',
				'type' => 'textblock',
				'section' => 'quote',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'upgrade_vestalite_pro_instagram',
				'label' => '',
				'desc' => 'Upgrade to Vesta PRO <a href="http://mypreview.net/product/vesta-minimal-wordpress-blog-theme//">Buy Now!</a>',
				'std' => '',
				'type' => 'textblock',
				'section' => 'instagram',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'upgrade_vestalite_pro_newsletter',
				'label' => '',
				'desc' => 'Upgrade to Vesta PRO <a href="http://mypreview.net/product/vesta-minimal-wordpress-blog-theme//">Buy Now!</a>',
				'std' => '',
				'type' => 'textblock',
				'section' => 'newsletter',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'google_analytics_ua_code',
				'label' => __( 'Google Analytics UA Code', 'vestalite' ),
				'desc' => __( 'Enter your UA code.', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'webmaster_tools',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'google_webmaster_tools',
				'label' => __( 'Google Webmaster Tools', 'vestalite' ),
				'desc' => __( 'Enter the verify meta value.', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'webmaster_tools',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'bing_webmaster_tools',
				'label' => __( 'Bing Webmaster Tools', 'vestalite' ),
				'desc' => __( 'Enter the verify meta value.', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'webmaster_tools',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'alexa_verification_id',
				'label' => __( 'Alexa Verification ID', 'vestalite' ),
				'desc' => __( 'Enter the verify meta value.', 'vestalite' ),
				'std' => '',
				'type' => 'text',
				'section' => 'webmaster_tools',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'seo_description',
				'label' => __( 'Default Meta Description', 'vestalite' ),
				'desc' => __( 'Will be used by default for home page and pages that don\'t have SEO description', 'vestalite' ),
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'webmaster_tools',
				'rows' => '7',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'seo_keywords',
				'label' => __( 'Default Meta Keywords', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'webmaster_tools',
				'rows' => '7',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'global_css',
				'label' => __( 'Global CSS', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'custom_css',
				'rows' => '5',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'tablets_css',
				'label' => __( 'Tablets CSS', 'vestalite' ),
				'desc' => __( 'Width from 768px to 985px', 'vestalite' ),
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'custom_css',
				'rows' => '5',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'wide_phones_css',
				'label' => __( 'Wide Phones CSS', 'vestalite' ),
				'desc' => __( 'Width from 480px to 767px', 'vestalite' ),
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'custom_css',
				'rows' => '5',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'phones_css',
				'label' => __( 'Phones CSS', 'vestalite' ),
				'desc' => __( 'Width from 320px to 479px', 'vestalite' ),
				'std' => '',
				'type' => 'textarea-simple',
				'section' => 'custom_css',
				'rows' => '5',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'remove_generator',
				'label' => __( 'Remove generator', 'vestalite' ),
				'desc' => '',
				'std' => 'off',
				'type' => 'on-off',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'remove_lost_pass_link',
				'label' => __( 'Remove the Lost Password Link', 'vestalite' ),
				'desc' => '',
				'std' => 'off',
				'type' => 'on-off',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'remove_back_to_link',
				'label' => __( 'Remove the “Back to” Link', 'vestalite' ),
				'desc' => '',
				'std' => 'off',
				'type' => 'on-off',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'wp_login_message',
				'label' => __( 'WordPress Login page Custom Message', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'text',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'wp_login_bg',
				'label' => __( 'WordPress Login page Background', 'vestalite' ),
				'desc' => __( '<em>Note: Allowed extensions are .jpg, .png and .gif</em>', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'wp_login_logo',
				'label' => __( 'WordPress Login page Logo', 'vestalite' ),
				'desc' => __( 'The size of your logo should be no bigger than 320 x 67 pixels.', 'vestalite' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'wp_login_logo_link',
				'label' => __( 'WordPress Login page Logo Link', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'text',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'wp_login_logo_link_title',
				'label' => __( 'WordPress Login page Logo Title', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'text',
				'section' => 'custom_login',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'general_advanced_options',
				'label' => __( 'General', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'advanced_options',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'additional_javascript_header',
				'label' => __( 'Additional Header Code', 'vestalite' ),
				'desc' => __( 'Any code you place here will appear in the head section of every page of your blog. This is useful when you need to add javascript or css to all pages.
<br />
<em> Use this code in the begining of your js code to prevent conflict issues. </em>
<br />
<pre>
jQuery(document).ready(function(){
   //here
});
</pre>', 'vestalite' ),
				'std' => '',
				'type' => 'javascript',
				'section' => 'advanced_options',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'additional_javascript_footer',
				'label' => __( 'Additional Footer Code', 'vestalite' ),
				'desc' => __( 'Any code you place here will appear in the head section of every page of your blog. This is useful when you need to add javascript or css to all pages.
<br />
<em> Use this code in the begining of your js code to prevent conflict issues. </em>
<br />
<pre>
jQuery(document).ready(function(){
   //here
});
</pre>', 'vestalite' ),
				'std' => '',
				'type' => 'javascript',
				'section' => 'advanced_options',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'dynamic_css_advanced_options',
				'label' => __( 'Dynamic CSS', 'vestalite' ),
				'desc' => '',
				'std' => '',
				'type' => 'tab',
				'section' => 'advanced_options',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'dynamic_css',
				'label' => __( 'Dynamic CSS', 'vestalite' ),
				'desc' => __( '<em>Note: DO NOT EDIT DEFAULT VALUES.</em>
<br />
<strong>Only edit if you know what to do!</strong> If you edit this without any knowledge on dynamic css it might break the theme!', 'vestalite' ),
				'std' => 'h1{
	{{heading_1_typography}}
}
h2{
	{{heading_2_typography}}
}
h3{
	{{heading_3_typography}}
}
h4{
	{{heading_4_typography}}
}
h5{
	{{heading_5_typography}}
}
h6{
	{{heading_6_typography}}
}
a{
	{{anchor_link_typography}}
}
a:hover{
	{{anchor_link_hover_typography}}
}
p {
	{{paragraph_typography}}
}
em {
	{{em_typography}}
}
span,
.comment-content .font-alt {
	{{span_typography}}
}
blockquote,
blockquote p,
blockquote cite {
	{{blockquote_typography}}
}
textarea,
button,
select,
input[type="text"],
input[type="password"],
input[type="datetime"],
input[type="datetime-local"],
input[type="date"],
input[type="month"],
input[type="time"],
input[type="week"],
input[type="number"],
input[type="email"],
input[type="url"],
input[type="search"],
input[type="tel"],
input[type="color"] {
	{{form_elements_typography}}
}
table thead tr th,
table tbody tr th,
table tbody tr td {
	{{table_typography}}
}
ul li, 
ol li, 
dl dt, 
dl dd {
	{{unordered__ordered_typography}}
}
.navbar-custom .navbar-brand {
	{{navbar_brand_typography}}
}
.navbar-custom a,
#nav > li > a,
#nav li ul li a {
	{{menu_elements_typography}}
}
#about h3 {
	{{header_about_name_typography}}
}
#about p.intro {
	{{header_about_desc_typography}}
}
#footer p,
.overlay-navigation-footer .copyright {
	{{copyright_typography}}
}',
				'type' => 'css',
				'section' => 'advanced_options',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'upgrade_vestalite_pro_premium',
				'label' => '',
				'desc' => 'Upgrade to Vesta PRO <a href="' . esc_url('http://mypreview.net/product/vesta-minimal-wordpress-blog-theme/') . '">Buy Now!</a><br/><a href="http://mypreview.net/product/vesta-minimal-wordpress-blog-theme//" target="_blank"><img src="http://www.mediafire.com/convkey/4ece/2n59owvru5p7cg5zg.jpg" alt="Buy Vesta Pro WordPress Theme"/></a>',
				'std' => '',
				'type' => 'textblock',
				'section' => 'get_premium',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			)
		)
	);

	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings );
	}

	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
}

/**
 * Required: Extend Oymyakon Panel Theme Options.
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/inc-extend-theme-options.php');
