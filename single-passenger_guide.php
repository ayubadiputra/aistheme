<?php 

	get_header(); 

	global $post;
	$post_name 	= $post->post_name;

?>

<section id="single" class="passenger_guide single-middle single-guide">
	<section class="container">

		<div class="col-md-12">
			<?php ais_breadcrumb( 'passenger_guide', $post ); ?>
		</div>
		
		<div class="col-md-10 col-md-offset-1">

			<?php 
				if ( have_posts() ) : the_post();
			?>

			<article id="entry">

				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>

				<div class="entry-image-container text-center">

					<a href="<?php the_permalink(); ?>">
						<?php 
							if ( has_post_thumbnail() ) : 
							    the_post_thumbnail( 'bg-landscape', array( 'class' => 'img-responsive' ) ); 
							endif;
						?>
					</a>

				</div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				
			</article>

			<?php
				endif;
			?>

		</div>

	</section>
</section>

<?php 	
	get_template_part( 'layouts-templates/layout', 'transit_recommendation' );
	get_footer(); 
?>