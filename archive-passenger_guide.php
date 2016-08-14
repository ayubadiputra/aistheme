<?php

	get_header(); 

	// Check pagination
	$paged 			= ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;;
	$category 		= strtolower(single_cat_title( '', false ));
	$postPerPage 	= get_option( 'posts_per_page' );
	$args 			= array( 
		'post_type' 		=> array( 'passenger_guide' ), 
		'order' 			=> 'DESC', 
		'posts_per_page' 	=> 99, 
		'paged' 			=> $paged, 
		// 'category_name' 	=> $category 
	);
	$the_query 		= new WP_Query( $args );

?>

<section id="archive">
	<section class="container">

		<div class="col-md-12 nopad">
			<?php ais_breadcrumb( get_post_type( $post ) ); ?>
		</div>
		
		<div class="col-md-12 nopad">

		<?php 
			if ( $the_query->have_posts() ) : 
		?>
			<div class="archive-item">
		<?php
				$i = 1;
				while ( $the_query->have_posts() ) : $the_query->the_post();
		?>

		<?php if ( $i % 4 == 0 ) : ?>
				<div class="row">
		<?php endif; error_reporting(0); ?>

				<article id="entry-block" class="col-md-3 block-item">

					<div class="entry-image-container">
						<a href="<?php the_permalink(); ?>">
							<?php
								$pgi = get_post_meta( get_the_ID(), 'ais_passenger_guide_icon', true );
								$pgc = get_post_meta( get_the_ID(), 'ais_passenger_guide_color', true );
							?>
							<i style="color:<?php echo $pgc; ?>" class="fa-lg fa fa-<?php echo $pgi; ?>"></i>
						</a>
					</div>

					<div class="entry-content-container primary">

						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>

						<div class="entry-notes text-left">
							<span class="fa fa-tags"></span>&nbsp;
							<?php the_category( ', ' ); ?>
						</div>

					</div>

					<div class="entry-content-subcontainer">

						<div class="entry-content">
							<?php ais_excerpt_length( 20, get_the_permalink(), 'read-more', 'Get It &nbsp;<i class="fa fa-arrow-circle-right"></i>' ); ?> 
						</div>

					</div>

				</article>

		<?php if ( $i % 4 == 0 ) : ?>
				</div>
		<?php endif; ?>

		<?php 
				$i++;
				endwhile;
		?>

				<div class="loader hide"> Loading ... </div>
			</div>

		<?php
			else : 
		?>
			
			<div class="row">
				<div class="text-center">
					<h1>Sorry, no posts match with your criteria.</h1>			
				</div>
			</div>

		<?php endif; ?>

		</div>

	</section>
</section>

<?php 	
	get_template_part( 'layouts-templates/layout', 'transit_recommendation' );
	get_footer(); 
?>