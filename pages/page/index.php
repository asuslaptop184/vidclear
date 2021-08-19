<?php
if (isset($_GET['url'])) {
	$page = PHP_Secure($_GET['page']);
	if($page == 'contsct'){
		if($load->config->contsct === 'off'){
			header("Location: " . PHP_Link(''));
			exit();
		}
	}
	$pages = array('terms','privacy-policy','contsct','dmca');
	if (!in_array($page, $pages)) {
		header("Location: " . PHP_Link(''));
		exit();
	}
	if($page == 'terms'){
		$tex_title 			= $lang->Terms_of_Use;
	}else if($page == 'privacy-policy'){
		$tex_title 			= $lang->Privacy_Palicy;
	}else if($page == 'contsct'){
		$tex_title 			= $lang->Contact_Us;
	}else if($page == 'dmca'){
		$tex_title 			= $lang->DMCA;
	}	
	$load->page       	= 'page';
	$load->keywords   	= $load->config->keyword;
	$load->title       	= $tex_title .' | '. $load->config->title;
	$load->description 	= $tex_title .' | '. $load->config->description;
	$load->content 		= PHP_LoadPage('template/pages/'.$page, array(
		'TOKEN_S' 		=> PHP_fetchToken('mailer'),
		'CONTENT' 		=> _Decode($load->config->$page)
	));		

}else{
	header("Location:../");
		exit();
}
 
