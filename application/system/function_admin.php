<?php
// +------------------------------------------------------------------------+
// | @author_email: game123727@gmail.com   
// +------------------------------------------------------------------------+
// | Videoit - Drive videos online
// | Copyright (c) 2020 Videoit. All rights reserved.
// +------------------------------------------------------------------------+
/*
Any doubt or failure in the system takes a capture and sends the creator in support
*/
//-->
	function PHP_AdminLoadPage($page_url = '', $data = array(), $set_lang = true) {
		global $load, $lang_text, $lang_admin_text, $config, $CODE, $options_launcher;
		
		$page = './'.$options_launcher['panel_address'].'/pages/' . $page_url . '.php';
		if (!file_exists($page)) {
			return false;
		}
		$page_content = '';
		ob_start();
		require($page);
		$page_content = ob_get_contents();
		ob_end_clean();
	    if ($set_lang == true) {
			$page_content = preg_replace_callback("/{{LANG (.*?)}}/", function($m) use ($lang_admin_text) {
				return (isset($lang_admin_text[$m[1]])) ? $lang_admin_text[$m[1]] : '';
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
	function PHP_LoadAdminLinkSettings($link = ''){
		global $site_url;
		return $site_url . '/admin/' . $link;
	}
//--
	function PHP_LoadAdminLink($link = '') {
		global $site_url,$options_launcher;
		return $site_url . '/'.$options_launcher['panel_address'].'/' . $link;
	}
//--
	function PHP_Admin_Data($value,$redir,$info = ''){
		global $con;
		$data= array();
		
		if ($redir == 'SELECT'){ 
		
			$sqli = mysqli_query($con,"SELECT * from config WHERE id = $value") or die ("error en la consulta". mysqli_connect_error()) ;
			$data = mysqli_fetch_array($sqli, MYSQLI_ASSOC);			
			$code = $data['value'];
			
		}else if($redir == 'UPDATE') {
			
			$sqli = "UPDATE config SET value='$info' WHERE id='$value'";
			mysqli_query($con, $sqli);
			$code = '';
		}
		
		return $code;
	}
//--
	function _Load_list_plugins(){
		global $db;
		$list_media			= $db->where('active', '1')->orderBy('id', 'ASC')->get(T_MEDIA);
		return $list_media;		
	}
//--
	function _load_list_posts(){
		global $con;
		$data 		 = array();
		$query 		 = "SELECT * from ".T_POST." ORDER BY id DESC LIMIT 10";
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$sql_fetch['data'] 	= $sql_fetch['id'];
				$data[]           	= $sql_fetch;
			}
		}
		return $data;		
	}	
//--	
	function _Load_list_user() {
		global $con;
		$data 		 = array();
		$query 		 = "SELECT * from ".T_MEDIA."";
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$sql_fetch['data'] 	= $sql_fetch['id'];
				$data[]           	= $sql_fetch;
			}
		}
		return $data;		
	}
//--
	function _Get_search($keyword){
		global $con;
		$data = array();
		$keyword_decode = PHP_Crypt_code($keyword, true);
		$sql_query = mysqli_query($con,"SELECT * FROM ".T_SHARE." WHERE id LIKE '%$keyword_decode%' or id_url LIKE '%$keyword%' or platform LIKE '%$keyword%' ORDER BY id DESC LIMIT 50");
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while($sql_fetch = mysqli_fetch_array($sql_query)){
				$data[]           	= $sql_fetch;					
			}
		}
		return $data;	
	}
//--
	function _load_article_data($id = NULL){
		global $con;
		$data = array();
		if($id == null){
			$query 	= "SELECT * from ".T_POST." ORDER BY id DESC LIMIT 2";
		}else{
			$query 	= "SELECT * from ".T_POST." WHERE id = $id";
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
	function _empty_POST($data){
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
	function _load_article_data_list($lower_limit, $page_limit){
		global $con;
		$data = array();
		
		$query = " SELECT * FROM tbl_pagination WHERE 1 limit ". ($lower_limit)." ,  ". ($page_limit). " ";
		
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$sql_fetch['data'] 	= $sql_fetch['id'];
				$data[]           	= $sql_fetch;
			}
		}
		return $data;
	}	
//--	
	function _list_category_article(){
		global $con;
		$data 		 = array();
		$query 		 = "SELECT * from ".T_MEDIA."";
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$sql_fetch['data'] 	= $sql_fetch['id'];
				$data[]           	= $sql_fetch;
			}
		}
		return $data;		
	}
