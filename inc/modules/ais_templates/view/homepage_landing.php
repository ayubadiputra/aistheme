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

        <tr valign="top">
            <th scope="row">Featured Title</th>
            <td>
            	<input name="ais_featured_title" id="ais_featured_title" value="<?php echo $aft; ?>">
            </td>
        </tr>

    </table>

</div>

<div class="row">

	<table class="form-table ais-form-table">
        
        <tr valign="top">
            <th scope="row">Featured Services 1</th>
            <th scope="row">Featured Services 2</th>
            <th scope="row">Featured Services 3</th>
        </tr>

         <tr valign="top">
            <td>
            	<input name="ais_featured_services_one_icon" id="ais_featured_services_one_icon" value="<?php echo $afsoi; ?>">
            </td>
            <td>
            	<input name="ais_featured_services_two_icon" id="ais_featured_services_two_icon" value="<?php echo $afsti; ?>">
            </td>
            <td>
            	<input name="ais_featured_services_three_icon" id="ais_featured_services_three_icon" value="<?php echo $afsri; ?>">
            </td>
        </tr>

        <tr valign="top">
            <td>
            	<?php 

            		$settings 	= array( 
            			'textarea_rows' => '4' 
            		);

            		wp_editor( $afso, 'ais_featured_services_one', $settings ); 

            	?>
            </td>
            <td>
            	<?php 

            		$settings 	= array( 
            			'textarea_rows' => '4' 
            		);

            		wp_editor( $afst, 'ais_featured_services_two', $settings ); 

            	?>
            </td>
            <td>
            	<?php 

            		$settings 	= array( 
            			'textarea_rows' => '4' 
            		);

            		wp_editor( $afsr, 'ais_featured_services_three', $settings ); 

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
            <th scope="row">Latest News Title</th>
            <td>
				<input name="ais_latest_news_title" id="ais_latest_news_title" value="<?php echo $alnt; ?>">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Load More Title</th>
            <td>
				<input name="ais_load_more_text" id="ais_load_more_text" value="<?php echo $almt; ?>">
            </td>
        </tr>

    </table>

</div>