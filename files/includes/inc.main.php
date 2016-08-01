<?php

	include_once("../../classes/class.database.php");
	include_once("../../classes/class.api.rest.php");
	include_once("../../functions/func.common.php");


	/* CONECTION STARTS */
	$DB = new DataBase();

	/* REDIRECTS IF THERE WAS AN ERROR */
	if(!$DB->Connect())
	{
		header("Location: ../../includes/inc.error.php?error=".$DB->Error);
		die();
	}

	include_dir("../../classes");

	session_name("renovatio");
	session_cache_expire(15800);
	session_start();

	/* SECURIRTY CHECKS */
	$Security		= new Security();
	if($Security->checkProfile($_SESSION['admin_id']))
	{
		$Admin 		= new AdminData();
		$Cookies 	= new Login($Admin->User);
		$Cookies->setCookies();
		if(!$Security->checkCustomer($_SESSION['customer_id']))
		{
			header("Location: ../login/process.logout.php?error=customer");
			die();
		}
	}

	/* ADDING SLASHES TO PUBLIC VARIABLES */
	$_POST	= AddSlashesArray($_POST);
	$_GET	= AddSlashesArray($_GET);

	/* SETTING HEAD OF THE DOCUMENT */
	$Head	= new Head();
	$Head	-> setFavicon("../../../skin/images/body/icons/favicon.png");

	/* SETTING FOOT OF THE DOCUMENT */
	$Foot	= new Foot();
?>
