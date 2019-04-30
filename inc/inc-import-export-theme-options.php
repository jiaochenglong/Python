<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

if ( !defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}

/**
 * Registers import & export theme options admin page.
 */
function vestalite_wp_register_export_import_page() {

	// Only execute in admin & if OT is installed
	if ( current_user_can( 'manage_options' ) && function_exists( 'ot_register_settings' ) ) {
		ot_register_settings(
				array(
					array(
						'id' => '',
						'pages' => array(
							array(
								'id' => 'vestalite_wp_theme_advanced',
								'parent_slug' => apply_filters( 'ot_theme_options_parent_slug', 'themes.php' ),
								'page_title' => 'Theme Options Backup/Restore',
								'menu_title' => 'Theme Options Backup/Restore',
								'capability' => 'edit_theme_options',
								'menu_slug' => 'vestalite-options-export-import',
								'icon_url' => null,
								'position' => null,
								'updated_message' => __( 'Options updated.', 'vestalite' ),
								'reset_message' => __( 'Options reset.', 'vestalite' ),
								'button_text' => __( 'Save Changes', 'vestalite' ),
								'show_buttons' => false,
								'contextual_help' => null,
								'sections' => array(
									array(
										'id' => 'sec_export',
										'title' => __( 'Export Options', 'vestalite' )
									),
									array(
										'id' => 'sec_import',
										'title' => __( 'Import Options', 'vestalite' )
									)
								),
								'settings' => array(
									array(
										'id' => 'export_data_text',
										'label' => __( 'Export Theme Options', 'vestalite' ),
										'desc' => __( 'Theme Options', 'vestalite' ),
										'std' => '',
										'type' => 'export-data',
										'section' => 'sec_export',
										'rows' => '',
										'post_type' => '',
										'taxonomy' => '',
										'class' => ''
									),
									array(
										'id' => 'import_data_text',
										'label' => __( 'Import Theme Options', 'vestalite' ),
										'desc' => __( 'Theme Options', 'vestalite' ),
										'std' => '',
										'type' => 'import-data',
										'section' => 'sec_import',
										'rows' => '',
										'post_type' => '',
										'taxonomy' => '',
										'class' => ''
									),
								)
							)
						)
					)
				)
		);
	}
}

add_action( 'init', 'vestalite_wp_register_export_import_page' );


if ( !function_exists( 'ot_type_export_data' ) ) {

	/**
	 * Export Data option type.
	 */
	function ot_type_export_data() {

		/* format setting outer wrapper */
		echo '<div class="format-setting type-textarea simple">';

		/* get theme options data */
		$data = get_option( ot_options_id() );
		$data = !empty( $data ) ? ot_encode( serialize( $data ) ) : '';

		echo '<div class="format-setting-inner">' . PHP_EOL;
		echo '<textarea rows="10" cols="40" name="export_data" id="export_data" class="textarea">' . $data . '</textarea>' . PHP_EOL;
		echo '</div>' . PHP_EOL;

		echo '</div>' . PHP_EOL;
	}

}


if ( !function_exists( 'ot_type_import_data' ) ) {

	/**
	 * Import Data option type.
	 */
	function ot_type_import_data() {

		echo '<form method="post" id="import-data-form">' . PHP_EOL;

		/* form nonce */
		wp_nonce_field( 'import_data_form', 'import_data_nonce' );

		/* format setting outer wrapper */
		echo '<div class="format-setting type-textarea has-desc">' . PHP_EOL;

		/* description */
		echo '<div class="description">' . PHP_EOL;

		echo '<p>' . __( 'To import your Theme Options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Theme Options" button.', 'vestalite' ) . '</p>' . PHP_EOL;

		/* button */
		echo '<button class="vestalite-ui-button button button-primary right hug-right">' . __( 'Import Theme Options', 'vestalite' ) . '</button>' . PHP_EOL;

		echo '</div>' . PHP_EOL;

		/* textarea */
		echo '<div class="format-setting-inner">' . PHP_EOL;

		echo '<textarea rows="10" cols="40" name="import_data" id="import_data" class="textarea"></textarea>' . PHP_EOL;

		echo '</div>' . PHP_EOL;

		echo '</div>' . PHP_EOL;

		echo '</form>' . PHP_EOL;
	}

}