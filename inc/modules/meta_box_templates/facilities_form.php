<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_facility_submit_data', 'ais_facility_submit_field' );
    $sr     = $this->meta_data['ais_facility_recommendation'];
?>

<!-- Post type additional details -->
<div class="row side-metabox">

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Recommended or Not
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_facility_recommendation', $sr, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this facility will be highlighted on facilities archive
        </div>
    </div>

</div>