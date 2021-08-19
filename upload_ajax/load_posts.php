<?php

	$html_posts 	= '';
	$last_id 			= PHP_Secure($_POST['last_id']);
	$sort 				= !empty($_POST['sort_by']) && is_numeric($_POST['sort_by']) ? $_POST['sort_by'] : 0;

	if ($sort == 1) {
		$db->orderBy('id', 'DESC');
	} else {
		$db->where('id', $last_id, '<');
		$db->orderBy('id', 'DESC');
	}

	$list_media = $db->get(T_POST, 10);
	if (count($list_media) > 0) {
		foreach ($list_media as $key => $data) {
				$html_posts.= PHP_LoadPage('template/eden_themes/item/list_articles', array(
				$CODE['ID'] 			=  $data->id,
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
		 
		$load_true  = $CODE['ID'];
		$data_load = ['status' => 200, 'load_true' => $load_true, 'comment' => $html_posts];
	} else {
		$data_load = ['status' => 404, 'message' => 'error media'];
	}
