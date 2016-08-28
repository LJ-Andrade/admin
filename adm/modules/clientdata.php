<?php
include('process/connection.php');
checkUser();
include('files/config.php');

$Client = $_GET['client_id'];
$clientArray = fetchAssoc("SELECT * FROM clients WHERE client_id = $Client");
$clientId = $clientArray[0]['client_id'];
$clientName = $clientArray[0]['bussines'];

if($_POST['action']=="newWop")
{
  $row1 = $_POST['row1'];
  $row2 = $_POST['row2'];
  $row3 = $_POST['row3'];
  $row4 = $_POST['row4'];

  $queryNewRow = execQuery("INSERT INTO wap (client_id, work, cost, dateS, status) VALUES ('".$Client."','".$row1."','".$row2."','".$row3."','".$row4."')");
  header("Location: main.php?view=client&client_id=$Client");
  die();
  //  echo "'".$row1."','".$row2."','".$row3."','".$row4."'";
};

if($_POST['action']=="newPayment")
{
  $row1 = $_POST['row1'];
  $row2 = $_POST['row2'];
  $row3 = $_POST['row3'];
  $row4 = $_POST['row4'];

  $queryNewRow = execQuery("INSERT INTO wap (client_id, payment, amount, dateS, status) VALUES ('".$Client."','".$row1."','".$row2."','".$row3."','".$row4."')");
  header("Location: main.php?view=client&client_id=$Client");
  die();
  //  echo "'".$row1."','".$row2."','".$row3."','".$row4."'";
};

