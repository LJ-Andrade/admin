<?php

session_name('VimanaAdmin');
session_start();
session_cache_expire(15800);

$user = $_SESSION['user'];
$actualUser = fetchAssoc("SELECT * FROM users WHERE user = '$user'");

function checkUser()
{
  if(!$_SESSION['user'])
  {
    header("Location: index.php?msg=accessdenied");
    die();
  }
}

function fetchAssoc($Query)// para hacer SELECT
{
  $host     = 'localhost';
  $user     = 'studiovimana.com';
  $password = 'v8wAb+Uz';
  $database = 'studiovimana_com';

  $mysqli          = mysqli_connect($host, $user, $password, $database);
  $result          = mysqli_query($mysqli , $Query);
  while($Data[]    = mysqli_fetch_assoc($result)){}
  array_pop($Data);
  return $Data;

}

function execQuery($Query)// para hacer INSERT, UPDATE y DELETE
{
  $host     = 'localhost';
  $user     = 'studiovimana.com';
  $password = 'v8wAb+Uz';
  $database = 'studiovimana_com';

  $mysqli       = mysqli_connect($host, $user, $password, $database);
  return mysqli_query($mysqli , $Query);

}

?>
