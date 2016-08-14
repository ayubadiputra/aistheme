<!-- Post type key value -->
<?php
    wp_nonce_field( 'ais_blog_submit_data', 'ais_blog_submit_field' );

    $br     = $this->meta_data['ais_blog_recommendation'];
?>

<!-- Post type additional details -->
<!-- Post type additional details -->
<div class="row side-metabox">

    <div class="select-inline-area">
        <div class="select-inline-container">
            <div class="select-inline-label">
                Recommended or Not
            </div>
            <div class="select-inline-content">
                <?php ais_select_options_bool( 'ais_blog_recommendation', $br, null ); ?>
            </div>
        </div>
        <div class="div-notes howto">
            If yes, this ads will be show in every blog recommendation list
        </div>
    </div>

</div>