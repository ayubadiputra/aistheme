<?php

	get_header();

?>

<section id="flight-schedule-list">
	<div class="container nopad">

		<?php 

			if ( !empty( $_GET['type_of'] ) ) : 

				$typeOf 	= $_GET['type_of'];

				if ( $typeOf == 'departure' ) :
					$file 	= 'departures';

				elseif ( $typeOf == 'arrival' ) :
					$file 	= 'arrivals';

				elseif ( $typeOf == 'airlines' ) :
					$file 	= 'airlines';

				endif;

		?>

			<div class="col-md-8">
				<?php get_template_part( 'layouts-templates/layout', $file ); ?>
			</div>

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>

		<?php else : ?>

			<div class="col-md-6">
				<?php get_template_part( 'layouts-templates/layout', 'departures' ); ?>
			</div>

			<div class="col-md-6">
				<?php get_template_part( 'layouts-templates/layout', 'arrivals' ); ?>
			</div>

		<?php endif; ?>

	</div>
</section>

<?php get_footer(); ?>