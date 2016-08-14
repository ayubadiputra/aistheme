<?php

	/**
	 * Template Name: Homepage - Info
	 *
	 * @package Airport Themes
	 * @subpackage Airport Themes Homepage - Info
	 * @since Airport Themes 1.0
	 */

	get_header();

	global $post;
	$pageID = $post->ID;

?>

<section id="slideshow">
	<?php echo do_shortcode( '[pjc_slideshow slide_type="main-slideshow"]' ); ?>
</section>

<section id="top-section" class="section">
	<div class="container nopad">

		<div class="col-md-8">
			<div class="schedule-table">

				<h3 class="section-sub-title text-right">
					<?php echo get_post_meta($post->ID, 'ais_flight_title', true); ?>
				</h3>

				<p class="text-left table-label">
					<label class="schedules-arrival active">Arrivals</label> | <label class="schedules-departure">Departures</label>
				</p>

				<div id="schedule-dep">
					<div class="loader"></div>
				</div>

				<div id="schedule-arr">
					<div class="loader"></div>
				</div>

			</div>
		</div>

		<div class="col-md-4">
			<div id="sidebar-info-menu">

				<?php
                    if (has_nav_menu('sidebar_info')) :

                        $defaults = array(
                            'theme_location'    => 'sidebar_info',
                            'menu'              => 'sidebar_info',
                            'container'         => '',
                            'container_id'      => '',
                            'menu_class'        => 'nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'depth'             => 2,
                            'walker'            => new wp_bootstrap_navwalker()
                        );

                        wp_nav_menu($defaults);

                    endif;
                ?>

			</div>
		</div>

	</div>
</section>

<div class="section-divider"></div>

<?php

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
			'post_type' 		=> array( post_type_archive_title() ),
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
					<form class="search-form" role="search" action="<?php echo home_url(); ?>" method="get">
	                    <div class="form-group">
	                        <input type="text" class="form-control" placeholder="Search">
	                    </div>
	                    <button type="submit" class="btn btn-search">
	                        <i class="fa fa-search"></i>
	                    </button>
	                </form>
	            </div>
			</div>
		</div>

	<?php endif; ?>

	</div>

	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>

</section>

<?php get_footer(); ?>