<?php
include('connection.php');
session_destroy();
header('Location: ../index.php');
?>
