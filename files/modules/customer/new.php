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





  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-md-8 col-sm-12">
        <div class="innerContainer main_form">
          <h4 class="subTitleB"><i class="fa fa-tag"></i> Datos del Cliente</h4>
          <div class="row form-group inline-form-custom">
            <div class="col-xs-12 col-sm-6">
              <span class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input class="form-control" placeholder="Nombre de la Empresa">
              </span>
            </div>
            <div class="col-xs-12 col-sm-6">
              <span class="input-group">
                <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
                <input class="form-control" placeholder="Sitio Web">
              </span>
            </div>
          </div>
          <div class="row form-group inline-form-custom">
            <div class="col-xs-12 col-sm-6">
              <span class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="form-control" placeholder="Tel&eacute;fonos">
              </span>
            </div>
            <div class="col-xs-12 col-sm-6">
              <span class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input class="form-control" placeholder="Direcci&oacute;n">
              </span>
            </div>
          </div>
          <div class="row form-group inline-form-custom">
            <div class="col-sm-6 col-xs-12">
              <input class="form-control" placeholder="Raz&oacute;n Social">
            </div>
            <div class="col-sm-6 col-xs-12">
              <input class="form-control" placeholder="Cuit">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 col-xs-12 simple_upload_image">
              <h4>Logo de la empresa</h4>
              <div class="image_sector">
                <img src="../../../skin/images/body/pictures/logo-gen.jpg" alt="" />
                <div class="overlay-text"><span><i class="fa fa-upload"></i> Subir Im&aacute;gen</span></div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12 info-card">
              <h4>Representantes</h4>
              <span class="Info-Card-Empty info-card-empty">No hay representantes ingresados</span><br>
              <div class="row">
                <div class="col-md-4 Demo-Card Hidden">
                  <div class="info-card-item">
                    <span>Nombre y Apellido</span> <br>
                    <span>Empleado</span> <br>
                    <span>pedro@mulo.com</span> <br>
                    <span>4545-4545</span> <br>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btnBlue Info-Card-Form-Btn"><i class="fa fa-plus"></i> Agregar un representante</button>

              <div class="Info-Card-Form info-card-form animated fadeIn Hidden">
                <div class="info-card-arrow">
                  <div class="arrow-up"></div>
                </div>
                <div class="row form-group inline-form-custom">
                  <div class="col-xs-12 col-sm-6">
                    <input class="form-control" placeholder="Nombre y Apellido">
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <input class="form-control" placeholder="Cargo">
                  </div>
                </div>
                <div class="row form-group inline-form-custom">
                  <div class="col-xs-12 col-sm-6">
                    <input class="form-control" placeholder="E-Mail">
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <input class="form-control" placeholder="Tel&eacute;fono">
                  </div>
                </div>
                <div class="row txC">
                  <button type="button" class="Info-Card-Form-Done btn btnBlue">Aceptar</button>
                </div>
              </div>
            </div>

          </div>






          <hr>
          <div class="row txC">
            <button type="button" class="MainDoneBtn btn btnBlue">Finalizar</button>
          </div>

        </div>
      </div>
    </div><!-- box -->
  </div><!-- box -->

<?php
$Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();

</script>
