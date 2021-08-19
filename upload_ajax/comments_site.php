<?php
if($options_launcher['total_access']){
	$data_load['status']  = 400; 
	$add_action->do_action('Hook_code_plugin_62');
	if (empty($_POST['message']) || empty($_POST['email']) || empty($_POST['first_name']) || empty($_POST['last_name'])){
		$data_load['status']  = 400;
		$add_action->do_action('Hook_code_plugin_61');		
	}else{
		$add_action->do_action('Hook_code_plugin_60');
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $true  = 400; 
        }else{
			$true  = 200;
		}
		$add_action->do_action('Hook_code_plugin_59');
		if($true == 400){
			$data_load['status']  = 400;
			$add_action->do_action('Hook_code_plugin_58');			
		}else{
			$add_action->do_action('Hook_code_plugin_57');
			$status = PHP_add_comments(PHP_Secure($_POST['message']), PHP_Secure($_POST['email']), PHP_Secure($_POST['first_name']), PHP_Secure($_POST['last_name']));
			if($status == 200){
				$data_load['status']  = 200;
				$add_action->do_action('Hook_code_plugin_56');
			}else{
				$data_load['status']  = 400;
				$add_action->do_action('Hook_code_plugin_55');
			}
			$add_action->do_action('Hook_code_plugin_54');
		}
		$add_action->do_action('Hook_code_plugin_53');
	}		
$add_action->do_action('Hook_code_plugin_52');
}