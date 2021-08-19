<?php
require_once('conectarBD.php');
require('core/cURL.php');
require('core/reason_phrases.php');
require('core/image.php');
require('core/php_hooks.php');
require('core/launcher_url.php');
$error_reporting_plugins 	= true;
$plugins_dir 				= "./application/plugins"; //-- plugins  folder 
$p_found 					= 0;
if(is_dir($plugins_dir)){
	if($dh = opendir($plugins_dir)){
		$i = 0;
		while(($file = readdir($dh)) !== false) {
			if (substr($file,-1) != "." && pathinfo($file, PATHINFO_EXTENSION) == "php") {
				$i++;
                $file_name = $file;
				// Open file to get plugin name
				require($plugins_dir . "/" . $file_name);
				$p_found = 1;
            }
        }
		closedir($dh);
		if ($p_found == 0) {
			// Error: <strong>plugins</strong> folder empty!;
		}else{
			if ($i > 1) {
				// ok;
            }else{
                // Error $file_name;
			}
		}
	} else {
		// Error: plugins folder locked!;
	}
}else{
	// Error: plugins folder missing!;
}
//-- 
	function PHP_LoadPage($page_url = '', $data = array(), $set_lang = true) {
		global $load, $lang_text, $lang, $lang_admin, $config, $add_action, $CODE,$text_media, $text_media_two, $text_media ,$options_launcher;
		$page         = './themes/' . $config['theme'] . '/layout/' . $page_url . '.php';
		if (!file_exists($page)) {
			return false;
		}
		$page_content = '';
		ob_start();
		require($page);
		$page_content = ob_get_contents();
		ob_end_clean();
	    if ($set_lang == true) {
			$page_content = preg_replace_callback("/{{LANG (.*?)}}/", function($m) use ($lang_text) {
				return (isset($lang_text[$m[1]])) ? $lang_text[$m[1]] : '';
			}, $page_content);
		}
 
		if (!empty($data) && is_array($data)) {
			foreach ($data as $key => $replace) {
					$object_to_replace = "{{" . $key . "}}";
					$page_content      = str_replace($object_to_replace, $replace, $page_content);
			}
		}
		#-->
		$page_content = preg_replace("/{{LINK (.*?)}}/", PHP_Link("$1"), $page_content);
		$page_content = preg_replace_callback("/{{CONFIG (.*?)}}/", function($m) use ($config) {
			return (isset($config[$m[1]])) ? $config[$m[1]] : '';
		}, $page_content);
		return $page_content;
	}
//-- 
	function PHP_Link($string) {
		global $site_url;
		return $site_url . '/' . $string;
	}
//--
	function PHP_Slug($string, $video_id) {
		global $load;
		if ($load->config->seo_link != 'on') {
			return $video_id;
		}
		$slug = url_slug($string, array(
			'delimiter' => '-',
			'limit' => 100,
			'lowercase' => true,
			'replacements' => array(
				'/\b(an)\b/i' => 'a',
				'/\b(example)\b/i' => 'Test'
			)
		));
		return $slug . '_' . $video_id . '.html';
	} 
//--
	function PHP_SeoLink($query = '') {
		global $load, $config;
		if ($config['seoLink'] == 1) {
			$query = preg_replace(array(
				'/^index\.php\?url=profile&u=([A-Za-z0-9_]+)&type=([A-Za-z0-9_]+)$/i',
			), array(
				$site_url . '/$1/$2',
				$site_url,
			), $query);
		} else {
			$query = $config['site_url'] . '/' . $query;
		}
		return $query;
	}
//--
	function ToArray($obj) {
		if (is_object($obj))
			$obj = (array) $obj;
		if (is_array($obj)) {
			$new = array();
			foreach ($obj as $key => $val) {
				$new[$key] = ToArray($val);
			}
		} else {
			$new = $obj;
		}
		return $new;
	}
//-- 
	function PHP_SYSTEM_url_get_contents($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}	
