<?php
$load->true_eden_panel = true;
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
#CODE
//-->
if (!empty($_COOKIE["_admin_user"])) {
//-->	
	function Eden_page_load($page) {
		switch ($page) {
			case 'logout':
				$page_load = 'logout';
			break;
			case 'login':
				$page_load = 'login';
			break;
			case 'script':
				$page_load = 'page_script';
			break;
			case 'messages':
				$page_load = 'page_message';
			break;
			case 'settings':
				$page_load = 'page_settings';
			break;
			case 'plugins':
				$page_load = 'page_plugins';
			break;
			case 'articles':
				$page_load = 'page_articles';
			break;
			default: 
				$page_load = NULL;
			break;
		}
		return $page_load;
	}
//-->
	if (empty($_GET['page'])) {
		
		require_once './pages/eden_panel/require/page_home.php';
	}else{
		$page = PHP_Secure($_GET['page']);
		$page = Eden_page_load($page);
		require_once './pages/eden_panel/require/'.$page.'.php';
	}
}else{	
	
	require_once './pages/eden_panel/require/page_login.php';

	$load->page        	= 'home';
	$load->title       	= $lang_admin->menu_2 .' - '. $load->config->title;
	$load->description 	= $load->config->description;
	$load->content 		= PHP_LoadPage('template/eden_themes/login', array(
		'HEADER_EDEN' 	=> PHP_LoadPage('template/eden_themes/header'),
		$load->error_login		= $erros_final,
		'EMAIL'					=> $admin_email,
	));
}	