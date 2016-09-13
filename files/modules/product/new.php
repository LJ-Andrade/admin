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
  <div class="box Hidden">
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
      </div><!-- Firs Screen Row -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  <!-- ///////// END FIRST SCREEN ////////// -->



  <div class="box">
    <div class="box-header flex-justify-center">
      <div class="container500">
        <h4 class="subTitleB"><i class="fa fa-tag"></i> Detalles del Producto</h4>
        <form method="post">
          <div class="form-group">
            <input type="name" class="form-control" placeholder="Nombre del Producto">
          </div>
          <div class="row form-group inline-form-custom">
            <div class="col-xs-12 col-sm-4">
              <input type="name" class="form-control" placeholder="Composici&oacute;n">
            </div>
            <div class="col-xs-12 col-sm-4">
              <input type="name" class="form-control" placeholder="C&oacute;digo">
            </div>
            <div class="col-xs-12 col-sm-4">
              <input type="name" class="form-control" placeholder="Precio">
            </div>
          </div>

          <!-- Description (Character Counter)-->
          <div class="form-group textWithCounter">
            <textarea id="description" name="description" class="text-center" placeholder="Descripción" rows="4" maxlength="150"></textarea>
            <div class="indicator-wrapper">
              <p>Caracteres restantes</p>
              <div class="indicator"><span class="current-length">150</span></div>
            </div>
          </div>
          <div class="txC">
            <button type="button" class="btn btnBlue">Continuar</button>
          </div>

        </form>
        <!-- Description (Character Counter) -->
      </div>
    </div>
  </div>


  <!-- Help Modal -->
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
