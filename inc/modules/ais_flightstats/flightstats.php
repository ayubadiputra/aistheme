<?php

/**
 * Ais_Flightstats Class
 *
 * @package AiS Themes - Flightstats API settings and integration
 * @version 0.1
 *
 * Used to help create custom post type for AiSThemes.
 * @link http://aisthemes.com/dev/Ais_Flightstats_class
 *
 * @author  Ayub Adiputra
 * @link    http://opreklab.com
 * @version 1.0
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @description: This modules used to get data from airport based on Flighstats API.
 */

class Ais_Flightstats {

    public $data;

    function __construct( $flightstats_data = array() ) {

        $this->data = $this->text_convertion( $flightstats_data );

		$this->add_action( 'admin_menu', array( $this, 'custom_menu' ) );

		if ( is_admin() )
		  	add_action( 'admin_init', array( $this, 'custom_settings' ) );

    }

    /* Register AiS Themes Flighstats Integration Settings Data */
	function custom_settings() {

	  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_app_id' );
	  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_app_key' );
	  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_airport_code' );
	  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_number_hours' );
	  	register_setting( 'ais-themes-flighstats-group', 'ais_flightstats_max_flights' );

	}

	/* Create menu for AiS Themes - Flightstats Integration Modules */
	function custom_menu () {
		add_options_page( 'AiS Themes - Flightstats Integration', 'Flighstats', 'manage_options', 'ais-flightstats-integration', array( $this, 'custom_page' ) );
	}

	function custom_page () {

		require_once get_template_directory() . '/inc/modules/ais_flightstats/view/form.php';
		wp_register_style( 'aisthemes-flightstats-css', get_template_directory() . 'tonjoo-wp-parse/assets/css/style.css' );
		wp_enqueue_style( 'aisthemes-flightstats-css' );

	}

	/* Flighstats Get Schedules */
	function ais_flightstats_get_schedules_by_airport( $args = false ) {

		/* Initial Data */
		$airportCode 	= get_option('ais_flightstats_airport_code');
		$type 			= $args['type'];
		$dateTime		= date( "Y/m/d/H", strtotime($args['dateTime']) );
		$appID 			= get_option('ais_flightstats_app_id');
		$appKey 		= get_option('ais_flightstats_app_key');

		$numHours 		= get_option('ais_flightstats_number_hours');
		$numHours 		= ( !empty($args['numHours']) ) ? $args['numHours'] : $numHours;

		$maxFlights		= get_option('ais_flightstats_max_flights');
		$maxFlights 	= ( !empty($args['maxFlights']) ) ? $args['maxFlights'] : $maxFlights;

		$flow 			= ($type == 'departing') ? 'from': 'to';

		/* Get URL Param */
		$url 	= 'https://api.flightstats.com/flex/schedules/rest/v1/json/'.$flow.'/'.$airportCode.'/'.$type.'/'.$dateTime.'?appId='.$appID.'&appKey='.$appKey;

		/* Grab data */
		$responseRaw 	= wp_remote_get( $url, array( 'timeout' => 10 ) );

		$responseBody	= json_decode( wp_remote_retrieve_body( $responseRaw ), true );

		if ( !empty($responseBody['scheduledFlights']) ) {
			return $responseBody['scheduledFlights'];
		} else {

			$dataFlight = false;

			if ( $type == 'departing' ) {
				$dataFlight = array(
				  0 => array(
				    'flightId' => 625351423,
				    'carrierFsCode' =>"GA",
				    'flightNumber' =>"205",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"CGK",
				    'departureTime' => "2015-11-08T10:05:00.000",
				    'arrivalTime' => "2015-11-08T04:25:00.000Z",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'arrivalTerminal' => "2",
				  ),
				  1 => array(
				    'flightId' => 625351426,
				    'carrierFsCode' =>"SJ",
				    'flightNumber' =>"207",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"CGK",
				    'departureTime' => "2015-11-08T12:05:00.000",
				    'arrivalTime' => "2015-11-08T13:45:00.000",
				    'status' => "S",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'arrivalTerminal' => "2",
				  )
				 );
			} elseif ( $type == 'arriving' ) {
				$dataFlight = array(
				  0 => array(
				    'flightId' => 625351423,
				    'carrierFsCode' =>"JT*",
				    'flightNumber' =>"206",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"CGK",
				    'departureTime' => "2015-11-08T10:40:00.000",
				    'arrivalTime' => "2015-11-08T12:00:00.000",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'arrivalTerminal' => "3",
				  ),
				  1 => array(
				    'flightId' => 625351426,
				    'carrierFsCode' =>"GA",
				    'flightNumber' =>"207",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"SUB",
				    'departureTime' => "2015-11-08T12:05:00.000",
				    'arrivalTime' => "2015-11-08T13:45:00.000",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'arrivalTerminal' => "3",
				  )
				);
			}

			return $dataFlight;
		}

	}

