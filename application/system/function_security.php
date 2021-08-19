<?php
require_once ("launcher.php");
//--
    function PHP_DatesCrypt($action, $string) {
		global $options_launcher;
		$output 			= false;
		$encrypt_method 	= "AES-256-CBC";
		$secret_key 		= $options_launcher['crypt_secret_key'];
		$secret_iv 			= $options_launcher['crypt_password'];
		// hash
		$key 				= hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
//--
	function PHP_Crypt_code($in, $to_num = false, $pad_up = false, $pass_key = null) {
		return $in;
	}
//--
	function PHP_Message_EMAIL($data = array()) {
		global $load, $con, $mail, $options_launcher;
		
		$smtp_or_mail 		= $options_launcher['smtp_or_mail'];
		$smtp_host 			= $options_launcher['smtp_host'];
		$smtp_username 		= $options_launcher['smtp_username'];
		$smtp_password 		= $options_launcher['smtp_password'];
		$smtp_encryption 	= $options_launcher['smtp_encryption'];
		$smtp_port 			= $options_launcher['smtp_port'];

		
		$email_from      = $smtp_username;
		$to_email        = $data['to_email'] = PHP_Secure($data['to_email']);
		$subject         = $data['subject'];
		$data['charSet'] = PHP_Secure($data['charSet']);
		if ($smtp_or_mail == 'mail') {
			$mail->IsMail();
		} else if ($smtp_or_mail == 'smtp') {
			$mail->isSMTP();
			$mail->Host        = $smtp_host;
			$mail->SMTPAuth    = true;
			$mail->Username    = $smtp_username;
			$mail->Password    = $smtp_password;
			$mail->SMTPSecure  = $smtp_encryption;
			$mail->Port        = $smtp_port;
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
		} else {
			return false;
		}
		$mail->IsHTML($data['is_html']);
		$mail->setFrom($smtp_username, $data['from_name']);
		$mail->addAddress($data['to_email'], $data['to_name']);
		$mail->Subject = $data['subject'];
		$mail->CharSet = $data['charSet'];
		$mail->MsgHTML($data['message_body']);
		if ($mail->send()) {
			$mail->ClearAddresses();
			return true;
		}
	}
//--
	function PHP_fetchToken($form = 'mailer'){
        $token  =   sha1(uniqid(microtime(), true));
        $_SESSION['token'][$form]   =   $token; 
        // Just return it, don't echo and return
        return $token;
    }
//--
	function PHP_matchToken($form){
        if(!isset($_POST['token'][$form]))
            return false;
        // I would clear the token after matched
        if($_POST['token'][$form] === $_SESSION['token'][$form]) {
            $_SESSION['token'][$form]   =   NULL;
            return true;
        }
        // I would return false by default, not true
        return false;
    }	
//--> PLUGINS SYSTEM
$add_action->do_action('Hook_code_plugin_system_3');	
?>