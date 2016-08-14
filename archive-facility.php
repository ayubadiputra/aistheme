<?php 

	get_header(); 

	// Check pagination
	$paged 			= ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;;
	$category 		= strtolower(single_cat_title( '', false ));
	$postPerPage 	= get_option( 'posts_per_page' );
	$args 			= array( 
		'post_type' 		=> array( 'facility' ), 
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
			<div id="timeline" class="row archive-item" data-columns>
		<?php
				while ( $the_query->have_posts() ) : $the_query->the_post();
		?>

				<article id="entry-block" class="item block-item">

					<div class="entry-image-area top-image">
						<a href="<?php the_permalink(); ?>">
							<?php 
								if ( has_post_thumbnail() ) : 
								    the_post_thumbnail( 'xx-landscape', array( 'class' => 'img-featured-list' ) ); 
								endif;
							?>
						</a>
					</div>

					<div class="entry-content-container primary">

						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>

					</div>

					<div class="entry-content-subcontainer">

						<div class="entry-content">
							<?php ais_excerpt_length( 20, get_the_permalink(), 'read-more', 'Get It &nbsp;<i class="fa fa-arrow-circle-right"></i>' ); ?> 
						</div>

					</div>

				</article>

		<?php 
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
	get_template_part( 'layouts-templates/layout', 'above_footerbar' );
	get_footer(); 
?>