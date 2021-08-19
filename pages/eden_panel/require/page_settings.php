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

	$load->get_page 			= (empty($_GET['pages']))?'':PHP_Secure($_GET['pages']);

	if($load->get_page=='terms_of_use' || $load->get_page=='privacy_policy' || $load->get_page=='copyright'){
//-->		
		$content_page 	= 'pages';

	}else if($load->get_page == 'password'){
//-->		
		$content_page 	= 'password';
		$load->get_page = 'admin_setting';
	}else if($load->get_page == 'phpmailer'){
//-->
		$content_page 	= 'phpmailer';

	}else{
//-->		
		$content_page 	= 'settings';
		$load->get_page = 'general';
	}
	$load->page        	= 'home';
	$load->title       	= $lang_admin->menu_7 .' - '. $load->config->title;
	$load->description 	= $load->config->description;
	$load->content 		= PHP_LoadPage('template/eden_themes/settings/' . $content_page, array(
		'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
		'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
		'JS_DATA' 				=> PHP_LoadPage('template/eden_themes/settings/js'),
		'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
	));