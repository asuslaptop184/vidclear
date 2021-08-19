<?php
//Incluyo la configuración

require ("config.php");
require_once ("launcher.php");
//--

mysqli_report(MYSQLI_REPORT_STRICT); 
try { 
	$con = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase); 
} catch (Exception $e) { 
	die(include ("application/includes/error_system/500.php"));
	exit;
}

// UTF-8
mysqli_set_charset($con,'utf8');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './application/system/PHPMailer/Exception.php';
require './application/system/PHPMailer/PHPMailer.php';
require './application/system/PHPMailer/SMTP.php';
$mail = new PHPMailer;
//--
require 'application/system/DB/vendor/autoload.php';
// created the connection
$load     	= ToObject(array());

// Handling Server Errors
$ServerErrors = array();
if (mysqli_connect_errno()) {
    $ServerErrors[] = "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!function_exists('curl_init')) {
    $ServerErrors[] = "PHP CURL is NOT installed on your web server !";
}
if (!extension_loaded('gd') && !function_exists('gd_info')) {
    $ServerErrors[] = "PHP GD library is NOT installed on your web server !";
}
if (!extension_loaded('zip')) {
    $ServerErrors[] = "ZipArchive extension is NOT installed on your web server !";
}
if (!version_compare(PHP_VERSION, '5.4.0', '>=')) {
    $ServerErrors[] = "Required PHP_VERSION >= 5.4.0 , Your PHP_VERSION is : " . PHP_VERSION . "\n";
}
if (isset($ServerErrors) && !empty($ServerErrors)) {
    foreach ($ServerErrors as $Error) {
        echo "<h3>" . $Error . "</h3>";
    }
    die();
} 
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);
$query = $mysqli->query("SET NAMES utf8");
$mysqli->set_charset("utf8");
// Connecting to DB after verfication
$db 				= new MysqliDb($mysqli);
 
$http_header = 'http://';
if (!empty($_SERVER['HTTPS'])) {
    $http_header = 'https://';
}

$load->site_pages = array('home');
$load->actual_link = $http_header . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


//-->	
	$config          		  = PHP_GetConfig();
	$load->loggedin			  = false;
	$config['theme_url']      = $site_url . '/themes/' . $config['theme'];
	$config['site_url']       = $site_url;
	$config['name_site']      = $config['name'];
	$config['des_web']        = $config['description'];
	$config['lang']      	  = $config['language'];
	$config['site_url']       = $site_url;
	$load->config             = ToObject($config);
//-- Language site
	$browser_lang 	= !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
	$browser_lang 	= substr($browser_lang, 0,2);
	$user_lang_file = displayLangSelect(true, $browser_lang);
	if(!empty($_COOKIE["_lang_shareplus"])) {
		$lang_file 	= './application/langs/'.$_COOKIE["_lang_shareplus"].'.php';
	}else if(!empty($user_lang_file)){
		$lang_file 	= './application/langs/'.$user_lang_file.'.php';
	}else{
		$lang_file 	= './application/langs/'.$config['lang'].'.php';
	}
	
	if (file_exists($lang_file)) {
		require($lang_file);
	}
	$lang            = ToObject($lang_text);
//-->
	$lang_file_admin = './application/langs_admin/'.$options_launcher['lang_admin'].'.php';
 
	if (file_exists($lang_file_admin)) {
		require($lang_file_admin);
	}

	$lang_admin            = ToObject($lang_admin_text);
	$config['lang_site']   = $case_lang; 
	 