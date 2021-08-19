<?php
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
}
//--
if($options_launcher['total_access']){
require_once './application/system/core/plugins.php';
$folder 		= 'files';
$name_Folders 	= "./".$options_launcher['plugins_dir']."/". $folder ."/"; 
$add_action->do_action('Hook_code_plugin_34');
// code upload plugins
$zip = new ZipArchive;
// A list of permitted file extensions
$allowed = array('zip', 'ZIP');
$add_action->do_action('Hook_code_plugin_33');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$add_action->do_action('Hook_code_plugin_32');
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	$add_action->do_action('Hook_code_plugin_31');
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	//-- info of file
	$add_action->do_action('Hook_code_plugin_30');
	$name = $_FILES['upl']['name'];
	$type = $_FILES['upl']['type'];
	$size = $_FILES['upl']['size'];
	$file_name = preg_replace("/\..*$/", "", $name);
	$add_action->do_action('Hook_code_plugin_29');	
	if(strlen($name)){
		//--
		$add_action->do_action('Hook_code_plugin_28');
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$allowed)){
			$add_action->do_action('Hook_code_plugin_27');
			if($size<(1024*5120)){
				$actual_file_name 	= $name.".".$ext;
				$tmp 				= $_FILES['upl']['tmp_name'];
				$add_action->do_action('Hook_code_plugin_26');
				if(move_uploaded_file($tmp, $name_Folders.$actual_file_name)){
					$add_action->do_action('Hook_code_plugin_25');
					$true_zip = $zip->open('./'.$options_launcher['plugins_dir'].'/'.$folder.'/'.$name.'.zip');
					$add_action->do_action('Hook_code_plugin_24');
		//--> 
					if($true_zip == true){
						$zip->extractTo('./'.$options_launcher['plugins_dir'].'/'.$folder.'/');
						$zip->close();
						unlink('./'.$options_launcher['plugins_dir'].'/'.$folder.'/'.$name.'.zip');
						$add_action->do_action('Hook_code_plugin_23');
						$default_headers = array(
									'Name' 			=> 'Plugin Name',
									'Key' 			=> 'Plugin Key',
									'Icon' 			=> 'Plugin Icon',
									'Update_date' 	=> 'Update date',
									'Version' 		=> 'Version',
									'Author' 		=> 'Author',
									'Url_line'		=> 'Url_line',
									'Url' 			=> 'Url',
									'Title' 		=> 'Title plugin',
									'Description' 	=> 'Description plugin',
									'Content' 		=> 'Content plugin',
								);
									
						$plugin_data = PHP_get_file_data('./'.$options_launcher['plugins_dir'].'/'.$folder.'/'.$file_name.'/install.php', $default_headers, 'plugin');
						
						$Data_name 			= $plugin_data['Name'];
						$Data_key 			= $plugin_data['Key'];
						$Data_icon			= _grab_image($plugin_data['Icon'], './upload/icons/'.strtolower($Data_name).'_icon.png');
						$Data_Update		= $plugin_data['Update_date'];
						$Data_Version		= $plugin_data['Version'];
						$Data_Author		= $plugin_data['Author'];
						$Data_url_line		= $plugin_data['Url_line'];
						$Data_url			= $plugin_data['Url'];
						$Data_Title			= $plugin_data['Title'];
						$Data_Description	= $plugin_data['Description'];
						$Data_Content		= $plugin_data['Content'];
								
						if (PHP_Data_Key_Plugin($Data_key) == false){
							$add_action->do_action('Hook_code_plugin_22');
							$data = Array (
								'platform' 				=> $Data_name,
								'key_plugin' 			=> $Data_key,
								'Data_Update' 			=> $Data_Update,
								'version' 				=> $Data_Version,
								'icon' 					=> $Data_icon,
								'Author' 				=> $Data_Author,
								'url_line'				=> $Data_url_line,
								'url' 					=> $Data_url
							);
							$db->where ('key_plugin', $Data_key);
							$db->update (T_MEDIA, $data);
							$add_action->do_action('Hook_code_plugin_21');
						}else{
							$add_action->do_action('Hook_code_plugin_20');
							$db->insert(T_MEDIA,array(
													'platform' 				=> $Data_name,
													'key_plugin' 			=> $Data_key,
													'Data_Update' 			=> $Data_Update,
													'version' 				=> $Data_Version,
													'icon' 					=> $Data_icon,
													'Author' 				=> $Data_Author,
													'url_line'				=> $Data_url_line,
													'url' 					=> $Data_url,
													'title_content'			=> $Data_Title,
													'description_content'	=> $Data_Description,
													'platform_content'		=> $Data_Content,
													'active' 				=> '1'
												));
							echo '{"status":"success"}';
							exit;
						}
						$add_action->do_action('Hook_code_plugin_19');
						//--
						echo '{"status":"success"}';
						exit;
					}else{
						$add_action->do_action('Hook_code_plugin_18');
						//--> error zip
						echo '{"status":"error"}';
						exit;
					} 
					$add_action->do_action('Hook_code_plugin_17');
				}
				$add_action->do_action('Hook_code_plugin_16');
			}else{
				$add_action->do_action('Hook_code_plugin_15');
				//-- video file size max 
				echo '{"status":"error"}';
				exit;
			}
			$add_action->do_action('Hook_code_plugin_14');
		}else{
			$add_action->do_action('Hook_code_plugin_13');
			//-- Invalid file format..
			echo '{"status":"error"}';
			exit;
		}
		$add_action->do_action('Hook_code_plugin_12');
	}
	$add_action->do_action('Hook_code_plugin_11');
}
$add_action->do_action('Hook_code_plugin_10');
echo '{"status":"error"}';
exit;
}