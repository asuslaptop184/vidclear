<?php

//-->	 
	$add_action->do_action('Hook_code_plugin_9');
	
	if(!empty($_POST['data_urls'])){
		$url_data_load = PHP_Secure($_POST['data_urls']);
	}else if(!empty($CODE['URL_EMBED'])){
		$url_data_load = PHP_Secure($CODE['URL_EMBED']);
	}else{
		$url_data_load = PHP_Secure($_POST['data_urls']);
	}
	
	$url_data 			= $url_data_load;
	$add_action->do_action('Hook_code_plugin_8');
	if(empty($CODE['URL_EMBED_SHARE'])){
		$data_share 	= ($_REQUEST['data_key']=='yes')?true:false;
	}else{
		$data_share 	= $CODE['URL_EMBED_SHARE'];
	}
	
	$add_action->do_action('Hook_code_plugin_7');
	$url_parts 			= parse_url($url_data);
	$scheme				= (empty($url_parts['scheme'])) ? '':$url_parts['scheme'];
	$add_action->do_action('Hook_code_plugin_6');
//-->
	if ($scheme == 'https') {
		$true_url = true;
	} else if($scheme == 'http') {
		$true_url = true;
	} else {
		$true_url = false;
	}
//-->
	$add_action->do_action('Hook_code_plugin_5');
	if ($true_url){
	
		$status 	= array(
						'Url_video_media' 		=> $url_data,
						'Active_share' 			=> (!empty($data_share == 'on')) ? true : false,
						'Get_share' 			=> (empty($_REQUEST['Get_share']))?'':PHP_Secure($_REQUEST['Get_share']),
					);
		$message 	= array(
						'false_data_db' 		=> $lang->ERROR_SERVER_1,
						'false_url_empty' 		=> $lang->ERROR_SERVER_2,
						'false_exists_urls'		=> $lang->ERROR_SERVER_3,
						'false_video'			=> $lang->ERROR_SERVER_4,
						'true_data'				=> $lang->ERROR_SERVER_5
					);
					
		$video_data = PHP_Video_Data($status, $message);
//-->
		if($video_data['STATUS'] == 200){
			//--> 
			Data_use_media();
			list_file_host_delete();
		 
			$data_load['video']  = PHP_LoadPage("template/video_results", array(
					$CODE['TITLE_DATA']				= ($video_data['L_TITLE'] == NULL)? 'No title' :$video_data['L_TITLE'],
					$CODE['TIME_DATA']				= ($video_data['L_TIME'] == NULL)? '' :$video_data['L_TIME'],
					$CODE['NAME_PLUGIN_DATA']		= $video_data['L_SOURCE'],
					$CODE['THUMBNAIL_DATA']			= ($video_data['L_THUMBNAIL'] == NULL)? $config['theme_url'].'/img/noimage.png':$video_data['L_THUMBNAIL'],
				//-->	
					$CODE['URLS_VIDEO_DATA']		= $video_data['L_DATA_VIDEO'],
					$CODE['URLS_AUDIO_DATA']		= $video_data['L_DATA_AUDIO'],
					$CODE['URLS_LIST_DATA']			= $video_data['L_DATA_LIST'],
					$CODE['DIRECT_DOWNLOAD']		= $video_data['L_DIRECT_DOWNLOAD'],
				//-->	
					$CODE['VIDEO_TRUE_DATA']		= $video_data['L_VIDEO'],
					$CODE['AUDIO_TRUE_DATA']		= $video_data['L_AUDIO'],
					$CODE['LIST_TRUE_DATA']			= $video_data['L_LIST'],
				//-->	
					$CODE['LIST_SOCIAL_MEDIA']		= $video_data['L_LINKS_SHARE'],
				//-->
					$CODE['URL_SAVE']				= $video_data['L_URL']
				)); 
			$data_load['status']  	= 200;
			$data_load['message']  	= $video_data['ERROR_MESSAGE'];
			$add_action->do_action('Hook_code_plugin_4');
		}else{
			$data_load['status']  			= 400;
			$data_load['message']  			= $video_data['ERROR_MESSAGE'];
			$add_action->do_action('Hook_code_plugin_3');
		}
		$add_action->do_action('Hook_code_plugin_2');
	}else{
		$data_load['status']  				= 400;
		$data_load['message']  				= 'ERROR HTTP';
		$add_action->do_action('Hook_code_plugin_1');
	}	 