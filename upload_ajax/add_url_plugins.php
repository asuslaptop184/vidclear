<?php 
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
}
#CODE
$data_load['message'] 	= $lang_admin->Error_400;
$data_load['text'] 		= $lang_admin->please_check_details;
$data_load['status'] 	= 400;

$add_action->do_action('Hook_code_plugin_110');

$id		 				= PHP_Secure($_REQUEST['id']);
$new_url 				= F_URLSlug_pages($_POST['url_plugin']);

$add_action->do_action('Hook_code_plugin_109');

if( PHP_Urls_editor_Post($id, $new_url)== 200){
	$add_action->do_action('Hook_code_plugin_108');
	$data 				= $db->where('id',$id)->getOne(T_MEDIA);
	if ($data) {
		
		$add_action->do_action('Hook_code_plugin_107');
		
		if (strlen($_POST['title_content']) < 40 || strlen($_POST['title_content']) > 120) {
			$data_load['message'] 	= $lang_admin->Error_title;
			$data_load['text'] 		= $lang_admin->Error_title_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		
		if (strlen($_POST['description_content']) < 80 || strlen($_POST['description_content']) > 200) {
			$data_load['message'] 	= $lang_admin->Error_description;
			$data_load['text'] 		= $lang_admin->Error_description_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		
		if (strlen($_POST['platform_content']) < 200) {
			$data_load['message'] 	= $lang_admin->Error_content;
			$data_load['text'] 		= $lang_admin->Error_content_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		
		if (empty($errors)) {
			$db_data = Array (
				'url' 					=> F_URLSlug_pages(PHP_Secure($_POST['url_plugin'])),
				'title_content' 		=> htmlspecialchars(F_ShortText($_POST['title_content'], 120)),
				'description_content' 	=> htmlspecialchars(F_ShortText($_POST['description_content'], 200)),
				'platform_content' 		=> htmlspecialchars($_POST['platform_content']),
				'keywords_content' 		=> PHP_Secure($_POST['keywords'])
			);	
			$db->where ('id', $id);
			$db->update (T_MEDIA, $db_data);
			
			$data_load['message'] 	= $lang_admin->ok_save;
			$data_load['text'] 		= $lang_admin->ok_save_text;
			$data_load['status'] 	= 200;
		}
		$add_action->do_action('Hook_code_plugin_106');
	}else{
		$data_load['message'] 	= $lang_admin->Error_400;
		$data_load['text'] 		= $lang_admin->please_check_details;
		$data_load['status'] 	= 400;
		$add_action->do_action('Hook_code_plugin_105');
	} 	
}else{
	$data_load['message'] 	= $lang_admin->Error_url;
	$data_load['text'] 		= $lang_admin->please_check_url;
	$data_load['status'] 	= 400;
	$add_action->do_action('Hook_code_plugin_104');
}	
$add_action->do_action('Hook_code_plugin_103');

