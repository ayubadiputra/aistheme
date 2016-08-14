<input type="hidden" name="ais_themes_options_submit_data" value="true">
<input type="hidden" name="ais_themes_options_generate_items" value="true">

<h3 class="sub-title">Information Item Settings</h3>

<table class="form-table ais-form-table table-strip">

	<?php 
		$moduls  	= array(
			'service' 	=> array(
				'warranty' 		=> 'Warranty', 
				'money_report' 	=> 'Money Report',
				'tax_refund' 	=> 'Tax Refund',
				'internet_bus'	=> 'Internet and Bussiness Services',
				'baby_care'		=> 'Baby Care',
				'disabilities' 	=> 'Disabilities',
				'medical_serv' 	=> 'Medical Services',
				'post_tele' 	=> 'Post and Telecommunications',
				'baggage_store' => 'Baggage Storage',
			),
			'transportation' => array(
				'trans_info' 	=> 'Transportation Information Table',
				'parking_area' 	=> 'Parking Area',
				'shuttle_spec' 	=> 'Shuttle for Special Destination',
				'advance_trans' => 'Advance Transport Services',
				'train' 		=> 'Train',
				'bus' 			=> 'Bus',
				'taxi' 			=> 'Taxi',
				'rent_cars' 	=> 'Rent Cars',
			),
			'facilities' => array(
				'prayer_place' 	=> 'Prayer Place',
				'smooking_area' => 'Smoking Area',
				'meeting_point' => 'Meeting Point',
				'terminals' 	=> 'Terminals',
				'air_hotels' 	=> 'Airport Hotels',
				'lounge' 		=> 'Lounge'
			),
			'passenger_guide' => array(
				'faq_transit' 	=> 'FAQ Transit',
				'faq_shop'   	=> 'FAQ Shopping',
				'faq_departure' => 'FAQ Departure',
				'check_in_tp' 	=> 'Check In Transit Point',
				'inter_term'	=> 'Inter-Terminal Transfer',
				'transit' 		=> 'Transit',
				'baggage_claim' => 'Baggage Claim',
				'imigration' 	=> 'Imigration',
				'money_changer'	=> 'Money Changer',
				'check_in'		=> 'Check In',
				'security_cust'	=> 'Security Customs'	
			),
			'transit' => array(
				'transit_h'		=> 'Transit Hotels',
				'transit_l'		=> 'Transit Lounge'
			),
			'other' => array(
				'airlines'		=> 'Airlines',
				'others_air'	=> 'Others Airport',
				'passenger_g'	=> 'Passenger Guide'
			)
		);
	?>

	<tr valign="top">
        <th scope="row">Information Items : </th>
    </tr>

    <?php foreach ( $moduls as $label => $data ) : ?>

	<tr valign="top">
	    <td scope="row">
	    	<strong><?php echo ucwords( str_replace( '_', ' ', $label ) ); ?></strong>
	    </td>
	</tr>

		<?php foreach ( $data as $key => $value ) : ?>

		<tr valign="top">
		    <td scope="row">
		    	<input name="ais_theme_options_data_key_<?php echo $key; ?>" value="<?php echo $key; ?>" type="checkbox">
		    	<?php echo ucwords( $value ); ?>
		    </td>
	    </tr>

		<?php endforeach; ?>

	<?php endforeach; ?>

    Do you want to generate information items?

</table>