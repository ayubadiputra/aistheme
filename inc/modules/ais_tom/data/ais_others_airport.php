<?php

foreach ( $_POST as $rows => $row ) {
    if ( false !== strpos( $rows, 'ais_themes_options_others_airport' ) ) {
    	$key_data 	= str_replace( 'ais_themes_options_others_airport_', '', $rows );
		$i = 0;
    	foreach ( $row as $key => $value ) {
	        $data[$i][$key_data] 	= $value;
		    $i++;
    	}
    }
}