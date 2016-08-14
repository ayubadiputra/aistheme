<?php

	/**
	 * Template Name: Homepage - Landingpage
	 *
	 * @package Airport Themes
	 * @subpackage Airport Themes Homepage - Landingpage
	 * @since Airport Themes 1.0
	 */

	get_header();

	global $post;
	$pageID = $post->ID;

?>

<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'fluid-responsive-slideshow/Fluid-Responsive-Slideshow.php' ) ) :

	$slideshowContent = get_post_meta($post->ID, 'ais_landing_top_container', true);
	if ( ! empty ( $slideshowContent ) ) :

?>

<section id="slideshow">
	<?php echo do_shortcode( $slideshowContent ); ?>
</section>

<?php
	endif;
endif;
?>

<section id="top-section" class="section">
	<div class="container">
	
		<div class="col-md-12 nopad text-center">

			<h2 class="section-title">
				<?php echo get_post_meta($post->ID, 'ais_featured_title', true); ?>
			</h2>
			
			<div class="col-md-4">
				<div class="featured-icon featured-1">
					<i class="fa <?php echo get_post_meta($post->ID, 'ais_featured_services_one_icon', true); ?> fa-lg"></i>
					<div class="featured-notes">
						<?php echo get_post_meta($post->ID, 'ais_featured_services_one', true); ?>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="featured-icon featured-2">
					<i class="fa <?php echo get_post_meta($post->ID, 'ais_featured_services_two_icon', true); ?> fa-lg"></i>
					<div class="featured-notes">
						<?php echo get_post_meta($post->ID, 'ais_featured_services_two', true); ?>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="featured-icon featured-3">
					<i class="fa <?php echo get_post_meta($post->ID, 'ais_featured_services_three_icon', true); ?> fa-lg"></i>
					<div class="featured-notes">
						<?php echo get_post_meta($post->ID, 'ais_featured_services_three', true); ?>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>

<div class="section-divider"></div>

<section id="middle-section" class="section">
	<div class="container nopad">

		<div class="col-md-8">
			<div class="schedule-table">

				<h3 class="section-sub-title text-right">
					<?php echo get_post_meta($post->ID, 'ais_flight_title', true); ?>
				</h3>
						
				<div id="schedule-dep">
					<div class="loader"></div>
				</div>

				<div id="schedule-arr">
					<div class="loader"></div>
				</div>

				<div class="article-more col-md-12 text-center">
					<a href="<?php echo get_home_url() . '/flight_schedule'; ?>">
						<?php echo get_post_meta($pageID, 'ais_load_more_text', true); ?>
					</a>
				</div>

			</div>
		</div>

		<div class="col-md-4">
			<div class="article-list">

				<div class="col-md-12 nopad">
					<h3 class="section-sub-title text-left">
						<?php echo get_post_meta($pageID, 'ais_latest_news_title', true); ?>
					</h3>
				</div>

				<?php

					// Check pagination
					$postPerPage 	= 3;
					$args 			= array( 'post_type' => array( 'post' ), 'order' => 'DESC', 'posts_per_page' => $postPerPage );
					$the_query 		= new WP_Query( $args );

					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();

				?>

				<article class="article-li col-md-12 nopad">
					<a href="#">
						<div class="article-thumb col-md-3">

						<?php
							if ( has_post_thumbnail() )
							    the_post_thumbnail( 'thumbnail', array('class' => 'img-responsive') ); 
						?>

						</div>
						<div class="article-resume col-md-9 nopad-left">
							<h5 class="article-title">
								<?php the_title(); ?>
							</h5>
							<p class="article-review">
								<?php echo get_the_date( 'd M Y, H:i' ); ?> 
							</p>
						</div>
						<div class="article-fg"></div>
					</a>
				</article>

				<?php
						endwhile;
					endif;
				?>

				<div class="article-more col-md-12 text-center">
					<a href="<?php echo get_home_url() . '/news'; ?>">
						<?php echo get_post_meta($pageID, 'ais_load_more_text', true); ?>
					</a>
				</div>

			</div>
		</div>

	</div>
</section>

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

<div class="section-divider"></div>

<section id="partners" class="section text-center">
	<div class="container">
		<div class="partner-list">

		<?php
			$data_partner = get_option('ais_theme_options_partner');
			$i = 1;
			for ( $i = 1; $i <= 4; $i++ ) :
		?>
			<div class="col-md-3">
				<a href="<?php echo $data_partner['ais_theme_option_partner_url_' . $i]; ?>">
					<img src="<?php echo $data_partner['ais_theme_option_partner_img_' . $i]; ?>">
				</a>
			</div>
		<?php
			endfor;
		?>

		</div>
	</div>
</section>

<?php get_footer(); ?>