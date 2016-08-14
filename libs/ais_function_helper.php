<?php

/***
	Create additional functions to help developer set some value or conditions
*/

/* Var Dump Functions */
function dump( $data, $die = false ) {

    echo '<pre>';
    var_dump($data);
    echo '</pre>';

    if ($die)
        die();

}

/* Boolean select options */
function ais_select_options_bool( $name = false, $selected = 0, $attr = null ) {

	/* Check selected is null or false */
	if ( $selected == null || $selected == false ) {
		$selected = 0;
	}

	$data 	= array(
		0	=> 'No',
		1 	=> 'Yes'
	);

?>

	<select <?php echo $attr; ?> name="<?php echo $name; ?>">

	<?php
		foreach ( $data as $key => $value ) :
			$selectedTag 	= ( $key == $selected ) ? 'selected' : null;
	?>

		<option value="<?php echo $key; ?>" <?php echo $selectedTag; ?>><?php echo $value; ?></option>

	<?php endforeach; ?>

	</select>

<?php

}

/* Data select options */
function ais_select_options( $name = false, $selected = false, $attr = null, $data = false ) {

?>

	<select <?php echo $attr; ?> name="<?php echo $name; ?>">

	<?php
		foreach ( $data as $key => $value ) :
			$selectedTag 	= ( $key == $selected ) ? 'selected' : null;
	?>

		<option value="<?php echo $key; ?>" <?php echo $selectedTag; ?>><?php echo $value; ?></option>

	<?php endforeach; ?>

	</select>

<?php

}

/* Breadcrumb generator */
function ais_breadcrumb( $postType = 'post', $data = null ) {

	$breadcrumbRaw 	= array();
	$request_uri 	= $_SERVER['REQUEST_URI'];

	if ( !empty($request_uri) ) {

		$search 		= array( '?', '&' );
		$replace 		= array( '', '/' );
		$request_uri 	= str_replace( $search, $replace, $request_uri );

		$breadcrumb 	= explode( '/', $request_uri );
		$i = 0;
		foreach ( $breadcrumb as $crumb ) {
			if ( ! empty( $crumb ) && strpos( $crumb, '=' ) === false ) {
			    $breadcrumbRaw[] 	= ucwords( str_replace(
			    	array( ".php", "_", '-' ),
			    	array( "", " ", ' ' ),
			    	$crumb
			    ));
			    $i++;
			} elseif ( ! empty( $crumb ) ) {
				$append = null;
				if ( strpos( $crumb, 's=' ) !== false ) {
					$append = 'Search result for : ';
				}
				$crumb 	= explode( '=', $crumb );
				$crumb1 = str_replace( '+', ' ', $crumb[1] );
				$crumb	= $append . $crumb1;
				$breadcrumbRaw[] 	= ucwords( str_replace(
			    	array( ".php", "_", '-' ),
			    	array( "", " ", ' ' ),
			    	$crumb
			    ));
			    $i++;
			}
		}

?>
	<ol class="breadcrumb">

	  	<li><a href="<?php echo home_url(); ?>">Home</a></li>

	  	<?php
	  		foreach ( $breadcrumbRaw as $key => $value ) :
	  			$active 	= ( $i == 1 ) ? 'class="active"' : null;
	  			if ( $value != 'Airport Cms' ) {
	  	?>
	  		<li <?php echo $active; ?>><?php echo $value; ?></li>
	  	<?php 	
	  			}
	  			$i--;
	  		endforeach;
	  	?>

	</ol>
<?php

	}

}

/* Next Prev generator */
function ais_next_prev( $postType = 'post' ) {

	$postType 	= ( $postType == 'post' ) ? 'news' : $postType;
	$postName 	= str_replace( '_', ' ', $postType );
	$postName	= ucwords( $postName );

?>

	<div class="next-prev">

	<?php

		$prev_post = get_adjacent_post(false, '', true);

		if ( !empty($prev_post) ) :

	?>
		<div class="page-inline">
			<a class="prev-part" href="<?php echo get_permalink($prev_post->ID); ?>" title="<?php echo $prev_post->post_title; ?>">
				<i class="fa fa-chevron-left"></i> &nbsp; Previous <?php echo $postName; ?>
			</a>
		</div>
	<?php

		endif;

	?>

	<?php

		$next_post = get_adjacent_post(false, '', false);

		if ( !empty($next_post) ) :

	?>
		<div class="page-inline">
			<a class="next-part" href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo $next_post->post_title; ?>">
				Next <?php echo $postName; ?> &nbsp;<i class="fa fa-chevron-right"></i>
			</a>
		</div>
	<?php

		endif;

	?>

	</div>

<?php

}

/* Excerpt limit */
function ais_excerpt_length( $limit, $permalink, $class = false, $text = ' ... <strong>Read more</strong>' ) {

	$excerpt 	= get_the_excerpt();
	$excerptAr 	= explode(' ', $excerpt);

	$limit 		= abs( $limit - 55 );
	array_splice( $excerptAr, $limit );

	echo implode( ' ', $excerptAr ) . ' <a class="' . $class . '" href="' . $permalink . '">' . $text . '</a>';

}

/* Show alert */
function ais_show_alert( $alert = 'success', $message = 'Successfully !' ) {

	echo '<div class="alert alert-' . $alert . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message . '</div>';

}