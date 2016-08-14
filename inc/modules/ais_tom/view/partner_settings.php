<input type="hidden" name="ais_themes_options_submit_data_partner" value="true">

<h3 class="sub-title">Partner Settings</h3>

<table class="form-table ais-form-table table-strip">

	<?php

    	$count_partner 	= array( 1 => '1', 2 => '2', 3 => '3', 4 => '4' );

    	$data = get_option('ais_theme_options_partner');

		foreach ( $count_partner as $key => $value ) :

			$partnerImgURL[$value] 	= esc_url( get_upload_iframe_src( 'image', $data['ais_theme_option_partner_img_'.$value ] ) );

			// See if there's a media id already saved as post meta
			$partnerImgID[$value] 	= $data[ 'ais_theme_option_partner_id_'.$value ];
			$partnerUrlID[$value] 	= null;
			if ( isset( $data['ais_theme_option_partner_url_'.$value] ) ) {
				$partnerUrlID[$value] 	= $data[ 'ais_theme_option_partner_url_'.$value ];
			}

			// Get the image src
			$partnerImgSrc[$value] 	= wp_get_attachment_image_src( $partnerImgID[$value], 'full' );

			// For convenience, see if the array is valid
			$partnerImgEx[$value]	= is_array( $partnerImgSrc[$value] );
	?>

	<tr>

		<th scope="row">Partner <?php echo $value; ?></th>

		<td>

			<!-- Your image container, which can be manipulated with js -->
			<div class="custom-img-container partner-img-<?php echo $value; ?>">
			    <?php if ( $partnerImgEx[$value] ) : ?>
			        <img src="<?php echo $partnerImgSrc[$value][0] ?>" alt="" style="max-width:100%;" />
			    <?php endif; ?>
			</div>

			<input class="partner-url" name="ais_theme_option_partner_url_<?php echo $value; ?>" type="text" value="<?php echo esc_attr( $partnerUrlID[$value] ); ?>" />

			<!-- Your add & remove image links -->
			<p class="hide-if-no-js">
			    <a class="upload-custom-img button partner-img-<?php echo $value; ?> <?php if ( $partnerImgEx[$value]  ) { echo 'hidden'; } ?>"
			       href="<?php echo $partnerImgURL[$value] ?>" data-tag="partner-img-<?php echo $value; ?>" data-type="full">
			        <?php _e('Set custom image') ?>
			    </a>
			    <a class="delete-custom-img <?php if ( ! $partnerImgEx[$value]  ) { echo 'hidden'; } ?> partner-img-<?php echo $value; ?>" data-tag="partner-img-<?php echo $value; ?>"
			      href="#">
			        <?php _e('Remove this image') ?>
			    </a>
			</p>

			<!-- A hidden input to set and post the chosen image id -->
			<input class="custom-img-id partner-img-<?php echo $value; ?>" name="ais_theme_option_partner_id_<?php echo $value; ?>" type="hidden" value="<?php echo esc_attr( $partnerImgID[$value] ); ?>" />
			<input class="custom-img-url partner-img-<?php echo $value; ?>" name="ais_theme_option_partner_img_<?php echo $value; ?>" type="hidden" value="<?php echo esc_attr( $partnerImgSrc[$value][0] ); ?>" />

		</td>

	</tr>

	<?php endforeach; ?>

</table>