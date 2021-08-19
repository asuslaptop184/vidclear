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

	$list_comments 	= '';
	$last_id 			= PHP_Secure($_POST['last_id']);
	$sort 				= !empty($_POST['sort_by']) && is_numeric($_POST['sort_by']) ? $_POST['sort_by'] : 0;

	if ($sort == 1) {
		$db->orderBy('id', 'ASC');
	} else {
		$db->where('id', $last_id, '>');
		$db->orderBy('id', 'ASC');
	}

	$list_media = $db->get(T_COMMENTS, 20);
	if (count($list_media) > 0) {
		foreach ($list_media as $key => $data) {
				$list_comments.= PHP_LoadPage('template/eden_themes/item/list_comments', array(
					$CODE['ID'] 	=  $data->id,
					'ID' 			=> $data->id,
					'MAIL' 			=> $data->email,
					'COMMENTS' 		=> mb_substr($data->comments, 0, 50, "UTF-8"),
					'TIME' 			=> PHP_Time_elapsed($data->time),
				));
			}
		 
		$load_true  = $CODE['ID'];
		$data_load = ['status' => 200, 'load_true' => $load_true, 'comment' => $list_comments];
	} else {
		$data_load = ['status' => 404, 'message' => 'error media'];
	}
