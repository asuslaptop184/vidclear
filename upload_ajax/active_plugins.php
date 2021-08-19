<?php
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
}
#CODE

function deleteDir_plugins($dirPath) { 
     
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') { 
     $dirPath .= '/'; 
    } 
    $files = glob($dirPath . '*', GLOB_MARK); 
    foreach ($files as $file) { 
     if (is_dir($file)) { 
		deleteDir_plugins($file); 
     } else { 
      unlink($file); 
     } 
    } 
    rmdir($dirPath); 
} 

if($options_launcher['total_access']){
	$data_load['status']  	= 400; 
	$add_action->do_action('Hook_code_plugin_122');
	$type = PHP_Secure($_REQUEST['type']);
	if($type=='active'){ 
		$id 					= PHP_Secure($_POST['id']);
		$data 					= $db->where('id',$id)->getOne(T_MEDIA);
		$data_load['status']  	= 400;
		if($data){
				
			if($data->active > 0){
				$data_return 	= '0';
			}else{
				$data_return 	= '1';
			}
				
			$update_data = array(
				'active' => $data_return,
			);
				
			$update         		= $db->where('id',$id)->update(T_MEDIA,$update_data);
			$data_load['status']  	= 200;
		}else{
			$data_load['status']  	= 400;
		}
	}else if($type=='delete'){
		$id 						= PHP_Secure($_POST['id']);
		$data 						= $db->where('id',$id)->getOne(T_MEDIA);
		$sqli 						= "DELETE FROM ".T_MEDIA." WHERE id = '$id'";
		$status 					= mysqli_query($con, $sqli);
		$status 					= ($status) ? true : false;
		if($status==true){
			$data_load['status'] 	= 200;
			deleteDir_plugins($options_launcher['plugins_dir'] . '/files/' . strtolower($data->platform));
			$data_load['url']     	= $config['site_url'].'/eden/plugins';
		}else{
			$data_load['status'] 	= 400;
		}
	}


$add_action->do_action('Hook_code_plugin_117'); 				
}