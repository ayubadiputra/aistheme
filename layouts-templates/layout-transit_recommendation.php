<div class="section-divider"></div>

<section id="transit-recommendation" class="section">
	<div class="container nopad">

		<h3 class="section-sub-title">
			Transit Recommendation
		</h3>

		<div class="col-md-12 nopad">

			<?php

				$curCat 	= get_category_by_slug( 'transit-recommendation' );
			  	$category 	= $curCat->term_id;

				$args = array(
					'post_type'  		=> array( 'transit', 'blog' ),
					'orderby'    		=> 'post_date',
					'order'      		=> 'DESC',
					'posts_per_page' 	=> 3,
					'cat'				=> $category
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