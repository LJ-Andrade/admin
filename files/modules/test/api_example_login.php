<?php
  if($_GET['action']=="login"){
    session_name('testml');
    session_start();
    require '../../classes/class.meli.php';
    $Meli         = new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm', $_SESSION['access_token'], $_SESSION['refresh_token']);
    $URL 	= 'http://localhost/projects/admin/files/modules/test/test.php';
    if(!$_SESSION['code']){
      header("Location: ".$Meli->getAuthUrl($URL, Meli::$AUTH_URL['MLA']));
      die();
    }

    if($_GET['code'] && !$_SESSION['code'])
    	$_SESSION['code'] = $_GET['code'];


  	// If code exist and session is empty
  	if($_SESSION['code'] && !($_SESSION['access_token'])) {

  		// If the code was in get parameter we authorize
  		$user = $Meli->authorize($_SESSION['code'], $URL);
  		// Now we create the sessions with the authenticated user
  		$_SESSION['access_token'] = $user['body']->access_token;
  		$_SESSION['expires_in'] = time() + $user['body']->expires_in;
  		$_SESSION['refresh_token'] = $user['body']->refresh_token;
    }
    header("Location: api_example.php");
    die();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Api Example</title>
  </head>
  <body>
    <button type="button" name="btn" id="btn">Log In</button>
  </body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <script type="text/javascript">
    $(function(){
      $("#btn").click(function(){
        document.location = "api_example_login.php?action=login";
      });
    });
  </script>
</html>
