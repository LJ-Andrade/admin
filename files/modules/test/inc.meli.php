<?php
    session_name('testml');
    session_start();
    // session_destroy();
    // die();
    
    
    require '../../classes/class.meli.php';
    require '../../classes/class.database.php';
    
    $DB = new DataBase();
    $DB->Connect();
    $URL 	= 'https://renovatio-cheketo.c9users.io/files/modules/test/landing.php';
    //$CallBack = 'https://renovatio-cheketo.c9users.io/files/modules/test/landing.php';
    $Meli 	= new Meli('1204162705833882', '9BSgeYbRpo4PCAOaCqYzhEqPo7354DyY', $_SESSION['access_token'], $_SESSION['refresh_token']);
    
    
    $UserData = $DB->fetchAssoc("admin_user","*","admin_id=8");
    $_SESSION['code'] = $UserData[0]['code'];
    $_SESSION['access_token'] = $UserData[0]['access_token'];
    $_SESSION['refresh_token'] = $UserData[0]['refresh_token'];
    $_SESSION['expires_in'] = $UserData[0]['expires_in'];
    
    
    
    if(!$_SESSION['code']){
      header("Location: ".$Meli->getAuthUrl($URL, Meli::$AUTH_URL['MLA']));
      die();
    }else{
    	if(!($_SESSION['access_token']))
    	{
    		// If the code was in get parameter we authorize
    		$UserML = $Meli->authorize($_SESSION['code'], $URL);
    		// Now we create the sessions with the authenticated user
    		$_SESSION['access_token'] = $UserML['body']->access_token;
    		$_SESSION['expires_in'] = time() + $UserML['body']->expires_in;
    		$_SESSION['refresh_token'] = $UserML['body']->refresh_token;
    		$DB->execQuery("UPDATE","admin_user","access_token='".$_SESSION['access_token']."', refresh_token='".$_SESSION['refresh_token']."', expires_in=".$_SESSION['expires_in'],"admin_id=8");
    		//echo "AT".$DB->lastQuery();
    	}else{
        	if($_SESSION['expires_in'] < time())
        	{
        		try
        		{
        			// Make the refresh proccess
        			$Refresh = $Meli->refreshAccessToken();
        			// Now we create the sessions with the new parameters
        			$_SESSION['access_token'] = $Refresh['body']->access_token;
        			$_SESSION['expires_in'] = time() + $Refresh['body']->expires_in;
        			$_SESSION['refresh_token'] = $Refresh['body']->refresh_token;
        			$DB->execQuery("UPDATE","admin_user","access_token='".$_SESSION['access_token']."', refresh_token='".$_SESSION['refresh_token']."', expires_in=".$_SESSION['expires_in'],"admin_id=8");
        			//echo "RT".$DB->lastQuery();
        		}
        		catch (Exception $e)
        		{
        		  	echo "Exception: ",  $e->getMessage(), "\n";
        		}
        	}
    	}
    }
?>