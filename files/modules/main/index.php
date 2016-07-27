<!DOCTYPE html>
<html>
<head>
<?php include('../../includes/inc.head.php') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include('../../includes/inc.top.header.php') ?><!-- Contains: Top bar > Logo, shrink menu icon, messages, alerts, user, skin tool left menu (button) -->
  <?php include('../../includes/inc.nav.php') ?><!-- Left side column. Contains: Right Menu -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header"><!-- Content Header (Page header and Breadcrums) THIS GOES TO AN INCLUDE  -->
      <h1>
        INICIO
        <small> | Cosas locas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Pagina 1</a></li>

      </ol>
    </section> <!-- Content Header (Page header and Breadcrums) THIS GOES TO AN INCLUDE  -->

    <!-- ////////////// Main content ///////////// -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- ////////////// End Main content ///////////// -->
  <?php include ('../../includes/inc.footer.php'); ?><!-- CopyRight and info fixed footer -->
  <?php include ('../../includes/inc.right.sidebar.php'); ?><!-- Skin tool left menu -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  <?php include ('../../includes/inc.foot.php') ?>
</body>
</html>
