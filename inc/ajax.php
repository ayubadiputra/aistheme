<?php

add_action( 'wp_ajax_ais_get_stats', 'ais_get_stats' );
add_action( 'wp_ajax_nopriv_ais_get_stats', 'ais_get_stats' );

function ais_get_stats() {

	/* Flightstats */
	$flightstats = new Ais_Flightstats();

    $args   = array(
        'type'      => $_POST['type'],
        'dateTime'  => date('Y-m-d H:i')
    );

    $close 	= null;
    $label 	= 'arrival';
    $dir	= 'From';
    $label1 = 'arrival';
    if ( $_POST['type'] == 'dep' ) {
    	$close 	= 'close';
    	$label 	= 'departure';
    	$dir	= 'Destination';
	    $label1 = 'depart.';
    }

    $data   = $flightstats->ais_flightstats_get_stats_by_airport( $args );

    ob_start();
?>

    <table class="table table-primary table-<?php echo $label; ?>-stats <?php echo $close; ?>">
    <thead>
        <tr>
            <th class="t-center" colspan="2">#</th>
            <th>Airline</th>
            <th><?php echo $dir; ?></th>
            <th colspan="2"><?php echo ucwords( $label1 ); ?> Time</th>
            <th>Est.</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

    <?php

        if ( !empty($data) ) :
            foreach ( $data as $row => $value ) :

                $flightNumber           = (!empty($value['flightNumber'])) ? $value['flightNumber']: null;
                $carrierFsCode          = (!empty($value['carrierFsCode'])) ? $value['carrierFsCode']: null;
                $arrivalAirportFsCode   = (!empty($value['arrivalAirportFsCode'])) ? $value['arrivalAirportFsCode']: null;

                $departureTime          = (!empty($value['departureDate']['dateLocal'])) ? $value['departureDate']['dateLocal'] : null;
                $departureTime  = explode('T', $departureTime);
                $departureDate  = $departureTime[0];
                $departureTime  = explode(':', $departureTime[1]);
                $departureTime[0] . ':' . $departureTime[1];

                $flightDurations    = (!empty($value['flightDurations']['scheduledBlockMinutes'])) ? $value['flightDurations']['scheduledBlockMinutes']: null;

                $status             = (!empty($value['status'])) ? $value['status']: null;

    ?>

        <tr class="">
            <td class="t-left" scope="row">
                <?php echo $carrierFsCode; ?>
            </td>
            <td class="t-left" scope="row">
                <?php echo $flightNumber; ?>
            </td>
            <td>
                <?php echo $flightstats->ais_flightstats_get_airline_by_code( $carrierFsCode ); ?>
            </td>
            <td>
                <?php echo $flightstats->ais_flightstats_get_airport_by_iata( $arrivalAirportFsCode ); ?>
            </td>
            <td>
                <?php echo date( 'M d, Y', strtotime( $departureDate ) );  ?>
            </td>
            <td>
                <strong><?php echo $departureTime[0] . ':' . $departureTime[1]; ?></strong>
            </td>
            <td>
                <?php echo $flightDurations; ?>
            </td>
            <td>
                <?php echo $flightstats->ais_flightstats_get_flight_status( $status ); ?>
            </td>
        </tr>

    <?php
            endforeach;
        endif;
    ?>

    </tbody>
    </table>

<?php

	$output = ob_get_contents();

	ob_end_clean();

	echo $output;
}



add_action( 'wp_ajax_ais_get_schedule', 'ais_get_schedule' );
add_action( 'wp_ajax_nopriv_ais_get_schedule', 'ais_get_schedule' );

function ais_get_schedule() {

	/* Flightstats */
	$flightstats = new Ais_Flightstats();
	
	$args	= array(
		'type'		=> $_POST['type'],
		'dateTime'	=> date('Y-m-d H:i')
	);

	$close 	= null;
    $label 	= 'arrival';
    $dir 	= 'From'; 	
    if ( $_POST['type'] == 'departing' ) {
    	$close	= 'close';
    	$label 	= 'departure';
    	$dir 	= 'Destination'; 	
    }

	$data 	= $flightstats->ais_flightstats_get_schedules_by_airport( $args );
    
    ob_start();

?>

<table class="table table-primary table-<?php echo $label; ?> <?php echo $close; ?>">
	<thead>
		<tr>
			<th class="t-center" colspan="2">#</th>
			<th>Airline</th>
			<th><?php echo $dir; ?></th>
			<th colspan="2">Departure Time</th>
			<th colspan="2">Arrival Time</th>
			<th>Terminal</th>
		</tr>
	</thead>
	<tbody>

	<?php

		if ( !empty($data) ) :
			foreach ( $data as $row => $value ) :

				$flightNumber 			= (!empty($value['flightNumber'])) ? $value['flightNumber']: null;
				$carrierFsCode 			= (!empty($value['carrierFsCode'])) ? $value['carrierFsCode']: null;
				$arrivalAirportFsCode 	= (!empty($value['arrivalAirportFsCode'])) ? $value['arrivalAirportFsCode']: null;

				$departureTime 			= (!empty($value['departureTime'])) ? $value['departureTime'] : null;
				$departureTime 	= explode('T', $departureTime);
				$departureDate 	= $departureTime[0];
				$departureTime 	= explode(':', $departureTime[1]);
				$departureTime[0] . ':' . $departureTime[1];

				$arrivalTime 	= (!empty($value['arrivalTime'])) ? $value['arrivalTime'] : null;
				$arrivalTime 	= explode('T', $arrivalTime);
				$arrivalDate 	= $arrivalTime[0];
				$arrivalTime 	= explode(':', $arrivalTime[1]);
				$arrivalTime[0] . ':' . $arrivalTime[1];

				$arrivalTerminal 	= (!empty($value['arrivalTerminal'])) ? $value['arrivalTerminal']: null;

	?>

		<tr class="">
			<td class="t-left" scope="row">
				<?php echo $carrierFsCode; ?>
			</td>
			<td class="t-left" scope="row">
				<?php echo $flightNumber; ?>
			</td>
			<td>
				<?php echo $flightstats->ais_flightstats_get_airline_by_code( $carrierFsCode ); ?>
			</td>
			<td>
				<?php echo $flightstats->ais_flightstats_get_airport_by_iata( $arrivalAirportFsCode ); ?>
			</td>
			<td>
				<?php echo date( 'M d, Y', strtotime( $departureDate ) );  ?>
			</td>
			<td>
				<strong><?php echo $departureTime[0] . ':' . $departureTime[1];	?></strong>
			</td>
			<td>
				<?php echo date( 'M d, Y', strtotime( $arrivalDate ) );  ?>
			</td>
			<td>
				<strong><?php echo $arrivalTime[0] . ':' . $arrivalTime[1]; ?></strong>
			</td>
			<td>
				<?php echo $arrivalTerminal; ?>
			</td>
		</tr>

	<?php
			endforeach;
		endif;
	?>

	</tbody>
</table>

<?php

	$output = ob_get_contents();

	ob_end_clean();

	echo $output;
}



