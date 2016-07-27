<?php

	//Session Starts
	session_name("admin");
	session_start();
	
	
	session_destroy();
	
	//Unset Cookies
	setcookie("admin", "", 0 ,"/");
	setcookie("user", "", 0 ,"/");
	setcookie("password", "", 0 ,"/");
	setcookie("admin_id", "", 0 ,"/");
	setcookie("profile_id", "", 0 ,"/");
	setcookie("first_name", "", 0 ,"/");
	setcookie("last_name", "", 0 ,"/");
	setcookie("password", "", 0 ,"/");
	
	// Redirect
	header("Location: ../login/login.php");
	
?>