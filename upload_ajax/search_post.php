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
 
		$data_load['status']  			= 400;
		$data_load['status_search']  	= 400;
		$search_value 	= PHP_Secure($_POST['search']);
		$search_result = $db->rawQuery("SELECT * FROM " . T_POST . " WHERE (title LIKE '%$search_value%' OR tags LIKE '%$search_value%' OR description LIKE '%$search_value%' OR category LIKE '%$search_value%') LIMIT 10");
		if (!empty($search_result)) {
				$html = '';
				foreach ($search_result as $key => $data) {
					 
					$html.= PHP_LoadPage('template/eden_themes/item/list_search', array(
						'ID' 				=> $data->id,						 
						'TITLE' 			=> $data->title,						 					 
						'IMAGE' 			=> $config['site_url']. '/' .$data->image,						 					 
					));
				}
				$data_load = array('status' => 200, 'status_search' => 200, 'html' => $html);
			}else{
				$data_load['status_search']  = 400;
			} 
		  
 