add_action( 'wp_ajax_ais_get_schedule_detail', 'ais_get_schedule_detail' );
add_action( 'wp_ajax_nopriv_ais_get_schedule_detail', 'ais_get_schedule_detail' );

function ais_get_schedule_detail() {

	/* Flightstats */
	$flightstats = new Ais_Flightstats();
	
	$args	= array(
		'type'		=> $_POST['type'],
		'dateTime'	=> date('Y-m-d H:i')
	);

    $label 	= 'success';
    $dir 	= 'From'; 	
    if ( $_POST['type'] == 'departing' ) {
    	$label 	= 'danger';
    	$dir 	= 'Dest.'; 	
    }

	$data 	= $flightstats->ais_flightstats_get_schedules_by_airport( $args );
    
    ob_start();

?>

<table class="table table-<?php echo $label; ?>">
	<thead>
		<tr>
			<th class="t-center" colspan="2">#</th>
			<th>Airline</th>
			<th><?php echo $dir; ?></th>
			<th colspan="2">Depart. Time</th>
			<th colspan="2">Arrival Time</th>
			<th>Terminal</th>
		</tr>
	</thead>
	<tbody>

	<?php

		if ( !empty($data) ) :
			foreach ( $data as $row => $value ) :

				$flightNumber 			= (!empty($value['flightNumber'])) ? $value['flightNumber']: null;
				$carrierFsCode 			= (!empty($value['carrierFsCode'])) ? $value['carrierFsCode']: null;
				$arrivalAirportFsCode 	= (!empty($value['arrivalAirportFsCode'])) ? $value['arrivalAirportFsCode']: null;

				$departureTime 			= (!empty($value['departureTime'])) ? $value['departureTime'] : null;
				$departureTime 	= explode('T', $departureTime);
				$departureDate 	= $departureTime[0];
				$departureTime 	= explode(':', $departureTime[1]);
				$departureTime[0] . ':' . $departureTime[1];

				$arrivalTime 	= (!empty($value['arrivalTime'])) ? $value['arrivalTime'] : null;
				$arrivalTime 	= explode('T', $arrivalTime);
				$arrivalDate 	= $arrivalTime[0];
				$arrivalTime 	= explode(':', $arrivalTime[1]);
				$arrivalTime[0] . ':' . $arrivalTime[1];

				$arrivalTerminal 	= (!empty($value['arrivalTerminal'])) ? $value['arrivalTerminal']: null;

	?>

		<tr class="">
			<td class="t-left" scope="row">
				<?php echo $carrierFsCode; ?>
			</td>
			<td class="t-left" scope="row">
				<?php echo $flightNumber; ?>
			</td>
			<td>
				<?php echo $flightstats->ais_flightstats_get_airline_by_code( $carrierFsCode ); ?>
			</td>
			<td>
				<?php echo $flightstats->ais_flightstats_get_airport_by_iata( $arrivalAirportFsCode ); ?>
			</td>
			<td>
				<?php echo date( 'M d, Y', strtotime( $departureDate ) );  ?>
			</td>
			<td>
				<strong><?php echo $departureTime[0] . ':' . $departureTime[1];	?></strong>
			</td>
			<td>
				<?php echo date( 'M d, Y', strtotime( $arrivalDate ) );  ?>
			</td>
			<td>
				<strong><?php echo $arrivalTime[0] . ':' . $arrivalTime[1]; ?></strong>
			</td>
			<td>
				<?php echo $arrivalTerminal; ?>
			</td>
		</tr>

	<?php
			endforeach;
		endif;
	?>

	</tbody>
</table>

<?php

	$output = ob_get_contents();

	ob_end_clean();

	echo $output;
}