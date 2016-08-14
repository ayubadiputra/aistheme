<?php

	get_header();

	$post_type = 'any';
	if ( isset( $_GET['post_type'] ) && ! empty( $_GET['post_type'] ) ) {
		$post_type = $_GET['post_type'];
	}

	// Check pagination
	if ( ! is_post_type_archive( 'post' ) ) :

		$paged 			= ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;;
		$category 		= strtolower(single_cat_title( '', false ));

		if (is_category( )) {
		  	$cat 		= get_query_var('cat');
		  	$curCat 	= get_category ($cat);
		  	$category 	= $curCat->slug;
		}

		$postPerPage 	= get_option( 'posts_per_page' );
		$args 			= array(
			'post_type' 		=> array( $post_type ),
			'order_by'			=> 'post_date',
			'order' 			=> 'DESC',
			'posts_per_page' 	=> $postPerPage,
			'paged' 			=> $paged,
			'category_name' 	=> $category
		);
		$the_query 		= new WP_Query( $args );

	endif;

?>

<section id="archive">
	<section class="container">

		<div class="col-md-12">
			<?php ais_breadcrumb( get_post_type( $post ) ); ?>
		</div>

		<div class="col-md-8">

		<?php
			if ( have_posts() ) :
		?>
			<div class="archive-item">
		<?php
				while ( have_posts() ) : the_post();
					$categories 	= get_the_category();
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

						

					</div>

					<div class="col-md-6">
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

							if ( !is_post_type_archive( 'post' ) ) :

								global $wp_query;
								$total 	= $wp_query->max_num_pages;

							else :

								$total 	= $the_query->max_num_pages;

							endif;

							$big = 999999999;

							echo paginate_links( array(
								'base'					=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'				=> '?paged=%#%',
								'current'				=> max( 1, get_query_var('paged') ),
								'total'					=> $total,
								'prev_text' 			=> '<span aria-hidden="true">&laquo;</span>',
								'next_text' 			=> '<span aria-hidden="true">&raquo;</span>',
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

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>

	</section>
</section>

<?php get_footer(); ?>