//--
	function _Decode($text = '') {
		return htmlspecialchars_decode($text);
	}	
//--		
	function _Get_icon_plugins($value){
		global $con;
		$sql = mysqli_query($con,"SELECT * from ". T_MEDIA ." WHERE platform = '$value'");
		$data = mysqli_fetch_array($sql, MYSQLI_ASSOC);
		return $data['icon'];
	}
//--
	function _Get_dataUrl($id, $value){
		global $con;
		$data= array();
		$sql = mysqli_query($con,"SELECT * from ".T_SHARE." WHERE id = '$id'");
		$data = mysqli_fetch_array($sql, MYSQLI_ASSOC);
		return $data[$value];
	}
//--	
	function _Load_list_urls($LIMIT) {
		global $con;
		$data 		 = array();
		$query 		 = "SELECT * from ".T_SHARE." ORDER BY id ASC LIMIT ".$LIMIT."";
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
	function _info_plugin_load($info){
		global $con;
		$data = array();
		$info = PHP_Secure($info);
		$query = "SELECT * from ".T_MEDIA." WHERE key_plugin = '$info'";
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				$sql_fetch['key_plugin'] 	= $sql_fetch['key_plugin'];
				$data[]           	= $sql_fetch;
			}
		}
		return $data;
	}
//--
	function _round_plugins_use($info){
		global $con;
		$pedir 			= mysqli_query($con,"SELECT count(*) as cuenta from ".T_SHARE."");
		$sql_query		= mysqli_fetch_assoc($pedir);
		$pedir_info		= mysqli_query($con,"SELECT count(*) as cuenta from ".T_SHARE." WHERE platform='".strtolower($info)."'");
		$sql_query_info	= mysqli_fetch_assoc($pedir_info);
		$platform_info 	= (string)$sql_query_info["cuenta"];
		$platform_all 	= (string)$sql_query["cuenta"];
		return ($platform_info==0)?'0':round(($platform_info/$platform_all)*100);	
		
	}
//--
	function _round_more_share($info, $type = 'facebook'){
		global $con;
		$query 	= mysqli_query($con,"SELECT sum(". $type .") FROM ". T_SHARE ." WHERE platform='$info'"); 
		$data 	= mysqli_fetch_row($query);
		return $data[0];
	}
//--
	function PHP_GetTrending_Link($info){
		global $con;
		$data = array();
		$query = "SELECT * FROM " . T_SHARE . " WHERE  platform='".strtolower($info)."' ORDER BY views DESC LIMIT 10";
		$sql_query   = mysqli_query($con, $query);
		$sql_numrows = mysqli_num_rows($sql_query);
		if ($sql_numrows > 0) {
			while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
				 
				$sql_fetch['data'] 	= $sql_fetch['id'];
				$data[]           	= $sql_fetch;
				 
			}
		}
		return $data;
	}
//--
	function IS_LOGGED_DATA($data){
		global $options_launcher;
		return ($data == PHP_Admin_Data('31','SELECT'))?false:true;
	}
//--
	function write_file($file_name, $data, $trunk = 1) {
		if ($trunk == 1){
			$mode = 'wb';
		}elseif ($trunk == 0){
			$mode = 'ab';
		}
		
		$fp = fopen($file_name, $mode);
		
		if (!$fp || !flock($fp, LOCK_EX) || !fwrite($fp, $data) || !flock($fp, LOCK_UN) || !fclose($fp)){
			return FALSE;
		}	
		return TRUE;
	}
