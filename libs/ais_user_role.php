<?php

class Ais_User_Role {

    static function ais_create_role() {

        $result = add_role(
		    'developer',
		    __( 'Developer' ),
		    array(
		        'read' => true,
		    )
		);

    }

}

$new_user_role = new Ais_User_Role;

/* Register new user role */
add_action( 'after_switch_theme', array( &$new_user_role, 'ais_create_role' ), 10 ,  2);

/* Developer registration */
function myplugin_registration_save( $user_id ) {

    if ( $_POST['role'] == 'developer' ) {

    	echo $app_ID 	= md5( $_POST['email'] );
    	echo $app_secret	= md5( date( 'Y-m-d H:i:s' ) );

        update_user_meta( $user_id, 'ais_developer_app_id', $app_ID );
        update_user_meta( $user_id, 'ais_developer_app_secret', $app_secret );
    }
    
}

add_action( 'user_register', 'myplugin_registration_save', 10, 1 );

/* Add APP and Secret Field */

function ais_show_app_id_secret( $user ) { 

	$app_ID 	= get_the_author_meta( 'ais_developer_app_id', $user->ID );
	$app_secret	= get_the_author_meta( 'ais_developer_app_secret', $user->ID );

	if ( ! empty( $app_ID ) && ! empty( $app_secret ) ) :

?>

	<h3>Developer App ID and Secret</h3>

	<table class="form-table">

		<tr>
			<th><label for="app-id">App ID</label></th>

			<td>
				<input type="text" name="ais_developer_app_id" id="app-id" value="<?php echo esc_attr( $app_ID ); ?>" class="regular-text" /><br />
				<span class="description">Your app ID</span>
			</td>
		</tr>

		<tr>
			<th><label for="app-secret">App Secret</label></th>

			<td>
				<input type="text" name="ais_developer_app_secret" id="ais_developer_app_secret" value="<?php echo esc_attr( $app_secret ); ?>" class="regular-text" /><br />
				<span class="description">Your app secret</span>
			</td>
		</tr>

	</table>

<?php 
	endif;
}

add_action( 'show_user_profile', 'ais_show_app_id_secret' );
add_action( 'edit_user_profile', 'ais_show_app_id_secret' );