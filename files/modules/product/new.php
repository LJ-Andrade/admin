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
        <div class="col-lg-6 col-md-12">
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
        <div class="col-lg-6 col-md-12">
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
            <div class="ColorPicker1 colorPickerContainer">
              <div class="row colorPicker">
                <div id="cpLibrary1" class="col-md-8 col-sm-12 col-xs-12 cpBoxLibrary">
                  <ul class="">
                    <li style="background-color: #000000" data-hex="#000000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #666666" data-hex="#666666"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #990000" data-hex="#990000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FF0000" data-hex="#FF0000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #B45F06" data-hex="#B45F06"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #E06666" data-hex="#E06666"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #38761D" data-hex="#38761D"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #0C9800" data-hex="#0C9800"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #BF9000" data-hex="#BF9000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FF9900" data-hex="#FF9900"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #93C47D" data-hex="#93C47D"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #F6B26B" data-hex="#F6B26B"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFD966" data-hex="#FFD966"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #741B47" data-hex="#741B47"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #134F5C" data-hex="#134F5C"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #0B5394" data-hex="#0B5394"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #1717FF" data-hex="#1717FF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #7600FF" data-hex="#7600FF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #E828FF" data-hex="#E828FF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #8E7CC3" data-hex="#8E7CC3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #C27BA0" data-hex="#C27BA0"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #76A5AF" data-hex="#76A5AF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #6FA8DC" data-hex="#6FA8DC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #83DDFF" data-hex="#83DDFF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #D9D2E9" data-hex="#D9D2E9"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #EAD1DC" data-hex="#EAD1DC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #CFE2F3" data-hex="#CFE2F3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #CCCCCC" data-hex="#CCCCCC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFFF00" data-hex="#FFFF00"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #F4CCCC" data-hex="#F4CCCC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FCE5CD" data-hex="#FCE5CD"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFF2CC" data-hex="#FFF2CC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #D0E0E3" data-hex="#D0E0E3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #D9EAD3" data-hex="#D9EAD3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFFFFF" data-hex="#FFFFFF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                  </ul>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 cpBoxSelected">
                  Color Primario
                  <div id="selectedColor1" class="cpBoxSelectedItem"></div>
                </div>
              </div>
            </div><!-- /ColorPicker -->
            <div class="colorPickerBtn txC">
              <button type="button" class="ShowCP2 btn btnGreen animated fadeIn">Combinar con otro color</button>
            </div>
            <!-- Color Picker -->
            <div class="ColorPicker2 Hidden colorPickerContainer animated fadeIn">
              <div class="row colorPicker">
                <div id="cpLibrary2" class="col-md-8 col-sm-12 col-xs-12 cpBoxLibrary">
                  <ul class="">
                    <li style="background-color: #000000" data-hex="#000000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #666666" data-hex="#666666"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #990000" data-hex="#990000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FF0000" data-hex="#FF0000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #B45F06" data-hex="#B45F06"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #E06666" data-hex="#E06666"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #38761D" data-hex="#38761D"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #0C9800" data-hex="#0C9800"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #BF9000" data-hex="#BF9000"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FF9900" data-hex="#FF9900"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #93C47D" data-hex="#93C47D"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #F6B26B" data-hex="#F6B26B"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFD966" data-hex="#FFD966"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #741B47" data-hex="#741B47"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #134F5C" data-hex="#134F5C"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #0B5394" data-hex="#0B5394"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #1717FF" data-hex="#1717FF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #7600FF" data-hex="#7600FF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #E828FF" data-hex="#E828FF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #8E7CC3" data-hex="#8E7CC3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #C27BA0" data-hex="#C27BA0"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #76A5AF" data-hex="#76A5AF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #6FA8DC" data-hex="#6FA8DC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #83DDFF" data-hex="#83DDFF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #D9D2E9" data-hex="#D9D2E9"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #EAD1DC" data-hex="#EAD1DC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #CFE2F3" data-hex="#CFE2F3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #CCCCCC" data-hex="#CCCCCC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFFF00" data-hex="#FFFF00"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #F4CCCC" data-hex="#F4CCCC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FCE5CD" data-hex="#FCE5CD"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFF2CC" data-hex="#FFF2CC"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #D0E0E3" data-hex="#D0E0E3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #D9EAD3" data-hex="#D9EAD3"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                    <li style="background-color: #FFFFFF" data-hex="#FFFFFF"><div class="cpIcon"><i class="fa fa-check"></i></div></li>
                  </ul>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 cpBoxSelected">
                  Color Secundario
                  <div id="selectedColor2" class="cpBoxSelectedItem"></div>
                    <div class="CloseColorPicker closeColorPicker"><i class="fa fa-times"></i></div>
                </div>
              </div>
            </div><!-- /ColorPicker -->
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
