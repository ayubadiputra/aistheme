<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_advertisement_submit_data', 'ais_advertisement_submit_field' );

    $af     = $this->meta_data['ais_advertisement_featured'];
    $ah     = $this->meta_data['ais_advertisement_footer'];
?>

<!-- Post type additional details -->
<div class="row side-metabox">

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Show as featured ads?
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_advertisement_featured', $af, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this ads will be show in every sidebar or featured ads section
        </div>
    </div>

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Show ads on footerbar?
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_advertisement_footer', $ah, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this ads will be show randomly above footerbar.
        </div>
    </div>
</div>