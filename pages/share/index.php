<?php
$load->page        = 'share';

 if (isset($_GET['url'])) {
	 	$id_url 			= PHP_Crypt_code(PHP_Secure($_GET['share']), true);
	 	$ref_social 		= (empty($_GET['social']))?'':PHP_Secure($_GET['social']);
		$data_url 			= PHP_data_ShareUrl('url',$id_url,$ref_social);
	if($data_url == null){
		//-- 404
	}else{
		$load_data_medias 	= "";
		$list_media			= $db->where('active', '1')->orderBy('id', 'ASC')->get(T_MEDIA, $options_launcher['limit_list_media']);
		$load->is_verified 	= false;
		if (!empty($list_media)) {		 
			foreach ($list_media as $key => $data) {
				if($data->active==1){
					$load_data_medias .= PHP_LoadPage("template/icons_media",array(
						'ID' 				=> $data->id,
						$CODE['ID'] 		= $data->id,
						'platform' 			=> $data->platform,
						$CODE["icon"] 		=  $data->icon,
						$CODE["url"] 		=  $data->url,
					));
				}
			}
		}
		$load->list_media	= (empty($CODE['ID']))?'':$CODE['ID'];
		$load->load_plugin  = $db->getValue(T_MEDIA, 'count(*)');
		$db->orderBy('id', 'DESC');
		$data 				= $db->getOne(T_MEDIA);
		$load->load_true  	= ($data->id == NULL)?0:$data->id;


		$load->title       					= $load->config->title;
		$load->description 					= $load->config->description;
		$load->keywords 					= $load->config->keyword;
		$load->content						= PHP_LoadPage('template/home', array(
			$CODE['ACTIVE_SHARE'] 			= (!empty($_GET['s'])) ? false : true, 
			$CODE['URL_DATA_LOAD'] 			= $data_url,
			$CODE['PLATFORM_CONTENT_ACTIVE']= '',
			$CODE['GET_SHARE']  			= PHP_Secure($_GET['share']),
			'TOKEN_S' 						=> PHP_fetchToken('mailer'),
			$CODE['TEXT_TOP_HEADER_TITLE'] 	= $load->config->title,
			$CODE['LOAD_DATA_MEDIAS'] 		= true,
			'LOAD_DATA_MEDIAS' 				=> $load_data_medias,
		));
	}	
}else{
	header("Location:../");
		exit();
}
 
