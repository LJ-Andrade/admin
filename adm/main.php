<?php
  require('files/config.php');
  switch (isset($_GET['view']) ? $_GET['view'] : null) {
    case 'index':
      require('modules/index.php');
    break;
    case 'clients':
      require('modules/clients.php');
    break;
    case 'client':
      require('modules/clientdata.php');
    break;
    case 'account':
      require('modules/account.php');
    break;
    case 'hostings':
      require('modules/hostings.php');
    break;
    default:
      header('location: modules/index.php?view=error');
    break;
  }

?>
