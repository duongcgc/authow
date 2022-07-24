<?php
add_action( 'wp_ajax_nopriv_goso_login_ajax', 'goso_login_ajax_callback' );
add_action( 'wp_ajax_goso_login_ajax', 'goso_login_ajax_callback' );

function goso_login_ajax_callback() {
	global $wpdb;
	
	check_ajax_referer( 'login', 'security' );
	
	// We shall SQL prepare all inputs to avoid sql injection.
	$username = isset( $_REQUEST['username'] ) ? $wpdb->prepare( $_REQUEST['username'], array() ) : '';
	$password = $_REQUEST['password'];
	$remember = isset( $_REQUEST['rememberme'] ) ? $wpdb->prepare( $_REQUEST['rememberme'], array() ) : '';
	$captcha = isset( $_POST['captcha'] ) ? $_POST['captcha'] : '';
	
	if( $captcha == '' ){
		wp_send_json_error( '<p class="message message-error">' . goso_get_setting( 'goso_plogin_validate_robot' ) . '</p>' );
	} else {
		if ( $remember ) {
			$remember = 'true';
		} else {
			$remember = 'false';
		}

		$login_data                         = array();
		$login_data['user_login']           = $username;
		$login_data['user_password']        = $password;
		$login_data['remember']             = $remember;
		$user_verify                 = wp_signon( $login_data, false );

		if ( is_wp_error( $user_verify ) ) {
			wp_send_json_error( '<p class="message message-error">' . goso_get_setting( 'goso_plogin_wrong' ) . '</p>' );
		}

		if( isset( $user_verify->ID ) ){
			wp_set_current_user( $user_verify->ID );
			wp_set_auth_cookie( $user_verify->ID );
		}

		wp_send_json_success( '<p class="message message-success">' . goso_get_setting( 'goso_plogin_success' ) . '</p>' );
	}
}

// Ajax widget pasword recovery
add_action( 'wp_ajax_nopriv_goso_resetpass_ajax', 'goso_pass_recovery_ajax_callback' );
add_action( 'wp_ajax_goso_resetpass_ajax', 'goso_pass_recovery_ajax_callback' );

function goso_pass_recovery_ajax_callback() {
	global $wpdb;
	
	check_ajax_referer( 'resetpassword', 'security' );
	
	$account = $_POST['username'];
	$captcha = isset( $_POST['captcha'] ) ? $_POST['captcha'] : '';
	$error = '';
	
	if( $captcha == '' ){
	    $error = goso_get_setting( 'goso_plogin_validate_robot' );
	} else {
		if( is_email( $account ) ) {
			if( email_exists( $account ) ){
				$get_by = 'email';
			} else {
				$error = goso_get_setting( 'goso_preset_noemail' );			
			}
		} else {
			$error = goso_get_setting( 'goso_plogin_mess_invalid_email' );
		}
	}
	
	if( ! $error ) {
		$text_from = goso_get_setting( 'goso_preset_from' );
		$text_newpass = goso_get_setting( 'goso_preset_newpassis' );
		
		// Generate our new password
		$random_password = wp_generate_password();
 
			
		// Get user data by field and data
		$user = get_user_by( $get_by, $account );
			
		$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
			
		// if  update user return true then lets send user an email containing the new password
		if( $update_user ) {
			
			$sitename = strtolower( $_SERVER['SERVER_NAME'] );
			if ( substr( $sitename, 0, 4 ) == 'www.' ) {
				$sitename = substr( $sitename, 4 );					
			}
			$from = 'admin@'.$sitename;
			
			$to = $user->user_email;
			$subject = goso_get_setting( 'goso_trans_recover_pass' );
			$sender = $text_from . get_option('name') .' <'.$from.'>' . "\r\n";
			
			$message = $text_newpass . ' '.$random_password;
				
			$headers[] = 'MIME-Version: 1.0' . "\r\n";
			$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers[] = "X-Mailer: PHP \r\n";
			$headers[] = $sender;
				
			$mail = wp_mail( $to, $subject, $message, $headers );
			if( $mail ){
				$success = goso_get_setting( 'goso_preset_checkinbox' );
			} else {
				$error = goso_get_setting( 'goso_preset_cantsend' );
			}
		} else {
			$error = goso_get_setting( 'goso_preset_somethingwrong' );
		}
	}
	
	if( ! empty( $error ) ){
		wp_send_json_error( '<p class="message message-error">' . $error . '</p>' );
	}
	
	if( ! empty( $success ) ){
		wp_send_json_success( '<p class="message message-success">' . $success . '</p>' );
	}
	
	die();
}