//--
	function ADMIN_Launcher_Options($data = array()){
		global $options_launcher;
		$default_options 	= $options_launcher;
		$options 			= array();
		#-->
		foreach($default_options as $k => $v) {
			if (is_array($default_options[$k])){
				continue;
			}	
			$options[$k] = ('' == '' ? $v : '');
		}
		#-->
		if (!empty($data) && is_array($data)) {
			foreach ($data as $key => $replace) {
				$options[$key] = ($key == NULL ? $v : $replace);
			}
		}
		
		$opt = var_export($options, true);
		$opt = (strpos($opt, "\r\n") === false ? str_replace(array("\r", "\n"), "\r\n", $opt) : $opt);
		$opt = "<?php\r\n\r\n\$options_launcher = $opt; \r\n\r\n?>";

		if (!write_file("launcher.php", $opt, 1)){
			$echo = FALSE;
		} else {
			$echo = TRUE;
		}
		return $echo;
	}
//--
	function url_parser($url) {
		
		// Pasamos a min??sculas
		$url = strtolower($url);

		// Reemplazamos caracteres latinos (tildes y e??es)
		$find = array('??', '??', '??', '??', '??', '??');
		$replace = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $replace, $url);
	  
		// A??adimos guiones
		$find = array(' ', '&', '\r\n', '\n', '+'); 
		$url = str_replace ($find, '-', $url);
	  
		// Reemplazamos resto de caracteres distintos de letras y n??meros
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$replace = array('', '-', '');
		$url = preg_replace ($find, $replace, $url);
	  
		return $url;
	}
