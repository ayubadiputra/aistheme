<div class="wrap">

	<h2>AiS Themes - Contact Form and Sending</h2>

	<p>
		This modules used for contact data.
	</p>

	<div class="setting-area">

		<form method="post" action="options.php" class="theme-option"> 

			<?php
			
				settings_fields( 'ais-contact-group' );
				do_settings_sections( 'ais-contact-group' );
				
			?>

			<h3 class="sub-title">Mandrill Settings</h3>

			<table class="form-table twp-form-table">

			  	<tr valign="top">
			        <th scope="row">Mandrill Username</th>
		        	<td>
		        		<input class="input-control" type="text" name="ais_contact_mandrill_username" value="<?php echo esc_attr( get_option('ais_contact_mandrill_username') ); ?>" />
		        	</td>
		        </tr>
		         
		        <tr valign="top">
			        <th scope="row">Mandrill Key</th>
			        <td>
			        	<input class="input-control" type="password" name="ais_contact_mandrill_key" value="<?php echo esc_attr( get_option('ais_contact_mandrill_key') ); ?>" />
			        </td>
		        </tr>

		    </table>

		    <h3 class="sub-title">Email Settings</h3>

		    <table class="form-table twp-form-table">

			  	<tr valign="top">
			        <th scope="row">Receipt Email (Administrator)</th>
		        	<td>
		        		<input class="input-control" type="email" name="ais_contact_email_to" value="<?php echo esc_attr( get_option('ais_contact_email_to') ); ?>" />
		        	</td>
		        </tr>

			  	<tr valign="top">
			        <th scope="row">Receipt Name (Administrator)</th>
		        	<td>
		        		<input class="input-control" type="text" name="ais_contact_name_to" value="<?php echo esc_attr( get_option('ais_contact_name_to') ); ?>" />
		        	</td>
		        </tr>

			  	<tr valign="top">
			        <th scope="row">Subject</th>
		        	<td>
		        		<input class="input-control" type="text" name="ais_contact_subject" value="<?php echo esc_attr( get_option('ais_contact_subject') ); ?>" />
		        	</td>
		        </tr>

		        <tr valign="top">
			        <th scope="row">Success Message</th>
		        	<td>
		        		<textarea type="text" name="ais_contact_success"><?php echo esc_attr( get_option('ais_contact_success') ); ?></textarea>
		        	</td>
		        </tr>

		        <tr valign="top">
			        <th scope="row">Error Message</th>
		        	<td>
		        		<textarea type="text" name="ais_contact_error"><?php echo esc_attr( get_option('ais_contact_error') ); ?></textarea>
		        	</td>
		        </tr>

		    </table>

		    <?php submit_button(); ?>

		</form>

	</div>

</div>