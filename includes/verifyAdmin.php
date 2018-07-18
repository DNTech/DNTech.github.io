<?php
//CHECK WHETHER USER ALREADY LOGGED IN
	if( !isset($_SESSION["LOGIN_STATUS"]) || !isset($_SESSION["LOGIN_TYPE"]) || !isset($_SESSION["LOGIN_ADMIN_ID"]) ){
		header("location:/admin/login.php");
	}
?>
