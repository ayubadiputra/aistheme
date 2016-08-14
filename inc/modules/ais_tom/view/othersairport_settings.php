<input type="hidden" name="ais_themes_options_submit_data" value="true">
<input type="hidden" name="ais_themes_options_submit_others_airport" value="true">

<h3 class="sub-title">Others Airports</h3>

<table class="form-table ais-form-table table-strip table-top">

	<?php
		$data 	= get_option( 'ais_theme_options_othersairport' );
	?>

    <thead>
        <th>Name</th>
        <th>Notes</th>
        <th>Longtitude</th>
        <th>Latitude</th>
    </thead>

    <?php 
        if ( ! empty( $data ) ) :
            $i = 1;
            foreach ( $data as $rows => $row) : 
    ?>

    <tr class="tr-row" valign="top">
        <td>
            <input name="ais_themes_options_others_airport_name[]" value="<?php echo $row['name']; ?>">
        </td>
        <td>
            <?php 
                $content    = isset( $row['notes'] ) ? $row['notes'] : null;
                $settings   = array(
                    'textarea_rows'     => 3,
                    'textarea_name'     => 'ais_themes_options_others_airport_notes[]',
                );
                wp_editor( $content, 'ais_themes_options_others_airport_notes' . $i, $settings );
            ?>
        </td>
        <td>
            <input name="ais_themes_options_others_airport_longtitude[]" value="<?php echo $row['longtitude']; ?>">
        </td>
        <td>
            <input name="ais_themes_options_others_airport_latitude[]" value="<?php echo $row['latitude']; ?>">
        </td>
    </tr>

    <?php
                $i++;
            endforeach;
        endif;
    ?>

    <tr class="tr-row hide" valign="top"></tr>

    <div class="count-td" data-count="<?php echo $i; ?>"></div>
    <tr class="hide clone-td" valign="top">
        <td><input class="name"></td>
        <td><textarea class="notes"></textarea></td>
        <td><input class="longtitude"></td>
        <td><input class="latitude"></td>
    </tr>

</table>

<p class="text-right add-area">
    <button class="button button-danger add-row">
        Add Row
    </button>
</p>

<script type="text/javascript">
    var counted = jQuery( '.count-td' ).data( 'count' );
    jQuery( '.add-area' ).on( 'click', '.add-row', function(){
        var cloned = jQuery(".clone-td").clone();
        cloned.removeClass('hide');
        cloned.removeClass('clone-td');
        cloned.find('.name').attr('name', 'ais_themes_options_others_airport_name[]');
       
        /*jQuery('#ais_themes_options_others_airport_notes' + counted + '_ifr').contents().find('body').html('<body id="tinymce" class="mce-content-body ais_themes_options_others_airport_notes1 locale-en-us mceContentBody webkit wp-editor html4-captions has-focus" data-id="ais_themes_options_others_airport_notes1" contenteditable="true">FEDSFSDF</body>');

        cloned.find('[id*="ais_themes_options_others_airport_notes"]').each(function(){
            jQuery(this).attr( 'id', jQuery(this).attr('id').replace('ais_themes_options_others_airport_notes', 'ais_themes_options_others_airport_notes' + counted ) );
        });*/


        cloned.find('.notes').attr('name', 'ais_themes_options_others_airport_notes[]');
        cloned.find('.longtitude').attr('name', 'ais_themes_options_others_airport_longtitude[]');
        cloned.find('.latitude').attr('name', 'ais_themes_options_others_airport_latitude[]');
        cloned.insertAfter(".tr-row:last");
        counted++;
        return false;
    });
</script>