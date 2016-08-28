<?php // header("Location: modules/login.php"); die(); ?>
<?php

require('files/config.php');

if(isset($_GET['view'])) {
  if(file_exists('files/controllers/' . strtolower($_GET['view']) . 'controller.php')) {
    include('files/controllers/' . strtolower($_GET['view']) . 'controller.php');
    } else {
      header('location: main.php?view=index&?msg=logError');
    }
} else {
  include('modules/login.php');
}

?>
