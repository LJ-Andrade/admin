<?php

	/* INCLUDES */
	include("../../includes/inc.main.php");

	/* INICIALIZATION */
	$Login	= new Login($_POST['user'],$_POST['password'],$_POST['rememberuser']);
	$Login->setLogin();
	/* PROCESS */
	if($Login->UserExist){ /* User Existence */

		if($Login->IsMaxTries){ /* Attempts to Login */
			$Login->queryMaxTries(); /* Max Tries Reached */
			echo "1";
		}
		else
		{
			if($Login->PassMatch) /* Password Match*/
			{
				$Login->setSessionVars();
				$Login->setCookies();
				$Login->queryLogin();
			}
			else
			{
				$Login->queryPasswordFail(); /* Password does not Match*/
				echo "2";
			}
		}
	}
	else
	{
		$Login->queryWrongUser(); /* Nonexistent User */
		echo "3";
	}
?>
