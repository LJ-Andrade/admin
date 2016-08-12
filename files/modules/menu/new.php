<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetLinkTitle());
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php echo insertElement("hidden","menues",""); ?>
  <?php echo insertElement("hidden","groups",""); ?>
  <?php echo insertElement("hidden","newimage",$Admin->DefaultImg); ?>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Complete el formulario para crear un nuevo men&uacute;</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger">T&iacute;tulo</button>
              </div>
              <!-- /btn-group -->
              <input class="form-control" type="text" placeholder="Ingrese el nombre del Men&uacute;">
            </div>
          </div>
          <!-- <div class="form-group">
            <input type="text" class="form-control" placeholder="T&iacute;tulo del Men&uacute;">
          </div> -->
          <div class="form-group">
            <select class="form-control">
              <option>Men&uacute; Principal</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" >Link</button>
              </div>
              <!-- /btn-group -->
              <input class="form-control" type="text" placeholder="Especifique la ruta del Men&uacute;">
            </div>
          </div>
          <div class="form-group">
            <select class="form-control selectpicker">
              <option>Activo</option>
              <option>Inactivo</option>
              <option>Oculto</option>
            </select>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger">Posici&oacute;n</button>
              </div>
              <!-- /btn-group -->
              <input class="form-control" type="text" placeholder="Ingrese la posici&oacute;n">
            </div>
          </div>
          <div class="iconMenu">
            <span class="iconMenuText">&Iacute;cono Actual: </span><span class="iconMenuIcon"><i class="fa fa-coffee"></i></span>
          </div>
          <button type="button" name="button" class="btn btnBlue" data-toggle="modal" data-target="#iconModal">Seleccionar &Iacute;cono</button>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer btnRightMobCent">
      <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>
      <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
      <button type="button" class="btn btn-danger btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
    </div><!-- box-footer -->
  </div><!-- /.box -->
  <!-- Help Modal Trigger -->
  <button type="button" class="btn btn-success btnGrey" data-toggle="modal" data-target="#helpModal" ><i class="fa fa-question-circle"></i> Ayuda</button>

  <!-- Help Modal Trigger -->
  <!-- //// ICON MODAL //// -->
  <div id="iconModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Seleccione un &Iacute;cono</i></h4>
        </div>
        <div class="modal-body">
          <div class="pull-right">
            <button type="button" name="button" class="btn btn-success btnBlue" data-dismiss="modal">Seleccionar</button>
          </div>
          <div class="iconModalContent">
            <?php include ('../../includes/inc.icons.php'); ?>
            <!-- ///////// JS of this is in menu/main.js ////////////-->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" name="button" class="btn btn-success btnBlue" data-dismiss="modal">Seleccionar</button><br>
        </div>
      </div>
    </div>
  </div>
  <!-- Help Modal -->
  <!-- //// HELP MODAL //// -->
  <div id="helpModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayuda para el usuario</i></h4>
        </div>
        <div class="modal-body">
          <p>
            Ayuda sobre Men&uacute;es
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" name="button" class="btn btn-success btnBlue" data-dismiss="modal">Comprendido</button><br>
        </div>
      </div>
    </div>
  </div>
  <!-- Help Modal -->
<?php
$Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();
</script>