if($_POST['action']=="updateRow")
{

  $row1 = $_POST['row1']; // ID
  $row2 = $_POST['row2']; // Work
  $row3 = $_POST['row3']; // Cost
  $row4 = $_POST['row4']; // Payment
  $row5 = $_POST['row5']; // Ammount
  $row6 = $_POST['row6']; // Date
  $row7 = $_POST['row0']; // Status

  $queryUpdateRow = execQuery("UPDATE wap SET work='$row2',cost='$row3',payment='$row4',amount='$row5',dateS='$row6',status='$row7' WHERE wap_id='$row1'");
  header('Location: main.php?view=client&client_id='.$Client.'&msg=updateOk');
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
  execQuery("DELETE FROM wap WHERE wap_id = $rowId");
  header('Location: main.php?view=client&client_id='.$Client.'&msg=deleteOk');
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
          CLIENTE: <?php echo $clientName ?>
          <small>| Trabajos y Pagos</small>
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target="#addRow"><i class="glyphicon glyphicon-plus"></i> Trabajo</button>
                <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target="#addRow2"><i class="glyphicon glyphicon-plus"></i> Pago</button>
                <!-- Form -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="displayTable1" class="table table-bordered table-hover noOrdering">
                  <thead>
                  <tr class="rowTableStyle">
                    <th class="Hidden">Id</th>
                    <th class="tableRowTitle">Trabajo</th>
                    <th class="tableRowTitle">Costo</th>
                    <th class="tableRowTitle">Detalle de Pago</th>
                    <th class="tableRowTitle">Abonado</th>
                    <th class="tableRowTitle">Fecha</th>
                    <th class="tableRowTitle">Estado</th>
                    <th class="tableRowTitle">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $row = fetchAssoc("SELECT * FROM wap WHERE client_id = $Client ORDER BY client_id DESC");
                      foreach ($row as $DBrow) {
                        echo '<tr class="rowTableStyle">';
                        echo '<td class="Hidden"><span>'.$DBrow['wap_id'].'</span></td>';
                        echo '<td class="tableArow"><span>'.$DBrow['work'].'</span></td>';
                        echo '<td class="tableArow"><span>'.$DBrow['cost'].'</span></td>';
                        echo '<td class="tableBrow"><span>'.$DBrow['payment'].'</span></td>';
                        echo '<td class="tableBrow"><span>'.$DBrow['amount'].'</span></td>';
                        echo '<td class="tableCrow"><span>'.$DBrow['dateS'].'</span></td>';
                        echo '<td class="tableCrow"><span>'.$DBrow['status'].'</span></td>';
                        echo '<td class="tableCrow">
                                <button class="btn btn-default btnUpdateRow btnUpdate" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil-square-o"></i></button>
                                <button class="btn btn-default btnDeleteRow row_Id" id="'.$DBrow['wap_id'].'" data-href="main.php?view=client&client_id='.$Client.'&deleteRow='.$DBrow['wap_id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></button>
                              </td>';
                        echo '</tr>';
                      }
                    ?>
                  </tfoot>
                  <thead class="rowTableResult">
                    <th></th>
                    <th>SubTotal Ventas</th>
                    <th></th>
                    <th>SubTotal Pagos</th>
                    <th></th>
                    <th>DEBE</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <td></td>
                    <td class="tableSubTot"><?php $sumCost = fetchAssoc("SELECT SUM(cost) FROM wap WHERE client_id = '$Client' ");
                              $sumCostRes = $sumCost[0]['SUM(cost)'];
                              echo '<b>$</b>&nbsp;&nbsp;'.$sumCostRes; ?>
                    </td>
                    <td></td>
                    <td class="tableSubTotPayment"><?php $sumAmount = fetchAssoc("SELECT SUM(amount) FROM wap WHERE client_id = '$Client' ");
                              $sumAmountRes = $sumAmount[0]['SUM(amount)'];
                              echo '<b>$</b>&nbsp;&nbsp;'.$sumAmountRes; ?>
                    </td>
                    <td></td>
                    <td class="tableSubTotDebt"><?php $debt = $sumCostRes - $sumAmountRes; echo '<b>$</b>&nbsp;&nbsp;'.$debt; ?></td>
                    <td></td>
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
  <!-- Modal INGRESAR NUEVO TRABAJO -->
  <div id="addRow" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Nuevo Trabajo</h4>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=client&client_id=<?php echo $Client ?>" method="post">
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-cog"></i></span>
              <input type="text" class="form-control" name="row1" placeholder="Trabajo">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="number" set min="0" class="form-control" name="row2" placeholder="Costo">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control" name="row3" placeholder="Fecha">
            </div>
            <div class="form-group">
             <label for="sel1">Estado:</label>
             <select class="form-control" name="row4" id="">
               <option>En espera</option>
               <option>En proceso</option>
               <option>Terminado</option>
             </select>
            </div>
            <div class="box-footer txR">
              <input type="hidden" name="action" id="action" value="newWop"/>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div><!-- Modal Content -->
    </div>
  </div><!-- addRow -->
  <!-- Modal INGRESAR PAGO -->
  <div id="addRow2" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingresar Pago</h4>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=client&client_id=<?php echo $Client ?>" method="post">
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span>
              <input type="text" class="form-control" name="row1" placeholder="M&eacute;todo de Pago">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="number" set min="0" class="form-control" name="row2" placeholder="Monto">
            </div>
            <div class="input-group customForm">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control" name="row3" placeholder="Fecha">
            </div>
            <div class="form-group">
             <label for="sel1">Estado:</label>
             <select class="form-control" name="row4" id="">
               <option>Esperando Acreditaci&oacute;n</option>
               <option>Pagado</option>
             </select>
            </div>
            <div class="box-footer txR">
              <input type="hidden" name="action" id="action" value="newPayment"/>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div><!-- Modal Content -->
    </div>
  </div><!-- addRow -->

  <!-- Modal delete? -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">CONFIRMAR</h4>
        </div>
        <div class="modal-body">
          <p>EST&Aacute; A PUNTO DE ELIMINAR UN PAGO/TRABAJO <br> </p>
          <p>EST&Aacute; SEGURO?</p>
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
          <h4 class="modal-title">Editar Trabajo o Pago</h4>
        </div>
        <div class="modal-body">
          <form class="" action="main.php?view=client&client_id=<?php echo $Client ?>&msg=updateOk" method="post">
            <div class="input-group customForm Hidden">
              <label for="col1">Id</label>
              <input id="col1" type="text" class="form-control" name="row1" placeholder="Vac&iacute;o">
            </div>
            <div class="input-group customForm">
              <label for="col1">Trabajo</label>
              <input id="col2" type="text" class="form-control" name="row2" placeholder="Vac&iacute;o">
            </div>
            <div class="input-group customForm">
              <label for="col2">Costo</label>
              <input id="col3" type="number" set min="0" class="form-control" name="row3" placeholder="Vac&iacute;o">
            </div>
            <div class="input-group customForm">
              <label for="col3">Detalle de Pago</label>
              <input id="col4" type="text" class="form-control" name="row4" placeholder="Vac&iacute;o">
            </div>
            <div class="input-group customForm">
              <label for="col4">Monto</label>
              <input id="col5" type="number" set min="0" class="form-control" name="row5" placeholder="Vac&iacute;o">
            </div>
            <div class="input-group customForm">
              <label for="col4">Fecha</label>
              <input id="col6" type="text" class="form-control" name="row6" placeholder="Vac&iacute;o">
            </div>
            <div class="form-group">
             <label for="sel1">Estado:</label>
             <select class="form-control" name="row0" id="">
               <option>En espera</option>
               <option>En proceso</option>
               <option>Terminado</option>
             </select>
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
  alertMe("msg=deleteOk", "Registro de Pago/Trabajo eliminado", "fa fa-check");
  alertMeOk("msg=updateOk", "Registro dePago/Trabajo modificado correctamente", "fa fa-check");
  alertMeOk("msg=createOk", "Pago/Trabajo agregado correctamente", "fa fa-check");

</script>
</body>
</html>
