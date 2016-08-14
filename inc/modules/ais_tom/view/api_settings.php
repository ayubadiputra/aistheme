<input type="hidden" name="ais_themes_options_submit_data" value="true">
<input type="hidden" name="ais_theme_options_filter_api" value="true">

<h3 class="sub-title">API Module Data Filter</h3>

<table class="form-table ais-form-table table-strip">

	<?php
		$data 	= get_option( 'ais_theme_options_api' );
		$modul 	= $data['ais_theme_options_filter_data'];

		$moduls = array(
			'post', 'blog', 'service', 'facility', 'transportation', 'advertisement', 'flight_schedules', 'passenger_guide', 'shop', 'transit'
		);
	?>

	<tr valign="top">
        <th scope="row">Active Module Data : </th>
    </tr>

    <?php 
    	foreach ( $moduls as $key => $value ) : 
    		$checked = null;
    		if ( in_array( $value, $modul ) )
				$checked = 'checked';
    ?>

    <tr valign="top">
	    <td scope="row">
	    	<input name="ais_theme_options_filter_key_<?php echo $value; ?>" value="<?php echo $value; ?>" type="checkbox" <?php echo $checked; ?>>
	    	<?php echo ucwords( $value ); ?>
	    </td>
    </tr>

	<?php endforeach; ?>

</table>