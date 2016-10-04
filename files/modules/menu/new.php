<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php echo insertElement("hidden","menues",""); ?>
  <?php echo insertElement("hidden","groups",""); ?>
  <?php echo insertElement("hidden","newimage",$Admin->DefaultImg); ?>
  <div class="ProductDetails box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-lg-8 col-sm-12">
        <div class="innerContainer">
          <h4 class="subTitleB"><i class="fa fa-plus-circle"></i> Rellene los campos para agregar un nuevo men&uacute;</h4>
          <form method="post">
            <!-- <div class="form-group">
              <input type="name" class="form-control" placeholder="Nombre del Producto">
            </div> -->
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-4 inner">
                <input type="name" class="form-control" placeholder="Nombre de Men&uacute; ">
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <input type="name" class="form-control" placeholder="Tipo de Men&uacute;">
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <input type="name" class="form-control" placeholder="Ruta del Men&uacute;">
              </div>
              <div class="col-xs-12 col-sm-4 txC">
                <div class="custom-input-box">
                  <h4>Perfiles</h4>
                  <span class="label label-primary">Perfil 1</span>
                  <span class="label label-primary">Perfil 2</span>
                  <span class="label label-primary">Perfil 3</span>
                  <span class="label label-primary">Perfil 4</span><br>
                  <button type="button" data-toggle="modal" data-target="#groups-modal" class="btn btnBlue">Seleccionar</button>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="custom-input-box">
                  <h4>Grupos</h4>
                  <span class="label label-primary">Grupo 1</span>
                  <span class="label label-primary">Grupo 2</span>
                  <span class="label label-primary">Grupo 3</span>
                  <span class="label label-primary">Grupo 4</span><br>
                  <button type="button" data-toggle="modal" data-target="#groups-modal" class="btn btnBlue">Seleccionar</button>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 txC">
                <div class="custom-input-box">
                  <h4>&Iacute;cono</h4>
                  <div><i class="fa fa-plus"></i></div>
                  <button type="button"  data-toggle="modal" data-target="#iconModal" class="btn btnBlue">Seleccionar</button>
                </div>
              </div>
            </div>
            <hr>
            <div class="txC">
              <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Nuevo Men&uacute;</button>
              <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Help Modal Trigger -->
  <!-- <button type="button" class="btn btn-success btnGrey" data-toggle="modal" data-target="#helpModal" ><i class="fa fa-question-circle"></i> Ayuda</button> -->

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

  <!-- //// GROUP MODAL //// -->
  <div id="groups-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Seleccione los grupos</i></h4>
        </div>
        <div class="modal-body">
          <?php include ('../../includes/inc.groups.modal.php'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" name="button" class="btn btn-success btnBlue" data-dismiss="modal">Seleccionar</button><br>
        </div>
      </div>
    </div>
  </div>
  <!-- GROUP MODAL -->

  <!-- //// HELP MODAL //// -->
  <!--<div id="helpModal" class="modal fade" role="dialog">
     <div class="modal-dialog">

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
  </div> -->
  <!-- Help Modal -->
<?php
$Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();
</script>
