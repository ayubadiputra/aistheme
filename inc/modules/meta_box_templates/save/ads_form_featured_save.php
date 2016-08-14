<?php
	/* Fearued Advertisement */
	$data_featured = array();
	update_post_meta( $post->ID, 'ais_advertisement_featured_detail', $data_featured );
	if ( isset( $_POST['ais_advertisement_featured_title'] ) && ! empty( $_POST['ais_advertisement_featured_title'] ) ) {
		$i = 0;
		foreach ( $_POST['ais_advertisement_featured_title'] as $key => $value) {
			$data_featured[] = array(
				'ais_advertisement_featured_title' 		=> $_POST['ais_advertisement_featured_title'][$i],
				'ais_advertisement_featured_content' 	=> $_POST['ais_advertisement_featured_content'][$i],
			);
			$i++;
		}
	}
	update_post_meta( $post->ID, 'ais_advertisement_featured_detail', $data_featured );
?>