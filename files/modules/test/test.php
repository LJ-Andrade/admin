<?php 
    include_once('inc.meli.php');
    $Params = array('access_token'=>$_SESSION['meli_access_token']);
    $Result = $Meli->get('/users/me',$Params);
    $Me     = $Result['body'];
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <pre>
            <?php print_r($_SESSION); ?>
        </pre>
        <pre>
            <?php print_r($Result); ?>
        </pre>
    </body>    
</html>