//--
	function F_url_slug($str, $options = array()) {
		// Make sure string is in UTF-8 and strip invalid UTF-8 characters
		$str      = mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());
		$defaults = array(
			'delimiter' => '-',
			'limit' => null,
			'lowercase' => true,
			'replacements' => array(),
			'transliterate' => false
		);
		// Merge options
		$options  = array_merge($defaults, $options);
		$char_map = array(
			// Latin
			'??' => 'A',
			'??' => 'A',
			'??' => 'A',
			'??' => 'A',
			'??' => 'A',
			'??' => 'A',
			'??' => 'AE',
			'??' => 'C',
			'??' => 'E',
			'??' => 'E',
			'??' => 'E',
			'??' => 'E',
			'??' => 'I',
			'??' => 'I',
			'??' => 'I',
			'??' => 'I',
			'??' => 'D',
			'??' => 'N',
			'??' => 'O',
			'??' => 'O',
			'??' => 'O',
			'??' => 'O',
			'??' => 'O',
			'??' => 'O',
			'??' => 'O',
			'??' => 'U',
			'??' => 'U',
			'??' => 'U',
			'??' => 'U',
			'??' => 'U',
			'??' => 'Y',
			'??' => 'TH',
			'??' => 'ss',
			'??' => 'a',
			'??' => 'a',
			'??' => 'a',
			'??' => 'a',
			'??' => 'a',
			'??' => 'a',
			'??' => 'ae',
			'??' => 'c',
			'??' => 'e',
			'??' => 'e',
			'??' => 'e',
			'??' => 'e',
			'??' => 'i',
			'??' => 'i',
			'??' => 'i',
			'??' => 'i',
			'??' => 'd',
			'??' => 'n',
			'??' => 'o',
			'??' => 'o',
			'??' => 'o',
			'??' => 'o',
			'??' => 'o',
			'??' => 'o',
			'??' => 'o',
			'??' => 'u',
			'??' => 'u',
			'??' => 'u',
			'??' => 'u',
			'??' => 'u',
			'??' => 'y',
			'??' => 'th',
			'??' => 'y',
			// Latin symbols
			'??' => '(c)',
			// Greek
			'??' => 'A',
			'??' => 'B',
			'??' => 'G',
			'??' => 'D',
			'??' => 'E',
			'??' => 'Z',
			'??' => 'H',
			'??' => '8',
			'??' => 'I',
			'??' => 'K',
			'??' => 'L',
			'??' => 'M',
			'??' => 'N',
			'??' => '3',
			'??' => 'O',
			'??' => 'P',
			'??' => 'R',
			'??' => 'S',
			'??' => 'T',
			'??' => 'Y',
			'??' => 'F',
			'??' => 'X',
			'??' => 'PS',
			'??' => 'W',
			'??' => 'A',
			'??' => 'E',
			'??' => 'I',
			'??' => 'O',
			'??' => 'Y',
			'??' => 'H',
			'??' => 'W',
			'??' => 'I',
			'??' => 'Y',
			'??' => 'a',
			'??' => 'b',
			'??' => 'g',
			'??' => 'd',
			'??' => 'e',
			'??' => 'z',
			'??' => 'h',
			'??' => '8',
			'??' => 'i',
			'??' => 'k',
			'??' => 'l',
			'??' => 'm',
			'??' => 'n',
			'??' => '3',
			'??' => 'o',
			'??' => 'p',
			'??' => 'r',
			'??' => 's',
			'??' => 't',
			'??' => 'y',
			'??' => 'f',
			'??' => 'x',
			'??' => 'ps',
			'??' => 'w',
			'??' => 'a',
			'??' => 'e',
			'??' => 'i',
			'??' => 'o',
			'??' => 'y',
			'??' => 'h',
			'??' => 'w',
			'??' => 's',
			'??' => 'i',
			'??' => 'y',
			'??' => 'y',
			'??' => 'i',
			// Turkish
			'??' => 'S',
			'??' => 'I',
			'??' => 'C',
			'??' => 'U',
			'??' => 'O',
			'??' => 'G',
			'??' => 's',
			'??' => 'i',
			'??' => 'c',
			'??' => 'u',
			'??' => 'o',
			'??' => 'g',
			// Russian
			'??' => 'A',
			'??' => 'B',
			'??' => 'V',
			'??' => 'G',
			'??' => 'D',
			'??' => 'E',
			'??' => 'Yo',
			'??' => 'Zh',
			'??' => 'Z',
			'??' => 'I',
			'??' => 'J',
			'??' => 'K',
			'??' => 'L',
			'??' => 'M',
			'??' => 'N',
			'??' => 'O',
			'??' => 'P',
			'??' => 'R',
			'??' => 'S',
			'??' => 'T',
			'??' => 'U',
			'??' => 'F',
			'??' => 'H',
			'??' => 'C',
			'??' => 'Ch',
			'??' => 'Sh',
			'??' => 'Sh',
			'??' => '',
			'??' => 'Y',
			'??' => '',
			'??' => 'E',
			'??' => 'Yu',
			'??' => 'Ya',
			'??' => 'a',
			'??' => 'b',
			'??' => 'v',
			'??' => 'g',
			'??' => 'd',
			'??' => 'e',
			'??' => 'yo',
			'??' => 'zh',
			'??' => 'z',
			'??' => 'i',
			'??' => 'j',
			'??' => 'k',
			'??' => 'l',
			'??' => 'm',
			'??' => 'n',
			'??' => 'o',
			'??' => 'p',
			'??' => 'r',
			'??' => 's',
			'??' => 't',
			'??' => 'u',
			'??' => 'f',
			'??' => 'h',
			'??' => 'c',
			'??' => 'ch',
			'??' => 'sh',
			'??' => 'sh',
			'??' => '',
			'??' => 'y',
			'??' => '',
			'??' => 'e',
			'??' => 'yu',
			'??' => 'ya',
			// Ukrainian
			'??' => 'Ye',
			'??' => 'I',
			'??' => 'Yi',
			'??' => 'G',
			'??' => 'ye',
			'??' => 'i',
			'??' => 'yi',
			'??' => 'g',
			// Czech
			'??' => 'C',
			'??' => 'D',
			'??' => 'E',
			'??' => 'N',
			'??' => 'R',
			'??' => 'S',
			'??' => 'T',
			'??' => 'U',
			'??' => 'Z',
			'??' => 'c',
			'??' => 'd',
			'??' => 'e',
			'??' => 'n',
			'??' => 'r',
			'??' => 's',
			'??' => 't',
			'??' => 'u',
			'??' => 'z',
			// Polish
			'??' => 'A',
			'??' => 'C',
			'??' => 'e',
			'??' => 'L',
			'??' => 'N',
			'??' => 'o',
			'??' => 'S',
			'??' => 'Z',
			'??' => 'Z',
			'??' => 'a',
			'??' => 'c',
			'??' => 'e',
			'??' => 'l',
			'??' => 'n',
			'??' => 'o',
			'??' => 's',
			'??' => 'z',
			'??' => 'z',
			// Latvian
			'??' => 'A',
			'??' => 'C',
			'??' => 'E',
			'??' => 'G',
			'??' => 'i',
			'??' => 'k',
			'??' => 'L',
			'??' => 'N',
			'??' => 'S',
			'??' => 'u',
			'??' => 'Z',
			'??' => 'a',
			'??' => 'c',
			'??' => 'e',
			'??' => 'g',
			'??' => 'i',
			'??' => 'k',
			'??' => 'l',
			'??' => 'n',
			'??' => 's',
			'??' => 'u',
			'??' => 'z'
		);
		// Make custom replacements
		$str      = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
		// Transliterate characters to ASCII
		if ($options['transliterate']) {
			$str = str_replace(array_keys($char_map), $char_map, $str);
		}
		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
		// Truncate slug to max. characters
		$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
		// Remove delimiter from ends
		$str = trim($str, $options['delimiter']);
		return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
	}