//-- 	
	function ToObject($array) {
		$object = new stdClass();
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$value = ToObject($value);
			}
			if (isset($value)) {
				$object->$key = $value;
			}
		}
		return $object;
	}
//--	
	function websites_supported() {
		global $db, $con, $options_launcher;
	 
		$count 	= $db->where('active', '1')->getValue(T_MEDIA, 'count(*)');
		return $count;
	}	
	// This function is to prevent special characters
	function PHP_Secure($string, $censored_words = 1) {
		global $con,$config;
		$string = trim($string);
		$string = mysqli_real_escape_string($con, $string);
		$string = htmlspecialchars($string, ENT_QUOTES,'UTF-8');
		$string = str_replace('\r\n', " <br>", $string);
		$string = str_replace('\n\r', " <br>", $string);
		$string = str_replace('\r', " <br>", $string);
		$string = str_replace('\n', " <br>", $string);
		$string = str_replace('&amp;#', '&#', $string);
		$string = stripslashes($string);
		if ($censored_words == 1) {
			global $con;
			$censored_words = explode(",", $config['censored_words']);
			foreach ($censored_words as $censored_word) {
				$censored_word = trim($censored_word);
				$string        = str_replace($censored_word, '****', $string);
			}
		}
		return $string;
	}
	
	// Configuration of data in the Templates and in the Insertion of data 
	function PHP_GetConfig() {
		global $db;
		$data  		= array();
		$configs 	= $db->get(T_CONFIG);
		foreach ($configs as $key => $config) {
			$data[$config->name] = $config->value;
		}
		return $data;
	}
//-- 
	function PHP_Data_file_size($bytes){
		switch ($bytes) {
			case $bytes < 1024:
				$size = $bytes . " B";
				break;
			case $bytes < 1048576:
				$size = round($bytes / 1024, 2) . " KB";
				break;
			case $bytes < 1073741824:
				$size = round($bytes / 1048576, 2) . " MB";
				break;
			case $bytes < 1099511627776:
				$size = round($bytes / 1073741824, 2) . " GB";
				break;
		}
		if (!empty($size)) {
			return $size;
		} else {
			return "";
		}
	}
//-- 
	function PHP_file_size($url){
		$headers = get_headers($url, 1);
		if (is_array($headers) && count($headers) > 0) {
			$size = $headers['Content-Length'];
			if (is_array($size)) {
				foreach ($size as $value) {
					if ($value != 0) {
						$size = $value;
						break;
					}
				}
			} 
			return $size;
		} else {
			return "unknown";
		}
	}
//--
	function PHP_file_size_curl($url, $referer = ''){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_HEADER, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 curl_setopt($curl, CURLOPT_REFERER, $referer);
		curl_setopt($curl, CURLOPT_REFERER, '');
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240");
		$header = curl_exec($curl);
		return (int)curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
	 
		
		$headers = curl_exec($curl);
		if (curl_errno($curl) == 0) {
			$result = (int)curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
		}
		curl_close($curl);
		if ($result > 100) {
			switch ($format) {
				case true:
					return PHP_Data_file_size($result);
					break;
				case false:
					return $result;
					break;
				default:
					return PHP_Data_file_size($result);
					break;
			}
		} else {
			return "";
		}
	}
//--
	function PHP_get_file_size_all($url, $referer = ""){
 
	 	$result = -1;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/12.04 Chromium/18.0.1025.168 Chrome/18.0.1025.168 Safari/535.19');
					
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			 			
		$headers = curl_exec($ch);
		if (curl_errno($ch) == 0){
			$info = curl_getinfo($ch);
			//die(print_r($info));
			$result = (int)$info['download_content_length'];
		}
		
		curl_close($ch);
		 
		if ($result > 100) {
			switch ($format) {
				case true:
					return PHP_Data_file_size($result);
					break;
				case false:
					return $result;
					break;
				default:
					return PHP_Data_file_size($result);
					break;
			}
		} else {
			return "";
		}
  
	} 
