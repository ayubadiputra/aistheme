<?php

/*
	Template Name: Page - Contact
*/

	get_header();

	global $page;

?>

<section id="single">
	<section class="container">

		<div class="row">

			<div class="col-md-8">

				<?php
					if ( have_posts() ) : the_post();
				?>

				<article id="entry">

					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<form class="contact-form col-md-12 nopad" method="post">
						
						<?php 
							
							if ( isset( $_GET['status'] ) && ! empty( $_GET['status'] ) ) {
								$status = $_GET['status'];
								ais_show_alert( 
									$status, 
									get_option( 'ais_contact_' . $status )
								); 
							}

						?>

						<input type="hidden" name="ais_contact_id" value="aci-1">
						<div class="col-md-2 text-center">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="col-md-10 nopad">
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="inputName3" placeholder="Name" name="name">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" rows="6" name="message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<button class="btn btn-primary" name="send">Send</button>
								</div>
							</div>
						</div>
					</form>

				</article>

				<?php
					endif;
				?>

			</div>

			<div class="col-md-4">

				<aside class="contact-sidebar">

					<h3>Connect with us</h3>

					<?php
	                    if (has_nav_menu('contact_connect')) :

	                        $defaults = array(
	                            'theme_location'    => 'contact_connect',
	                            'menu'              => 'contact_connect',
	                            'container'         => '',
	                            'container_id'      => '',
	                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                            'depth'             => 2,
	                            'walker'            => new wp_bootstrap_navwalker()
	                        );

	                        wp_nav_menu($defaults);

	                    endif;
	                ?>

	            </aside>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12">

                <h3 class="section-sub-title">FAQ</h3>

               	<div class="sheet-list">
               	<?php 
               		$data = get_post_meta( get_the_ID(), 'ais_contact_faq_detail', true );
               		if ( ! empty( $data ) ) :
               			foreach ( $data as $key => $value ) :
               	?>
	               		<div class="sheet-item col-md-4 nopad">
	               			<h4><?php echo $value['ais_contact_faq_title']; ?></h4>
	               			<p>
	               				<?php echo $value['ais_contact_faq_content']; ?>
	               			</p>
	               		</div>
	            <?php
	            		endforeach;
	            	endif;
	            ?>
               	</div>

			</div>

		</div>

	</section>
</section>

<?php 
	$data = get_option( 'ais_theme_options_basic' );
	if ( ! empty( $data ) ) :
?>

<section id="maps-container">
	<div id="maps"></div>
</section>

<div id="basic-info"
	data-longtitude="<?php echo $data['ais_theme_option_airport_longtitude']; ?>"
	data-latitude="<?php echo $data['ais_theme_option_airport_latitude']; ?>"
></div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?scu_version=21"></script>
<script type="text/javascript">

	/*var latA 	= -7.7876838;
	var langA 	= 110.4317613;*/


	var latA 	= parseFloat( jQuery( '#basic-info' ).data( 'latitude' ) );
	var langA 	= parseFloat( jQuery( '#basic-info' ).data( 'longtitude' ) );

	function initialize() {

	    var myLatLng = {lat: latA, lng: langA};
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

	    /*var image = {
	    	url: iconA,
		    size: new google.maps.Size(48, 130),
		    origin: new google.maps.Point(0, 0)
	    }*/

	    var map = new google.maps.Map(mapCanvas, mapOptions);
	    var marker = new google.maps.Marker({
	        position: myLatLng,
	        map: map,
	        // icon: image,
	    });

	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php endif; ?>

<?php get_footer(); ?>