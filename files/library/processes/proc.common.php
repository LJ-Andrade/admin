<?php
    include('../../includes/inc.main.php');
    
    if($_GET['action'])
    {
        $Action = $_GET['action'];
    }elseif($_POST['action']){
        $Action = $_POST['action'];
    }
    $Action = ucfirst($Action);
    if($_REQUEST['object'])
    {
        if(strtolower($_REQUEST['object'])!='admindata')
        {
            $Class  = $_REQUEST['object'];
        	$Object = new $Class();
        }else{
        	$Object = $Admin;
        }
        $Object->$Action();
        //var_dump($Object);
    }
?>