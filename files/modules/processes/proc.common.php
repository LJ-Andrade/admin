<?php
    include('../../includes/inc.main.php');
    
    $Action = ucfirst($_REQUEST['action']);
    if($_REQUEST['object'])
    {
        if(strtolower($_REQUEST['object'])!='admindata')
        {
            $Class  = $_REQUEST['object'];
        	$Object = new $Class();
        }else{
        	$Object=$Admin;
        }
        $Object->$Action();
        //var_dump($Object->$Action());
    }
?>