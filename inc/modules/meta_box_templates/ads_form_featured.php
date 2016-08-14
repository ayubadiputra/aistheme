<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_advertisement_submit_data', 'ais_advertisement_submit_field' );
    $featured_data = get_post_meta( $post->ID, 'ais_advertisement_featured_detail', TRUE );
?>

<!-- Post type additional details -->
<div class="row normal-metabox">

    <table class="form-table ais-form-table table-strip table-top">
        <thead>
            <th>Title</th>
            <th>Content</th>
            <th class="action"> - </th>
        </thead>
        <tbody>
            <?php
                if ( ! empty( $featured_data ) ) :
                    foreach ( $featured_data as $key => $value ) :
            ?>
                    <tr class="tr-row" valign="top">
                        <td>
                            <input name="ais_advertisement_featured_title[]" value="<?php echo $value['ais_advertisement_featured_title']; ?>">
                        </td>
                        <td>
                            <textarea name="ais_advertisement_featured_content[]"><?php echo $value['ais_advertisement_featured_content']; ?></textarea>
                        </td>
                        <td>
                            <p class="text-right remove-area">
                                <button class="button button-danger remove-row">
                                    Remove Row
                                </button>
                            </p>
                        </td>
                    </tr>
            <?php
                    endforeach;
                endif;
            ?>
            <tr class="hide tr-row" valign="top"></tr>
            <tr class="hide tr-row clone-td" valign="top">
                <td><input class="title" name="name"></td>
                <td><textarea class="content" name="name"></textarea></td>
                <td>
                    <p class="text-right remove-area">
                        <button class="button button-danger remove-row">
                            Remove Row
                        </button>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <p class="text-right add-area">
        <button class="button button-danger add-row">
            Add Row
        </button>
    </p>

</div>


<script type="text/javascript">
    jQuery( '.add-area' ).on( 'click', '.add-row', function(){
        var cloned = jQuery(".clone-td").clone();
        cloned.removeClass('hide');
        cloned.removeClass('clone-td');
        cloned.find('.title').attr('name', 'ais_advertisement_featured_title[]');
        cloned.find('.content').attr('name', 'ais_advertisement_featured_content[]');

        /*jQuery('#ais_themes_options_others_airport_notes' + counted + '_ifr').contents().find('body').html('<body id="tinymce" class="mce-content-body ais_themes_options_others_airport_notes1 locale-en-us mceContentBody webkit wp-editor html4-captions has-focus" data-id="ais_themes_options_others_airport_notes1" contenteditable="true">FEDSFSDF</body>');

        cloned.find('[id*="ais_themes_options_others_airport_notes"]').each(function(){
            jQuery(this).attr( 'id', jQuery(this).attr('id').replace('ais_themes_options_others_airport_notes', 'ais_themes_options_others_airport_notes' + counted ) );
        });*/

        cloned.insertAfter(".tr-row:last");
        return false;
    });

    jQuery( '.remove-area' ).on( 'click', '.remove-row', function(){
        jQuery(this).closest('tr.tr-row').remove();
        return false;
    });
</script>