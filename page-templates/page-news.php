<?php

/*
	Template Name: News Archive
*/

	get_header();

	// Check pagination

	$paged 			= ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;;
	$category 		= strtolower(single_cat_title( '', false ));

	if (is_category( )) {
	  	$cat 		= get_query_var('cat');
	  	$curCat 	= get_category ($cat);
	  	$category 	= $curCat->cat_ID;
	}

	$postPerPage 	= get_option( 'posts_per_page' );
	$args 			= array(
		'post_type' 		=> array( 'post' ),
		'order_by'			=> 'post_date',
		'order' 			=> 'DESC',
		'posts_per_page' 	=> $postPerPage,
		'paged' 			=> $paged,
		'cat' 				=> $category
	);
	$the_query 		= new WP_Query( $args );

?>

<section id="archive">
	<section class="container">

		<div class="col-md-12 nopad-onmob">
			<?php ais_breadcrumb( get_post_type( $post ) ); ?>
		</div>

		<div class="col-md-8 nopad-onmob">

		<?php
			if ( $the_query->have_posts() ) :
		?>
			<div class="archive-item">
		<?php
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$categories 	= get_the_category();
					$label 			= null;
					if ( ! empty( $categories ) ) {
						foreach ( $categories as $key => $value ) {
							if ( 'special-offers' == $value->category_nicename || 'events-promotions' == $value->category_nicename ) {
								$label = $value->name;
							}
						}
					}
		?>

				<article id="entry" class="col-md-12 nopad">
					<div class="col-md-6 nopad entry-img-container">

						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) :
								    the_post_thumbnail( 'xx-landscape', array( 'class' => 'img-featured-list' ) );
								endif;
							?>
							<div class="article-fg"></div>
							<div class="article-shadow"></div>
							<div class="article-date"><?php the_time('d F Y'); ?></div>
						</a>
						<?php dump( $label ); ?>
						<?php if ( !empty( $label ) ) : ?>
							<div class="entry-label-top-side">
								<?php echo $label; ?>
							</div>
						<?php endif; ?>

					</div>

					<div class="col-md-6 nopad-onmob">
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>

						<div class="entry-content">
							<?php ais_excerpt_length( 30, get_the_permalink(), 'read-more', 'Read more' ); ?>
						</div>

						<div class="entry-notes text-right">
							<span class="fa fa-tags"></span>&nbsp;
							<?php the_category( ', ' ); ?> by
							<?php the_author_posts_link(); ?>
						</div>

					</div>
				</article>

		<?php
				endwhile;
		?>

				<div class="row">
					<div class="col-md-12 text-center">
						<nav class="pagination">

						<?php

							$total 	= $the_query->max_num_pages;

							$big = 999999999;

							echo paginate_links( array(
								'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'	=> '?paged=%#%',
								'current'	=> max( 1, get_query_var('paged') ),
								'total'		=> $total
							) );

						?>

						</nav>
					</div>
				</div>

			</div>

		<?php
			else :
		?>

			<div class="row">
				<div class="text-center">
					<h2 class="no-post-found">Sorry, no posts match with your criteria.</h2>
					<div class="col-md-offset-3 col-md-6">
						<?php get_search_form( true ); ?>
		            </div>
				</div>
			</div>

		<?php endif; ?>

		</div>

		<div class="col-md-4 nopad-onmob">
			<?php get_sidebar(); ?>
		</div>

	</section>
</section>

<?php 
	get_template_part( 'layouts-templates/layout', 'above_footerbar' );	
	get_footer(); 
?>