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
		$data 				= $db->where('id',$id)->getOne(T_COMMENTS);
		if($data){
			$load->page        	= 'home';
			$load->title       	= $load->config->title;
			$load->description 	= $load->config->description;
			$load->content 		= PHP_LoadPage('template/eden_themes/messages_edit', array(
				'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
				'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
				'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
				'ID'					=> $data->id,
				'KEY'					=> $data->key_comments,
				'NAME'					=> $data->first_name,
				'EMAIL'					=> $data->email,
				'ID'					=> $data->id
			));
		}else{
			header("Location: " . PHP_Link('eden/messages'));
		}
		
	}else{
		$list_comments 			= '';
		$load->data_list_comments 	= $db->where('active', '1')->orderBy('id', 'ASC')->get(T_COMMENTS, 20);
		foreach ($load->data_list_comments as $key => $data) {
			$list_comments.= PHP_LoadPage('template/eden_themes/item/list_comments', array(
				'ID' 			=> $data->id,
				'MAIL' 			=> $data->email,
				'COMMENTS' 		=> mb_substr($data->comments, 0, 50, "UTF-8"),
				'TIME' 			=> PHP_Time_elapsed($data->time),
			));
		}


		$load->page        	= 'home';
		$load->title       	= $lang_admin->menu_5 .' - '. $load->config->title;
		$load->description 	= $load->config->description;
		$load->content 		= PHP_LoadPage('template/eden_themes/messages', array(
			'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
			'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
			'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
			'LIST_COMMENTS'			=> $list_comments
		));
	}	