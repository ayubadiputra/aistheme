<?php 

/*
	Template Name: Check In
*/

	get_header();

	global $post;

	$postType 	= get_post_type( $post );
	$postType 	= ( $postType == 'post' ) ? 'news' : $postType;
	$postName 	= ucwords( str_replace('_', ' ', $postType) );

?>

<section id="single" class="single-<?php echo $postType; ?>">
	<section class="container">

		<div class="col-md-12">
			<?php ais_breadcrumb( get_post_type( $post ) ); ?>
		</div>
		
		<div class="col-md-12">

		<?php 
			if ( have_posts() ) : 
		?>
			<div id="entry">
		<?php
				while ( have_posts() ) : the_post();
		?>

				<article id="entry">

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

				</article>

		<?php 
				endwhile;
		?>

			</div>

		<?php endif; ?>

		</div>

	</section>
</section>

<?php 
	get_template_part( 'layouts-templates/layout', 'transit_list' );
	get_footer(); 
?>