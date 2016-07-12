<?php
  include("../../includes/inc.main.php");

  if($_GET['code'] || $_SESSION['access_token'])
  {
		// If code exist and session is empty
		if($_GET['code'] && !($_SESSION['access_token']))
		{
			// If the code was in get parameter we authorize
			$user = $Meli->authorize($_GET['code'], $URL);
			
			// Now we create the sessions with the authenticated user
			$_SESSION['access_token'] = $user['body']->access_token;
			$_SESSION['expires_in'] = time() + $user['body']->expires_in;
			$_SESSION['refresh_token'] = $user['body']->refresh_token;
		} else {
			// We can check if the access token in invalid checking the time
			if($_SESSION['expires_in'] < time())
			{
				try {
					// Make the refresh proccess
					$refresh = $Meli->refreshAccessToken();

					// Now we create the sessions with the new parameters
					$_SESSION['access_token'] = $refresh['body']->access_token;
					$_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
					$_SESSION['refresh_token'] = $refresh['body']->refresh_token;
				} catch (Exception $e) {
				  	echo "Exception: ",  $e->getMessage(), "\n";
				}
			}
		}
		if($_GET['code'])
			$_SESSION['code'] = $_GET['code'];
	}
	header("Location: main.php");
	die();
?>