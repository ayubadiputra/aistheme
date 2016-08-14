<section class="sidebar col-md-12 nopad">

<?php get_template_part( 'layouts-templates/layout', 'featured_ads' ); ?>

<?php 
	if ( is_dynamic_sidebar( 'ais_themes_sidebar' ) )
		dynamic_sidebar( 'ais_themes_sidebar' ); 
?>


<div class="col-md-12 nopad-onmob">
<aside class="sidebar-item article-list">

	<h3 class="section-sub-title">
		Recommended Destination
	</h3>

	<p>
		Have a spare time? But didn't know what you want to do? 
		<strong>Let's visit : </strong>
	</p>

	<div class="interesting-content-container">
		<a href="http://127.0.0.1/airport-cms/blog/candi-prambanan/">
			<img width="274" height="184" src="http://127.0.0.1/airport-cms/wp-content/uploads/2015/11/prambanan.jpg" class="attachment-xx-landscape wp-post-image" alt="prambanan">
		</a>
		<div class="interesting-content">
			<a href="http://127.0.0.1/airport-cms/blog/candi-prambanan/">
				<h4>
					Candi Prambanan
					<div class="arrow-title text-right">
						<i class="fa fa-arrow-circle-right"></i>
					</div>
				</h4>
			</a>
			<p class="interesting-notes">
				<a href="http://127.0.0.1/airport-cms/blog/candi-prambanan/">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris viverra ligula sed auctor interdum. Vivamus ut cursus lectus, at laoreet ligula. Sed magna nibh, congue 
				</a>
				<a class="" href="http://127.0.0.1/airport-cms/blog/candi-prambanan/"> ... <strong>Read more</strong></a> 
			</p>
		</div>
	</div>

</aside>
</div>


<?php

	// Check pagination
	$postPerPage 	= 3;
	$args 			= array( 'post_type' => array( 'post' ), 'order' => 'DESC', 'posts_per_page' => $postPerPage );
	$the_query 		= new WP_Query( $args );

	if ( $the_query->have_posts() ) :
?>
<div class="col-md-12 nopad-onmob">
<aside class="sidebar-item article-list">

	<h3 class="section-sub-title">
		Latest News
	</h3>
<?php
		while ( $the_query->have_posts() ) : $the_query->the_post();

?>

<article class="article-li col-md-12 col-xs-12 col-sm-12 nopad">
	<a href="<?php the_permalink(); ?>">
		<div class="article-thumb col-md-3 col-xs-3 col-sm-3">

		<?php
			if ( has_post_thumbnail() )
			    the_post_thumbnail( 'thumbnail', array('class' => 'img-responsive') ); 
		?>

		</div>
		<div class="article-resume col-md-9 col-xs-9 col-sm-9 nopad-left">
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
?>
</aside>
</div>
<?php
	endif;
?>

</section>