//Ajax widget register popup
add_action( 'wp_ajax_nopriv_goso_register_ajax', 'goso_register_ajax_callback' );
add_action( 'wp_ajax_goso_register_ajax', 'goso_register_ajax_callback' );

function goso_register_ajax_callback() {
	
	check_ajax_referer( 'register', 'security' );

	$first_name  = sanitize_text_field( $_POST['fistName'] );
	$last_name   = sanitize_text_field( $_POST['lastName'] );
	$username    = sanitize_text_field( $_POST['username'] );
	$email       = sanitize_text_field( $_POST['email'] );
	$pass        = sanitize_text_field( $_POST['password'] );
	$confirmPass = sanitize_text_field( $_POST['confirmPass'] );
	$captcha = isset( $_POST['captcha'] ) ? $_POST['captcha'] : '';
	$error = '';
	
	if( $captcha == '' ){
	    $error = goso_get_setting( 'goso_plogin_validate_robot' );
	} else {
		if ( ! is_email( $email ) ) {
			$error = goso_get_setting( 'goso_plogin_mess_invalid_email' );
		}

		if ( $confirmPass != $pass ) {
			$error = goso_get_setting( 'goso_plogin_mess_error_email_pass' );
		}
	}

	if ( $error != '' ) {
		wp_send_json_error( '<p class="message message-error">' . $error . '</p>' );
	} else {
		// Register the user
		$user_register = wp_insert_user( array(
			'first_name'           => $first_name,
			'last_name'            => $last_name,
			'user_login'           => $username,
			'user_email'           => $email,
			'user_pass'            => $pass
		) );


		if ( is_wp_error($user_register) ){
			$error  = $user_register->get_error_codes()	;

			if ( in_array( 'empty_user_login', $error ) ) {
				wp_send_json_error( '<p class="message message-error">' . $user_register->get_error_message( 'empty_user_login' ) . '</p>' );

			} elseif ( in_array( 'existing_user_login', $error ) ) {
				wp_send_json_error( '<p class="message message-error">' . goso_get_setting( 'goso_plogin_mess_username_reg' ) . '</p>' );

			} elseif ( in_array( 'existing_user_email', $error ) ) {
				wp_send_json_error( '<p class="message message-error">' . goso_get_setting( 'goso_plogin_mess_email_reg' ) . '</p>' );
			}
		} else {
			$login_data                         = array();
			$login_data['user_login']           = $username;
			$login_data['user_password']        = $pass;
			$login_data['remember']             = true;

			$user_signon                 = wp_signon( $login_data, false );

			if( isset( $user_signon->ID ) ){
				wp_set_current_user( $user_signon->ID );
				wp_set_auth_cookie( $user_signon->ID );
			}

			if ( is_wp_error( $user_signon ) ) {
				wp_send_json_error( '<p class="message message-error">' .  goso_get_setting( 'goso_plogin_mess_wrong_email_pass' ). '</p>' );
			} else {
				wp_set_current_user( $user_signon->ID );
				wp_send_json_success( '<p class="message message-success">' . goso_get_setting( 'goso_plogin_mess_reg_succ' ) . '</p>' );
			}
		}
	}
}

function goso_add_captcha_login_form(){
	/* Support captcha plugin https://wordpress.org/plugins/login-security-recaptcha/ */
	if( class_exists( 'STLSR_Captcha' ) ){
		$login_captcha        = get_option( 'stlsr_login_captcha' );
		$login_captcha_enable = isset( $login_captcha['enable'] ) ? (bool) $login_captcha['enable'] : false;

		if ( $login_captcha_enable ) {
			$login_captcha = isset( $login_captcha['captcha'] ) ? esc_attr( $login_captcha['captcha'] ) : '';
			STLSR_Captcha::display_recaptcha( $login_captcha, 'login' );
		}
	}
}

