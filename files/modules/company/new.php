<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $New = new Company();
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-md-8 col-sm-12">
        
          <div class="innerContainer main_form">
            <form id="new_company_form">
            <h4 class="subTitleB"><i class="fa fa-tag"></i> Datos de la Empresa</h4>
            <?php echo insertElement("hidden","action",'insert'); ?>
            <?php echo insertElement("hidden","newimage",$New->GetDefaultImg()); ?>
            <?php echo insertElement("hidden","total_agents","0"); ?>
            <div class="row form-group inline-form-custom">
              <div class="col-xs-12 col-sm-6">
                <span class="input-group">
                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                  <?php echo insertElement('text','name','','form-control','tabindex="1" placeholder="Nombre de la Empresa" validateEmpty="Ingrese un nombre." validateFromFile="../../library/processes/proc.common.php///El nombre ya existe///action:=validate///object:=Company"'); ?>
                  <!--<input class="form-control" placeholder="Nombre de la Empresa">-->
                </span>
              </div>
              <div class="col-xs-12 col-sm-6">
                <span class="input-group">
                  <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
                  <?php echo insertElement('text','website','','form-control','tabindex="2" placeholder="Sitio Web"'); ?>
                  <!--<input class="form-control" placeholder="Sitio Web">-->
                </span>
              </div>
            </div>
            <div class="row form-group inline-form-custom">
              <div class="col-xs-12 col-sm-6">
                <span class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <?php echo insertElement('text','phone','','form-control','tabindex="3" placeholder="Tel&eacute;fono"'); ?>
                  <!--<input class="form-control" placeholder="Tel&eacute;fonos">-->
                </span>
              </div>
              <div class="col-xs-12 col-sm-6">
                <span class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <?php echo insertElement('text','address','','form-control','tabindex="4" placeholder="Direcci&oacute;n" validateMinLength="4///La direcci&oacute;n debe contener 4 caracteres como m&iacute;nimo."'); ?>
                  <!--<input class="form-control" placeholder="Direcci&oacute;n">-->
                </span>
              </div>
            </div>
            <div class="row form-group inline-form-custom">
              <div class="col-sm-6 col-xs-12">
                <span class="input-group">
                  <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                  <?php echo insertElement('text','corporate_name','','form-control','tabindex="5" placeholder="Raz&oacute;n Social" validateMinLength="4///El email debe contener 4 caracteres como m&iacute;nimo."'); ?>
                  <!--<input class="form-control" placeholder="Raz&oacute;n Social">-->
                </span>
              </div>
              <div class="col-sm-6 col-xs-12">
                <span class="input-group">
                  <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                  <?php echo insertElement('text','cuit','','form-control','tabindex="6" placeholder="CUIT" validateMinLength="11///El CUIT debe contener 11 caracteres como m&iacute;nimo." validateOnlyNumbers="Ingrese n&uacute;meros &uacute;nicamente."'); ?>
                  <!--<input class="form-control" placeholder="Cuit">-->
                </span>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 col-xs-12 simple_upload_image">
                <div class="subtitle">
                  <span>Logo de la empresa</span>
                </div>
                <div class="image_sector">
                  <img id="company_logo" src="../../../skin/images/body/pictures/logo-gen.jpg" alt="" class="animated" />
                  <div id="image_upload" class="overlay-text"><span><i class="fa fa-upload"></i> Subir Im&aacute;gen</span></div>
                  <?php echo insertElement('file','image','','form-control Hidden','tabindex="2" placeholder="Sitio Web"'); ?>
                </div>
              </div>
            </div>
          </form>
          <hr>
          <div class="row">
            <div class="col-md-12 info-card">
              <div class="subtitle">
                <span>Representantes</span>
              </div>
              <!--<span id="empty_agent" class="Info-Card-Empty info-card-empty">No hay representantes ingresados</span>-->
              <div id="agent_list" class="row">
                <!-- Agent Data -->
                <!--<div class="col-md-3 Demo-Card">-->
                <!--  <div class="info-card-item">-->
                <!--    <input type="hidden" id="agent_name[]" name="agent_name[]" value="nombre" />-->
                <!--    <input type="hidden" id="agent_charge[]" name="agent_charge[]" value="cargo" />-->
                <!--    <input type="hidden" id="agent_email[]" name="agent_email[]" value="email" />-->
                <!--    <input type="hidden" id="agent_phone[]" name="agent_phone[]" value="telefono" />-->
                <!--    <span><b><i class="fa fa-user"></i> Nombre y Apellido</b></span>-->
                <!--    <span><i class="fa fa-briefcase"></i> Empleado</span> <br>-->
                <!--    <span><i class="fa fa-envelope"></i> pedro@mulo.com</span> <br>-->
                <!--    <span><i class="fa fa-phone"></i> 4545-4545</span> <br>-->
                <!--  </div>-->
                <!--</div>-->
                
              </div>
              <button id="agent_new" type="button" class="btn btnGreen Info-Card-Form-Btn"><i class="fa fa-plus"></i> Agregar un representante</button>

              <!-- New representative form -->
              <div id="agent_form" class="Info-Card-Form Hidden">
                <form id="new_agent_form">
                  <div class="info-card-arrow">
                    <div class="arrow-up"></div>
                  </div>
                  <div class="info-card-form animated fadeIn">
                    <div class="row form-group inline-form-custom">
                      <div class="col-xs-12 col-sm-6">
                        <span class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <?php echo insertElement('text','agentname','','form-control','tabindex="101" placeholder="Nombre y Apellido" validateEmpty="Ingrese un nombre"'); ?>
                          </span>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <span class="input-group">
                          <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                          <?php echo insertElement('text','agentcharge','','form-control','tabindex="102" placeholder="Cargo"'); ?>
                        </span>
                      </div>
                    </div>
                    <div class="row form-group inline-form-custom">
                      <div class="col-xs-12 col-sm-6">
                        <span class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <?php echo insertElement('text','agentemail','','form-control','tabindex="103" placeholder="Email" validateEmail="Ingrese un email v&aacute;lido."'); ?>
                        </span>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <span class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <?php echo insertElement('text','agentphone','','form-control','tabindex="104" placeholder="Tel&eacute;fono"'); ?>
                        </span>
                      </div>
                    </div>
                    <div class="row txC">
                      <button id="agent_add" type="button" class="Info-Card-Form-Done btn btnGreen"><i class="fa fa-check"></i> Agregar</button>
                      <button id="agent_cancel" type="button" class="Info-Card-Form-Done btn btnRed"><i class="fa fa-times"></i> Cancelar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- New representative form -->
            </div>
          </div>
          <hr>
          <div class="row txC">
            <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Empresa</button>
            <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otra</button>
            <!--<button type="button" class="MainDoneBtn btn btnBlue" id="BtnCreate"><i class="fa fa-check-circle"></i> Finalizar</button>-->
            <button type="button" class="btn btn-error btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
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
