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


if (php_sapi_name () == "apache2handler") {
		$httpapp = "Apache";
	} else {
		$httpapp = php_sapi_name ();
	}

	function checkos() {
		if (substr ( PHP_OS, 0, 3 ) == "WIN") {
			$osType = winosname ();
			$osbuild = php_uname ( 'v' );
			$os = "windows";
		} elseif (PHP_OS == "FreeBSD") {
			$os = "nocpu";
			$osType = "FreeBSD";
			$osbuild = php_uname ( 'r' );
		} elseif (PHP_OS == "Darwin") {
			$os = "nocpu";
			$osType = "Apple OS X";
			$osbuild = php_uname ( 'r' );
		} elseif (PHP_OS == "Linux") {
			$os = "linux";
			$osType = "Linux";
			$osbuild = php_uname ( 'r' );
		} else {
			$os = "nocpu";
			$osType = "Unknown OS";
			$osbuild = php_uname ( 'r' );
		}
		return $osType;
	}

	function winosname() {
		$wUnameB = php_uname ( "v" );
		$wUnameBM = trim( php_uname ( "r" ) );
		if (preg_match ("@build (\d+)@i", $wUnameB, $build)) $wUnameB = $build[1];

		if ($wUnameBM == "5.0" && ($wUnameB == "2195")) {
			$wVer = "Windows 2000";
		}
		if ($wUnameBM == "5.1" && ($wUnameB == "2600")) {
			$wVer = "Windows XP";
		}
		if ($wUnameBM == "5.2" && ($wUnameB == "3790")) {
			$wVer = "Windows Server 2003";
		}
		if ($wUnameBM == "6.0" && ($wUnameB == "6000")) {
			$wVer = "Windows Vista";
		}
		if ($wUnameBM == "6.0" && ($wUnameB == "6001")) {
			$wVer = "Windows Vista SP1";
		}
		if ($wUnameBM == "6.3" && ($wUnameB == "9600")) {
			$wVer = "Windows 8.1";
		}
		return $wVer;
	}

	if (PHP_OS == "WINNT") {
		$os = "windows";
		$osbuild = php_uname ( 'v' );
	} elseif (PHP_OS == "Linux") {
		$os = "linux";
		$osbuild = php_uname ( 'r' );
	} else {
		$os = "nocpu";
		$osbuild = php_uname ( 'r' );
	}

	function ZahlenFormatieren($Wert) {
		if ($Wert > 1099511627776) {
			$Wert = number_format ( $Wert / 1099511627776, 2, ".", "," ) . " TB";
		} elseif ($Wert > 1073741824) {
			$Wert = number_format ( $Wert / 1073741824, 2, ".", "," ) . " GB";
		} elseif ($Wert > 1048576) {
			$Wert = number_format ( $Wert / 1048576, 2, ".", "," ) . " MB";
		} elseif ($Wert > 1024) {
			$Wert = number_format ( $Wert / 1024, 2, ".", "," ) . " kB";
		} else {
			$Wert = number_format ( $Wert, 2, ".", "," ) . " Bytes";
		}
		
		return $Wert;
	}
	$CODE['FREI'] 			= disk_free_space ( "./" );
	$CODE['INSGESAMT'] 		= disk_total_space ( "./" );
	$CODE['BELEGT'] 		= $CODE['INSGESAMT'] - $CODE['FREI'];
	$prozent_belegt 		= 100 * $CODE['BELEGT'] / $CODE['INSGESAMT'];
	if ($os == "windows") {
		if (class_exists('COM')){
			$wmi = new COM ( "Winmgmts://" );
			$cpus = $wmi->execquery ( "SELECT * FROM Win32_Processor" );
			$CODE['CPU_STRING'] = "<p class='class_alias_datos_sit_sy_1'>". $lang_admin->CPU_load ."</p>";
			$cpu_load = 0;
			foreach ( $cpus as $cpu ) {
				$cpu_load += $cpu->loadpercentage;
				$CODE['CPU_STRING'] .= "" . $cpu->loadpercentage;
			}
			$cpu_load /= count($cpus);
			$CODE['CPU_STRING'] .= '%<br />'._bar_load_data_line($cpu_load).'<br />';
		}else{
		   $CODE['CPU_STRING'] = "<p class='error_class_css class_alias_datos_sit_sy_1'>". $lang_admin->CPU_load_error ."</p>";
		}
	} elseif ($os == "linux") {
		function getStat($_statPath) {
			if (trim ( $_statPath ) == '') {
				$_statPath = '/proc/stat';
			}
			
			ob_start ();
			readfile($_statPath);
			$stat = ob_get_contents ();
			ob_end_clean ();
			
			if (substr ( $stat, 0, 3 ) == 'cpu') {
				$parts = explode ( " ", preg_replace ( "!cpu +!", "", $stat ) );
			} else {
				return false;
			}
			
			$return 			= array ();
			$return ['user'] 	= $parts [0];
			$return ['nice'] 	= $parts [1];
			$return ['system'] 	= $parts [2];
			$return ['idle'] 	= $parts [3];
			return $return;
		}
		
		function getCpuUsage($_statPath = '/proc/stat') {
			$time1 = getStat ( $_statPath );
			if (!$time1) return -1;
			sleep ( 1 );
			$time2 = getStat ( $_statPath );
			
			$delta = array ();
			
			foreach ( $time1 as $k => $v ) {
				$delta [$k] = $time2 [$k] - $v;
			}
			
			$deltaTotal 	= array_sum ( $delta );
			$percentages 	= array ();
			
			foreach ( $delta as $k => $v ) {
				$percentages [$k] = round ( $v / $deltaTotal * 100, 2 );
			}
			return $percentages;
		}
		$CODE['CPU_STRING'] = '';
		if (($cpu = getCpuUsage()) === -1) {
			$CODE['CPU_STRING'] = -1;
		}else{
			
			$CODE['CPULAST'] = 100 - $cpu ['idle'];
			$CODE['CPU_STRING'] .= "<p class='class_alias_datos_sit_sy_1'>". $lang_admin->CPU_load ."</p>" . round ( $CODE['CPULAST'], "0" ) . "%<br/>";
			if (extension_loaded('gd') && function_exists('gd_info')) {
				$CODE['CPU_STRING'] .= _bar_load_data_line($CODE['CPULAST']);
			}
			$CODE['CPU_STRING'] .= '<br/>';
		}
	} elseif ($os == "nocpu") {
		$CODE['CPU_STRING'] 	= '';
	} else {
		$CODE['CPU_STRING'] 	= $lang_admin->CPU_load .'<br />';
		$CODE['CPU_STRING'] .= $lang_admin->CPU_load_error_2 ."<br />";
	}
