<?php

	// /* INCLUDES */
	// include("../../includes/inc.main.php");

	// /* INICIALIZATION */
	// $Login	= new Login($_POST['user'],$_POST['password'],$_POST['rememberuser']);
	// $Login->setLogin();

	// /* PROCESS */
	// if($Login->UserExists)/* User Existence */
	// {
	// 	if($Login->IsMaxTries)/* Attempts to Login */
	// 	{
	// 		$Login->queryMaxTries(); /* Max Tries Reached */
	// 		echo "1";
	// 	}else{
	// 		if($Login->PassMatch) /* Password Match*/
	// 		{
	// 			if($Login->checkCustomer())
	// 			{
	// 				$Login->setSessionVars();
	// 				$Login->setCookies();
	// 				$Login->queryLogin();
	// 			}else{
	// 				echo "4";
	// 			}
	// 		}else{
	// 			$Login->queryPasswordFail(); /* Password does not Match*/
	// 			echo "2";
	// 		}
	// 	}
	// }else{
	// 	$Login->queryWrongUser(); /* Nonexistent User */
	// 	echo "3";
	// }
?>
