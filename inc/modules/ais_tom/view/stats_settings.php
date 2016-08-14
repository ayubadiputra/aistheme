<input type="hidden" name="ais_themes_options_submit_data" value="true">

<h3 class="sub-title">Stats Settings</h3>

<table class="form-table ais-form-table table-strip">

	<?php
		$data 	= get_option( 'ais_theme_options_stats' );
		$ga 	= $data['ais_theme_options_google_analytic'];
		$ak 	= $data['ais_theme_options_alexa_rank'];
	?>

    <tr valign="top">
        <th scope="row">Google Analytics Key</th>
        <td>
        	<textarea name="ais_theme_options_google_analytic"><?php echo $ga; ?></textarea>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Alexa Ranking Key</th>
        <td>
        	<textarea name="ais_theme_options_alexa_rank"><?php echo $ak; ?></textarea>
        </td>
    </tr>

</table>