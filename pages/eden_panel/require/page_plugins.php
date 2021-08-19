<?php 
//--> SECURITY BAR
if ($options_launcher['block_admin']){
	echo '
		The admin panel has been blocked by multiple failed entries.<br>
		An email has been sent with the activation key.<br>
		In case you can&#39;t log in check the manual or talk to the developer <b>Zhareiv</b>
	';
	exit(1); // EXIT_CONFIG
}
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
} 
#CODE
	
	
	if(!empty($_GET["details"])){
		
		$id 				= PHP_Secure($_GET['details']);
		$data 				= $db->where('key_plugin',$id)->getOne(T_MEDIA);
		
		$load->page        	= 'home';
		$load->title       	= $lang_admin->menu_3 .' - '. $load->config->title;
		$load->description 	= $load->config->description;
		$load->content 		= PHP_LoadPage('template/eden_themes/plugins_details', array(
			'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
			'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
			'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
			'ICON' 					=> str_replace('./upload/icons/', '{{CONFIG site_url}}/upload/icons/', $data->icon),
			'NAME' 					=> $data->platform,
			'ROUND' 				=> _round_plugins_use($data->platform),
			'DATA_FACEBOOK' 		=> _round_more_share($data->platform, 'facebook'),
			'DATA_TWITTER' 			=> _round_more_share($data->platform, 'twitter'),
			'DATA_WHATAPP' 			=> _round_more_share($data->platform, 'whatsapp'),
			'DATA_TELEGRAM' 		=> _round_more_share($data->platform, 'telegram'),
			'DATA_VK' 				=> _round_more_share($data->platform, 'vk'),
			'DATA_VIEWS' 			=> _round_more_share($data->platform, 'views'),
			'DATE' 					=> $data->Data_Update,
			'DATA_PLUGIN' 			=> $data->visits,
			'URL' 					=> $data->url,
			'TITLE' 				=> $data->title_content,
			'DESCRIPTION' 			=> br2nl(_Decode($data->description_content)),
			'CONTENT' 				=> $data->platform_content,
			'KEY_ID' 				=> $data->key_plugin,
			'VERSION' 				=> $data->version,
			'KEYWORDS' 				=> $data->keywords_content,
			'ID' 					=> $data->id,
			$load->active_plugin 	= $data->active,
		));
	}else{
		$list_item_plugins 		= '';
		$load->data_list_plugin 		= $db->orderBy('id', 'ASC')->get(T_MEDIA);
		foreach ($load->data_list_plugin  as $key => $data) {
			$list_item_plugins.= PHP_LoadPage('template/eden_themes/item/list_plugins', array(
				'ICON' 					=> str_replace('./upload/icons/', '{{CONFIG site_url}}/upload/icons/', $data->icon),
				'TITLE' 				=> $data->platform,
				'VERSION' 				=> $data->version,
				'KEY' 					=> $data->key_plugin,
				$load->active_plugin 	= $data->active,
			));
		}

		$load->page        	= 'home';
		$load->title       	= $lang_admin->menu_3 .' - '. $load->config->title;
		$load->description 	= $load->config->description;
		$load->content 		= PHP_LoadPage('template/eden_themes/plugins', array(
			'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
			'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
			'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
			'LIST_PLUGINS' 			=> $list_item_plugins,
		));
	}