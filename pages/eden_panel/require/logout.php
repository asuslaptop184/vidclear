<?php
	$s = 3600; // seconds in a year
	setcookie("_admin_user", trim(''), time() + $s, '/', null, null, true);
	session_destroy();
	header("Location:./");
	exit('<meta http-equiv="Refresh" content="0;url=./">');
 