	/* Flighstats Get Stats */
	function ais_flightstats_get_stats_by_airport( $args = false ) {

		/* Initial Data */
		$airportCode 	= get_option('ais_flightstats_airport_code');
		$type 			= $args['type'];
		$dateTime		= date( "Y/m/d/H", strtotime($args['dateTime']) );
		$appID 			= get_option('ais_flightstats_app_id');
		$appKey 		= get_option('ais_flightstats_app_key');

		$numHours 		= get_option('ais_flightstats_number_hours');
		$numHours 		= ( !empty($args['numHours']) ) ? $args['numHours'] : $numHours;

		$maxFlights		= get_option('ais_flightstats_max_flights');
		$maxFlights 	= ( !empty($args['maxFlights']) ) ? $args['maxFlights'] : $maxFlights;

		/* Get URL Param */
		$url 	= 'https://api.flightstats.com/flex/flightstatus/rest/v2/json/airport/status/'.$airportCode.'/'.$type.'/'.$dateTime.'?appId='.$appID.'&appKey='.$appKey.'&utc=false&numHours='.$numHours.'&maxFlights='.$maxFlights;

		/* Grab data */
		$responseRaw 	= wp_remote_get( $url );

		$responseBody	= json_decode( wp_remote_retrieve_body( $responseRaw ), true );

		if ( !empty($responseBody['flightStatuses']) ) {
			return $responseBody['flightStatuses'];
		} else {

			$dataFlight = false;

			if ( $type == 'dep' ) {

				$dataFlight = array(
				  0 => array(
				    'flightId' => 625351423,
				    'carrierFsCode' =>"GA",
				    'flightNumber' =>"205",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"CGK",
				    'departureDate' => array(
				      'dateLocal' => "2015-11-08T10:05:00.000",
				      'dateUtc' => "2015-11-08T03:05:00.000Z",
				    ),
				    'arrivalDate' => array(
				      'dateLocal' => "2015-11-08T11:25:00.000",
				      'dateUtc' => "2015-11-08T04:25:00.000Z",
				    ),
				    'status' => "L",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'operationalTimes' => array(
				      'publishedDeparture' => array(
				        'dateLocal' => "2015-11-08T10:05:00.000",
				        'dateUtc' => "2015-11-08T03:05:00.000Z",
				      ),
				      'publishedArrival' => array(
				        'dateLocal' => "2015-11-08T11:25:00.000",
				        'dateUtc' => "2015-11-08T04:25:00.000Z",
				      ),
				      'scheduledGateDeparture' => array(
				        'dateLocal' => "2015-11-08T10:05:00.000",
				        'dateUtc' => "2015-11-08T03:05:00.000Z",
				      ),
				      'scheduledGateArrival' => array(
				        'dateLocal' => "2015-11-08T11:25:00.000",
				        'dateUtc' => "2015-11-08T04:25:00.000Z",
				      ),
				    ),
				    'codeshares' => array(
				      0 => array(
				        'fsCode' => "CI",
				        'flightNumber' => "9761",
				        'relationship' => "L",
				      ),
				      1 => array(
				        'fsCode' => "PG",
				        'flightNumber' => "4319",
				        'relationship' => "L",
				      ),
				    ),
				    'flightDurations' => array(
				      'scheduledBlockMinutes' => 80,
				    ),
				    'airportResources' => array(
				      'arrivalTerminal' => "2",
				    ),
				    'flightEquipment' => array(
				      'scheduledEquipmentIataCode' => "738",
				    ),
				  ),
				  1 => array(
				    'flightId' => 625351426,
				    'carrierFsCode' =>"SJ",
				    'flightNumber' =>"207",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"CGK",
				    'departureDate' => array(
				      'dateLocal' => "2015-11-08T12:05:00.000",
				      'dateUtc' => "2015-11-08T04:05:00.000Z",
				    ),
				    'arrivalDate' => array(
				      'dateLocal' => "2015-11-08T13:45:00.000",
				      'dateUtc' => "2015-11-08T05:45:00.000Z",
				    ),
				    'status' => "S",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'operationalTimes' => array(
				      'publishedDeparture' => array(
				        'dateLocal' => "2015-11-08T12:05:00.000",
				      	'dateUtc' => "2015-11-08T04:05:00.000Z",
				      ),
				      'publishedArrival' => array(
				        'dateLocal' => "2015-11-08T13:45:00.000",
				      	'dateUtc' => "2015-11-08T05:45:00.000Z",
				      ),
				      'scheduledGateDeparture' => array(
				        'dateLocal' => "2015-11-08T12:05:00.000",
				      	'dateUtc' => "2015-11-08T04:05:00.000Z",
				      ),
				      'scheduledGateArrival' => array(
				        'dateLocal' => "2015-11-08T13:45:00.000",
				      	'dateUtc' => "2015-11-08T05:45:00.000Z",
				      ),
				    ),
				    'codeshares' => array(
				      0 => array(
				        'fsCode' => "CI",
				        'flightNumber' => "9761",
				        'relationship' => "L",
				      ),
				      1 => array(
				        'fsCode' => "PG",
				        'flightNumber' => "4319",
				        'relationship' => "L",
				      ),
				    ),
				    'flightDurations' => array(
				      'scheduledBlockMinutes' => 100,
				    ),
				    'airportResources' => array(
				      'arrivalTerminal' => "2",
				    ),
				    'flightEquipment' => array(
				      'scheduledEquipmentIataCode' => "738",
				    ),
				  )
				);

			} elseif ( $type == 'arr' ) {

				$dataFlight = array(
				  0 => array(
				    'flightId' => 625351423,
				    'carrierFsCode' =>"JT*",
				    'flightNumber' =>"206",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"CGK",
				    'departureDate' => array(
				      'dateLocal' => "2015-11-08T10:40:00.000",
				      'dateUtc' => "2015-11-08T03:40:00.000Z",
				    ),
				    'arrivalDate' => array(
				      'dateLocal' => "2015-11-08T12:00:00.000",
				      'dateUtc' => "2015-11-08T05:00:00.000Z",
				    ),
				    'status' => "S",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'operationalTimes' => array(
				      'publishedDeparture' => array(
				        'dateLocal' => "2015-11-08T10:40:00.000",
					    'dateUtc' => "2015-11-08T03:40:00.000Z",
				      ),
				      'publishedArrival' => array(
				        'dateLocal' => "2015-11-08T12:00:00.000",
				      	'dateUtc' => "2015-11-08T05:00:00.000Z",
				      ),
				      'scheduledGateDeparture' => array(
				        'dateLocal' => "2015-11-08T10:40:00.000",
				      	'dateUtc' => "2015-11-08T03:40:00.000Z",
				      ),
				      'scheduledGateArrival' => array(
				        'dateLocal' => "2015-11-08T12:00:00.000",
				      	'dateUtc' => "2015-11-08T05:00:00.000Z",
				      ),
				    ),
				    'codeshares' => array(
				      0 => array(
				        'fsCode' => "CI",
				        'flightNumber' => "9761",
				        'relationship' => "L",
				      ),
				      1 => array(
				        'fsCode' => "PG",
				        'flightNumber' => "4319",
				        'relationship' => "L",
				      ),
				    ),
				    'flightDurations' => array(
				      'scheduledBlockMinutes' => 80,
				    ),
				    'airportResources' => array(
				      'arrivalTerminal' => "3",
				    ),
				    'flightEquipment' => array(
				      'scheduledEquipmentIataCode' => "738",
				    ),
				  ),
				  1 => array(
				    'flightId' => 625351426,
				    'carrierFsCode' =>"GA",
				    'flightNumber' =>"207",
				    'departureAirportFsCode' =>"JOG",
				    'arrivalAirportFsCode' =>"SUB",
				    'departureDate' => array(
				      'dateLocal' => "2015-11-08T12:05:00.000",
				      'dateUtc' => "2015-11-08T04:05:00.000Z",
				    ),
				    'arrivalDate' => array(
				      'dateLocal' => "2015-11-08T13:45:00.000",
				      'dateUtc' => "2015-11-08T05:45:00.000Z",
				    ),
				    'status' => "S",
				    'schedule' => array(
				      'flightType' => "J",
				      'serviceClasses' => "JY",
				      'restrictions' => "",
				    ),
				    'operationalTimes' => array(
				      'publishedDeparture' => array(
				        'dateLocal' => "2015-11-08T12:15:00.000",
				      	'dateUtc' => "2015-11-08T04:15:00.000Z",
				      ),
				      'publishedArrival' => array(
				        'dateLocal' => "2015-11-08T13:55:00.000",
				      	'dateUtc' => "2015-11-08T05:55:00.000Z",
				      ),
				      'scheduledGateDeparture' => array(
				        'dateLocal' => "2015-11-08T12:15:00.000",
				      	'dateUtc' => "2015-11-08T04:15:00.000Z",
				      ),
				      'scheduledGateArrival' => array(
				        'dateLocal' => "2015-11-08T13:55:00.000",
				      	'dateUtc' => "2015-11-08T05:55:00.000Z",
				      ),
				    ),
				    'codeshares' => array(
				      0 => array(
				        'fsCode' => "CI",
				        'flightNumber' => "9761",
				        'relationship' => "L",
				      ),
				      1 => array(
				        'fsCode' => "PG",
				        'flightNumber' => "4319",
				        'relationship' => "L",
				      ),
				    ),
				    'flightDurations' => array(
				      'scheduledBlockMinutes' => 100,
				    ),
				    'airportResources' => array(
				      'arrivalTerminal' => "3",
				    ),
				    'flightEquipment' => array(
				      'scheduledEquipmentIataCode' => "738",
				    ),
				  )
				);
			}

			return $dataFlight;
			/*return false;*/
		}

	}