//--
	function time_data($time){
		return gmdate(($time > 3600 ? "H:i:s" : "i:s"), $time);
	}
//-- 
	function PHP_Format_video($Format){
		$url = PHP_Secure($Format);
		//-- with this function is to know the format of the video
		preg_match("/.(3gp|3GP|mp4|MP4|flv|FLV|m4a|M4A|avi|AVI|webm|WebM|wmv|WMV|mov|MOV|h264|H264|mkc|MKV|3gpp|3GPP|mpegps|MPEGPS|mpeg4|MPEG4|gifv|GIFV|jpg|JPG|jpeg|JPEG|png|PNG|icon|ICON|gif|GIF|mp3|MP3|m3u8|M3U8)/", $url, $check);
		if ($check[1] == 'H264'&&'h264'){
			$Formats = 'mp4';
		}else if($check[0] == null){
			$Formats = 'mp4';
		}else if($check[0] == 'M4A'&&'m4a'){
			$Formats = 'mp3';			
		}else{	
			$Formats = $check[1];
		}
		return strtoupper($Formats);
	}
//-- https://stackoverflow.com/a/9826656/9855444
    function PHP_string_between($string, $start, $end){
        $string = " " . $string;
        $ini = strpos($string, $start);
        $eni = strpos($string, $end);
        if ($ini == 0 || $eni == 0) return "";
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }	
//--	
	function br2nl($st) {
		$breaks = array("<br />","<br>","<br/>");  
		return str_ireplace($breaks, "\r\n", $st);
	}
//--
	function PHP_str_replace_text($text, $src) {
		$tags 	= array("/", "|", "+", "-", "*", " ", "%", "#", "!", "(", ")", "'", "&", ":", ".", "{", "}", "$", "?", "¿", "20");	
		$data 	= str_replace($tags, $src, $text);
		return $data;
	}
//-- This function allows us to know the metadata of the sites
	function PHP_Get_Tags($url) {
		$data = array();
		$curl_content = PHP_SYSTEM_url_get_contents($url);
		preg_match_all('@property="og:title" content="(.*?)"@si', $curl_content, $title);
		preg_match_all('@property="og:image" content="(.*?)"@si', $curl_content, $image);
		preg_match_all('@property="og:description" content="(.*?)"@si', $curl_content, $description);
        $data['title'] 			= $title[1][0];
        $data['image'] 			= $image[1][0];
        $data['description'] 	= $description[1][0];
		return $data;
	}		 
//--
	function PHP_GetMedia($limit = ''){
		global $con, $options_launcher;
		$data = array();
		 
		 
		if ($limit == NULL){
			$query = "SELECT * FROM " . T_MEDIA . " ORDER BY id ";
		}else{
			// DESC
			$query = "SELECT * FROM " . T_MEDIA . " ORDER BY id LIMIT {$limit}";
		}
		 
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				if ($sql_fetch['active'] == 1){
					$data[]	= $sql_fetch;
				}		
			}
		}
		return $data;
	}
//--
	function PHP_Load_post_sitemap(){
		global $con;
		$data 			= array();
		$query 			= "SELECT * FROM " . T_POST . "  ORDER BY id ";
		$sql_query   	= mysqli_query($con, $query);
		$sql_numrows 	= mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$data[]           	= $sql_fetch;				
			}
		}
		return $data;
	}
//--
	function PHP_empty_POST($data) {
		global $con;
		$sqli = mysqli_query($con,"SELECT * from ".T_POST." WHERE id = '$data'") or die ("error en la consulta". mysqli_connect_error()) ;
		if (mysqli_num_rows($sqli) > 0) {
			$post = '1';	
		}else{
			$post = ' ';	
		}
		return $post;
	}	
