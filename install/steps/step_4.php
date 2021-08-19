<?php
	if (empty($_POST['host']) || empty($_POST['name']) || empty($_POST['username']) || empty($_POST['web']) || empty($_POST['password'])) {
?>			
	<meta http-equiv="Refresh" content="15;url=?action=installation">
	<center>
		<p class="wall_info_p">The information has not been processed correctly, please verify the information. Click here or try again.</p>
	</center>		
<?php			
	}else{

	function PHP_Secure_INS($string, $censored_words = 1) {
		$string = trim($string);
		$string = htmlspecialchars($string, ENT_QUOTES,'UTF-8');
		$string = str_replace('\r\n', " <br>", $string);
		$string = str_replace('\n\r', " <br>", $string);
		$string = str_replace('\r', " <br>", $string);
		$string = str_replace('\n', " <br>", $string);
		$string = str_replace('&amp;#', '&#', $string);
		$string = stripslashes($string);
		return $string;
	}
		
	$config_file_name 	= 'config.php';
	$host 				= PHP_Secure_INS($_POST['host']);
	$name 				= PHP_Secure_INS($_POST['name']);
	$username 			= PHP_Secure_INS($_POST['username']);
	$password 			= PHP_Secure_INS($_POST['password']);
	$web 				= PHP_Secure_INS($_POST['web']);
	$text 				= '<?php

// +------------------------------------------------------------------------+
// | @author_email: game123727@gmail.com   
// +------------------------------------------------------------------------+
// | Videoit - Proudly created with PHP.
// | Copyright (c) 2020 Videoit. All rights reserved.
// +------------------------------------------------------------------------+
/*
Any doubt or failure in the system takes a capture and sends the creator in support
*/

//header("Location:install.php");

ob_start();
#----> Host name
$dbhost			= \''.$host.'\';
#----> Batabase name
$dbdatabase		= \''.$name.'\'; 
#----> User of the DB
$dbuser			= \''.$username.'\';
#----> Password of the DB
$dbpassword		= \''.$password.'\'; 

// URL web
$site_url = \''.$web.'\';

?>';
				
	$fp = fopen('config.php', 'w');
	fwrite($fp, $text);
	fclose($fp);
 
	
	$con = mysqli_connect($host, $username, $password);
	// Check connection

	// ...some PHP code for database "my_db"...

	// check the connection
	if (!$con){
			die('error');
		exit;
	}

	/* User datos */
	// Change database to "test"
	$bdselect = mysqli_select_db($con, $name);

	if (!$bdselect) { 
	// this function is to know if the system is installed
		if (!file_exists('install.php')) {
			die("ERROR TO BE CONNECTED WITH THE SERVER");
		}else{
			die(include ("install.php"));
		}
		exit;
	}
	
	// Name of the file
       $filename = 'db.sql';
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
           // Skip it if it's a comment
           if (substr($line, 0, 2) == '--' || $line == '')
              continue;
           // Add this line to the current segment
           $templine .= $line;
           $query = false;
           // If it has a semicolon at the end, it's the end of the query
           if (substr(trim($line), -1, 1) == ';') {
              // Perform the query
              $query = mysqli_query($con, $templine);
              // Reset temp variable to empty
              $templine = ''; 
           }
        }

?>
	<meta http-equiv="Refresh" content="30;url=?action=admin">
	<center>
		<p class="wall_info_p">Information is being processed, please wait 15 to 45 seconds.</p>
	</center>
<?php } ?>	