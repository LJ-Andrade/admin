<?php
    include_once('../../includes/inc.main.php');
    
    if($_GET['code'])
    {
        $_SESSION['meli_code'] = $_GET['code'];
        $Update = $DB->execQuery("UPDATE","admin_user","meli_code='".$_SESSION['meli_code']."'","admin_id=".$_SESSION['admin_id']);
        //echo $DB->lastQuery()."<br><br>";
        if(!($_SESSION['meli_access_token']))
    	{
    		// If the code was in get parameter we authorize
    		$UserML = $Meli->authorize($_SESSION['meli_code'], $MeliURL);
    		$_SESSION['meli_access_token'] = $UserML['body']->access_token;
    		$_SESSION['meli_expires_in'] = time() + $UserML['body']->expires_in;
    		$_SESSION['meli_refresh_token'] = $UserML['body']->refresh_token;
    		
    		$DB->execQuery("UPDATE","admin_user","meli_access_token='".$_SESSION['meli_access_token']."', meli_refresh_token='".$_SESSION['meli_refresh_token']."', meli=1, meli_expires_in=".$_SESSION['meli_expires_in'],"admin_id=".$_SESSION['admin_id']);
    	    header("Location: ../main/main.php");
    	    //echo $DB->lastQuery();
    	    //echo "<pre>".var_dump($UserML)."</pre>";
            die();
    	}
    }
    
    
?>