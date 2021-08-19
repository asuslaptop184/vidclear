<?php
 	
	$html_posts   		= '';
	$post_related 		= '';
	$category     		= 0;
 
	$popular_posts = $db->where('active', '1')->orderBy('views', 'DESC')->get(T_POST, 7);

	foreach ($popular_posts as $key => $post) {
		$post_related .= PHP_LoadPage('template/articles/popular', array(
			'ID' 			=> $post->id,
			'LINK' 			=> F_URLSlug($post->title,$post->id),
			'TITLE' 		=> $post->title,
			'IMAGE' 		=> $config['site_url']. '/' .$post->image,
			'DESCRIPTION'	=> $post->description,
			'TIME' 			=> PHP_Time_elapsed($post->time), 
		));
	}
	
 
	
//--> POST	
		$post_id 				= (isset($_GET['id']))?_GetIdFromURL($_GET['id']):0;
		$load->user_article 	= $db->where('id',$post_id)->getOne(T_POST);
		$db->where('id',$post_id);
		$post_data 				= $db->where('id',$post_id)->where('active','1')->getOne(T_POST);
		if(!empty($post_data)){
			$title_text 		= $post_data->title.' | '.$load->config->title;
			$description_text 	= $post_data->description;
			$keyword_text 		= $post_data->tags;
			$image_post 		= PHP_Link('').$post_data->image;
			if(is_numeric($post_id)){
				$db->where('id',$post_id)->where('active','1')->update(T_POST,array('views' => ($post_data->views += 1)));
			}
			$load->post_active 	= false;
			
			$html_posts .= PHP_LoadPage('template/articles/post', array(
				$CODE['ID'] 	= '',
				'ID' 			=> $post_data->id,
				'LINK' 			=> F_URLSlug($post_data->title,$post_data->id),
				'TITLE' 		=> $post_data->title,
				'IMAGE' 		=> $config['site_url']. '/' .$post_data->image,
				'TEXT' 			=> _Decode($post_data->content),
				'CATEGORY' 		=> $post_data->category,
				'TIME' 			=> PHP_Time_elapsed($post_data->time), 
			));
			//-->
			$keyword        = $post_data->title;
			$sql            = "(`title` LIKE '%$keyword%' OR `description` LIKE '%$keyword%' OR `tags` LIKE '%$keyword%')";
			$videos         = $db->where($sql)->orderBy('id', 'DESC')->get(T_POST,7);

			if (empty($videos)){
				$videos     = $db->orderBy('views', 'DESC')->get(T_POST,7);
			}
			
			foreach ($videos as $video) {
	 
				$post_related .= PHP_LoadPage('articles/articles/popular', array(
					'ID' 			=> $post->id,
					'LINK' 			=> F_URLSlug($post->title,$post->id),
					'TITLE' 		=> $post->title,
					'IMAGE' 		=> $config['site_url']. '/' .$post->image,
					'DESCRIPTION' 	=> $post->description,
					'TIME' 			=> PHP_Time_elapsed($post->time)
				));
			}
		} 	
		
		if(empty($_GET['id'])){
			$title_text 			= $lang->blog_articles_text.' | '.$load->config->title;
			$description_text 		= $load->config->description;
			$keyword_text 			= $load->config->keyword;
			$image_post 			= null;
			$post_data   			= $db->where('active', '1')->orderBy('id', 'DESC')->get(T_POST, 10);
			if (!empty($post_data)) {
				$load->post_active 	= true;
		 
				foreach ($post_data as $key => $post) {
					$html_posts .= PHP_LoadPage('template/articles/list_post', array(
						$CODE['ID'] 	= $post->id,
						'ID' 			=> $post->id,
						'LINK' 			=> F_URLSlug($post->title,$post->id),
						'TITLE' 		=> $post->title,
						'IMAGE' 		=> $config['site_url']. '/' .$post->image,
						'DESCRIPTION' 	=> $post->description,
						'TIME' 			=> PHP_Time_elapsed($post->time)
					));
				}
			}	
		}	
		
 
	$load->list_media	= (empty($CODE['ID']))?'':$CODE['ID'];
	$load->load_plugin  = $db->getValue(T_POST, 'count(*)');
	$db->orderBy('id', 'DESC');
	$data = $db->getOne(T_POST);
	$load->load_true  	= (empty($data->id))?0:$data->id;
 
 
	if (!empty($post_data)) {

		$load->page       	= 'page';
		$load->keywords   	= $keyword_text;
		$load->title       	= $title_text;
		$load->description 	= $description_text;
		$load->image_og 	= $image_post;
		$load->content 		= PHP_LoadPage('template/articles/home', array(
			'DATA_POSTS' 		=> $html_posts,
			'TOKEN_S'			=> PHP_fetchToken('mailer'),
			'POST_RELATED' 		=> $post_related,
		));		
	}else{
		header("Location:".PHP_Link('404')."");
		exit();
	} 
