<input type="hidden" name="ais_themes_options_submit_data" value="basic">

<h3 class="sub-title">Basic Settings</h3>

<table class="form-table ais-form-table table-strip">

	<?php
		$data 	= get_option( 'ais_theme_options_basic' );
	?>

    <tr valign="top">
        <th scope="row">Themes Color</th>
        <td>
            <?php

            	$themes_color 	= $data['ais_theme_option_themes_color'];
            	$css_file		= scandir( get_template_directory() . '/assets/css/color-themes/' );
            	$css_data 		= array();
            	foreach ( $css_file as $key => $value ) {
            		// echo $value;
            		if ( false !== strpos( $value, 'css' ) ) {
            			$value = str_replace( array( 'ais-', '.css' ), array( '', '' ), $value );
            			$css_data[$value] = ucwords( $value );
            		}
				}

            	ais_select_options( 'ais_theme_option_themes_color', $themes_color, null, $css_data );
            ?>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Brand Logo</th>
        <td>
            <?php

				$uploadURL 		= esc_url( get_upload_iframe_src( 'image', $data['ais_theme_option_brand_logo'] ) );

				// See if there's a media id already saved as post meta
				$brandImgID 	= $data['ais_theme_option_brand_logo'];

				// Get the image src
				$brandImgSrc 	= wp_get_attachment_image_src( $brandImgID, 'thumbnail' );

				// For convenience, see if the array is valid
				$brandImgExist 	= is_array( $brandImgSrc );

			?>

			<!-- Your image container, which can be manipulated with js -->
			<div class="custom-img-container brand-img">
			    <?php if ( $brandImgExist ) : ?>
			        <img src="<?php echo $brandImgSrc[0] ?>" alt="" style="max-width:100%;" />
			    <?php endif; ?>
			</div>

			<!-- Your add & remove image links -->
			<p class="hide-if-no-js">
			    <a class="upload-custom-img button brand-img <?php if ( $brandImgExist  ) { echo 'hidden'; } ?>"
			       href="<?php echo $uploadURL ?>" data-tag="brand-img" data-type="thumbnail">
			        <?php _e('Set custom image') ?>
			    </a>
			    <a class="delete-custom-img <?php if ( ! $brandImgExist  ) { echo 'hidden'; } ?> brand-img" data-tag="brand-img"
			      href="#">
			        <?php _e('Remove this image') ?>
			    </a>
			</p>

			<!-- A hidden input to set and post the chosen image id -->
			<input class="custom-img-id brand-img" name="ais_theme_option_brand_logo" type="hidden" value="<?php echo esc_attr( $brandImgID ); ?>" />
			<input class="custom-img-url brand-img" name="ais_theme_option_brand_logo_url" type="hidden" value="<?php echo esc_attr( $brandImgSrc[0] ); ?>" />
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Airport Name</th>
        <td>
	        <input name="ais_theme_option_airport_name" value="<?php echo $data['ais_theme_option_airport_name']; ?>">
	    </td>
	</tr>

	<tr valign="top">
        <th scope="row">City</th>
        <td>
	        <input name="ais_theme_option_airport_city" value="<?php echo $data['ais_theme_option_airport_city']; ?>">
	    </td>
	</tr>

	<tr valign="top">
        <th scope="row">Longtitude</th>
        <td>
	        <input name="ais_theme_option_airport_longtitude" value="<?php echo $data['ais_theme_option_airport_longtitude']; ?>">
	    </td>
	</tr>

	<tr valign="top">
        <th scope="row">Latitude</th>
        <td>
	        <input name="ais_theme_option_airport_latitude" value="<?php echo $data['ais_theme_option_airport_latitude']; ?>">
	    </td>
	</tr>

</table>