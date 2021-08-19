<?php
//--> special function only for tumblr
	if(preg_match("/([^&]+)(.+)tumblr.com\/post\/([^&]+)/", $data_url)){
		$plugin = strtolower('tumblr');
//--> special function only for redtube
	}else if(preg_match("/([^&]+)(.+)redtube.com\/([^&]+)/", $data_url)){
		$plugin = strtolower('redtube');
//--> special function only for pornhub					
	}else if(preg_match("/([^&]+)(.+)pornhub.com\/([^&]+)/", $data_url)){
		$plugin = strtolower('pornhub');		
//--> special function only for facebook					
	}else if(preg_match("/facebook.com\/([^&]+)/", $data_url)){
		$plugin = strtolower('facebook');
		/* $PHP_Url_refresh = PHP_Url_refresh_facebook(PHP_SYSTEM_url_get_contents($data_url), 'facebook');
		$data_url = ($PHP_Url_refresh==null)? $data_url : $PHP_Url_refresh;  */
//--> special function only for bandcamp			
	}else if(preg_match("/([^&]+)(.+)bandcamp.com\/([^&]+)/", $data_url)){
		$plugin = strtolower('bandcamp');
//--> special function only for quanmin			
	}else if(preg_match("/quanmin(.+)([^&]+).com\/([^&]+)/", $data_url)){
		$plugin = strtolower('quanmin');
//--> special function only for sina			
	}else if(preg_match("/video.sina(.+)([^&]+)\/([^&]+)/", $data_url)){
		$plugin = strtolower('sina');
//--> special function only for krcom			
	}else if(preg_match("/krcom.cn\/([^&]+)/", $data_url)){
		$plugin = strtolower('krcom');	
//--> special function only for aol			
	}else if(preg_match("/aol.com\/([^&]+)/", $data_url)){
		$plugin = strtolower('aol');	
	}else{
		$plugin_line 	= External_links($data_url);
		$plugin = strtolower($plugin_line);
	}
//--// 
	function PHP_Url_refresh_facebook($curl_content, $name_platform) {
		if($name_platform == 'facebook'){
			if (preg_match('@<meta http-equiv="refresh" content="(.*?)" />@si', $curl_content, $match)) {
				if(preg_match("/facebook.com\/([a-z1-9.-_]+)/", $match[1])){
					$return = str_replace('0;url=', "", $match[1]);
				}else{
					$return = '';
				}
			}
		}else{
			$return = '';
		}
		return $return;
    }
