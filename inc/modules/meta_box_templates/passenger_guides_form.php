<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_passenger_guide_submit_data', 'ais_passenger_guide_submit_field' );
    $pgr    = $this->meta_data['ais_passenger_guide_recommendation'];
    $pgi    = $this->meta_data['ais_passenger_guide_icon'];
    $pgc    = $this->meta_data['ais_passenger_guide_color'];
?>

<!-- Post type additional details -->
<div class="row side-metabox">

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Recommended or Not
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_passenger_guide_recommendation', $pgr, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this guide will be highlighted on passenger guides archive
        </div>
    </div>

    <div class="input-inline-area">
        <div class="input-inline-container">
            <div class="input-inline-label">
                Icon
            </div>
            <div class="input-inline-content">
                <input name="ais_passenger_guide_icon" value="<?php echo $pgi; ?>">
            </div>
        </div>
        <div class="div-notes howto">
            Icon used for featured passenger guide icon on card archive
        </div>
    </div>

    <div class="input-inline-area">
        <div class="input-inline-container">
            <div class="input-inline-label">
                Color
            </div>
            <div class="input-inline-content">
                <input name="ais_passenger_guide_color" id="colorvalue" value="<?php echo $pgc; ?>" style="width:65%;">
                <input type="color" id="colorpicker" value="<?php echo $pgc; ?>">
            </div>
        </div>
        <div class="div-notes howto">
            Color for featured icon on card archive
        </div>
    </div>

</div>

<script type="text/javascript">
    jQuery( '#colorpicker' ).change(function(){
        var color = jQuery(this).val();
        jQuery( '#colorvalue' ).val( color );
    });
    jQuery( '#colorvalue' ).change(function(){
        var color = jQuery(this).val();
        jQuery( '#colorpicker' ).val( color );
    });
</script>