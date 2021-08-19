<?php 
//-->
if (!empty($_COOKIE["_admin_user"])) {
	if (IS_LOGGED_DATA($_COOKIE["_admin_user"])) {
		echo 'EE_NO_ADMIN';
		header("Location:./logout");
	}
}
#CODE
if($options_launcher['total_access']){
	
	
$errors   				= array(); 
$data_load['message'] 	= $lang_admin->Error_400;
$data_load['text'] 		= $lang_admin->please_check_details;
$data_load['status']  	= 400;

	$type = PHP_Secure($_REQUEST['type']);
	if($type=='new'){ 

		 
		if (strlen($_POST['title']) < 40 || strlen($_POST['title']) > 120) {
			$data_load['message'] 	= $lang_admin->Error_title;
			$data_load['text'] 		= $lang_admin->Error_title_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		else if(strlen($_POST['description']) < 80 || strlen($_POST['description']) > 200){
			$data_load['message'] 	= $lang_admin->Error_description;
			$data_load['text'] 		= $lang_admin->Error_description_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		else if(strlen($_POST['text']) < 200){
			$data_load['message'] 	= $lang_admin->Error_content;
			$data_load['text'] 		= $lang_admin->Error_content_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		else if (empty($_POST['tags'])) {
			$data_load['message'] 	= $lang_admin->Error_tags;
			$data_load['text'] 		= $lang_admin->Error_tags_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		else if (empty($_FILES["image"]["tmp_name"])) {
			$data_load['message'] 	= $lang_admin->Error_image;
			$data_load['text'] 		= $lang_admin->Error_image_check;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		} 
		else if (empty($_POST['category'])) {
			$data_load['message'] 	= $lang_admin->Error_category;
			$data_load['text'] 		= $lang_admin->gene_selecciona;
			$data_load['status'] 	= 400; 
			$errors[] 				= 'Error';
		}
		
		
		if (empty($errors)) {
			
			
			$file_info   = array(
				'file' => $_FILES['image']['tmp_name'],
				'size' => $_FILES['image']['size'],
				'name' => $_FILES['image']['name'],
				'type' => $_FILES['image']['type'],
				'crop' => array(
					'width' 	=> 600,
					'height' 	=> 400
				)
			);

			$file_upload     = F_ShareFile($file_info);
			$insert          = false;

			if (!empty($file_upload)) {
			
				$insert_data = array(
						'title' 			=> PHP_Secure(F_ShortText($_POST['title'],150)),
						'description' 		=> PHP_Secure(F_ShortText($_POST['description'],200)),
						'content' 			=> htmlspecialchars($_POST['text']),
						'category' 			=> PHP_Secure($_POST['category']),
						'tags' 				=> PHP_Secure($_POST['tags']),
						'image' 			=> PHP_Secure($file_upload),
						'time' 				=> time()
					);
				$post_data             		= $db->insert(T_POST, $insert_data);
				$data_load['message'] 		= $lang_admin->ok_save;
				$data_load['text'] 			= $lang_admin->ok_save_text;
				$data_load['status']  		= 200;
				$data_load['url']     		= $config['site_url'].'/eden/articles';
			}
		}
		 
	
		
	}else if($type=='active'){
		
		$id 					= PHP_Secure($_POST['id']);
		$data 					= $db->where('id',$id)->getOne(T_POST);
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
			
			$update         		= $db->where('id',$id)->update(T_POST,$update_data);
			$data_load['status']  	= 200;
		}else{
			$data_load['status']  	= 400;
		}	
		
	}else if($type=='delete'){
		 
		$id 						= PHP_Secure($_POST['id']);
		$sqli 						= "DELETE FROM ".T_POST." WHERE id = '$id'";
		$status 					= mysqli_query($con, $sqli);
		$status 					= ($status) ? true : false;
		$data_load['status']  		= ($status==true) ? 200 : 400;
		$data_load['url']     		= $config['site_url'].'/eden/articles';
	}else if($type=='edit'){
		
		if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['text']) || empty($_POST['tags']) || empty($_POST['id'])) {
			$data_load['message'] 	= $lang_admin->Error_400;
			$data_load['text'] 		= $lang_admin->please_check_details;
			$data_load['status']  	= 400;
		}else{
			 
			$id          				= PHP_Secure($_POST['id']);
			
			if (strlen($_POST['title']) < 40 || strlen($_POST['title']) > 120) {
				$data_load['message'] 	= $lang_admin->Error_title;
				$data_load['text'] 		= $lang_admin->Error_title_check;
				$data_load['status'] 	= 400; 
				$errors[] 				= 'Error';
			}
			else if(strlen($_POST['description']) < 80 || strlen($_POST['description']) > 200){
				$data_load['message'] 	= $lang_admin->Error_description;
				$data_load['text'] 		= $lang_admin->Error_description_check;
				$data_load['status'] 	= 400; 
				$errors[] 				= 'Error';
			}
			else if(strlen($_POST['text']) < 200){
				$data_load['message'] 	= $lang_admin->Error_content;
				$data_load['text'] 		= $lang_admin->Error_content_check;
				$data_load['status'] 	= 400; 
				$errors[] 				= 'Error';
			}
			else if (empty($_POST['tags'])) {
				$data_load['message'] 	= $lang_admin->Error_tags;
				$data_load['text'] 		= $lang_admin->Error_tags_check;
				$data_load['status'] 	= 400; 
				$errors[] 				= 'Error';
			}
			else if (empty($_POST['category'])) {
				$data_load['message'] 	= $lang_admin->Error_category;
				$data_load['text'] 		= $lang_admin->gene_selecciona;
				$data_load['status'] 	= 400; 
				$errors[] 				= 'Error';
			}
		
			if (empty($errors)) {			
			
			
				$update_data = array(
					'title' 			=> PHP_Secure(F_ShortText($_POST['title'],120)),
					'description' 		=> PHP_Secure(F_ShortText($_POST['description'],200)),
					'content' 			=> htmlspecialchars($_POST['text']),
					'category' 			=> PHP_Secure($_POST['category']),
					'tags' 				=> PHP_Secure(F_ShortText($_POST['tags']),250),
				);
			
				if (!empty($_FILES["image"]["tmp_name"])) {
					$file_info   = array(
						'file' => $_FILES['image']['tmp_name'],
						'size' => $_FILES['image']['size'],
						'name' => $_FILES['image']['name'],
						'type' => $_FILES['image']['type'],
						'crop' => array(
							'width' => 600,
							'height' => 400
						)
					);
					$file_upload     = F_ShareFile($file_info);
					if (!empty($file_upload)) {
						$update_data['image'] = PHP_Secure($file_upload);  
					}else{
						$error = true;
					}
				}

				$update         			= $db->where('id',$id)->update(T_POST,$update_data);
				$data_load['message'] 		= $lang_admin->ok_save;
				$data_load['text'] 			= $lang_admin->ok_save_text;
				$data_load['status'] 		= 200;
				$data_load['url']     		= $config['site_url'].'/eden/articles';
			}
		}
	}
}