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

    // Row1 brings 2 data in this case.
    $parts = explode("/", $row1);
    $row1a = $parts[0]; // Id
    $row1b = $parts[1]; // Name

    //  echo "'".$row1a."','".$row1b."','".$row2."','".$row3."','".$row4."','".$row5."'";

    $queryNewRow = execQuery("INSERT INTO hostings (client_id, client, domain, creation, last_paid, value)
     VALUES ('".$row1a."','".$row1b."','".$row2."','".$row3."','".$row4."','".$row5."')");
    header('Location: main.php?view=hostings&msg=createOk');
    die();
  };

  if($_POST['action']=="updateRow")
  {
    $row1  = $_POST['row1']; // Case Hosting is ID
    $row2  = $_POST['row2'];
    $row3  = $_POST['row3'];
    $row4  = $_POST['row4'];
    $row5  = $_POST['row5'];

    $queryUpdateRow = execQuery("UPDATE hostings SET domain='$row2',creation='$row3',last_paid='$row4',value='$row5' WHERE client_id='$row1'");
    header('Location: main.php?view=hostings&msg=updateOk');
    die();
    // echo "UPDATE hostings SET domain='$row2',creation='$row3',last_paid='$row4',value='$row5' WHERE client_id='$row1'";

  };

  if(isset($_GET['deleteRow'])) {
    $rowId = $_GET['deleteRow'];
    execQuery("DELETE FROM hostings WHERE hosting_id = $rowId");
    header('Location: main.php?view=hostings&msg=deleteOk');
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
          HOSTINGS
          <small>| Control de Dominios</small>
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target="#newRow"><i class="glyphicon glyphicon-plus"></i> Nuevo Hosting</button>
                <!-- Form -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="displayTable1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Cliente</th>
                    <th>Dominio</th>
                    <th>Fecha de Creaci&oacute;n</th>
                    <th>&Uacute;ltimo Pago</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                    <th class="Hidden">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $row = fetchAssoc("SELECT * FROM hostings ORDER BY hosting_id DESC");
                      foreach ($row as $DBrow) {
                        echo '<tr>';
                        echo '<td><p class="Hidden">'.$DBrow['client_id'].'</p><span>'.strtoupper($DBrow['client']).'</span></td>';
                        echo '<td><span>'.$DBrow['domain'].'</span></td>';
                        echo '<td><span>'.$DBrow['creation'].'</span></td>';
                        echo '<td><span>'.$DBrow['last_paid'].'</span></td>';
                        echo '<td><b><span>'.$DBrow['value'].'</span></b></td>';
                        echo '<td class="Hidden"><span>'.$DBrow['client_id'].'</span></td>';
                        echo '<td>
                                <button class="btn btn-default btnUpdateRow btnUpdate" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil-square-o"></i></button>
                                <button class="btn btn-default btnDeleteRow row_Id" id="'.$DBrow['hosting_id'].'" data-href="main.php?view=hostings&deleteRow='.$DBrow['hosting_id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></button>
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
          <h4 class="modal-title">Agregar Nuevo Hosting</h4>
          <p>Para ingresar un nuevo hosting debe est&aacute;r ingresado el cliente.</p>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=hostings&msg=createOk" method="post">
            <div class="input-group customForm">
              <label for="">Cliente: </label>
              <?php
                echo '<select class="formSelect" name="row1">';
                $client = fetchAssoc("SELECT * FROM clients");
                foreach($client as $DBclient)
                {
                  $clientId = $DBclient['client_id'];
                  $clientName = $DBclient['bussines'];
                  $client = $clientId. '/' .$clientName;
                  echo '<option value="'.$client.'">'.strtoupper($clientName).'</option>';
                }
                ?>
                </select>
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
              <input type="text" class="form-control" name="row2" placeholder="Dominio">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
              <input type="text" class="form-control" name="row3" placeholder="Fecha de Creaci&oacute;n">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
              <input type="text" class="form-control" name="row4" placeholder="Fecha de &Uacute;ltimo Pago">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="text" class="form-control" name="row5" placeholder="Valor">
            </div>
            <div class="input-group customForm hidden">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input id="col6" type="hidden" class="form-control" name="row6" placeholder="Ubicaci&oacute;n">
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
          <p>EST&Aacute; A PUNTO DE ELIMINAR EL REGISTRO DE UN HOSTING ! <br>
          Asegurese que el mismo haya sido dado de baja en el proveedor correspondiente.</p>
          <p>Proceder?</p>
          <p class="debug-url"></p>
          <p class="test"></p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger btn-ok">BORRAR</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div><!-- delete? -->

  <!-- Modal Update -->
  <div id="update-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar datos de Hosting</h4>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=hostings&msg=updateOk" method="post">
            <div class="input-group customForm Hidden">
              <span class="input-group-addon"></span>
              <input id="col1Id" type="text" class="form-control" name="row1" placeholder="Cliente">
            </div>
            <div class="input-group customForm">
              <label for="">Cliente</label>
              <span class="input-group"></span>
              <input id="col1" type="text" class="form-control"  disabled>
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
              <input id="col2" type="text" class="form-control" name="row2" placeholder="Dominio">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
              <input id="col3" type="text" class="form-control" name="row3" placeholder="Fecha de Creaci&oacute;n">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
              <input id="col4" type="text" class="form-control" name="row4" placeholder="Fecha de &Uacute;ltimo Pago">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input id="col5" type="text" class="form-control" name="row5" placeholder="Valor">
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
  </div><!-- Modal Update -->

  <!-- ///////////////////////////////// -->
<?php include ('files/includes/scripts.php');?>
<script type="text/javascript">
  alertMe("msg=deleteOk", "Registro de Hosting Eliminado", "fa fa-check");
  alertMeOk("msg=updateOk", "Registro de Hosting modificado correctamente", "fa fa-check");
  alertMeOk("msg=createOk", "Hosting agregado correctamente", "fa fa-check");
</script>
</body>
</html>
