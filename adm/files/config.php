<?php
// Creation Date 12/07/2016
// Author: Leandro Andrade (JavZero)

date_default_timezone_set("America/Argentina/Buenos_Aires");

// Constantes
define('APP_URL','http://localhost/33/'); // Author
define('PAGE_TITLE','VimanaAdmin'); // Page title
define('APP_TITLE','VimanaAdmin <span style="font-size: 15px; vertical-align: text-top">&reg;<span>'); // App title
define('HTML_DIR','modules/');
define('APP_AUTHOR','Studio Vimana'); // Author
// Actual Version
define('APP_VERSION','Versi&oacute;n 1.0 | 25/07/2016');

// Version History
//----------------------------------------------------
// Versi&oacute;n 0.5 | 19/07/2016 // Ended 25/07/16
// CRUD System
// New Modules: Clients | Client Accounts | Hostings
//----------------------------------------------------
// Versión 0.1 // Ended 19/07/2016
// Root Logic
// User Login
//----------------------------------------------------

///////// To Do /////////
// Creation of Users
// General Account
// Content To Web

$thisPageIs = $_GET['view'];

switch ($thisPageIs) {
  case 'clients':
      $youAreHere = 'clients';
    break;
  case 'client':
      $youAreHere = 'clients';
    break;
  case 'account':
      $youAreHere = 'account';
    break;
  case 'hostings':
      $youAreHere = 'hostings';
    break;
  default:
      $youAreHere = 'index';
    break;
    return $youAreHere;
}

require('functions/common.php');
?>