function goso_add_captcha_getpass_form(){
	/* Support captcha plugin https://wordpress.org/plugins/login-security-recaptcha/ */
	if( class_exists( 'STLSR_Captcha' ) ){
		$lostpassword_captcha        = get_option( 'stlsr_lostpassword_captcha' );
		$lostpassword_captcha_enable = isset( $lostpassword_captcha['enable'] ) ? (bool) $lostpassword_captcha['enable'] : false;

		if ( $lostpassword_captcha_enable ) {
			$lostpassword_captcha = isset( $lostpassword_captcha['captcha'] ) ? esc_attr( $lostpassword_captcha['captcha'] ) : '';
			STLSR_Captcha::display_recaptcha( $lostpassword_captcha, 'lostpassword' );
		}
	}
}

function goso_authow_login_register_popup() {
	?>
	<?php if ( ! is_user_logged_in() ): ?>
		<div id="goso-login-popup" class="mfp-hide goso-popup-wrapper">
			<div id="goso-popup-login" class="goso-login-register goso-popup-login">
				<div class="goso-login-container">
					<div class="goso-lgpop-title"><?php echo goso_get_setting( 'goso_trans_sign_in' ); ?></div>
					<div class="goso-login">
						<form name="goso-loginpopform" id="goso-loginpopform" action="<?php echo esc_url( site_url( 'wp-login.php' ) ); ?>" method="post" novalidate="novalidate">
							<input type="hidden" name="_wpnonce" class="goso_form_nonce" value="<?php echo wp_create_nonce( 'login' ); ?>">
							<div class="pclogin-input">
								<input type="text" name="log" id="goso_user" class="input" placeholder="<?php echo goso_get_setting( 'goso_trans_usernameemail_text' ); ?>" size="20">
							</div>
							<div class="pclogin-input">
								<input type="password" name="pwd" id="goso_pass" class="input" placeholder="<?php echo goso_get_setting( 'goso_trans_pass_text' ); ?>" size="20">
							</div>
							<?php do_action( 'login_form' ); ?>
							<?php goso_add_captcha_login_form(); ?>
							<div class="pclogin-input pclogin-input-checkbox">
								<p><input name="rememberme" type="checkbox" id="remembermepopup" value="forever"> <?php echo goso_get_setting( 'goso_plogin_label_remember' ); ?></p>
							</div>
							<div class="pclogin-input">
								<input type="submit" name="goso_submit" class="pcpop-button" value="<?php echo goso_get_setting( 'goso_plogin_label_log_in' ); ?>">
							</div>
						</form>
					</div>
					<div class="goso-popup-desc register register-popup">
						<p><a class="goso-lostpassword-btn" href="#"><?php echo( goso_get_setting( 'goso_plogin_label_lostpassword' ) ); ?></a></p>
						<?php if ( get_option( 'users_can_register' ) ) : ?>
						<p><?php echo ( goso_get_setting( 'goso_plogin_text_has_account' ) ); ?> <a class="goso-register-popup-btn" href="<?php echo wp_registration_url(); ?>"><?php echo ( goso_get_setting( 'goso_plogin_label_registration' ) ); ?></a></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div id="goso-popup-passreset" class="goso-login-register goso-popup-passreset goso-hidden">
				<div class="goso-login-container">
					<div class="goso-lgpop-title"><?php echo goso_get_setting( 'goso_trans_recover_pass' ); ?></div>
					<div class="goso-login">
						<form id="goso-passreset-popup" class="goso-passreset-popup" action="<?php echo esc_url( site_url( 'wp-login.php?action=lostpassword' ) ); ?>" method="post" novalidate="novalidate">
							<input type="hidden" class="goso_form_nonce" name="_wpnonce" value="<?php echo wp_create_nonce( 'resetpassword' ); ?>">
							<div class="passreset-input">
								<input class="goso_user_email" name="goso_user_email" type="text" placeholder="<?php echo goso_get_setting( 'goso_plogin_email_place' ); ?>"/>
							</div>
							<?php do_action( 'lostpassword_form' ); ?>
							<?php goso_add_captcha_getpass_form(); ?>
							<div class="passreset-input">
								<input type="submit" name="goso_submit" class="pcpop-button" value="<?php echo goso_get_setting( 'goso_preset_submit' ); ?>"/>
							</div>
							<div class="goso-popup-desc pass-revocer-popup">
								<p><?php echo ( goso_get_setting( 'goso_preset_desc' ) ); ?></p>
								<p><?php echo ( goso_get_setting( 'goso_preset_received' ) ); ?> <a class="goso-login-popup-btn" href="#login"><?php  echo goso_get_setting( 'goso_pregister_label_registration' ); ?></a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php if ( get_option( 'users_can_register' ) ) : ?>
			<div id="goso-popup-register" class="goso-login-register goso-popup-register goso-hidden">
				<div class="goso-login-container">
					<div class="goso-lgpop-title"><?php echo goso_get_setting( 'goso_trans_register_new_account' ); ?></div>
					<div class="goso-login">
						<form name="form" id="goso-register-popup" action="<?php echo esc_url( site_url( 'wp-login.php?action=register' ) ); ?>" method="post" novalidate="novalidate">
							<input type="hidden" name="_wpnonce" class="goso_form_nonce" value="<?php echo wp_create_nonce( 'register' ); ?>">
							<div class="pclg-2col">
								<div class="register-input">
									<input class="goso_first_name" name="goso_first_name" type="text" placeholder="<?php echo goso_get_setting( 'goso_pregister_first_name' ); ?>"/>
								</div>
								<div class="register-input">
									<input class="goso_last_name" name="goso_last_name" type="text" placeholder="<?php echo goso_get_setting( 'goso_pregister_last_name' ); ?>"/>
								</div>
							</div>
							<div class="register-input">
								<input class="goso_user_name" name="goso_user_name" type="text" placeholder="<?php echo goso_get_setting( 'goso_pregister_user_name' ); ?>"/>
							</div>
							<div class="register-input">
								<input class="goso_user_email" name="goso_user_email" type="email" placeholder="<?php echo goso_get_setting( 'goso_pregister_user_email' ); ?>"/>
							</div>
							<div class="register-input">
								<input autocomplete="off" class="goso_user_pass" name="goso_user_pass" type="password" placeholder="<?php echo goso_get_setting( 'goso_pregister_user_pass' ); ?>"/>
							</div>
							<div class="register-input">
								<input autocomplete="off" class="goso_user_pass_confirm" name="goso_user_pass_confirm" type="password" placeholder="<?php echo goso_get_setting( 'goso_pregister_pass_confirm' ); ?>"/>
							</div>
							<?php do_action( 'register_form' ); ?>
							<div class="register-input">
								<input type="submit" name="goso_submit" class="pcpop-button" value="<?php echo goso_get_setting( 'goso_pregister_button_submit' ); ?>"/>
							</div>
							<div class="goso-popup-desc register-input login login-popup">
								<p><?php echo goso_get_setting( 'goso_pregister_has_account' ); ?> <a class="goso-login-popup-btn" href="#login"><?php  echo goso_get_setting( 'goso_pregister_label_registration' ); ?></a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="goso-loader-effect goso-loading-animation"> <span class="goso-ld"> <span class="goso-ld1 goso-ldin"></span> <span class="goso-ld2 goso-ldin"></span> <span class="goso-ld3 goso-ldin"></span> <span class="goso-ld4 goso-ldin"></span> <span class="goso-ld5 goso-ldin"></span> <span class="goso-ld6 goso-ldin"></span> <span class="goso-ld7 goso-ldin"></span> <span class="goso-ld8 goso-ldin"></span> <span class="goso-ld9 goso-ldin"></span> <span class="goso-ld10 goso-ldin"></span> <span class="goso-ld11 goso-ldin"></span> <span class="goso-ld12 goso-ldin"></span> </span></div>
		</div>
	<?php endif;
}