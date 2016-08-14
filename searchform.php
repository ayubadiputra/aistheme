<form role="search" method="get" id="searchform" class="searchform search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<button type="submit" class="btn btn-search">
        <i class="fa fa-search"></i>
    </button>
    
    <div class="input-group form-group">
    	<input type="text" class="form-control form-keyword" placeholder="Search others" value="<?php echo get_search_query(); ?>" name="s" id="s">
    	<?php

    		$selected = 'any';
    		if ( isset( $_GET['post_type'] ) && ! empty( $_GET['post_type'] ) ) {
    			$selected = $_GET['post_type'];
    		}
    	
    		$search_type = array(
    			'any' 				=> 'All',
    			'posts' 			=> 'News',
    			'transportation'	=> 'Transportation',
    			'passenger_guide' 	=> 'Guide',
    			'shop' 				=> 'Shop',
    			'service' 			=> 'Service',
    			'facility' 			=> 'Facility',
    			'transit' 			=> 'Transit',
    			'blog' 				=> 'Blog',
    			'advertisement'		=> 'Advertisement'
    		);
    	?>

    	<div class="input-group-btn form-select hidden-xs">
	    	<?php ais_select_options( 'post_type', $selected, 'class="form-control"', $search_type ); ?>
    	</div><!-- /btn-group -->
    </div><!-- /input-group -->

</form>