//--
	function PHP_Active_Media($keyword = 21){
		global $con, $options_launcher;
		
		$pedir = mysqli_query($con,"Select * From " . T_MEDIA . " WHERE  url_line LIKE '%$keyword%'");
		while($fila = mysqli_fetch_array($pedir)){				 
			if($fila['active']){	
				return $fila['platform'];
			}
		}
		 
	}
//--
	function External_links($Link_info){
		global $db, $PHP_Error;
 
		$Url_line 		= '';
		$Get_url_line 	= $db->where('active', '1')->get(T_MEDIA);
		foreach ($Get_url_line as $key => $info) {
			$path 		= str_replace( '/', '\/', $info->url_line );
			$path 		= str_replace( ':"\/', ':"/', $path );
			$path 		= str_replace( '\/";', '/";', $path );
			$path 		= str_replace( '\\/', '/', $path ); 			
			$Url_line  .= $path;
		}
		$content = $Url_line;
        if (preg_match_all('#"url_line":[^"]*"([^"]*)"#', $content, $resultado)) {
            $mp = $resultado[1];   
        } else {
			// No Content
            $mp = $PHP_Error->_204; 
        }
        $result = FALSE;// este mensaje de error
        foreach ($mp as $nombre) {
            if(isset($Link_info)) :
                $url = $Link_info;    
                if(preg_match($nombre, $url)) {  
					$data 	= str_ireplace("www.", "", parse_url($url, PHP_URL_HOST));				
                    $result = PHP_Active_Media($data);
                }
            endif;///
        }
        return $result;
    }
//--
	function return_json($array){
		header('Content-Type: application/json');
		echo json_encode($array);
		die();
	}
//--
	function username_post_id($url){
		$username = explode('.', str_ireplace("www.", "", parse_url($url, PHP_URL_HOST)))[0];  
        return $username; 
    }	
//-- 
	function PHP_Get_MetaData($url){
		global $con, $options_launcher;
		
		$data	= array();
		$url 	= strtolower($url);
		$sqli 	= mysqli_query($con,"SELECT * from ".T_MEDIA." WHERE url = '$url'");
		
		$info = mysqli_fetch_array($sqli);
		if($sqli){
			$data['load_id'] 			= $info['id'];
			$data['load_url'] 			= $info['url'];
			$data['load_title']			= $info['title_content'];
			$data['load_description']	= $info['description_content'];
			$data['load_content'] 		= $info['platform_content'];
			$data['load_keywords'] 		= $info['keywords_content'];
		}else{
			$data['load_url'] 			= '404';
		}
		return $data;	 
	}
//-- 
	function PHP_youtube_dl_Data($data_url){

		$fetched 			= shell_exec("youtube-dl --get-url --all-formats --dump-single-json $data_url  2>&1");
		$fetched_json 		= explode("{", $fetched);
		unset($fetched_json[0]);
		$pure_json 			= '{'.implode('{' , $fetched_json);
		$data_class 		= json_decode($pure_json);
		return $data_class;
	}
//-- 
	function PHP_force_download($url, $title, $format, $referer){
		global $con, $lang, $CODE, $config, $_COOKIE, $options_launcher, $data_class;
		
		$link = $config['site_url'].'/force_download.php?url_video='.PHP_DatesCrypt('encrypt', $url).'&title='.PHP_DatesCrypt('encrypt', $title).'&type_format='.$format.'&referer='.PHP_DatesCrypt('encrypt', $referer);
		
		return $link;
	}
