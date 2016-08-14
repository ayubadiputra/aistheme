<div class="row">

	<table class="form-table ais-form-table">
        
        <tr valign="top">
            <th scope="row">Landing Top</th>
            <td>
            	<?php 

            		$settings 	= array( 
            			'textarea_rows' => '4' 
            		);

            		wp_editor( $altc, 'ais_landing_top_container', $settings ); 

            	?>
            </td>
        </tr>

    </table>

</div>

<div class="row">

	<table class="form-table ais-form-table">
        
        <tr valign="top">
            <th scope="row">Flight Title</th>
            <td>
				<input name="ais_flight_title" id="ais_flight_title" value="<?php echo $aflt; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Arrival/Departure Title</th>
            <td>
				<input name="ais_arrival_departure_title" id="ais_arrival_departure_title" value="<?php echo $aadt; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Latest News Title</th>
            <td>
				<input name="ais_latest_news_title" id="ais_latest_news_title" value="<?php echo $alnt; ?>">
            </td>
        </tr>

    </table>
    
</div>