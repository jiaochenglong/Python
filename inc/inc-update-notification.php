<?php

/*

  Vesta Lite WordPress Theme
  Author: Mahdi Yazdani

 */

function vestalite_wp_set_transient_update_theme( $transient ) {
	if ( empty( $transient->checked['vesta-lite'] ) )
		return $transient;

	$ch = curl_init();

	curl_setopt( $ch, CURLOPT_URL, 'http://log.mypreview.net/vestalite/version.json' );

	// 3 second timeout to avoid issue on the server
	curl_setopt( $ch, CURLOPT_TIMEOUT, 3 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	$result = curl_exec( $ch );
	curl_close( $ch );

	// make sure that we received the data in the response is not empty
	if ( empty( $result ) )
		return $transient;

	//check server version against current installed version
	if ( $data = json_decode( $result ) ) {
		if ( version_compare( $transient->checked['vesta-lite'], $data->new_version, '<' ) )
			$transient->response['vesta-lite'] = (array) $data;
	}

	return $transient;
}

add_filter( 'pre_set_site_transient_update_themes', 'vestalite_wp_set_transient_update_theme' );
