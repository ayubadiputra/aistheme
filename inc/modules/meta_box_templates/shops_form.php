<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_shop_submit_data', 'ais_shop_submit_field' );

    $sr     = $this->meta_data["ais_shop_recommendation"];
    $sp     = $this->meta_data["ais_shop_promotion"];
?>

<!-- Post type additional details -->
<div class="row side-metabox">

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Recommended or Not
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_shop_recommendation', $sr, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this shop will be highlighted with recommendation icon
        </div>
    </div>

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Promoted or Not
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_shop_promotion', $sp, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this shop will be highlighted with promotion icon
        </div>
    </div>

</div>