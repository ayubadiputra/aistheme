<div class="section-divider"></div>

<section id="middle-section" class="section">
	<div class="container nopad">

		<div class="col-md-12 nopad">

			<?php

				$args = array(
					'post_type'  		=> 'advertisement',
					'meta_key'   		=> 'advertisement_footer',
					'orderby'    		=> 'date',
					'order'      		=> 'DESC',
					'posts_per_page' 	=> 3, 
					'meta_query' => array(
						array(
							'key'     => 'advertisement_footer',
							'value'   => '1',
						),
					),
				);

				$adsQuery = new WP_Query( $args );

				if ( $adsQuery->have_posts() ) :
					while ( $adsQuery->have_posts() ) : $adsQuery->the_post();

			?>

			<div class="col-md-4">
				<div class="interesting-content-container">
					<a href="<?php the_permalink(); ?>">
						
						<?php
							if ( has_post_thumbnail() )
							    the_post_thumbnail( 'xx-landscape' ); 
						?>

						<div class="interesting-content">
							<h4>
								<?php the_title(); ?>
								<div class="arrow-title text-right">
									<i class="fa fa-arrow-circle-right"></i>
								</div>
							</h4>
							<p class="interesting-notes">
								<?php ais_excerpt_length( 20, get_the_permalink() ); ?> 
							</p>
						</div>
					</a>
				</div>
			</div>

			<?php
					endwhile;
				endif;
			?>

		</div>

	</div>
</section>	