//--
	function F_URLSlug($string, $id) {
		$slug = F_url_slug($string, array(
			'delimiter' => '-',
			'limit' => 100,
			'lowercase' => true,
			'replacements' => array(
				'/\b(an)\b/i' => 'a',
				'/\b(example)\b/i' => 'Test'
			)
		));
		return $slug . '_' . $id . '.html';
	}
//--
	function F_URLSlug_pages($string) {
		$slug = F_url_slug($string, array(
			'delimiter' => '-',
			'limit' => 100,
			'lowercase' => true,
			'replacements' => array(
				'/\b(an)\b/i' => 'a',
				'/\b(example)\b/i' => 'Test'
			)
		));
		return $slug;
	}
//--
	function _GetIdFromURL($url = false) {
		if (!$url) {
			return false;
		}
		$slug = @end(explode('_', $url));
		$id   = 0;
		$slug = explode('.', $slug);
		$id   = (is_array($slug) && !empty($slug[0]) && is_numeric($slug[0])) ? $slug[0] : 0;
		return $id;
	}
//--
	function F_ShortText($text = "", $len = 100) {
		if (empty($text) || !is_string($text) || !is_numeric($len) || $len < 1) {
			return "****";
		}
		if (strlen($text) > $len) {
			$text = mb_substr($text, 0, $len, "UTF-8") . "..";
		}
		return $text;
	}
