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





  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-md-6 ">
        <div class="innerContainer">
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
              <button type="button" class="ProductDescBtn btn btnBlue">Continuar</button>
            </div>
          </form>
        </div>
        <!-- Description (Character Counter) -->
      </div>
    </div><!-- box -->
  </div><!-- box -->



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
