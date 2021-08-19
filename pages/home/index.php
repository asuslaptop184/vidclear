<?php
	if (isset($_GET['media'])) {
		$load->page        	= 'home';
		$page_url 			= PHP_Secure($_GET['media']);
		$data 				= PHP_Get_MetaData($page_url); 
		if($page_url == $data['load_url']){
			$load->title       	= $data['load_title'];
			$load->description 	= $data['load_description'];
			$load->keywords 	= $data['load_keywords'];
			$load->content 		= PHP_LoadPage('template/home', array(
				$CODE['URL_DATA_LOAD'] 				= '',
				$CODE['ACTIVE_SHARE'] 				= false,
				'TOKEN_S' 							=> PHP_fetchToken('mailer'),
				$CODE['TEXT_TOP_HEADER_TITLE'] 		= $data['load_title'],
				$CODE['LOAD_DATA_MEDIAS'] 			= false,
				'LOAD_DATA_MEDIAS' 					=> '',
				$CODE['PLATFORM_CONTENT_ACTIVE'] 	= 'ON',
				$CODE['PLATFORM_CONTENT_TEXT'] 		= _Decode($data['load_content'])
			));
			
			$id 		= $data['load_id'];
			$share 		= $db->where('id',$id)->getOne(T_MEDIA); 
			$db->where('id',$id)->update(T_MEDIA,array('visits' => ($share->visits+1)));

		}else{
			header("Location:../");
			exit();
		}
	}elseif (isset($_GET['embed'])) {
		$CODE['URL_EMBED']				= PHP_Secure(urldecode($_REQUEST['embed']));
		$CODE['URL_EMBED_SHARE']		= true;
		include './upload_ajax/search_data.php';
		if($video_data['STATUS'] == 200){
			header("Location:".$CODE['LIST_SOCIAL_MEDIA']);
			exit();
		}else{
			header("Location:../");
			exit();
		}
	}else{

		$load_data_medias 	= "";
		$list_media			= $db->where('active', '1')->orderBy('id', 'ASC')->get(T_MEDIA, $options_launcher['limit_list_media']);
		if (!empty($list_media)) {		 
			foreach ($list_media as $key => $data) {
				$load_data_medias .= PHP_LoadPage("template/icons_media",array(
					'ID' 				=> $data->id,
					$CODE['ID'] 		=  $data->id,
					'platform' 			=> $data->platform,
					$CODE["icon"] 		=  $data->icon,
					$CODE["url"] 		=  $data->url,
				));
			}
		}
		
		$load->list_media	= (empty($CODE['ID']))?'':$CODE['ID'];
		$load->load_plugin  = $db->where('active', '1')->getValue(T_MEDIA, 'count(*)');
		$db->orderBy('id', 'DESC');
		$data = $db->getOne(T_MEDIA);
		$load->load_true  	= (empty($data->id))?0:$data->id;
		
		$load->page        	= 'home';
		$load->title       	= $load->config->title;
		$load->description 	= $load->config->description;
		$load->keywords 	= $load->config->keyword;
		$load->content 		= PHP_LoadPage('template/home', array(
			$CODE['URL_DATA_LOAD'] 				= '',
			$CODE['PLATFORM_CONTENT_ACTIVE'] 	= '',
			$CODE['ACTIVE_SHARE'] 				= false,
			'TOKEN_S' 							=> PHP_fetchToken('mailer'),
			$CODE['TEXT_TOP_HEADER_TITLE'] 		= $load->config->title,
			$CODE['LOAD_DATA_MEDIAS'] 			= true,
			'LOAD_DATA_MEDIAS' 					=> $load_data_medias		
		));
	}