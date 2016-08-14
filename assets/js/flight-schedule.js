jQuery(function(){

	/* Get arriving schedule */
	var arr = {
		type	: 'arriving',
		action 	: 'ais_get_schedule_detail'
	}
	jQuery.post( ajaxURL, arr, function( response ){
		response = response.substring( 0, response.length - 1 );
		jQuery( '#schedule-arr' ).html( response );
	});
	
	/* Get departing schedule */
	var dep = {
		type	: 'departing',
		action 	: 'ais_get_schedule_detail'
	}
	jQuery.post( ajaxURL, dep, function( response ){
		response = response.substring( 0, response.length - 1 );
		jQuery( '#schedule-dep' ).html( response );
	});

});