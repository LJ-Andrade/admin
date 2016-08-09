<?php
	session_name("renovatio");
	session_cache_expire(15800);
	session_start();

	include_once("../../classes/class.database.php");
	
	/* CONNECTION STARTS */
	$DB = new DataBase();

	/* REDIRECTS IF THERE WAS AN ERROR */
	if(!$DB->Connect())
	{
		header("Location: ../../includes/inc.error.php?error=".$DB->Error);
		die();
	}
	
	include_once("../../classes/class.api.rest.php");
	include_once("../../functions/func.common.php");
	include_dir("../../classes");

	/* MELI REDIRECT URL */
	$MeliURL = 'https://renovatio-cheketo.c9users.io/files/modules/test/landing.php';
	/* MELI NOTIFICATIONS URL */
	$MeliNotificationsURL = 'https://renovatio-cheketo.c9users.io/files/modules/test/notifications.php';
	
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
		if($_SESSION['meli'])
		{
			$Meli = new Meli($_SESSION['meli_application_id'],$_SESSION['meli_secret'],$_SESSION['meli_access_token'],$_SESSION['meli_refresh_token']);
			if($_SESSION['meli_refresh_token'])
			{
				$Meli->refreshMeliToken();
			}
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
