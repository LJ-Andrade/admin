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

	//$DB->execQuery("UPDATE","USER","Password='*81F5E21E35407D884A6CD4A731AEBFB6AF209E1B'","User='root'");
	//$VAR = $DB->execQuery("SELECT * FROM admin_user WHERE profile_id=333 ORDER BY last_name");
	//$VAR = $DB->fetchAssoc("admin_user","admin_id,first_name","profile_id=333","last_name,first_name DESC");
	//echo $VAR[2]['first_name'];
	// foreach($VAR as $reg)
	// {
	// 	echo $reg['first_name'];
	// }
	// die();
	// $Users = $DB->fetchAssoc("USER","*");
	// echo "<pre>".print_r(json_encode($Users))."</pre>";
	// die();

	include_once("../../classes/class.api.rest.php");
	include_once("../../library/functions/func.common.php");
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
		// MELI SESSION
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
	/* SETTING MENU OF THE DOCUMENT */
	$Menu = new Menu();
?>
