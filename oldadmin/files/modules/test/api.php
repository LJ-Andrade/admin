<?php
  include('../../includes/inc.main.php');

  $Method = $_SERVER['REQUEST_METHOD'];

  switch ($Method) {
    case 'GET':
      if($_GET['access_token'])
      {
        if($_GET['id'])
        {
          $UserFilter = "admin_id=".$_GET['id'];
        }
        $Users    = $DB->fetchAssoc("SELECT","admin_user","*",$UserFilter,"user");
        $Response = '{"status":"200","data":'.json_encode($Users).'}';
      }else{
        $Response = '{"status":"403","message":"Invalid parameters"}';
      }
      print_r(stripslashes($Response));
    break;

    case 'POST':
      // # code...
    break;

    case 'PUT':
      // # code...
    break;

    case 'DELETE':
      // # code...
    break;

    default:
      die('ERROR: NO METHOD GIVEN');
    break;
  }
?>
