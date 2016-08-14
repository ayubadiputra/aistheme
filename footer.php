	<footer id="footer">

		<div class="bottombar">
			<div id="primary-sidebar" class="container nopad primary-sidebar widget-area">

				<?php 

					if ( is_dynamic_sidebar( 'ais_themes_footerbar' ) )
						dynamic_sidebar( 'ais_themes_footerbar' ); 

				?>

			</div>
		</div>

		<div class="footbar">
			<div class="container">

				Copyright <a href="#">AiS Themes</a> &copy;2015 | 
				Powered by <a href="#">Wordpress</a>

			</div>
		</div>

	</footer>

    <?php wp_footer(); ?>

</body>
</html>		