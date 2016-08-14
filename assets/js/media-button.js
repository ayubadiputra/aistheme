jQuery(function($){

	// Set all variables to be used in scope
	var frame,
	metaBox 		= $('.wrap'), // Your meta box id here
	addImgLink 		= metaBox.find('.upload-custom-img'),
	delImgLink 		= metaBox.find('.delete-custom-img'),
	imgContainer 	= metaBox.find('.custom-img-container'),
	imgIdInput 		= metaBox.find('.custom-img-id' );
	imgURLInput 	= metaBox.find('.custom-img-url' );

	// ADD IMAGE LINK
	metaBox.on( 'click', '.upload-custom-img', function( event ){

		event.preventDefault();

		tagID 	= jQuery(this)[0].attributes['data-tag'].nodeValue;
		type 	= jQuery(this)[0].attributes['data-type'].nodeValue;

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}

		// Create a new media frame
		frame = wp.media({
			title: 'Select or Upload Media Of Your Chosen Persuasion',
			button: {
				text: 'Use this media'
			},
			multiple: false  // Set to true to allow multiple files to be selected
		});


		// When an image is selected in the media frame...
		frame.on( 'select', function() {

			// Get media attachment details from the frame state
			var attachment = frame.state().get('selection').first().toJSON();

			// Send the attachment URL to our custom image input field.
			if ( type == 'thumbnail' ) {
				imageAttach = attachment.sizes.thumbnail.url;
			} else if ( type == 'medium' ) {
				imageAttach = attachment.sizes.medium.url;
			} else {
				imageAttach = attachment.sizes.full.url;
			}

			jQuery('.custom-img-container.'+tagID).append( '<img src="'+imageAttach+'" alt="" style="max-width:100%;"/>' );

			// Send the attachment id to our hidden input
			jQuery('.custom-img-id.'+tagID).val( attachment.id );
			jQuery('.custom-img-url.'+tagID).val( imageAttach );

			// Hide the add image link
			jQuery('.upload-custom-img.'+tagID).addClass( 'hidden' );

			// Unhide the remove image link
			jQuery('.delete-custom-img.'+tagID).removeClass( 'hidden' );

		});

		// Finally, open the modal on click
		frame.open();

	});


	// DELETE IMAGE LINK
	metaBox.on( 'click', '.delete-custom-img', function( event ){

		event.preventDefault();

		tagID 	= jQuery(this)[0].attributes['data-tag'].nodeValue;

		// Clear out the preview image
		jQuery('.custom-img-container.'+tagID).html( '' );

		// Un-hide the add image link
		jQuery('.upload-custom-img.'+tagID).removeClass( 'hidden' );

		// Hide the delete image link
		jQuery('.delete-custom-img.'+tagID).addClass( 'hidden' );

		// Delete the image id from the hidden input
		jQuery('.custom-img-id.'+tagID).val( '' );
		jQuery('.custom-img-url.'+tagID).val( '' );

	});

});