//-- 
	function PHP_Video_Data($data = array(), $message_error = array()){
		global $con, $lang, $CODE, $config, $_COOKIE, $options_launcher, $data_class;
		error_reporting(E_ERROR | E_PARSE | error_reporting()); // Make sure to show any critical error while loading the plugin.
		$plugins_dir	= $options_launcher['plugins_dir'];
		$content 		= array();
		$data_url 		= PHP_Secure($data['Url_video_media']);
		$share_url 		= ($data['Active_share']) ? true : false;
		$save_url		= PHP_Secure($data['Get_share']);
 
		if(PHP_GetMedia() == 0){
			$status 		= 400;
			$message 		= $message_error['false_data_db'];
		}else{
			if ($data_url == NULL){
				$status 	= 400;
				$message 	= $message_error['false_url_empty'];
			}else{    
				//--> Special urls
						include("core/add_space_url.php");
					//-->
				if ($plugin == null){
					$status 	= 400;
					$message 	= $message_error['false_exists_urls'];
				}else{
								 
					include($plugins_dir . "/files/" . $plugin ."/functions.php"); 
					$Data_content = Data_Host_Function($data_url);
					if (empty($Data_content['data']['video'][0][0]['url'] or $Data_content['data']['audio'][0][0]['url'] or $Data_content['data']['list'][0][0]['url'])){
						# Report_link	
						$status 	= 400;
						$message 	= $message_error['false_video'];
					}else{
						if($share_url){
										
							$ShareUrl 					= PHP_data_ShareUrl_INSERT($data_url, $share_url, $plugin);
							$content['L_LINKS_SHARE'] 	= $config['site_url'].'/s/'.$ShareUrl;	
						}else{
							$ShareUrl 					= $save_url;
							$content['L_LINKS_SHARE'] 	= $config['site_url'].'/s/'.$ShareUrl;	
						} 
						$content['L_TITLE'] 					= (!empty($Data_content['title']))?$Data_content['title']:'';
						$content['L_TIME'] 						= (!empty($Data_content['time']))?$Data_content['time']:'';
						$content['L_THUMBNAIL']					= (!empty($Data_content['thumbnail']))?$Data_content['thumbnail']:'';
						$content['L_SOURCE']					= (!empty($Data_content['source']))?$Data_content['source']:'';
						$content['L_DATA_VIDEO'] 				= $Data_content['data']['video'];
						$content['L_DATA_AUDIO'] 				= (!empty($Data_content['data']['audio']))?$Data_content['data']['audio']:'';
						$content['L_DATA_LIST'] 				= (!empty($Data_content['data']['list']))?$Data_content['data']['list']:'';
						$content['L_DIRECT_DOWNLOAD'] 			= (!empty($Data_content['direct_download']))?$Data_content['direct_download']:'';
						$content['L_VIDEO'] 					= (!empty($Data_content['video']))?1:'';
						$content['L_AUDIO'] 					= (!empty($Data_content['audio']))?1:'';
						$content['L_LIST'] 						= (!empty($Data_content['list']))?1:'';
						$content['L_URL'] 						= PHP_Secure($ShareUrl);
									
						$status 	= 200;
						$message 	= $message_error['true_data'];
					}
				}
			} 
		} 
		  
		$content['STATUS'] 			= $status;
		$content['ERROR_MESSAGE'] 	= $message;
		return $content; 
	}
//--
	function displayLangSelect($langs = false, $LangSelect = '') {
		global $config;
		$line 			= array();
		$languages_dir 	= "application/langs/"; //-- languages  folder 
		$lang_found 	= 0;
		
		if (is_dir($languages_dir)) {
			if ($dh = opendir($languages_dir)) {
				$i = 0;
				while (($file = readdir($dh)) !== false) {
					
					if (substr($file,-1) != "." && pathinfo($file, PATHINFO_EXTENSION) == "php") {
						$i++;
						$file_name 	= $file;
						// Open file to get language name
						include($languages_dir . "/" . $file_name);
						$lang_found = 1;
						// Strip extension
						$file_name 	= preg_replace("/\..*$/", "", $file_name);
							if($langs){
								$line['case'] 	= $case_lang;		
								$line['url'] 	= $url_lang;		
							}else{
								$line = '';						 
								$line.= '';
								$line.= '<a title="'.$name_lang.'" class="dropdown-item" href="'.$config['site_url'].'/lang/'.$url_lang.'">
											<img class="image_lang" src="'.$config['theme_url'].'/img/img_lang/'.$case_lang.'.png" alt="'.$name_lang.'"></img> '.$name_lang.'
										</a>';
							}
						$langsAr[] = $line; 
					}
				}
				closedir($dh);
				if ($lang_found == 0) {
					echo "Error: <strong>languages</strong> folder empty!";
				} else {
					if ($i > 0) {
						sort($langsAr);
						if($langs){
							foreach ($langsAr AS $lang) {
								if($LangSelect == $lang['case']){
									return $lang['url'];	
								}else{
									
								} 
							}
						}else{
							foreach ($langsAr AS $lang) {
								echo $lang;
							}
						} 
						
					} else {
						echo "<input type=\"hidden\" name=\"lang\" value=\"" . $file_name . "\">";
					}
				}
			} else {
				echo "Error: <strong>languages</strong> folder locked!";
			}
		} else {
			echo "Error: <strong>languages</strong> folder missing!";
		}
	}	 
