<?php

	$args = array(
		'post_type'  		=> 'advertisement',
		'meta_key'   		=> 'ais_advertisement_featured',
		'orderby'    		=> 'rand',
		'posts_per_page' 	=> 1,
		'meta_query' => array(
			array(
				'key'     => 'ais_advertisement_featured',
				'value'   => 1,
			),
		),
	);

	$adsQuery = new WP_Query( $args );

	if ( $adsQuery->have_posts() ) :
		while ( $adsQuery->have_posts() ) : $adsQuery->the_post();

?>
<div class="col-md-12 nopad-onmob">
<aside class="sidebar-item">

	<h3 class="section-sub-title">
		Promotion
	</h3>

	<a href="<?php the_permalink(); ?>">
		<div class="main-interesting-img-container">
			<?php
				if ( has_post_thumbnail() )
				    the_post_thumbnail( 'xx-landscape' );
			?>
			<div class="article-fg-sq"></div>
		</div>
	</a>

	<div class="main-interesting-content-container">
		<a href="<?php the_permalink(); ?>">
			<h4>
				<?php the_title(); ?>
			</h4>
			<p>
				<?php ais_excerpt_length( 20, get_the_permalink() ); ?>
			</p>
		</a>
	</div>

</aside>
</div>
<?php
		endwhile;
	endif;
?>