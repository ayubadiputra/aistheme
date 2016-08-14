<?php

/**
 * Ais_Contact Class
 *
 * @package AiS Themes - Contact Form and Sending
 * @version 0.1
 *
 * Used to help create custom post type for AiSThemes.
 * @link http://aisthemes.com/dev/ais_contact_class
 *
 * @author  Ayub Adiputra
 * @link    http://opreklab.com
 * @version 1.0
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @description: This modules used to get data from airport contact form and send it to
 * administrator email with Mandrill API.
 */

class Ais_Contact {

    public $data;
    public $meta_data;

    function __construct( $contact_data = array() ) {

        $this->data = $this->text_convertion( $contact_data );

        $this->add_action( 'init', array( $this, 'submit_message' ) );
		$this->add_action( 'admin_menu', array( $this, 'contact_menu' ) );

		if ( is_admin() )
		  	$this->add_action( 'admin_init', array( $this, 'contact_settings' ) );

    }

    /* Get user submit message */
	function submit_message() {

		if ( !empty($_POST['ais_contact_id']) ) :

			$name 		= $_POST['name'];
			$email 		= $_POST['email'];
			$message 	= $_POST['message'];

			require_once get_template_directory() . '/inc/modules/ais_contact/libs/PHPMailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->IsSMTP();
			$mail->Host 		= 'smtp.mandrillapp.com';
			$mail->Port 		= 587;
			$mail->SMTPAuth 	= true;
			$mail->Username 	= get_option( 'ais_contact_mandrill_username' );
			$mail->Password 	= get_option( 'ais_contact_mandrill_key' );
			$mail->SMTPSecure 	= 'tls';

			$mail->From 		= $email;
			$mail->FromName 	= $name;
			$mail->AddAddress( get_option('ais_contact_email_to'), get_option('ais_contact_name_to'));

			$mail->IsHTML(true);                                  // Set email format to HTML

			$mail->Subject 	= get_option( 'ais_contact_subject' );
			$mail->Body    	= $message;

		   	$notification 	= 'success';
			if ( !$mail->Send() ) {
			   $notification 	= 'error';
			}

			header( 'Location: ' . get_home_url() . 'contact?status=' . $notification );

		endif;

	}

	/* Create menu for AiS Themes - Contact Form and Sending Modules */
	function contact_menu () {
		add_options_page( 'AiS Themes - Contact Form and Sending', 'Contact', 'manage_options', 'ais-contact', array( $this, 'contact_page' ) );

	}

	function contact_page () {

		require_once get_template_directory() . '/inc/modules/ais_contact/view/form.php';
		wp_register_style( 'aisthemes-contact-css', get_template_directory() . 'ais_contact/assets/css/style.css' );
		wp_enqueue_style( 'aisthemes-contact-css' );

	}

	/* Register AiS Themes - Contact Form and Sending Modules Settings Data */
	function contact_settings() {

	  	register_setting( 'ais-contact-group', 'ais_contact_mandrill_username' );
	  	register_setting( 'ais-contact-group', 'ais_contact_mandrill_key' );
	  	register_setting( 'ais-contact-group', 'ais_contact_email_to' );
	  	register_setting( 'ais-contact-group', 'ais_contact_name_to' );
	  	register_setting( 'ais-contact-group', 'ais_contact_subject' );
	  	register_setting( 'ais-contact-group', 'ais_contact_success' );
	  	register_setting( 'ais-contact-group', 'ais_contact_error' );

	}

	public function add_action( $action, $callback, $priority = false ) {
        add_action( $action, $callback, $priority );
    }

    public function add_filter( $filter, $callback ) {
        add_filter( $filter, $callback );
    }

    private function text_convertion ( $contact_data = false ) {

        $data = array(
            // 'id'            => $contact_data['id'],
            // 'name'          => $contact_data['name'],
            // 'menu'          => ucwords( $contact_data['name'] ),
            // 'singular'      => $contact_data['singular'],
            // 'plurar'        => $contact_data['plurar'],
            // 'singular_cap'  => ucwords( $contact_data['singular'] ),
            // 'plurar_cap'    => ucwords( $contact_data['plurar'] ),
            // 'slug'          => $contact_data['slug'],
            // 'plugin'        => $contact_data['id'] . '-plugin',
            // 'icon'          => $contact_data['icon'],
            // 'supports'      => $contact_data['supports'],
            // 'position'      => $contact_data['position'],
            // 'box_meta'      => $contact_data['box_meta'],
            // 'post_meta'     => $contact_data['post_meta'],
            // 'save_cust'     => $contact_data['save_cust'],
            // 'nonce_f'       => $contact_data['nonce_f'],
        );

        return $data;

    }

}

?>