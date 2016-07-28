<?php

	include_once("../../classes/class.database.php");
	include_once("../../classes/class.api.rest.php");
	include_once("../../functions/func.common.php");


	/* CONECTION STARTS */
	switch($_SERVER["HTTP_HOST"]){

		case "localhost":
			$DB = new DataBase();
			break;

		default:
			$DB = new DataBase();
			break;
	}

	/* REDIRECTS IF THERE WAS AN ERROR */
	if(!$DB->Connect()) header("Location: ../../includes/inc.error.php?error=".$DB->Error);

	include_dir("../../classes");

	session_name("renovatio");
	session_cache_expire(15800);
	session_start();

	/* SECURIRTY CHECKS */
	$Security		= new Security();
	if($Security	->checkProfile($_SESSION['admin_id']))
	{
		$Admin 		= new AdminData();
		$Cookies 	= new Login($Admin->User);
		$Cookies->setCookies();

		// $URL 	= 'http://localhost/projects/admin/files/modules/main/process.php';
		// $Meli 		= new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm', $_SESSION['access_token'], $_SESSION['refresh_token']);
		// if(!$_SESSION['code'] && !$_SESSION['access_token']) {
		// 	// Redirects to ML if APP don't have access
		// 	header("Location: ".$Meli->getAuthUrl($URL, Meli::$AUTH_URL['MLA']));
		// 	die();
		// }
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
