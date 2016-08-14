<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package AiS Themes
 * @subpackage AiS Themes Error 404
 * @since AiSThemes 1.0
 */
?>

<?php get_header(); ?>

<section id="error" class="section">
	<div class="container error-container">
		<div class="col-md-offset-2 col-md-8 error-both">

			<div class="col-md-3 error-left nopad">
				<h1 class="text-right">	
					<i class="fa fa-frown-o fa-danger-light"></i>
				</h1>
			</div>

			<div class="col-md-9 error-right">
				<div class="col-md-5">
					<h1 class="error-title">
						404
					</h1>
				</div>
				<div class="col-md-5 nopad">
					<?php get_search_form( true ); ?>
			    </div>
			    <div class="col-md-12">
					<h3>
						Sorry, but we can't find your search page
					</h3>
				</div>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>