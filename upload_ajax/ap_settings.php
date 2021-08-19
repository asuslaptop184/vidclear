<?php
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
}
#CODE
if($options_launcher['total_access']){
$data_load['message'] 	= $lang_admin->Error_400;
$data_load['text'] 		= $lang_admin->please_check_details;	
$data_load['status']  	= 400; 
	$add_action->do_action('Hook_code_plugin_102');
	if($_REQUEST['type']=='general'){
		$add_action->do_action('Hook_code_plugin_101');
		if (empty($_POST['title_site']) || empty($_POST['name_site']) || empty($_POST['description_site'])) {
			$data_load['message'] 	= $lang_admin->Error_400;
			$data_load['text'] 		= $lang_admin->please_check_details;
			$data_load['status']  	= 400;
			$add_action->do_action('Hook_code_plugin_100');
		}else{
			$add_action->do_action('Hook_code_plugin_99');
			
			PHP_Admin_Data('3','UPDATE',PHP_Secure($_POST['title_site']));
			PHP_Admin_Data('4','UPDATE',PHP_Secure($_POST['name_site']));
			PHP_Admin_Data('7','UPDATE',PHP_Secure($_POST['description_site']));
			PHP_Admin_Data('16','UPDATE',PHP_Secure($_POST['facebook_site']));
			PHP_Admin_Data('17','UPDATE',PHP_Secure($_POST['twitter_site']));
			PHP_Admin_Data('11','UPDATE',PHP_Secure($_POST['lang_site']));
			PHP_Admin_Data('33','UPDATE',PHP_Secure($_POST['keywords']));
			$launcher_data = array(
				'articles_active'	=> (empty($_POST['blogs_site']))?'':PHP_Secure($_POST['blogs_site']),
				'google_analytics'	=> (empty($_POST['google_analytics']))?'':PHP_Secure($_POST['google_analytics']),
				'dev_all'			=> (empty($_POST['dev_all']))?'':PHP_Secure($_POST['dev_all']),
			);
			ADMIN_Launcher_Options($launcher_data);
			#-->
			$add_action->do_action('Hook_code_plugin_98');
			if (isset($_FILES['image_logo']['name'])) {
				$fileInfo = array(
					'file' 		=> $_FILES["image_logo"]["tmp_name"],
					'name' 		=> $_FILES['image_logo']['name'],
					'size' 		=> $_FILES["image_logo"]["size"],
					'logo_name' => 'logo'
				);
				$media    = F_UploadLogo($fileInfo);
			}
			#-->
			$add_action->do_action('Hook_code_plugin_97');
			if (isset($_FILES['image_icon']['name'])) {
				$fileInfo = array(
					'file' 		=> $_FILES["image_icon"]["tmp_name"],
					'name' 		=> $_FILES['image_icon']['name'],
					'size' 		=> $_FILES["image_icon"]["size"],
					'logo_name' => 'favicon'
				);
				$media    = F_UploadLogo($fileInfo);
			}
			if (isset($_FILES['mobile_icon']['name'])) {
				$fileInfo = array(
					'file' 		=> $_FILES["mobile_icon"]["tmp_name"],
					'name' 		=> $_FILES['mobile_icon']['name'],
					'size' 		=> $_FILES["mobile_icon"]["size"],
					'logo_name' => 'logo_m'
				);
				$media    = F_UploadLogo($fileInfo);
			}
			
			$data_load['message'] 	= $lang_admin->ok_save;
			$data_load['text'] 		= $lang_admin->ok_save_text;
			$data_load['status']  	= 200;
			$add_action->do_action('Hook_code_plugin_96');
		}
		$add_action->do_action('Hook_code_plugin_95');
	}else if($_REQUEST['type']=='phpmailer'){
			$add_action->do_action('Hook_code_plugin_94');
			if (empty($_POST['smtp_or_mail']) || empty($_POST['smtp_host']) || empty($_POST['smtp_username']) || empty($_POST['smtp_password']) || empty($_POST['smtp_encryption'])|| empty($_POST['smtp_port'])) {
				$data_load['message'] 	= $lang_admin->Error_400;
				$data_load['text'] 		= $lang_admin->please_check_details;	
				$data_load['status']  	= 400;
				$add_action->do_action('Hook_code_plugin_93');
			}else{
				$add_action->do_action('Hook_code_plugin_92');
				$launcher_data = array(
					'smtp_or_mail'		=> PHP_Secure($_POST['smtp_or_mail']),
					'smtp_host'			=> PHP_Secure($_POST['smtp_host']),
					'smtp_username'		=> PHP_Secure($_POST['smtp_username']),
					'smtp_password'		=> PHP_Secure($_POST['smtp_password']),
					'smtp_encryption'	=> PHP_Secure($_POST['smtp_encryption']),
					'smtp_port'			=> PHP_Secure($_POST['smtp_port']),
				);
				ADMIN_Launcher_Options($launcher_data);
				$data_load['message'] 	= $lang_admin->ok_save;
				$data_load['text'] 		= $lang_admin->ok_save_text;
				$data_load['status']  	= 200;
				$add_action->do_action('Hook_code_plugin_91');
			}
			$add_action->do_action('Hook_code_plugin_90');
	}else if($_REQUEST['type']=='admin_setting'){
		$add_action->do_action('Hook_code_plugin_89');
		if (empty($_POST['mail_admin']) || empty($_POST['email_admin_recovery']) || empty($_POST['mail_admin']) || empty($_POST['pass_key'])) {
			$data_load['message'] 	= $lang_admin->Error_400;
			$data_load['text'] 		= $lang_admin->please_check_details;
			$data_load['status']  	= 400;
			$add_action->do_action('Hook_code_plugin_88');
		}else{
			$add_action->do_action('Hook_code_plugin_87');
			
			if($options_launcher['dev_all'] == 'off'){
				//--> Password
				$pass 				= false;
				$password			= sha1(PHP_Secure($_POST['pass_admin']));
				$new_password		= PHP_Secure($_POST['new_password']);
				$c_password			= PHP_Secure($_POST['re_password']);
				if (!empty($new_password)) {
					if($password == PHP_Admin_Data('25','SELECT')){
						if (strlen($new_password) > 4) {
							if ($new_password == $c_password) {
								$pass = true;
							}else{
								$data_load['message'] 	= $lang_admin->Error_Password_igual;
								$data_load['text'] 		= $lang_admin->please_check_details;
								$data_load['status']  	= 400;
								$pass 					= false;
								$errors[] 				= 'error';
							} 
						}else{
							$data_load['message'] 	= $lang_admin->Error_Password;
							$data_load['text'] 		= $lang_admin->Error_debil;
							$data_load['status']  	= 400;
							$pass 					= false;
							$errors[] 				= 'error';
						}
					}else{
						$pass 					= false;
						$data_load['message'] 	= $lang_admin->Error_password_incorrecta;
						$data_load['text'] 		= $lang_admin->Error_password_Verfique;
						$data_load['status']  	= 400;
						$errors[] 				= 'error';
					}
				}
				
				if (empty($errors)) {
				
					if($pass){
						PHP_Admin_Data('25','UPDATE',sha1(PHP_Secure($new_password)));
					}
					
					PHP_Admin_Data('24','UPDATE',PHP_Secure($_POST['mail_admin']));
					$launcher_data = array(
							'email_admin_recovery'		=> PHP_Secure($_POST['email_admin_recovery']),
							'crypt_secret_key'	=> PHP_Secure($_POST['secret_key']),
							'crypt_password'	=> PHP_Secure($_POST['pass_key']),
						);
					ADMIN_Launcher_Options($launcher_data);
					
					$data_load['message'] 	= $lang_admin->ok_save;
					$data_load['text'] 		= $lang_admin->ok_save_text;
					$data_load['status']  	= 200;
				}
				$add_action->do_action('Hook_code_plugin_86');
			}
		}
		$add_action->do_action('Hook_code_plugin_85');
	}else if($_REQUEST['type']=='terms_of_use'){
		$add_action->do_action('Hook_code_plugin_84');
		if (empty($_POST['text'])) {
			$data_load['message'] 	= $lang_admin->Error_400;
			$data_load['text'] 		= $lang_admin->please_check_details;
			$data_load['status']  	= 400;
			$add_action->do_action('Hook_code_plugin_83');
		}else{
			$add_action->do_action('Hook_code_plugin_82');
			PHP_Admin_Data('12','UPDATE',htmlspecialchars($_POST['text']));
			$data_load['message'] 	= $lang_admin->ok_save;
			$data_load['text'] 		= $lang_admin->ok_save_text;
			$data_load['status']  	= 200;
			$add_action->do_action('Hook_code_plugin_81');
		}
		$add_action->do_action('Hook_code_plugin_80');
	}else if($_REQUEST['type']=='privacy_policy'){
		$add_action->do_action('Hook_code_plugin_79');
		if (empty($_POST['text'])) {
			$data_load['message'] 	= $lang_admin->Error_400;
			$data_load['text'] 		= $lang_admin->please_check_details;
			$data_load['status']  	= 400;
			$add_action->do_action('Hook_code_plugin_78');
		}else{
			$add_action->do_action('Hook_code_plugin_77');
			PHP_Admin_Data('13','UPDATE',htmlspecialchars($_POST['text']));
			$data_load['message'] 	= $lang_admin->ok_save;
			$data_load['text'] 		= $lang_admin->ok_save_text;
			$data_load['status']  	= 200;
			$add_action->do_action('Hook_code_plugin_76');
		}
		$add_action->do_action('Hook_code_plugin_75');
	}else if($_REQUEST['type']=='copyright'){
		$add_action->do_action('Hook_code_plugin_74');
		if (empty($_POST['text'])) {
			$data_load['message'] 	= $lang_admin->Error_400;
			$data_load['text'] 		= $lang_admin->please_check_details;
			$data_load['status']  	= 400;
			$add_action->do_action('Hook_code_plugin_73');
		}else{
			$add_action->do_action('Hook_code_plugin_72');
			PHP_Admin_Data('14','UPDATE',htmlspecialchars($_POST['text']));
			$data_load['message'] 	= $lang_admin->ok_save;
			$data_load['text'] 		= $lang_admin->ok_save_text;
			$data_load['status']  	= 200;
			$add_action->do_action('Hook_code_plugin_71');
		}
		$add_action->do_action('Hook_code_plugin_70');
	}else{
		$data_load['message'] 	= $lang_admin->Error_400;
		$data_load['text'] 		= $lang_admin->please_check_details;
		$data_load['status']  	= 400;
		$add_action->do_action('Hook_code_plugin_64');
	}
	$add_action->do_action('Hook_code_plugin_63');
}