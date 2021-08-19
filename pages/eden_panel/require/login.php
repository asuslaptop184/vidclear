<?php
	if (!empty($_COOKIE["_admin_user"])) {
		header("Location: " . PHP_Link('eden/'));
	}
