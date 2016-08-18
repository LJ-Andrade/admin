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

   <div class="box"> <!--box-success-->
    <div class="box-header with-border">
      <h3 class="box-title">Complete el formulario</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="flex-allCenter innerContainer">
            <div class="mw100">
              <h4 class="subTitleB"><i class="fa fa-tag"></i> Datos Principales</h4>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Nombre del Producto">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="C&oacute;digo">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Composici&oacute;n">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Precio">
              </div>
            <!-- Description (Character Counter)-->
            <div class="form-group textWithCounter">
              <textarea id="description" name="description" class="text-center" placeholder="Descripción" rows="4" maxlength="150"></textarea>
              <div class="indicator-wrapper">
                <p>Caracteres restantes</p>
                <div class="indicator"><span class="current-length">150</span></div>
              </div>
            </div>
            <!-- Description (Character Counter) -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="innerContainer">
            <h4 class="subTitleB"><i class="fa fa-tag"></i> Talles</h4>
            <div class="flex-allCenter form-group boxed-horiz-list">
              <div>
                <ul>
                  <li><input id="sizeXS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXS"><span>XS</span></li>
                  <li><input id="sizeS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeS"><span>S</span></li>
                  <li><input id="sizeM" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeM"><span>M</span></li>
                  <li><input id="sizeL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeL"><span>L</span></li>
                  <li><input id="sizeXL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXL"><span>XL</span></li>
                  <li><input id="sizeXXL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXXL"><span>XXL</span></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="innerContainer">
            <h4 class="subTitleB"><i class="fa fa-tag"></i> Colores</h4>
            <!-- Color Picker -->
            <div class="form-group">
              <div class="row colorPickerMain colorPickerCatalogue">
                <div class="col-md-12">
                  <div class="activeColors">
                    <h4>Colores del Producto</h4>
                    <ul>
                      <!-- Active Color Item -->
                      <li>
                        <div class="deleteColor animated fadeIn"><span class=""><i class="fa fa-trash"></i></span></div>
                        <div class="input-group colorpicker colorpicker-element">
                          <div class="input-group-addon">
                            <i></i>
                          </div>
                        </div>
                      </li>
                      <!-- /Active Color Item -->
                      <!-- Active Color Item -->
                      <li>
                        <div class="deleteColor animated fadeIn"><span class=""><i class="fa fa-trash"></i></span></div>
                        <div class="input-group colorpicker colorpicker-element">
                          <div class="input-group-addon">
                            <i></i>
                          </div>
                        </div>
                      </li>
                      <!-- /Active Color Item -->
                      <!-- Color Palette Icon-->
                      <li>
                        <div class="addNewColor">
                          <img src="../../../skin/images/body/icons/colorpicker.png" alt="" />
                        </div>
                      </li>
                      <!-- /Color Palette Icon-->
                    </ul>
                  </div><!-- activeColors -->
                </div><!-- col-md-12 -->
                <div class="col-md-12">
                  <div class="favouriteColors">
                    <div class="useFavColorUp"><i class="fa fa-arrow-circle-o-up"></i></div>
                    <h4>Colores Favoritos</h4>
                    <ul>
                      <!-- Favourite Color -->
                      <li>
                        <div class="favouriteColor animated fadeIn"><span class=""><i class="fa fa-arrow-up"></i></span></div>
                        <div class="deleteColor animated fadeIn"><span class=""><i class="fa fa-trash"></i></span></div>
                        <div class="input-group colorpicker colorpicker-element">
                          <div class="input-group-addon">
                            <i></i>
                          </div>
                        </div>
                      </li>
                      <!-- Favourite Color -->
                      <!-- /Favourite Color -->
                      <li>
                        <div class="favouriteColor animated fadeIn"><span class=""><i class="fa fa-arrow-up"></i></span></div>
                        <div class="deleteColor animated fadeIn"><span class=""><i class="fa fa-trash"></i></span></div>
                        <div class="input-group colorpicker colorpicker-element">
                          <div class="input-group-addon">
                            <i></i>
                          </div>
                        </div>
                      </li>
                      <!-- /Favourite Color -->
                      <!-- Color Palette Icon-->
                      <li>
                        <div class="addNewColor">
                          <img src="../../../skin/images/body/icons/colorpicker.png" alt="" />
                        </div>
                      </li>
                      <!-- /Color Palette Icon-->
                    </ul>
                  </div><!-- favouriteColors -->
                </div><!-- col-md-12 -->
              </div><!-- colorPickerCatalogue -->
              <hr>
              <div class="colorPickerMain colorPickerML">
                <h4>Para Mercado Libre</h4>
                <ul>
                  <!-- Active Color ML -->
                  <li>
                    <p>Color Principal</p>
                    <div class="input-group colorpicker colorpicker-element">
                      <div class="input-group-addon">
                        <i></i>
                      </div>
                    </div>
                  </li>
                  <!-- /Active Color ML -->
                  <!-- Active Color ML -->
                  <li>
                    <p>Color Secundario</p>
                    <div class="input-group colorpicker colorpicker-element">
                      <div class="input-group-addon">
                        <i></i>
                      </div>
                    </div>
                  </li>
                  <!-- /Active Color ML -->
                </ul>
              </div><!-- colorPickerMain -->
            </div><!-- form-group -->
          </div><!-- inner-container -->
        </div><!-- col-md-6 -->
      </div><!-- row -->



      <!-- IMAGES -->
      <!-- Actual Image -->
      <div class="row imagesMain">
        <div class="col-lg-3 col-md-12 col-sm-6 col-xs-12">
          <div class="imagesContainer">
            <h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;gen Actual</h4>
            <div class="flex-allCenter imgSelector">
              <div class="imgSelectorInner">
                <img src="<?php echo $Admin->DefaultImg ?>" class="img-responsive MainImg">
                <?php echo insertElement('file','image','','Hidden'); ?>
                <div class="imgSelectorContent">
                  <div id="SelectImg">
                    <i class="fa fa-upload"></i><br>
                   <p>Cargar Nueva Im&aacute;gen</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-bottom">
              <p><i class="fa fa-upload" aria-hidden="true"></i>
              Haga Click sobre la im&aacute;gen </br> para cargar una desde su dispositivo</p>
            </div>
          </div>
        </div><!-- /Actual Image -->
        <!-- Generic Images -->
        <div class="col-lg-5 col-md-12 col-sm-6 col-xs-12">
          <div class="imagesContainer">
            <h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;genes Gen&eacute;ricas</h4>
            <div class="smallThumbsList flex-justify-center">
              <ul>
                <?php
                  foreach($Admin->DefaultImages() as $Image)
                  {
                    echo '<li><img src="'.$Image.'" class="ImgSelecteable"></li>';
                  }
                ?>
              </ul>
            </div>
             <div class="text-bottom">
               <p><i class="fa fa-check" aria-hidden="true"></i>
               Seleccione una im&aacute;gen para utilizarla</p>
            </div>
          </div>
        </div><!-- /Generic Images -->
        <!-- Recent Images -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="imagesContainer">
            <h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;genes usadas anteriormente</h4>
            <div class="smallThumbsList flex-justify-center">
              <ul id="UserImages">
                <?php
                  foreach($Admin->UserImages() as $Image)
                  {
                    echo '<li><img src="'.$Image.'" class="ImgSelecteable"></li>';
                  }
                ?>
              </ul>
            </div>
             <div class="text-bottom">
               <p><i class="fa fa-check" aria-hidden="true"></i>
              Seleccione una im&aacute;gen para utilizarla</p>
            </div>
          </div>
        </div><!-- /Recent Images -->
      </div><!-- IMAGES -->
      <div class="switchCheckbox text-center">
        <h4>Estado Inicial</h4>
        <input type="checkbox" name="switchCheckbox" data-on-text="Activo" data-off-text="Inactivo" data-label-width="auto" checked>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer btnRightMobCent">
      <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>
      <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
      <button type="button" class="btn btn-danger btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
    </div><!-- box-footer -->
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
