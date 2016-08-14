<?php if ( 'transit' == $post->post_name ) : ?>

<div class="section-divider"></div>

<section id="transit-list" class="section">
	<div class="container nopad">

		<div class="col-md-12 nopad">

			<?php

				$args = array(
					'post_type'  		=> array( 'transit' ),
					'orderby'    		=> 'date',
					'order'      		=> 'DESC',
					'posts_per_page' 	=> 999999,
					'category_name'		=> 'transit-list'
				);

				$adsQuery = new WP_Query( $args );

				if ( $adsQuery->have_posts() ) :
					while ( $adsQuery->have_posts() ) : $adsQuery->the_post();

			?>

			<div class="col-md-12">
				<div class="interesting-content-container">
					<a href="<?php the_permalink(); ?>">
						
						<div class="col-md-6">
							<?php
								if ( has_post_thumbnail() )
								    the_post_thumbnail( 'xx-landscape' ); 
							?>
						</div>

						<div class="col-md-6">
							<div class="interesting-content">
								<h4>
									<?php the_title(); ?>
									<div class="arrow-title text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</h4>
								<p class="interesting-notes">
									<?php the_excerpt(); ?> 
								</p>
							</div>
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

<?php endif; ?>