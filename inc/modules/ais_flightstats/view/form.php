<div class="wrap">

	<h2>AiS Themes - Flightstats Integrations</h2>

	<p>
		This modules used for show latest flight stats.
	</p>

	<div class="setting-area">

		<form method="post" action="options.php" class="theme-option">

			<?php

				settings_fields( 'ais-themes-flighstats-group' );
				do_settings_sections( 'ais-themes-flighstats-group' );

			?>

			<h3 class="sub-title">Flightstats Settings</h3>

			<table class="form-table twp-form-table">

				<?php

					register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_app_id' );
				  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_app_key' );
				  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_airport_code' );
				  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_number_hours' );
				  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_max_flights' );

			  	?>

		        <tr valign="top">
			        <th scope="row">Flightstats App ID</th>
		        	<td>
		        		<input class="input-control" type="password" name="ais_flightstats_app_id" value="<?php echo esc_attr( get_option('ais_flightstats_app_id') ); ?>" />
		        	</td>
		        </tr>

		        <tr valign="top">
			        <th scope="row">Flightstats Key</th>
			        <td>
			        	<input class="input-control" type="password" name="ais_flightstats_app_key" value="<?php echo esc_attr( get_option('ais_flightstats_app_key') ); ?>" />
			        </td>
		        </tr>

		        <tr valign="top">
			        <th scope="row">Airport Code</th>
			        <td>
			        	<input class="input-control" type="text" name="ais_flightstats_airport_code" value="<?php echo esc_attr( get_option('ais_flightstats_airport_code') ); ?>" />
			        </td>
		        </tr>

			  	<tr valign="top">
			        <th scope="row">Max. Flightstats hours</th>
			        <td>
			        	<input class="input-control" type="text" name="ais_flightstats_number_hours" value="<?php echo esc_attr( get_option('ais_flightstats_number_hours') ); ?>" />
			        </td>
		        </tr>

			  	<tr valign="top">
			        <th scope="row">Max. Flightstats will be showed</th>
			        <td>
			        	<input class="input-control" type="text" name="ais_flightstats_max_flights" value="<?php echo esc_attr( get_option('ais_flightstats_max_flights') ); ?>" />
			        </td>
		        </tr>

		    </table>

		    <?php submit_button(); ?>

		</form>

	</div>

</div>