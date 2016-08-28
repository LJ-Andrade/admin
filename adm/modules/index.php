<?php
include('process/connection.php');
include('files/config.php');

checkUser();
  ?>
<!DOCTYPE html>
<html>
<head>
  <?php include ('files/includes/head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <?php include ('files/includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include ('files/includes/sidebar.php') ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo 'Bienvenido '. strtoupper($_SESSION['user']);?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">


            <?php

            $result = fetchAssoc("SELECT COUNT(*) AS clients FROM clients");


            echo '<h3>'.$result[0]['clients'].'</h3>';
             ?>
            <p>N&uacute;mero de Clientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="main.php?view=clients" class="small-box-footer">Ver m&aacute;s <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include ('files/includes/foot.php'); ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include ('files/includes/scripts.php'); ?>
<script type="text/javascript">
  alertRightImg("?msg=logOk","Bienvenid@ <?php echo strtoupper($_SESSION['user']); ?>","<?php echo $actualUser[0]['image']; ?>");
</script>
</body>
</html>
