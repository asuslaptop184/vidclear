<?php

	$load_data_medias 	= '';
	$last_id 			= PHP_Secure($_POST['last_id']);
	$sort 				= !empty($_POST['sort_by']) && is_numeric($_POST['sort_by']) ? $_POST['sort_by'] : 0;

	if ($sort == 1) {
		$db->orderBy('id', 'ASC');
	} else {
		$db->where('id', $last_id, '>');
		$db->orderBy('id', 'ASC');
	}

	$list_media = $db->get(T_MEDIA, 14);
	if (count($list_media) > 0) {
		
		$load->load_plugin  = $db->getValue(T_MEDIA, 'count(*)');
		$db->orderBy('id', 'DESC');
		$data = $db->getOne(T_MEDIA);
		$load->load_true  	= (empty($data->id))?0:$data->id;
		
		
		foreach ($list_media as $key => $data) {
			$load_data_medias .= PHP_LoadPage("template/icons_media", [
				'ID' 			=> 	$data->id,
				$CODE['ID'] 	= 	$data->id,
				'platform' 		=> 	$data->platform,
				$CODE["icon"] 	= 	$data->icon,
				$CODE["url"] 	= 	$data->url,
			]);
		}
		 
		$load_true  = $CODE['ID'];
		$data_load = ['status' => 200, 'load_true' => $load_true, 'load_all' => $load->load_true, 'comment' => $load_data_medias];
	} else {
		$data_load = ['status' => 404, 'message' => 'error media'];
	}