//-- DEVICE, BROWSER, COUNTRIES
	function F_load_dev_data_vi($type){
		global $con;
		
		$data = array();
		if($type == 'device'){
			$query = "SELECT * From admin_device_graphics ORDER BY Access DESC LIMIT 25";
		}else if($type == 'browser'){
			$query = "SELECT * From admin_browser_graphics ORDER BY Access DESC LIMIT 25";
		}else if($type == 'countries'){	
			$query = "SELECT * From admin_graphics_countries ORDER BY Results DESC LIMIT 25";
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
	function Repeated_url_error($data_id = NULL){
		global $con;
		$data 		 = array();
		if($data_id == NULL){
			$query 	= "SELECT * from ".T_MEDIA."";
			$sql_query   = mysqli_query($con, $query);
			$sql_numrows = mysqli_num_rows($sql_query);
			if ($sql_numrows > 0) {
				while ($sql_fetch = mysqli_fetch_assoc($sql_query)) {
					$sql_fetch['data'] 	= $sql_fetch['id'];
					$data[]           	= $sql_fetch;
				}
			}
		}else{
			$query 	= mysqli_query($con,"SELECT * FROM ".T_MEDIA." WHERE id ={$data_id}");
			$url 	= mysqli_fetch_array($query);
			$data  	= $url['url'];	 
		}
		return $data;		
	}	
//--
	function PHP_Urls_editor_Post($Id, $New_url){
		$url 				= Repeated_url_error($Id);
		 
		$load_data_url_all 	= Repeated_url_error();
		
		$load_url_ok 	 	= "";
		$load_url_error 	= "";
		if($New_url == NULL){
			$load_url_error.= 400;
		}else{	
			foreach ($load_data_url_all as $key => $GET_DATA) {
				if($New_url == $GET_DATA['url']){
					if ($url == $GET_DATA['url'] && $Id == $GET_DATA['id']){
						# OK
						$load_url_ok.= ($New_url == $url) ? 200 : 400;
					}else{
						# Error
						$load_url_ok.= 400;
						$load_url_error.= 400;
					}
				}else if($url == $GET_DATA['url'] && $Id == $GET_DATA['id']){
					# URL available
					$load_url_ok.= ($load_url_error==400)? 400 : 200; 
				}
			}
		}	
		//-->
		if($load_url_error == 400){
			$return = $load_url_error;
		}else{
			$return = $load_url_ok;
		}
 
		return $return;
	}
//--
	function _bar_load_data_line($rating = '0'){
		
		$bar = '<div class="progress my-3 circle" style="height:6px">
						<div class="bar_load_server_1_gd_primary progress-bar circle gd-primary" data-toggle="tooltip" title="" style="width: '.$rating.'%" data-original-title="100%"></div>
					</div>'; 

		if ($rating > 49) {
			$bar = '<div class="progress my-3 circle" style="height:6px">
						<div class="bar_load_server_2_gd_primary progress-bar circle gd-primary" data-toggle="tooltip" title="" style="width: '.$rating.'%" data-original-title="100%"></div>
					</div>';
		} 
		if ($rating > 74) {
			$bar = '<div class="progress my-3 circle" style="height:6px">
						<div class="bar_load_server_2_gd_primary progress-bar circle gd-primary" data-toggle="tooltip" title="" style="width: '.$rating.'%" data-original-title="100%"></div>
					</div>';
		} 
		if ($rating > 89) {
			$bar = '<div class="progress my-3 circle" style="height:6px">
						<div class="bar_load_server_3_gd_primary progress-bar circle gd-primary" data-toggle="tooltip" title="" style="width: '.$rating.'%" data-original-title="100%"></div>
					</div>';	
		} 
		return $bar;
	}
//--
	function _geo_server_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
		$output = NULL;
		if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
			$ip = $_SERVER["REMOTE_ADDR"];
			if ($deep_detect) {
				if (filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				if (filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
		}
		$purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
		$support    = array("country", "countrycode", "state", "region", "city", "location", "address");
		$continents = array(
			"AF" => "Africa",
			"AN" => "Antarctica",
			"AS" => "Asia",
			"EU" => "Europe",
			"OC" => "Australia (Oceania)",
			"NA" => "North America",
			"SA" => "South America"
		);
		if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
			$ipdat = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			if (strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
				switch ($purpose) {
					case "location":
						$output = array(
							"city"           => $ipdat->geoplugin_city,
							"state"          => $ipdat->geoplugin_regionName,
							"country"        => $ipdat->geoplugin_countryName,
							"country_code"   => $ipdat->geoplugin_countryCode,
							"continent"      => $continents[strtoupper($ipdat->geoplugin_continentCode)],
							"continent_code" => $ipdat->geoplugin_continentCode
						);
						break;
					case "address":
						$address = array($ipdat->geoplugin_countryName);
						if (strlen($ipdat->geoplugin_regionName) >= 1)
							$address[] = $ipdat->geoplugin_regionName;
						if (strlen($ipdat->geoplugin_city) >= 1)
							$address[] = $ipdat->geoplugin_city;
						$output = implode(", ", array_reverse($address));
						break;
					case "city":
						$output = $ipdat->geoplugin_city;
						break;
					case "state":
						$output = $ipdat->geoplugin_regionName;
						break;
					case "region":
						$output = $ipdat->geoplugin_regionName;
						break;
					case "country":
						$output = $ipdat->geoplugin_countryName;
						break;
					case "continent":
						$output = $ipdat->geoplugin_continentName;
						break;
				}
			}
		}
		return $output;
	}
//--
	function Data_use_media(){
		global $con;
		$day_data 		= date("Y/m/d");
		$data_look		= mysqli_query($con,"select look from admin_graphics where look='$day_data'"); 
		if(mysqli_num_rows($data_look)>0){ 						
			$sql = "UPDATE admin_graphics SET Visits=Visits+1 WHERE look='$day_data'";
			mysqli_query($con, $sql);
		}else{ 							
			$sql = "insert into admin_graphics (look,Visits) values ('$day_data','1')";
			mysqli_query($con, $sql);
		} 
	} 
//--> PLUGINS SYSTEM
$add_action->do_action('Hook_code_plugin_system_2');	
//--
//--	
?> 