//--
	function PHP_GetKey($minlength = 20, $maxlength = 20, $uselower = true, $useupper = true, $usenumbers = true, $usespecial = false) {
		$charset = '';
		if ($uselower) {
			$charset .= "abcdefghijklmnopqrstuvwxyz";
		}
		if ($useupper) {
			$charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}
		if ($usenumbers) {
			$charset .= "123456789";
		}
		if ($usespecial) {
			$charset .= "~@#$%^*()_+-={}|][";
		}
		if ($minlength > $maxlength) {
			$length = mt_rand($maxlength, $minlength);
		} else {
			$length = mt_rand($minlength, $maxlength);
		}
		$key = '';
		for ($i = 0; $i < $length; $i++) {
			$key .= $charset[(mt_rand(0, strlen($charset) - 1))];
		}
		return $key;
	}
//--
	function PHP_Get_Public_ip(){
		$externalContent = file_get_contents('http://checkip.dyndns.com/');
		preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
		$externalIp = $m[1];
		return $externalIp;
	}
//--
	function PHP_Verify_url($clave){
		global $con;
		$data	= array();
		$sqli 	= mysqli_query($con,"SELECT * from ".T_SHARE." WHERE id_url = '$clave'");
		$data 	= mysqli_fetch_array($sqli);
		return ($clave == $data['id_url'])? $clave: 'ok';	 
	}
//--
	function PHP_data_ShareUrl_INSERT($url = 0, $value = true, $platform){
		global $con,$db;
		if ($url!='') {
			if ($value){
				$Key_code	= PHP_GetKey(15,15);
				$Key		= ($Key_code == PHP_Verify_url($Key_code))? PHP_GetKey(7,7).'_'.time() : $Key_code;
				$ip_user	= PHP_Get_Public_ip();
				$time		= time();
				$views		= '0';

				$data = $db->insert(T_SHARE,array(
								'url' 			=> $url,
								'id_url' 		=> $Key,
								'ip_user' 		=> $ip_user,
								'time' 			=> time(),
								'platform' 		=> $platform,
								'views' 		=> $views
							));
	 
			}					
			return PHP_Crypt_code($data);			
		} else {
			header("Location:../404");
			exit();
		} 	
	}
//--
	function PHP_data_ShareUrl($value, $redir, $social = ''){
		global $con;
		 
		$data = array();
		if ($redir!='') {
			$sqli = mysqli_query($con,"SELECT * from ".T_SHARE." WHERE id = '$redir'") or die ("error en la consulta". mysqli_connect_error()) ;
			if (mysqli_num_rows($sqli) > 0) {
				$data = mysqli_fetch_array($sqli, MYSQLI_ASSOC);
	
				switch ($social) {
					//-- here are created the new chats
					case 'facebook':
						$red_social = 'facebook';
					break;
					case 'twitter':
						$red_social = 'twitter';
					break;
					case 'whatsapp':
						$red_social = 'whatsapp';
					break;
					case 'vk':
						$red_social = 'vk';
					break;
					case 'viber':
						$red_social = 'viber';
					break;
					case 'telegram':
						$red_social = 'telegram';
					break;
					case 'discord':
						$red_social = 'discord';
					break;
					case 'downloads':
						$red_social = 'downloads';
					break;
					default: 
						$red_social = 'other';
					break;
				}
				$views 		= $data['views']+1;
				$red_views 	= $data[$red_social]+1;
				$sqli 		= "UPDATE ".T_SHARE." SET views='$views', $red_social='$red_views' WHERE id = '$redir'";
				mysqli_query($con, $sqli);
				$return 	= $data[$value];
			}else{
				$return = '';
			} 
			return $return;
		} else {
			header("Location:../404");
			exit();
		} 
	}
