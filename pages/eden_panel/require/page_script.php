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

		$load->page        	= 'home';
		$load->title       	= $lang_admin->menu_6 .' - '. $load->config->title;
		$load->description 	= $load->config->description;
		$load->content 		= PHP_LoadPage('template/eden_themes/script', array(
			'HEADER_EDEN' 			=> PHP_LoadPage('template/eden_themes/header'),
			'HEADER_MENU_EDEN' 		=> PHP_LoadPage('template/eden_themes/header_menu'),
			'FOOTER_EDEN' 			=> PHP_LoadPage('template/eden_themes/footer'),
		));