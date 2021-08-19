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
$data_send = array();
	$add_action->do_action('Hook_code_plugin_41');
	if (empty($_REQUEST['form_email']) || empty($_REQUEST['text_message'])) {
		$data_load['message'] 	= $lang_admin->Error_400;
		$data_load['text'] 		= $lang_admin->please_check_details;
		$data_load['status']  	= 400;
		$add_action->do_action('Hook_code_plugin_40');
	}else{
		$add_action->do_action('Hook_code_plugin_39');
		$username 			= $_REQUEST['form_email'];
		preg_match('/^[_a-z0-9-]+/', $username, $resultado);
		$data_send['EMAIL_CODE'] 	= '';
		$data_send['USERNAME'] 		= $resultado[0];
		$data_send['TEXT_1'] 		= _Decode(PHP_Secure($_REQUEST['text_message']));
		$data_send['KEY'] 			= _Decode(PHP_Secure($_REQUEST['key']));
		$data_send['LINK'] 			= $config['site_url'].'/eden/contsct';
	
		$send_email_data = array(
			'from_name' 		=> $load->config->name . ' - message',
			'to_email' 			=> PHP_Secure($_REQUEST['form_email']),
			'to_name'			=> PHP_Secure($_REQUEST['form_email']),
			'subject' 			=> 'message - ' . $load->config->name,
			'charSet' 			=> 'UTF-8',
			'message_body' 		=> PHP_LoadPage('template/eden_themes/email',$data_send),
			'is_html' 			=> true
		);
		
		$send_message = PHP_Message_EMAIL($send_email_data);
		
		$add_action->do_action('Hook_code_plugin_38');
		$data_sqi 	= Array (	 
				'active' 	=> 0,
				'response' 	=> PHP_Secure($_REQUEST['text_message'])
		);
		$db->where ('id', PHP_Secure($_REQUEST['id']));
		$db->update (T_COMMENTS, $data_sqi);
		
		$data_load['url']    	= $config['site_url'].'/eden/messages';
		$data_load['message'] 	= $lang_admin->ok_save;
		$data_load['text'] 		= $lang_admin->ok_save_text;
		$data_load['status']  	= 200;
		$add_action->do_action('Hook_code_plugin_37');
	}	
	$add_action->do_action('Hook_code_plugin_36');
}