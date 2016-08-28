<?php
  include('process/connection.php');
  checkUser();
  include('files/config.php');

  if($_POST['action']=="newRow")
  {
    $row1 = $_POST['row1'];
    $row2 = $_POST['row2'];
    $row3 = $_POST['row3'];
    $row4 = $_POST['row4'];
    $row5 = $_POST['row5'];
    $row6 = $_POST['row6'];

    $queryNewRow = execQuery("INSERT INTO clients (bussines, client, phone, mail, web, ubication, creation)
    VALUES ('".$row1."','".$row2."','".$row3."','".$row4."','".$row5."','".$row6."',now())");
    header('Location: main.php?view=clients&msg=createOk');
    die();
  };

  if($_POST['action']=="updateRow")
  {
    $row1  = $_POST['row1']; // Empresa
    $row2  = $_POST['row2']; // Contacto
    $row3  = $_POST['row3']; // Telefono
    $row4  = $_POST['row4']; // Email
    $row5  = $_POST['row5']; // Web
    $row6 = $_POST['row6']; // Ubicacion
    $row7 = $_POST['row7']; // ID

    $queryUpdateRow = execQuery("UPDATE clients SET bussines='$row1', client='$row2', phone='$row3',mail='$row4',web='$row5',ubication='$row6' WHERE client_id='$row7'");
    header('Location: main.php?view=clients&msg=updateOk');
    die();

        // echo 'row1 ='.$row1.'<br>';
        // echo 'row2 ='.$row2.'<br>';
        // echo 'row3 ='.$row3.'<br>';
        // echo 'row4 ='.$row4.'<br>';
        // echo 'row5 ='.$row5.'<br>';
        // echo 'row6 ='.$row6.'<br>';
        // echo 'row7 ='.$row7.'<br>';
  };

  if(isset($_GET['deleteRow'])) {
    $rowId = $_GET['deleteRow'];
    execQuery("DELETE FROM clients WHERE client_id = $rowId");
    execQuery("DELETE FROM wap WHERE client_id = $rowId");
    header('Location: main.php?view=clients&msg=deleteOk');
    die();
  };
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
          CLIENTES
          <small>| Informaci&oacute;n y Cuentas Corrientes</small>
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target="#newRow"><i class="glyphicon glyphicon-plus"></i> Nuevo Cliente</button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="displayTable1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Empresa</th>
                    <th>Contacto</th>
                    <th>Tel&eacute;fonos</th>
                    <th>E-Mail</th>
                    <th>Direcci&oacute;n Web</th>
                    <th>Ubicaci&oacute;n</th>
                    <th>Acciones</th>
                    <th class="Hidden">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $row = fetchAssoc("SELECT * FROM clients ORDER BY client_id DESC");
                    foreach ($row as $DBrow) {
                      echo '<tr data-id="'.$DBrow['client_id'].'">';
                      echo '<td><a href="main.php?view=client&client_id='.$DBrow['client_id'].'"><span>'.strtoupper($DBrow['bussines']).'</span></a></td>';
                      echo '<td><span>'.$DBrow['client'].'</span></td>';
                      echo '<td><span>'.$DBrow['phone'].'</span></td>';
                      echo '<td><span>'.$DBrow['mail'].'</span></td>';
                      echo '<td><span>'.$DBrow['web'].'</span></td>';
                      echo '<td><span>'.$DBrow['ubication'].'</span></td>';
                      echo '<td class="Hidden"><span>'.$DBrow['client_id'].'</span></span></td>';
                      echo '<td>
                              <button class="btn btn-default btnUpdateRow btnUpdate" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil-square-o"></i></button>
                              <button class="btn btn-default btnDeleteRow row_Id" id="'.$DBrow['client_id'].'" data-href="main.php?view=clients&deleteRow='.$DBrow['client_id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></button>
                            </td>';
                      echo '</tr>';
                      }
                     ?>
                  </tfoot>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.col-xs-12 -->
          </div><!-- /.box -->
        </div><!-- /.row -->
      </section>
    </div><!-- ./content-wrapper -->
    <?php include ('files/includes/foot.php'); ?>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <!-- /////////////// MODALS ////////////////// -->
  <!-- Modal Create -->
  <div id="newRow" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Nuevo Cliente</h4>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=clients" method="post">
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-building"></i></span>
              <input type="text" class="form-control" name="row1" placeholder="Empresa">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input type="text" class="form-control" name="row2" placeholder="Contacto">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" name="row3" placeholder="Tel&eacute;fonos">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon">@</span>
              <input type="text" class="form-control" name="row4" placeholder="Email">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
              <input type="text" class="form-control" name="row5" placeholder="Web">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" name="row6" placeholder="Ubicaci&oacute;n / Direcci&oacute;n">
            </div>
            <div class="box-footer txR">
              <input type="hidden" name="action" id="action" value="newRow"/>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div><!-- Modal Content -->
    </div>
  </div><!-- addClient -->

  <!-- Modal delete? -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">CONFIRMAR</h4>
        </div>
        <div class="modal-body">
          <h3>EST&Aacute; A PUNTO DE ELIMINAR UN CLIENTE !</h3>
          Desaparecer&aacute; todo lo que est&eacute; asociado al mismo (Datos, Cuentas ctes., Notas, etc.)</p>
          <h4>EST&Aacute; SEGURO?</h4>

        </div>
        <div class="modal-footer">
          <a class="btn btn-danger btn-ok">BORRAR</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div><!-- delete? -->

  <!-- Update Modal -->
  <div id="update-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Cliente</h4>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=clients" method="post">
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-building"></i></span>
              <input id="col1" type="text" class="form-control" name="row1" placeholder="Empresa">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input id="col2" type="text" class="form-control" name="row2" placeholder="Contacto">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input id="col3" type="text" class="form-control" name="row3" placeholder="Tel&eacute;fonos">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon">@</span>
              <input id="col4" type="text" class="form-control" name="row4" placeholder="Email">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
              <input id="col5" type="text" class="form-control" name="row5" placeholder="Web">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input id="col6" type="text" class="form-control" name="row6" placeholder="Ubicaci&oacute;n">
            </div>
            <div class="input-group customForm Hidden">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input id="col7" type="text" class="form-control" name="row7" placeholder="Ubicaci&oacute;n">
            </div>
            <div class="box-footer txR">
              <input type="hidden" name="action" id="action" value="updateRow"/>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Modificar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div><!-- Modal Content -->
    </div>
  </div><!-- addClient -->
  <!-- /Update Modal -->

  <!-- ///////////////////////////////// -->
<?php include ('files/includes/scripts.php');?>
<script type="text/javascript">
  alertMe("msg=deleteOk", "Registro de cliente eliminado", "fa fa-check");
  alertMeOk("msg=updateOk", "Registro de cliente modificado correctamente", "fa fa-check");
  alertMeOk("msg=createOk", "Cliente agregado !", "fa fa-check");
</script>
</body>
</html>
