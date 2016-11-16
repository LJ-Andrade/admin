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
              <div class="subtitle">
                <span>Logo de la empresa</span>
              </div>
              <div class="image_sector">
                <img src="../../../skin/images/body/pictures/logo-gen.jpg" alt="" />
                <div class="overlay-text"><span><i class="fa fa-upload"></i> Subir Im&aacute;gen</span></div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12 info-card">
              <div class="subtitle">
                <span>Representantes</span>
              </div>
              <span class="Info-Card-Empty info-card-empty">No hay representantes ingresados</span>
              <div class="row">
                <!-- Representative ITEM -->
                <div class="col-md-3">
                  <div class="info-card-item">
                    <div class="close-btn"><i class="fa fa-times"></i></div>
                    <span><b><i class="fa fa-user"></i> Nombre y Apellido</b></span> <br>
                    <span><i class="fa fa-briefcase"></i> Empleado</span> <br>
                    <span><i class="fa fa-envelope"></i> pedro@mulo.com</span> <br>
                    <span><i class="fa fa-phone"></i> 4545-4545</span> <br>
                  </div>
                </div>
                <!-- // Representative ITEM -->
              </div>
              <button type="button" class="btn btnGreen Info-Card-Form-Btn"><i class="fa fa-plus"></i> Agregar un representante</button>

              <!-- New representative form -->
              <div class="Info-Card-Form Hidden">
                
                <div class="info-card-arrow">
                  <div class="arrow-up"></div>
                </div>
                <div class="info-card-form animated fadeIn">
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
                    <button type="button" class="Info-Card-Form-Done btn btnBlue"><i class="fa fa-check"></i> Agregar</button>
                  </div>
                </div>
              </div>
              <!-- New representative form -->
            </div>
          </div>
          <hr>
          <div class="row txC">
            <button type="button" class="MainDoneBtn btn btnBlue"><i class="fa fa-check-circle"></i> Finalizar</button>
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
