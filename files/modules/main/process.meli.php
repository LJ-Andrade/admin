<?php
    include('../../includes/inc.main.php');
    
    if($_GET['sync']=='no')
    {
        $_SESSION['meli'] = false;
        unset($_SESSION['meli_code']);
        unset($_SESSION['meli_access_token']);
        unset($_SESSION['meli_refresh_token']);
        unset($_SESSION['meli_expires_in']);
        $DB->execQuery("UPDATE","admin_user","meli=0,meli_access_token='',meli_refresh_token='', meli_code='',meli_expires_in='0'","admin_id=".$_SESSION['admin_id']);
        header("Location: ../main/main.php");
    }else{
        /// MELI LOGIN
        $_SESSION['meli'] = true;
        $Meli = new Meli($_SESSION['meli_client_id'],$_SESSION['meli_secret']);
        header("Location: ".$Meli->getAuthUrl($MeliURL, Meli::$AUTH_URL['MLA']));
    }
    die();
?>