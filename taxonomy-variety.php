<?php

	get_header(); 

	$taxonomy 	= get_query_var( 'taxonomy' );
	$term 		= get_query_var( 'term' );

	// Check pagination
	$paged 			= ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	$category 		= strtolower(single_cat_title( '', false ));
	$postPerPage 	= get_option( 'posts_per_page' );
	$args 			= array( 
		'post_type' 		=> array( 'shop' ), 
		'order' 			=> 'DESC', 
		'posts_per_page' 	=> $postPerPage, 
		'paged' 			=> $paged, 
		'tax_query' 		=> array(
		    array(
				'taxonomy' 			=> $taxonomy,
				'field' 			=> 'slug',
				'terms' 			=> $term,
		    )
		  )
	);
	$the_query 		= new WP_Query( $args );

?>

<section id="archive">
	<section class="container">

		<div class="col-md-12 nopad">
			<?php ais_breadcrumb( 'shop' ); ?>
		</div>
		
		<div class="col-md-12 nopad">

		<?php 
			if ( $the_query->have_posts() ) : 
		?>
			<!-- <div class="archive-item"> -->
			<div id="timeline" class="row archive-item" data-columns>
		<?php
				while ( $the_query->have_posts() ) : $the_query->the_post();
		?>

				<article id="entry-block" class="item card-item">

					<div class="entry-image-container">
						<a href="<?php the_permalink(); ?>">
							<?php 
								if ( has_post_thumbnail() ) : 
								    the_post_thumbnail( 'xx-landscape', array( 'class' => 'img-responsive' ) ); 
								endif;
							?>
						</a>
					</div>

					<div class="entry-content-container">

						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>

						<div class="entry-notes text-left">
							<span class="fa fa-tags"></span>&nbsp;
							<?php
								$term_list = wp_get_post_terms(get_the_ID(), $taxonomy, array("fields" => "all"));
								foreach($term_list as $term_single) :
							?>
								<a href="<?php echo get_term_link( $term_single->slug, $taxonomy ); ?>"><?php echo $term_single->name; ?></a>
							<?php
								endforeach;
							?>
						</div>

						<div class="entry-content">
							<?php the_excerpt(); ?>
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
					<h2 class="no-post-found">Sorry, no posts match with your criteria.</h2>		
					<form class="navbar-form navbar-right" role="search">
	                    <div class="form-group">
	                        <input type="text" class="form-control" placeholder="Search">
	                    </div>
	                    <button type="submit" class="btn btn-search">
	                        <i class="fa fa-search"></i>
	                    </button>
	                </form>
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