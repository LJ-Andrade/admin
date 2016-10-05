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

  <!-- ///////// FIRST SCREEN ////////// -->
  <div class="CategoryMain box">
    <!--box-success-->
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Complete el formulario</h3>
    </div>
    <! .box-header -->
    <div class="box-body categoryBoxBody">
      <div class="row"><!-- First Screen Row -->
        <!-- CONTENT -->
        <!-- Categories Menu -->
        <div class="container productCategory1">
          <h4>Seleccione una categor&iacute;a (Seccion en desarrollo)</h4>
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
                  <button type="button" class="SelectCategory btn btnBlue categorySelectBtn">Continuar</button>
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
                  <button type="button" class="SelectCategory btn btnBlue categorySelectBtn">Continuar</button>
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
                  <button type="button" class="SelectCategory btn btnBlue categorySelectBtn">Continuar</button>
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
                  <span>
                    <i class="fa fa-check"></i>
                    <button type="button" class="SelectCategory btn btnBlue categorySelectBtn">Continuar</button>
                  </span>
                </li>
              </ul>
            </div>
          </div>
          <!-- / Item -->
        </div>
        <!-- /Products -->
      </div><!-- Firs Screen Row -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->



<?php
$Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
// $Foot->setScript('../../../vendors/colorpicker/bootstrap-colorpicker.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();

/////////////// Color picker ///////////////////
// Documentation > http://mjolnic.com/bootstrap-colorpicker/
// $(".colorpicker").colorpicker();
</script>