	/* Flighstats Get Airline */
	function ais_flightstats_get_airline_by_code( $args = false ) {

		/* Initial Data */
		$airportCode 	= get_option('ais_flightstats_airport_code');
		$code 			= $args;
		$appID 			= get_option('ais_flightstats_app_id');
		$appKey 		= get_option('ais_flightstats_app_key');

		/* Get URL Param */
		$url 	= 'https://api.flightstats.com/flex/airlines/rest/v1/json/fs/'.$code . '?appId='.$appID.'&appKey='.$appKey;

		/* Grab data */
		/*$responseRaw 	= wp_remote_get( $url, array( 'timeout' => 10 ) );

		$responseBody	= json_decode( wp_remote_retrieve_body( $responseRaw ), true );*/

		/*if ( !empty($responseBody['airlineDetails']) ) {
			return $responseBody['airlineDetails'];
		} else {
			return false;
		}*/

		$airlines 	= array(
			'GA' 	=> 'Garuda Indonesia Airlines',
			'SJ' 	=> 'Sriwijaya Airlines',
			'JT*' 	=> 'Lion Air',
		);

		$airline 	= $airlines[$code];

		return $airline;

	}

	/* Flighstats Get Airport */
	function ais_flightstats_get_airport_by_iata( $args = false ) {

		/* Initial Data */
		$airportCode 	= get_option('ais_flightstats_airport_code');
		$iata 			= $args;
		$appID 			= get_option('ais_flightstats_app_id');
		$appKey 		= get_option('ais_flightstats_app_key');

		/* Get URL Param */
		$url 	= 'https://api.flightstats.com/flex/airports/rest/v1/json/iata/'. $iata . '?appId='.$appID.'&appKey='.$appKey;

		/* Grab data */
		/*$responseRaw 	= wp_remote_get( $url, array( 'timeout' => 10 ) );

		$responseBody	= json_decode( wp_remote_retrieve_body( $responseRaw ), true );*/

		/*if ( !empty($responseBody['airportDetail']) ) {
			return $responseBody['airportDetail'];
		} else {
			return false;
		}*/

		$airports 	= array(
			'CGK' 	=> 'Jakarta',
			'JOG' 	=> 'Yogyakarta',
			'SRG' 	=> 'Semarang',
			'SOC'	=> 'Surakarta',
			'SUB' 	=> 'Surabaya',
		);

		$airport 	= $airports[$iata];

		return $airport;

	}

	/* Flightstats Get Status */
	function ais_flightstats_get_flight_status( $args = false ) {

		$statuss 	= array(
			'S' 	=> 'Scheduled',
			'A' 	=> 'Active',
			'U' 	=> 'Unknown',
			'R'		=> 'Redirected',
			'L'		=> 'Landed',
			'D'		=> 'Diverted',
			'C'		=> 'Cancelled',
			'NO'	=> 'Not Operational',
		);

		$status 	= $statuss[$args];

		return $status;

	}

	public function add_action( $action, $callback, $priority = false ) {
        add_action( $action, $callback, $priority );
    }

    public function add_filter( $filter, $callback ) {
        add_filter( $filter, $callback );
    }

    private function text_convertion ( $contact_data = false ) {

        $data = array();

        return $data;

    }

}

?>