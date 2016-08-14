<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_transportation_submit_data', 'ais_transportation_submit_field' );

    $tr     = $this->meta_data['ais_transportation_recommendation'];
?>

<!-- Post type additional details -->
<div class="row side-metabox">

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Recommedation or Not
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_transportation_recommendation', $tr, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this transit will be hightlighted on transit archive
        </div>
    </div>

</div>