//--
	function PHP_URL_MEDIA_DATA($data = false){
		global $con, $options_launcher;
		
		$sqli 		= mysqli_query($con,"SELECT * from ".T_MEDIA." WHERE platform = '$data'") or die ("error en la consulta". mysqli_connect_error()) ;
		if (mysqli_num_rows($sqli) > 0){
			$info 	= true;
		}else{
			$info 	= false;
		}
		return $info;
	}
//--
	function PHP_Report_link($url, $platform){
		global $con;
		$data_1 = PHP_Secure($url);
		$data_2 = PHP_Secure($platform);
		$data_3 = time();
		$data_4 = PHP_Get_Public_ip();
		$sqli	= "INSERT INTO ".T_REPORT_LINK." (report_link,platform,time,ip_user)VALUES('$data_1','$data_2','$data_3','$data_4');";
		mysqli_query($con, $sqli);
		if (!$sqli){
			$data_return = 204;
		}else{
			$data_return = 200;
		}	
		return $data_return;
	}
//--
	function PHP_add_comments($text, $email, $first_name, $last_name){
		global $db;	
		$true = $db->insert(T_COMMENTS,array(
						'comments' 		=> PHP_Secure($text),
						'first_name' 	=> PHP_Secure($first_name),
						'last_name' 	=> PHP_Secure($last_name),
						'email' 		=> PHP_Secure($email),
						'ip_user' 		=> PHP_Get_Public_ip(),
						'key_comments' 	=> PHP_GetKey(25,25),
						'time' 			=> time()
					));
		
		if (!$true){
			$data_return = 204;
		}else{
			$data_return = 200;
		}	
		return $data_return;
	}	
//--
	function PHP_Time_elapsed($ptime){
		global $lang;
		$etime = time() - $ptime;

		if ($etime < 1) {
			return '';//-- 0 seconds
		}

		$count = array( 
					365 * 24 * 60 * 60  =>  'year',
					 30 * 24 * 60 * 60  =>  'month',
						  24 * 60 * 60  =>  'day',
							   60 * 60  =>  'hour',
									60  =>  'minute',
									1  	=>  'second'
					);
		$count_plural = array(
						   'year'   => $lang->years,
						   'month'  => $lang->months,
						   'day'    => $lang->days,
						   'hour'   => $lang->hours,
						   'minute' => $lang->minutes,
						   'second' => $lang->seconds
					);

		foreach ($count as $secs => $str){
			$d = $etime / $secs;
			if ($d >= 1){
				$r = round($d);
				 return $r.($r > 1 ? $count_plural[$str] : $str);
			}
		}
	}
//--
	function PHP_list_load_article($limit = NULL, $platform = 'blog', $type = false){
		global $con;
		$data 		 = array();
		if($limit == null){
			$query 	= "SELECT * from ".T_POST." ORDER BY id DESC LIMIT 2";
		}else{
			$query 	= "SELECT * from ".T_POST." WHERE category = '$platform' ORDER BY id DESC LIMIT ".$limit."";
		}
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$data[]           	= $sql_fetch;
			}
		}
		return $data;		
	}	
