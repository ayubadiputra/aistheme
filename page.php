<?php 

	get_header(); 

	global $post;
	$post_name 	= $post->post_name;

?>

<section id="single" class="passenger_guide single-middle single-guide">
	<section class="container">
		
		<div class="col-md-8">

			<?php 
				if ( have_posts() ) : the_post();
			?>

			<article id="entry">

				<h3 class="section-sub-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>

				<div class="entry-image-container text-center">

					<a href="<?php the_permalink(); ?>">
						<?php 
							if ( has_post_thumbnail() ) : 
							    the_post_thumbnail( 'bg-landscape', array( 'class' => 'img-responsive' ) ); 
							endif;
						?>
					</a>

				</div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<?php 
					if ( is_page('others-airport') ) : 
						$basic 		= get_option( 'ais_theme_options_basic' );

						$others 	= get_option( 'ais_theme_options_othersairport' );

						$data[] = array(
							'value' 	=> null,
							'label'	 	=> 'Default',
						);

						foreach ( $others as $key => $value ) {
							$data[] = array(
								'value' 	=> strtolower( str_replace( 
									array( ' ', ', '), 
									array( '-', '-'), 
									$value['name'] 
								)),
								'label' 	=> $value['name'],
								'details' 	=> $value['notes'],
							);
							$data1[] = array(
								'value' 	=> strtolower( str_replace( 
									array( ' ', ','), 
									array( '-', '-'), 
									$value['name'] 
								)),
								'label' 	=> $value['name'],
								'details' 	=> $value['notes'],
							);
						}

						$destination 	= 'Adi Sumarmo, Solo';
						if ( isset( $_GET['dest'] ) && ! empty( $_GET['dest'] ) ) {
							$destination 	= $_GET['dest'];
						}
				?>

				<?php if ( ! empty( $data ) ) : ?>

					<table class="table-list table table-striped table-reverse">
						<thead>
							<tr>
								<th>Airport</th>
								<th>Details</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ( $data1 as $key => $value ) : ?>
							<tr>
								<td><strong><?php echo $value['label']; ?></strong></td>
								<td>
									<?php echo $value['details']; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>

					<select name="dest" onchange="location = this.options[this.selectedIndex].value;" class="form-control">

					<?php 
						foreach ( $data as $key => $value ) : 
							$selected = null;
							if ( $destination == $value['value'] ) {
								$selected = 'selected';
							}
					?>
					 	<option value="?dest=<?php echo $value['value']; ?>" <?php echo $selected; ?>>
					 		<?php echo $value['label']; ?>
					 	</option>
					<?php endforeach; ?>

					</select>

				<?php 
					endif; 
				endif; 
				?>

				<p><div class="maps-container"><div id="maps"></div></div></p>

			</article>

			<?php
				endif;
			?>

		</div>

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>

	</section>
</section>

<?php if ( is_page('others-airport') ) : ?>

<div id="basic-info"
	data-airport="<?php echo $basic['ais_theme_option_airport_name']; ?>"
	data-city="<?php echo $basic['ais_theme_option_airport_city']; ?>"
	data-longtitude="<?php echo $basic['ais_theme_option_airport_longtitude']; ?>"
	data-latitude="<?php echo $basic['ais_theme_option_airport_latitude']; ?>"
	data-destination="<?php echo $destination; ?>"
></div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?scu_version=21"></script>

<script type="text/javascript">
	var latA 	= jQuery( '#basic-info' ).data( 'latitude' );
	var langA 	= jQuery( '#basic-info' ).data( 'longtitude' );

	function initialize() {

	    var myLatLng = {lat: latA, lng: langA};

	    var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer;
		var mapCanvas = document.getElementById('maps');
	    var mapOptions = {
			center: new google.maps.LatLng( latA, langA),
			zoom: 15,
			mapTypeControl: false,
			draggable: true,
			scaleControl: false,
			scrollwheel: false,
			navigationControl: false,
			streetViewControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
	    }

	    var map = new google.maps.Map(mapCanvas, mapOptions);
	    var marker = new google.maps.Marker({
	        position: myLatLng,
	        map: map,
	    });

	    directionsDisplay.setMap(map);

	    directionsService.route({
	    	origin: jQuery( '#basic-info' ).data( 'airport' ) + ', ' + jQuery( '#basic-info' ).data( 'city' ),
	    	destination: jQuery( '#basic-info' ).data( 'destination' ),
	    	travelMode: google.maps.TravelMode.DRIVING
	  	}, function(response, status) {
	   		if (status === google.maps.DirectionsStatus.OK) {
	      		directionsDisplay.setDirections(response);
	    	} else {
	      		window.alert('Directions request failed due to ' + status);
	    	}
	  	});

	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>

<?php endif; ?>

<?php 	
	get_template_part( 'layouts-templates/layout', 'above_footerbar' );
	get_footer(); 
?>