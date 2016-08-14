<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_flight_schedule_submit_data', 'ais_flight_schedule_submit_field' );

    $fsa    = $this->meta_data["ais_flight_schedule_airlines"];
    $fss    = $this->meta_data["ais_flight_schedule_schedule"];
    $fse    = $this->meta_data["ais_flight_schedule_estimated"];
    $fsd    = $this->meta_data["ais_flight_schedule_destination"];
    $fsg    = $this->meta_data["ais_flight_schedule_gate"];
    $fst    = $this->meta_data["ais_flight_schedule_state"];
    $fsfn   = $this->meta_data["ais_flight_schedule_flight_number"];
    $fstm   = $this->meta_data["ais_flight_schedule_time"];
    $fsta   = $this->meta_data["ais_flight_schedule_status"];
    $fsto   = $this->meta_data["ais_flight_schedule_type_of"];
?>

<div class="row">

    <table class="form-table ais-form-table">

        <tr valign="top">
            <th scope="row">Flight No.</th>
            <td>
                <input name="flight_schedule_flight_number" value="<?php echo $fsfn; ?>">
            </td>
            <th scope="row">Airline</th>
            <td>
                <input name="flight_schedule_airlines" value="<?php echo $fsa; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Schedule</th>
            <td>
                <input name="flight_schedule_schedule" value="<?php echo $fss; ?>">
            </td>
            <th scope="row">Estimated</th>
            <td>
                <input name="flight_schedule_estimated" value="<?php echo $fse; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Destination</th>
            <td>
                <input name="flight_schedule_destination" value="<?php echo $fsd; ?>">
            </td>
            <th scope="row">Gate</th>
            <td>
                <input name="flight_schedule_gate" value="<?php echo $fsg; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">State</th>
            <td>
                <input name="flight_schedule_state" value="<?php echo $fst; ?>">
            </td>
        </tr>

    </table>

</div>

<div class="row">

    <h4>Arrival/Departures</h4>

    <table class="form-table ais-form-table">
        
        <tr valign="top">
            <th scope="row">Time</th>
            <td>
                <input name="flight_schedule_time" value="<?php echo $fstm; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Status</th>
            <td>
                <input name="flight_schedule_status" value="<?php echo $fsta; ?>">
            </td>
        </tr>

         <tr valign="top">
            <th scope="row">Type of</th>
            <td>
                <?php 
                    $data   = array(
                        'departure'   => 'Departure',
                        'arrival'     => 'Arrival',
                    );
                    ais_select_options( 'flight_schedule_type_of', $fsto, null, $data ); 
                ?>
            </td>
        </tr>

    </table>
    
</div>