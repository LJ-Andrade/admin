<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setStyle('../../../vendors/colorpicker/bootstrap-colorpicker.min.css'); // Color Picker
    $Head->setHead();
    include('../../includes/inc.top.php');


?>
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php echo insertElement("hidden","menues",""); ?>
  <?php echo insertElement("hidden","groups",""); ?>
  <?php echo insertElement("hidden","newimage",$Admin->DefaultImg); ?>

   <div class="box">
    <!--box-success-->
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Complete el formulario</h3>
    </div>
    <! .box-header -->
    <div class="box-body categoryBoxBody">
      <div class="row"><!-- Main Row -->
        <!-- CONTENT -->
        <!-- Categories Menu -->
        <div class="container productCategory1">
          <h4>Seleccione una categor&iacute;a</h4>
          <div class="squareMenuMain">
            <div class="CategoryVehicleTrigger col-lg-3 col-md-6 col-xs-12 squareItemMenu squareYellow">
              <span>Veh&iacute;culos</span>
              <img src="../../../skin/images/body/pictures/category-vehicles.jpg" alt="" />
              <span class="arrow-css Hidden"><div class="squareItemArrowYellow"></div></span>
            </div>
            <div class="CategoryRealStateTrigger col-lg-3 col-md-6 col-xs-12 squareItemMenu squareRed">
              <span>Inmuebles</span>
              <img src="../../../skin/images/body/pictures/category-real-estate.jpg" alt="" />
              <span class="arrow-css Hidden"><div class="squareItemArrowRed"></div></span>
            </div>
            <div class="CategoryServicesTrigger col-lg-3 col-md-6 col-xs-12 squareItemMenu squareBlue">
              <span>Servicios</span>
              <img src="../../../skin/images/body/pictures/category-services.jpg" alt="" />
              <span class="arrow-css Hidden"><div class="squareItemArrowBlue"></div></span>
            </div>
            <div class="CategoryProductsTrigger col-lg-3 col-md-6 col-xs-12 squareItemMenu squareGreen">
              <span>Productos</span>
              <img src="../../../skin/images/body/pictures/category-products.jpg" alt="" />
              <span class="arrow-css Hidden"><div class="squareItemArrowGreen"></div></span>
            </div>
          </div>
        </div>
        <!-- / Categories Menu -->
        <!-- Categories Vehicles -->
        <div class="CategoryVehicles container productCategory2 animated fadeIn Hidden">
          <!-- Item -->
          <div class="categoryList">
            <div class="categoryTitle"><span><b>Veh&iacute;culos</b> | Seleccione una opci&oacute;n</span></div>
            <ul>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <span>
                  <i class="fa fa-check"></i>
                  <button type="button" class="btn btnBlue categorySelectBtn">Continuar</button>
                </span>
              </li>
            </ul>
          </div>
          <!-- / Item -->
        </div>
        <!-- Categories Vehicles -->
        <!-- Categories Real State -->
        <div class="CategoryRealState container productCategory2 animated fadeIn Hidden">
          <!-- Item -->
          <div class="categoryList">
            <div class="categoryTitle"><span><b>Inmuebles</b> | Seleccione una opci&oacute;n</span></div>
            <ul>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <span>
                  <i class="fa fa-check"></i>
                  <button type="button" class="btn btnBlue categorySelectBtn">Continuar</button>
                </span>
              </li>
            </ul>
          </div>
          <!-- / Item -->
        </div>
        <!-- /Categories Real State -->
        <!-- Categories Services -->
        <div class="CategoryServices container productCategory2 animated fadeIn Hidden">
          <!-- Item -->
          <div class="categoryList">
            <div class="categoryTitle"><span><b>Servicios</b> | Seleccione una opci&oacute;n</span></div>
            <ul>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <select name="" size='20' title="Elige una categor&iacute;a">
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                  <option value="">Item 1</option>
                </select>
              </li>
              <li>
                <span>
                  <i class="fa fa-check"></i>
                  <button type="button" class="btn btnBlue categorySelectBtn">Continuar</button>
                </span>
              </li>
            </ul>
          </div>
          <!-- / Item -->
        </div>
        <!-- /Services -->
        <!-- Products -->
        <div class="CategoryProducts container productCategory2 animated fadeIn Hidden">
          <!-- Item -->
          <div class="categoryList">
            <div class="categoryTitle"><span><b>Productos</b> | Seleccione una opci&oacute;n</span></div>
            <div class="form-group">
              <form>
                <div class="form-group">
                  <label for="producto">Seleccione el producto que desea publicar</label>
                  <input type="name" name="producto" class="form-control" placeholder="Ej.: Pijamas, camisones, bombachas...">
                </div>
              </form>
              <button type="button" class="btn btnBlue categorySelectBtn">Continuar</button>
            </div>
          </div>
          <!-- / Item -->
        </div>
        <!-- /Products -->





      </div><!-- Mainrow -->
      <!-- <div class="switchCheckbox text-center">
        <h4>Estado Inicial</h4>
        <input type="checkbox" name="switchCheckbox" data-on-text="Activo" data-off-text="Inactivo" data-label-width="auto" checked>
      </div> -->
    </div><!-- /.box-body -->
    <!-- <div class="box-footer btnRightMobCent">
      <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>
      <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
      <button type="button" class="btn btn-danger btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
    </div> -->
    <!-- box-footer -->
  </div><!-- /.box -->
  <!-- Help Modal Trigger -->
  <button type="button" class="btn btn-success btnGrey" data-toggle="modal" data-target="#helpModal" ><i class="fa fa-question-circle"></i> Ayuda</button>
  <!-- Help Modal Trigger -->
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
            Ayuda sobre categorias
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
$Foot->setScript('../../../vendors/colorpicker/bootstrap-colorpicker.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();


/////////////// Color picker ///////////////////
// Documentation > http://mjolnic.com/bootstrap-colorpicker/
$(".colorpicker").colorpicker();

</script>
