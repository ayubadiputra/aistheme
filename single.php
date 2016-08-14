<?php

	get_header(); 

	global $post;

	$postType 	= get_post_type( $post );
	$postType 	= ( $postType == 'post' ) ? 'news' : $postType;
	$postName 	= ucwords( str_replace('_', ' ', $postType) );

?>

<section id="single" class="single-<?php echo $postType; ?>">
	<section class="container">

		<div class="col-md-12 nopad-onmob">
			<?php ais_breadcrumb( $postType, $post ); ?>
		</div>
		
		<div class="col-md-8 nopad-onmob">

			<?php 
				if ( have_posts() ) : the_post();
			?>

			<article id="entry">

				<div class="entry-image-container">

					<a href="<?php the_permalink(); ?>">
						<?php 
							if ( has_post_thumbnail() ) : 
							    the_post_thumbnail( 'bg-landscape', array( 'class' => 'img-responsive' ) ); 
							endif;
						?>
					</a>

					<div class="post-type-label">
						<?php echo $postType; ?>
					</div>

				</div>

				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>

				<div class="entry-notes">
					<span class="fa fa-calendar"></span>&nbsp;
					<?php the_time('F jS, Y'); ?> on
					<?php the_category( ', ' ); ?> by
					<?php the_author_posts_link(); ?>
				</div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<?php if ( $post->post_name == 'airport-hotels' ) : ?>

				<div class="entry-reservation">

					<div class="row">

						<div class="col-md-10 col-md-offset-1">
							<h4> Anda juga dapat melalui form di bawah ini : </h4>
							<p><i>Form disesuaikan dengan sistem reservasi hotel yang ada di bandara.</i></p>
						</div>

						<div class="col-md-8 col-md-offset-2">
							<form class="form-horizontal" action="/">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">HP</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Ex : 0814-444 222 xx">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-primary">Pesan</button>
									</div>
								</div>
							</form>
						</div>

					</div>

				</div>

				<?php endif; ?>

				<?php if ( $postType == 'advertisement' ) : ?>

				<div class="entry-featured">
					<table class="table-list table table-striped table-reverse">
						<thead>
							<th>Advantage</th>
							<th>Details</th>
						</thead>
						<tbody>
						<?php 
							$data = get_post_meta( $post->ID, 'ais_advertisement_featured_detail', true );
							if ( ! empty( $data )  ) : 
								foreach ( $data as $key => $value ) :
						?>
							<tr>
								<td>
									<strong>
										<?php echo $value['ais_advertisement_featured_title']; ?>
									</strong>
								</td>
								<td>
									<?php 
										$content 	= $value['ais_advertisement_featured_content'];
										$view 		= null;
										if ( strpos( $content, '|' ) ) {
											$ex = explode( '|', $content );
											foreach ( $ex as $ex_key => $ex_value ) {
												$view .= '<p><i class="fa fa-check text-success"></i>&nbsp; ' . $ex_value . '</p>';
											}
										} else {
											$view 	= '<i class="fa fa-check text-success"></i>&nbsp; ' . $content;
										}
										echo $view;
									?>
								</td>
							</tr>
						<?php
								endforeach;
							endif;
						?>
						</tbody>
					</table>
				</div>

				<?php endif; ?>

				<?php 
					/*require_once __DIR__ . '/comments.php';
					comments_template();*/
				?>

			</article>

			<?php ais_next_prev( $postType ); ?>

			<?php
				endif;
			?>

		</div>

		<div class="col-md-4 nopad-onmob">
			<?php get_sidebar(); ?>
		</div>

	</section>
</section>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?scu_version=21"></script>
<script type="text/javascript">

	var latA 	= -7.7876838;
	var langA 	= 110.4317613;

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

<?php get_footer(); ?>