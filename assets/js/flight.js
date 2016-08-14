jQuery(function(){

	/* Get arriving stats */
	var arr = {
		type	: 'arr',
		action 	: 'ais_get_stats'
	}
	jQuery.post( ajaxURL, arr, function( response ){
		response = response.substring( 0, response.length - 1 );
		jQuery( '#stats-arr' ).html( response );
	});

	/* Get departing stats */
	var dep = {
		type	: 'dep',
		action 	: 'ais_get_stats'
	}
	jQuery.post( ajaxURL, dep, function( response ){
		response = response.substring( 0, response.length - 1 );
		jQuery( '#stats-dep' ).html( response );
	});

	/* Get arriving schedule */
	var arr = {
		type	: 'arriving',
		action 	: 'ais_get_schedule'
	}
	jQuery.post( ajaxURL, arr, function( response ){
		response = response.substring( 0, response.length - 1 );
		jQuery( '#schedule-arr' ).html( response );
	});
	
	/* Get departing schedule */
	var dep = {
		type	: 'departing',
		action 	: 'ais_get_schedule'
	}
	jQuery.post( ajaxURL, dep, function( response ){
		response = response.substring( 0, response.length - 1 );
		jQuery( '#schedule-dep' ).html( response );
	});

});