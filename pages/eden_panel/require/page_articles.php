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
	
	if(!empty($_GET["details"]=='new' || $_GET["details"]=='edit')){
		
		$list_category			= $db->where('active', '1')->orderBy('id', 'ASC')->get(T_MEDIA);
		$load->active_if 		= false;
		if($_GET["details"]=='new'){
			
			$data_id 			= '';
			$data_title 		= '';
			$data_description 	= '';
			$load->category 	= $list_category;
			$load->category_db  = '';
			$data_content 		= '';
			$data_image 		= '';
			$data_tags 			= '';
			$data_time 			= '';
			
		}else if($_GET["details"]=='edit'){
			
			$id_post			= PHP_Secure($_GET["id"]);
			$data 				= $db->where('id',$id_post)->getOne(T_POST);
			$load->active_if 	= true;
			$load->active_post  = $data->active;
			$data_id 			= $data->id;
			$data_title 		= $data->title;
			$data_description 	= $data->description;
			$load->category 	= $list_category;
			$load->category_db  = $data->category;
			$data_content 		= $data->content;
			$data_image 		= $config['site_url']. '/' .$data->image;
			$data_tags 			= $data->tags;
			$data_time 			= date('d/m/Y', $data->time);
		} 
		
		$load->type_post  		= PHP_Secure($_GET["details"]);
		
		$load->page        		= 'home';
		$load->title       		= $lang_admin->menu_4 .' - '.  $load->config->title;
		$load->description 		= $load->config->description;
		$load->content 			= PHP_LoadPage('template/eden_themes/post_page', array(
			'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
			'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
			'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
			'ID' 					=> $data_id,
			'TITLE' 				=> $data_title,
			'IMAGE' 				=> $data_image,
			'DESCRIPTION' 			=> $data_description,
			'CONTENT' 				=> $data_content,
			'TAGS' 					=> $data_tags,
			'DATE' 					=> $data_time,
		));
		
	}else{		
		$list_articles 			= '';
		$load->data_list_articles 	= $db->orderBy('id', 'DESC')->get(T_POST, 20);
		foreach ($load->data_list_articles as $key => $data) {
			$list_articles.= PHP_LoadPage('template/eden_themes/item/list_articles', array(
				'ID' 					=> $data->id,
				'TITLE' 				=> $data->title,
				'IMAGE' 				=> $config['site_url']. '/' .$data->image,
				'TAGS' 					=> $data->tags,
				'CATEGORY' 				=> $data->category,
				'VIEWS' 				=> ($data->views == null)?0:$data->views,
				'TIME' 					=> date('Y/m/d',$data->time),
				$load->active 			= $data->active,
			));
		}

		$load->page        	= 'home';
		$load->title       	= $lang_admin->menu_4 .' - '. $load->config->title;
		$load->description 	= $load->config->description;
		$load->content 		= PHP_LoadPage('template/eden_themes/articles', array(
			'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
			'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
			'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
			'LIST_ARTICLES' 		=> $list_articles, 
		));
	}