//--
	function PHP_articles_load($data_info){
		global $con;
		
		$data = array();
	
		$sqli = "SELECT * FROM ".T_POST." WHERE id ={$data_info} ORDER BY id DESC";

		$sql_query   = mysqli_query($con, $sqli);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$data['id'] 			= $sql_fetch['id'];
				$data['title'] 			= $sql_fetch['title'];
				$data['description'] 	= $sql_fetch['description'];
				$data['image'] 			= $sql_fetch['image'];
				$data['text'] 			= $sql_fetch['text'];
			}
		}
		return $data;	
	}
//--
	function File_Delete_datas(){
		global $db, $con;
		 
		return true;	
	}	
//--
	function File_download_host($data = array()){
		global $db, $con;
		
		$status = 400;
		 
	 				
		return $status;			
	}	
//--
	function prettyPrint($json){
		$result 			= '';
		$level 				= 0;
		$in_quotes 			= false;
		$in_escape 			= false;
		$ends_line_level 	= NULL;
		$json_length 		= strlen($json);

		for( $i = 0; $i < $json_length; $i++ ) {
			$char 			= $json[$i];
			$new_line_level = NULL;
			$post 			= "";
			
			if( $ends_line_level !== NULL ) {
				$new_line_level 	= $ends_line_level;
				$ends_line_level 	= NULL;
			}
			
			if ($in_escape){
				$in_escape = false;
			} else if($char === '"') {
				$in_quotes = !$in_quotes;
			} else if(!$in_quotes) {
				switch($char){
					case '}': case ']':
						$level--;
						$ends_line_level 	= NULL;
						$new_line_level 	= $level;
						break;
					case '{': case '[':
						$level++;
					case ',':
						$ends_line_level 	= $level;
						break;
					case ':':
						$post 				= " ";
						break;
					case " ": case "\t": case "\n": case "\r":
						$char = "";
						$ends_line_level 	= $new_line_level;
						$new_line_level 	= NULL;
						break;
				}
			} else if ( $char === '\\' ) {
				$in_escape = true;
			}
			if( $new_line_level !== NULL ) {
				$result .= "\n".str_repeat( "\t", $new_line_level );
			}
			$result .= $char.$post;
		}

		return $result;
	}	
//--
	function list_file_host(){
		$data 		= array();
		$list 		= '';
		$localdir 	= 'download_file';
		if ($dh = opendir($localdir)) {
			$i = 1;
			while (($file = readdir($dh)) !== FALSE) {
				
				if (pathinfo($file, PATHINFO_EXTENSION) === 'mp4'
					||pathinfo($file, PATHINFO_EXTENSION) === 'MP4'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'avi'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'AVI'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'wmv'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'WMV'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'mkv'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'MKV'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'mov'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'MOV'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'mp3'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'MP3'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'flv'
					|| pathinfo($file, PATHINFO_EXTENSION) === 'FLV'
				){

					if($i <= 100){

						if (preg_match_all('#time_[^{]*{([^}]*)}#', $file, $resultado)) {
							$mp = $resultado[1];   //que sólo tome lo capturado por el primer grupo
						} else {
							$mp = [];
						}
						
						if(!$mp == null){
							foreach ($mp as $time) {
								if ($time <= time()) {
									$data['files'][$i] = [
															[
																'file' 		=> $file,
																'key' 		=> $i,
																'time' 		=> $time,
															],  
														];
								} 
							} 
						} 
					}					
					$i++;
				}
			}
		  closedir($dh);
		}
     
		return [
			'data'				=> $data,
		];
    }
 
	function list_file_host_delete(){
		$list_file_host = list_file_host();
		if(!empty($list_file_host['data']['files'][1][0]['file'])){
			foreach ($list_file_host['data']['files'] as $data) {
				if ($data[0]['time'] < time()) {
					$file_video = './download_file/' .$data[0]['file'];
					if (file_exists($file_video)) {
						unlink($file_video);
					} 
				} 
			}    
		}
		return true;
	}
 
//--	
	//--> PLUGINS SYSTEM
	$add_action->do_action('Hook_code_plugin_system_1');	
?>