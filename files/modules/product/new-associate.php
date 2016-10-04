<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetTitle());
    // $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
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
        <h3>Agregar Socio</h3>
        <div class="innerContainer">
          <h4 class="subTitleB"><i class="fa fa-user"></i> Rellene los campos para agregar un socio</h4>
          <form method="post">
            <!-- <div class="form-group">
              <input type="name" class="form-control" placeholder="Nombre del Producto">
            </div> -->
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Nombre">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Apellido">
              </div>
              <div class="col-xs-12 col-sm-4">
                <select class="form-control" validateempty="El perfil es obligatorio." firstvalue="Sexo" firsttext="Sexo">
                  <option value="" selected hidden disabled>Sexo</option>
                  <option value="">Masculino</option>
                  <option value="">Femenino</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-4">
                <select class="form-control" validateempty="El perfil es obligatorio." firstvalue="Sexo" firsttext="Sexo">
                  <option value="" selected hidden disabled>Tipo de M&eacute;dico</option>
                  <option value="">M&eacute;dico</option>
                  <option value="">Odont&oacute;logo</option>
                  <option value="">Veterinario</option>
                </select>
              </div>

              <div class="col-xs-12 col-sm-4">
                <select class="form-control" validateempty="El perfil es obligatorio." firstvalue="Especialidad" firsttext="Especialidad">
                  <option value="" selected hidden disabled>Especialidad</option>
                  <option value="">Especialidad 1</option>
                  <option value="">Especialidad 2</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-4">
                <select class="form-control" validateempty="El perfil es obligatorio." firstvalue="Sexo" firsttext="Sexo">
                  <option value="" selected hidden disabled>Cargo en la AMHA</option>
                  <option value="">M&eacute;dico</option>
                  <option value="">Odont&oacute;logo</option>
                  <option value="">Veterinario</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Matricula Nacional">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Matricula Provincial">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="E-Mail">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Sitio Web">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Monto a pagar por cuota mensual">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Último pago de la cuota mensual">
              </div>
              <div class="col-xs-12 col-sm-4">
                <label for="">Publicidad Activa Desde</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <label for="">Publicidad Activa Hasta</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                </div>
              </div>
            </div>

            <div class="txC">
              <button type="button" class="ProductDescBtn btn btnBlue"><i class="fa fa-plus"></i> Agregar</button>
              <button type="button" class="ProductDescBtn btn btnGreen"><i class="fa fa-home"></i> Agregar Consultorio</button>
            </div>
          </form>
        </div>
        <h3>Agregar Consultorio</h3>
        <div class="innerContainer">
          <h4 class="subTitleB"><i class="fa fa-home"></i> Rellene los campos para agregar un consultorio</h4>
          <form method="post">
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Direcci&oacute;n">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Zona">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Provincia">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Pa&iacute;s">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Tel&eacute;fono">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="E-Mail">
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="name" class="form-control" placeholder="Horarios de Atenci&oacute;n">
              </div>

              <div class="col-sm-12 consultory-map">
                <h4>Seleccione la direcci&oacute;n del consultorio</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3284.010675118745!2d-58.38097748444634!3d-34.60389156786967!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacf15e9735b%3A0x3434e45224c7e160!2sCarlos+Pellegrini!5e0!3m2!1ses-419!2sar!4v1475548792665" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>

            </div>

            <div class="txC">
              <button type="button" class="ProductDescBtn btn btnBlue">Agregar</button>
              <button type="button" class="ProductDescBtn btn btnGreen"><i class="fa fa-home"></i> Agregar Otro Consultorio</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- box -->
  </div><!-- box -->

<?php
$Foot->setScript('../../../vendors/input-mask/jquery.inputmask.js');
$Foot->setScript('../../../vendors/input-mask/jquery.inputmask.date.extensions.js');
$Foot->setScript('../../../vendors/input-mask/jquery.inputmask.extensions.js');

include('../../includes/inc.bottom.php');
?>

<script type="text/javascript">
$(function () {
  //Datemask dd/mm/yyyy
  $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
});
</script>
