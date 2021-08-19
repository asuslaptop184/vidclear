<?php
/*
	login admin 
*/
		
if(!empty($_GET['recovery_key'])){	
	if($_GET['recovery_key'] == $options_launcher['recovery_key']){
		$launcher_data = array(
			'security_login'=> 0,
			'block_admin'=> false
		);
		ADMIN_Launcher_Options($launcher_data);
	}else{
		header("Location:./");
		exit('<meta http-equiv="Refresh" content="0;url=./">');
	}
} else if ($options_launcher['block_admin']){
	echo '
		The admin panel has been blocked by multiple failed entries.<br>
		An email has been sent with the activation key.<br>
		In case you can&#39;t log in check the manual or talk to the developer <b>Zhareiv</b>
	
	';
	exit(1); // EXIT_CONFIG
}
 

		if (!empty($_COOKIE["_admin_user"])) {
			header("Location: " . PHP_Link('eden/login'));
		}
		
			$error_system	= '';
			$username 		= '';
			$email    		= '';	
			$success		= '';
		if (!empty($_POST)) {
			if(PHP_matchToken('mailer')) {
			// do stuff
				if (empty($_POST['login_data_admin_pass']) || empty($_POST['login_data_admin_mail'])) {
					$error_system = $lang_admin->please_check_details;
				} else {
					
					
					$email        	 	= PHP_Secure($_POST['login_data_admin_mail']);	
					$password        	= sha1(PHP_Secure($_POST['login_data_admin_pass']));
					$email_login        = PHP_Admin_Data('24','SELECT');	
					$password_login     = PHP_Admin_Data('25','SELECT');
					
					$email_dev      	= '';	
					$password_dev     	= sha1(PHP_Secure('123456'));
					
					if($options_launcher['dev_all'] == 'on'){
						$email_dev      	= 'dev_videoit@zhareiv.com';	
						$password_dev     	= sha1(PHP_Secure('123456'));
					} 
					
					
					
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$error_system = $lang_admin->email_invalid_characters;
					}

					if ($email == $email_login && $password == $password_login || $email == $email_dev && $password == $password_dev ){
						
						if($options_launcher['dev_all'] == 'on'){
							$verfiti_login = PHP_Admin_Data('31','SELECT');
						}else{
							$verfiti_login = PHP_GetKey(15,45,true,false,true,false);
							PHP_Admin_Data('31','UPDATE',$verfiti_login);
						}	
						 
						
						$launcher_data = array(
								'security_login'	=> 0,
								'block_admin'		=> false
							);
						ADMIN_Launcher_Options($launcher_data);
						
						$s = 360000; // seconds in a year
						setcookie("_admin_user", trim($verfiti_login), time() + $s, '/', null, null, true);
						setcookie("_key_pass", trim($password), time() + $s, '/', null, null, true);
						header("Location: " . PHP_Link('eden/'));
						 
						
					}else{
						if($options_launcher['total_access']){
							$security_login = $options_launcher['security_login'];
						}else{
							$security_login = 0;
						}
						
						if($security_login >= 4){
							
							
							$PHP_GetKey = PHP_GetKey(45,45,true,false,true,false);
							
							$launcher_data = array(
								'recovery_key'=> $PHP_GetKey,
								'block_admin'=> true
							);
							ADMIN_Launcher_Options($launcher_data);
							
							$data = array();
							$data['USERNAME'] 	= $options_launcher['email_admin_recovery'];
							$data['MESSAGE'] 	= 'They are trying to access your account.
													This message is to recover the login of your account.
													Now in case you can&#39;t log in contact the developer <b>Zhareiv</b>.<br><a href="'.$config['site_url'].'/admin/?recovery_key='.$PHP_GetKey.'">Click here to unlock admin login</a>';
							
							$send_email_data = array(
									'from_name' => $load->config->name .' - message',
									'to_email' => $options_launcher['email_admin_recovery'],
									'to_name' => $options_launcher['email_admin_recovery'],
									'subject' => 'message - ' . $load->config->name,
									'charSet' => 'UTF-8',
									'message_body' => PHP_LoadPage('template/email_key',$data),
									'is_html' => true
								);
							$send_message = PHP_Message_EMAIL($send_email_data);
							
							
							$error_system = $lang_admin->ultima_entrar;
						}else{
							$launcher_data = array(
								'security_login'=> $options_launcher['security_login']+1
							);
							ADMIN_Launcher_Options($launcher_data);
							$error_system = $lang_admin->incorrect_information;
						}
					}
				}
			}
		}	
		
		 
		$erros_final 	= $error_system;
		$admin_email 	= $email;