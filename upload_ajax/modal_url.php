<?php 
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
}
/*
	page urls -> modal 
*/
if($options_launcher['total_access']){
$add_action->do_action('Hook_code_plugin_51');
$data_load['status']  			= 400;
$add_action->do_action('Hook_code_plugin_50');
$type = (!empty($_REQUEST['type']))?PHP_Secure($_REQUEST['type']):'';
if($type == 'delate'){
	$add_action->do_action('Hook_code_plugin_49');
	$data = PHP_Secure($_POST['id']);
	$sql = "DELETE FROM ".T_SHARE." WHERE id = '$data'";   //chat
	mysqli_query($con, $sql);
	$data_load['status']  			= 200;
	$add_action->do_action('Hook_code_plugin_48');
}else{
	$add_action->do_action('Hook_code_plugin_47');
	$data = PHP_Secure($_POST['id']);
	$icon_img = str_replace('./upload/icons/', '{{CONFIG site_url}}/upload/icons/', _Get_icon_plugins(_Get_dataUrl($data,'platform')));
	$page_loaded = PHP_AdminLoadPage("urls/modal_url",array(
			$CODE['DATA_ID'] 	= $data,
			'DATA_ICON' 		=> $icon_img,
			'DATA_ID_URL' 		=> _Get_dataUrl($data,'id_url'),
			'DATA_URL' 			=> _Get_dataUrl($data,'url'),
			'DATA_PLATFORM' 	=> _Get_dataUrl($data,'platform'),
			'DATA_FACEBOOK' 	=> _Get_dataUrl($data,'facebook'),
			'DATA_TWITTER' 		=> _Get_dataUrl($data,'twitter'),
			'DATA_WHATSAPP' 	=> _Get_dataUrl($data,'whatsapp'),
			'DATA_OTHER' 		=> _Get_dataUrl($data,'other'),
			'DATA_VIEWS' 		=> _Get_dataUrl($data,'views'),
			'DATA_IP_USER' 		=> _Get_dataUrl($data,'ip_user')
		)
	);
	$add_action->do_action('Hook_code_plugin_46');
	$data_load['status']  			= 200;
	$data_load['text']  			= $page_loaded;
	$add_action->do_action('Hook_code_plugin_45');
}
}