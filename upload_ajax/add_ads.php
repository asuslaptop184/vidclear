<?php 
//-->
function PHP_Secure_banner($string) {
	$string = htmlspecialchars($string, ENT_QUOTES,'UTF-8');
	$string = str_replace('\r\n', "", $string);
	$string = str_replace('\n\r', "", $string);
	$string = str_replace('\r', "", $string);
	$string = str_replace('\n', "", $string);
	$string = stripslashes($string);
	return $string;
}
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
$add_action->do_action('Hook_code_plugin_116'); 

$type = PHP_Secure($_REQUEST['type']);
if($type=='script'){ 
	$add_action->do_action('Hook_code_plugin_115');
	PHP_Admin_Data('34','UPDATE',PHP_Secure_banner($_POST['ads_text_1'])); 
	PHP_Admin_Data('35','UPDATE',PHP_Secure_banner($_POST['ads_text_2']));
	PHP_Admin_Data('36','UPDATE',PHP_Secure_banner($_POST['ads_text_3']));
	PHP_Admin_Data('42','UPDATE',PHP_Secure_banner($_POST['ads_text_4']));	 
	PHP_Admin_Data('37','UPDATE',PHP_Secure_banner($_POST['add_text_1']));
	PHP_Admin_Data('38','UPDATE',PHP_Secure_banner($_POST['add_text_2']));
	PHP_Admin_Data('39','UPDATE',PHP_Secure_banner($_POST['add_text_3']));
	PHP_Admin_Data('40','UPDATE',PHP_Secure_banner($_POST['add_text_4']));
	PHP_Admin_Data('41','UPDATE',PHP_Secure_banner($_POST['add_text_5']));
	$data_load['message'] 	= $lang_admin->ok_save;
	$data_load['text'] 		= $lang_admin->ok_save_text;
	$data_load['status']  	= 200;
	$add_action->do_action('Hook_code_plugin_112');
}
$add_action->do_action('Hook_code_plugin_111');
}