/*
	Code line #2
*/

	$CODE['GEO_SERVER_INFO'] = _geo_server_info($_SERVER['SERVER_ADDR']);

	
	$list_item_plugins 	= '';
	$list_post 			= '';
	
	$load->list_plugins = _Load_list_plugins();
	
	foreach ($load->list_plugins as $key => $data) {
		$list_item_plugins.= PHP_LoadPage('template/eden_themes/item/item_plugin', array(
			'ICON' 			=> str_replace('./upload/icons/', '{{CONFIG site_url}}/upload/icons/', $data->icon),
			'TITLE' 		=> $data->platform,
			'KEY_ID' 		=> $data->key_plugin,
			'ROUND' 		=> _round_plugins_use($data->platform),
		));
	}
	
	
	$load->post_data			= $db->orderBy('views', 'DESC')->get(T_POST, 8);
	foreach ($load->post_data as $key => $data) {
		$list_post.= PHP_LoadPage('template/eden_themes/item/post_top', array(
			'ID' 				=> $data->id,
			'TITLE' 			=> $data->title,
			'IMAGE' 			=> $config['site_url']. '/' .$data->image,
			'VIEWS' 			=> ($data->views == NULL)?0:$data->views,
			'URL' 				=> $config['site_url']. '/articles/post/'.F_URLSlug($data->title,$data->id),
			$load->active_post 	= $data->active,
		));
	}

	$load->page        	= 'home';
	$load->title       	= $lang_admin->menu_2 .' - '. $load->config->title;
	$load->description 	= $load->config->description;
	$load->content 		= PHP_LoadPage('template/eden_themes/home', array(
		'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
		'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
		'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
		'LIST_PLUGINS' 			=> $list_item_plugins,
		'LIST_POST' 			=> $list_post,
	));