<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setStyle('../../../vendors/select2/select2.min.css'); // Select Inputs With Tags
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
          <h4 class="subTitleB"><i class="fa fa-plus-circle"></i> Complete los campos para agregar un nuevo men&uacute;</h4>
          <form method="post">
            <!-- <div class="form-group">
              <input type="name" class="form-control" placeholder="Nombre del Producto">
            </div> -->
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-4 inner">
                <label>T&iacute;tulo</label>
                <input type="name" class="form-control" placeholder="Escriba un T&iacute;tulo">
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <label for="">Ubicaci&oacute;n</label>
                <select class="form-control">
                  <option selected disabled>Seleccione... </option>
                  <option>Menu</option>
                  <option>Menu2</option>
                  <option>Menu3</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <label>Link</label>
                <input type="name" class="form-control" placeholder="Escriba la ruta">
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <label for="">Perfil</label>
                <select class="form-control">
                  <option selected disabled>Seleccione un perfil... </option>
                  <option>Perfil </option>
                  <option>Perfil 2</option>
                  <option>Perfil 3</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <label for="">Grupos</label>
                <div class="form-group" id="groups-wrapper">
                  <select class="form-control select2 selectTags" multiple="multiple" data-placeholder="Seleccione los grupos" style="width: 100%;">
                    <option value="op">Opcion</option>
                    <option value="op1">Opcion2</option>
                    <option value="op2">Opcion3</option>
                    <option value="op3">Opcion4</option>
                    <option value="op">Opcion</option>
                    <option value="op1">Opcion2</option>
                    <option value="op2">Opcion3</option>
                    <option value="op3">Opcion4</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 inner">
                <label for="">Icono</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input class="form-control" placeholder="Seleccione un &iacute;cono" type="text">
                </div>
              </div>
              <div class="col-md-12 padL0">
                <div class="col-xs-12 col-sm-4 inner">
                  <label for="">Privacidad </label><br>
                  <input type="checkbox" name="switchCheckbox" data-on-text="P&uacute;blico" data-off-text="Privado" data-size="mini" checked>
                </div>
                <div class="col-xs-12 col-sm-4 inner">
                  <label for="">Tipo  </label><br>
                  <input type="checkbox" name="switchCheckbox" data-on-text="Visible" data-off-text="Oculto" data-size="mini" checked>
                </div>
              </div>


              <!-- <div class="col-xs-12 col-sm-4 txC">
                <div class="custom-input-box">
                  <h4>&Iacute;cono</h4>
                  <div><i class="fa fa-plus"></i></div>
                  <button type="button"  data-toggle="modal" data-target="#iconModal" class="btn btnBlue">Seleccionar</button>
                </div>
              </div> -->

            </div><!-- inline-form -->
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
$Foot->setScript('../../../vendors/select2/select2.min.js');
include('../../includes/inc.bottom.php');
?>
