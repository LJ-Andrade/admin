<?php
    include("../../includes/inc.main.php");
    $Head->setTitle($Menu->GetTitle());
    $Head->setIcon($Menu->GetHTMLicon());
    $Head->setStyle('../../../vendors/select2/select2.min.css'); // Select Inputs With Tags
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
        <!-- User Data -->
        <div class="col-md-6">
          <div class="flex-allCenter innerContainer">
            <div class="mw100">
              <h4 class="subTitleB"><i class="fa fa-pencil"></i> Datos Principales</h4>
              <div class="form-group">
                <?php echo insertElement('text','user','','form-control','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3///El usuario debe contener 3 caracteres como m&iacute;nimo." validateFromFile="../../library/processes/proc.common.php///El usuario ya existe///action:=validate///object:=AdminData"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('password','password','','form-control','placeholder="Contrase&ntilde;a" validateEmpty="La constrase&ntilde;a es obligatoria." validateMinLength="4///La contrase&ntilde;a debe contener 4 caracteres como m&iacute;nimo." tabindex="2"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('password','password_confirm','','form-control','placeholder="Confirmar Contrase&ntilde;a" validateEmpty="La confirmaci&oacute;n de constrase&ntilde;a es obligatoria." validateEqualToField="password///Las contrase&ntilde;as deben coincidir." tabindex="3"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('text','email','','form-control','placeholder="Email" validateEmail="Ingrese un email v&aacute;lido." validateMinLength="4///El email debe contener 4 caracteres como m&iacute;nimo." tabindex="4" validateFromFile="../../library/processes/proc.common.php///El email ya existe///action:=validate_email///object:=AdminData"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('text','first_name','','form-control','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2///El nombre debe contener 2 caracteres como m&iacute;nimo." tabindex="5"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('text','last_name','','form-control','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2///El apellido debe contener 2 caracteres como m&iacute;nimo." tabindex="6"'); ?>
              </div>
            </div>
          </div>
        </div><!-- User Data -->
        <div class="col-md-6">
          <div class="innerContainer">
            <div class="row">
              <!-- Profile -->
              <div class="col-lg-6 col-md-12">
                <div class="form-group">
                  <h4 class="subTitleB"><i class="fa fa-eye"></i> Perfiles</h4>
                  <?php echo insertElement('select','profile','','form-control','validateEmpty="El perfil es obligatorio." tabindex="7"',$DB->fetchAssoc('admin_profile','profile_id,title',"status='A' AND customer_id=".$_SESSION['customer_id']),'',"Seleccione un perfil.."); ?>

                </div>
              </div>
              <!-- Groups -->
              <div class="col-lg-6 col-md-12">
                <div class="form-group" id="groups-wrapper">
                  <h4 class="subTitleB"><i class="fa fa-users"></i> Grupos</h4>

                  <select id="group" class="form-control select2 selectTags" multiple="multiple" data-placeholder="Seleccione los grupos" style="width: 100%;">
                  </select>

                </div>
              </div>

            </div>
          </div>
        </div><!-- User Data -->


        <!-- Tree Chekbox -->
        <div class="col-md-6">
          <div id="treeview-checkbox" class="treeCheckBoxDiv">
            <h4 class="subTitleB"><i class="fa fa-key"></i> Permisos</h4>
            <?php echo $Menu->MakeTree(); ?>
          </div><!-- treeview-checkbox -->
        </div><!-- User Data -->
      </div><!-- row -->



      <!-- IMAGES -->
      <!-- Actual Image -->
      <div class="row imagesMain">
        <div class="col-lg-3 col-md-12 col-sm-6 col-xs-12">
          <div class="imagesContainer">
            <h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;gen Actual</h4>
            <div class="flex-allCenter imgSelector">
              <div class="imgSelectorInner">
                <img src="<?php echo $Admin->DefaultImg ?>" class="img-responsive MainImg animated">
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
    </div><!-- /.box-body -->
    <div class="box-footer btnRightMobCent">
      <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>
      <button type="button" class="btn btn-success btnBlue" id="BtnCreateNext"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
      <button type="button" class="btn btn-danger btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
    </div><!-- box-footer -->
  </div><!-- /.box -->
  <?php include_once('modal.help.php'); ?>
<?php
// Select Inputs With Tags
// DOCUMENTATION > https://select2.github.io/examples.html
$Foot->setScript('../../../vendors/select2/select2.min.js');
// ----
// Tree With Checkbox
// DOCUMENTATION >  http://www.jquery-az.com/jquery-treeview-with-checkboxes-2-examples-with-bootstrap
$Foot->setScript('../../../vendors/treemultiselect/logger.min.js');
$Foot->setScript('../../../vendors/treemultiselect/treeview.min.js');

include('../../includes/inc.bottom.php');
?>
