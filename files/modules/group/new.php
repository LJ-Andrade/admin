<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/select2/select2.min.css'); // Select Inputs With Tags
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php echo insertElement("hidden","menues",""); ?>
  <?php echo insertElement("hidden","groups",""); ?>
  <?php echo insertElement("hidden","newimage",$Admin->DefaultImg); ?>
  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-lg-8 col-sm-12">
        <div class="innerContainer">
          <h4 class="subTitleB"><i class="fa fa-plus-circle"></i> Complete los campos para agregar un nuevo grupo</h4>
          <form method="post">
            <!-- <div class="form-group">
              <input type="name" class="form-control" placeholder="Nombre del Producto">
            </div> -->
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-6 inner">
                <label>T&iacute;tulo</label>
                <input type="name" class="form-control" placeholder="Escriba un T&iacute;tulo">
              </div>
              <div class="col-xs-12 col-sm-6 inner">
                <label for="">Asociar Perfiles</label>
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

              <div class="col-xs-12 col-sm-6 inner">
                <label for="">Im&aacute;gen (Opcional)</label>
                <div class="lineContainer txC">

                  <div class="flex-allCenter imgSelector">
                    <div class="imgSelectorInner">
                      <img src="../../../skin/images/body/pictures/groupgen.jpg" class="img-responsive MainImg animated">
                      <input readonly="readonly" id="Fileimage" name="FileField" class="Hidden" type="text">
                      <div style="height: 0px; width: 0px; overflow: hidden;">
                        <input id="image" name="image" class="Hidden" type="file">
                      </div>
                      <div class="imgSelectorContent">
                        <div id="SelectImg">
                          <i class="fa fa-upload"></i><br>
                           <p>Cargar Nueva Imágen</p>
                        </div>
                      </div>
                      <div id="FileimageErrorDiv" class="ErrorText Red"></div>
                      <div id="imageErrorDiv" class="ErrorText Red"></div>
                    </div>
                  </div>
                  <div class="text-bottom">
                    <p><i class="fa fa-upload" aria-hidden="true"></i>
                    Haga Click sobre la im&aacute;gen </br> para cargar una desde su dispositivo</p>
                  </div>

                </div>
              </div>
              <div class="col-xs-12 col-sm-6 inner">
                <label for="">Permisos</label>
                <div class="lineContainer">
                  <ul class="fa-ul txL">
                    <li ><input class="tw-control" type="checkbox"> <i class="fa fa-home"></i> Inicio</li>
                    <li ><input class="tw-control" type="checkbox"><i class="fa-li fa fa-caret-right"></i> <i class="fa fa-cube"></i> Productos </li>
                    <li ><input class="tw-control" type="checkbox"><i class="fa-li fa fa-caret-right"></i> <i class="fa fa-tag"></i> Categorias</li>
                    <li ><input class="tw-control" type="checkbox"><i class="fa-li fa fa-caret-right"></i> <i class="fa fa-cogs"></i> Administracion</li>
                  </ul>
                </div>
              </div>
            </div><!-- inline-form -->
            <hr>
            <div class="txC">
              <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Grupo</button>
              <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php
$Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
$Foot->setScript('../../../vendors/select2/select2.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();
</script>
