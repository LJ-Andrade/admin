<?php
  // Token validation from Mercado Libre
  session_name('testml');
  session_start();
  require '../../classes/class.meli.php';
  $URL 	= 'http://localhost/projects/admin/files/modules/test/validate_token.php';
  $meli 	= new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm', $_SESSION['access_token'], $_SESSION['refresh_token']);
  if($_SESSION['code'] || $_SESSION['access_token']) {
    // If code exist and session is empty
    if($_SESSION['code'] && !($_SESSION['access_token'])) {
      // If the code was in get parameter we authorize
      $user = $meli->authorize($_SESSION['code'], $URL);
      // Now we create the sessions with the authenticated user
      $_SESSION['access_token'] = $user['body']->access_token;
      $_SESSION['expires_in'] = time() + $user['body']->expires_in;
      $_SESSION['refresh_token'] = $user['body']->refresh_token;
      echo $_SESSION['access_token'];
    }else {
      // We can check if the access token in invalid checking the time
      if($_SESSION['expires_in'] < time()) {
        try {
          // Make the refresh proccess
          $refresh = $meli->refreshAccessToken();

          // Now we create the sessions with the new parameters
          $_SESSION['access_token'] = $refresh['body']->access_token;
          $_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
          $_SESSION['refresh_token'] = $refresh['body']->refresh_token;
          echo $_SESSION['access_token'];
        }catch (Exception $e){
          echo "Exception: ",  $e->getMessage(), "\n";
        }
      }
    }
  }
  echo $_SESSION['access_token'];

?>
