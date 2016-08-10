<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetLinkTitle());
    $Head->setStyle('../../../vendors/select2/select2.min.css'); // Select Inputs With Tags
    $Head->setHead();
    include('../../includes/inc.top.php');


?>
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php echo insertElement("hidden","menues"); ?>
  <?php echo insertElement("hidden","groups"); ?>
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
                <?php echo insertElement('text','user','','form-control','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3/El usuario debe contener 3 caracteres como mínimo." validateFromFile="process.php/El usuario ya existe/action:=validate"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('password','password','','form-control','placeholder="Contrase&ntilde;a" validateMinLength="4/La contraseña debe contener 4 caracteres como mínimo." tabindex="3"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('password','password_confirm','','form-control','placeholder="Confirmar Contrase&ntilde;a" validateEqualToField="password/Las contraseñas deben coincidir." tabindex="4"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('text','email','','form-control','placeholder="Email" validateEmail="Ingrese un email válido." validateMinLength="4/El email debe contener 4 caracteres como mínimo." tabindex="2" validateFromFile="process.php/El email ya existe/action:=validate_email"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('text','first_name','','form-control','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." tabindex="5"'); ?>
              </div>
              <div class="form-group">
                <?php echo insertElement('text','last_name','','form-control','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2/El apellido debe contener 2 caracteres como mínimo." tabindex="6"'); ?>
              </div>
            </div>
          </div>
        </div><!-- User Data -->
        <div class="col-md-6">
          <div class="innerContainer">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="form-group">
                  <h4 class="subTitleB"><i class="fa fa-sitemap"></i> Grupos</h4>
                  <select class="form-control select2 selectTags" multiple="multiple" data-placeholder="Seleccione los grupos" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Alabama</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="form-group">
                  <h4 class="subTitleB"><i class="fa fa-eye"></i> Perfiles</h4>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected" class="disabled">Seleccione un perfil ...</option>
                    <option>Perfil 2</option>
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
            <ul>
              <li>Permiso 1
                <ul>
                  <li data-value="table" class="">Permiso 1a</li>
                  <li data-value="table" class="">Permiso 1b</li>
                </ul>
              </li>
            </ul>
            <ul>
              <li>Permiso 2
                <ul>
                  <li data-value="table">Permiso 2a
                    <ul>
                      <li data-value="table">Permiso 2aa
                    </ul>
                  </li>
                  <li data-value="table" class="">Permiso 2b</li>
                </ul>
              </li>
            </ul>
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
                <img src="<?php echo $Admin->Img; ?>" class="img-responsive MainImg">
                <div class="imgSelectorContent">
                  <div id="SelectImg">
                    <i class="fa fa-picture-o"></i><br>
                    Cambiar Imágen
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /Actual Image -->
        <!-- Generic Images -->
        <div class="col-lg-5 col-md-12 col-sm-6 col-xs-12">
          <div class="imagesContainer">
            <h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;genes Gen&eacute;ricas</h4>
            <div class="smallThumbsList">
              <ul class="flex-container flex-wrap">
                <li><img src="../../../skin/images/users/01.png" alt="" /></li>
                <li><img src="../../../skin/images/users/02.png" alt="" /></li>
                <li><img src="../../../skin/images/users/03.png" alt="" /></li>
                <li><img src="../../../skin/images/users/04.png" alt="" /></li>
                <li><img src="../../../skin/images/users/05.png" alt="" /></li>
                <li><img src="../../../skin/images/users/01.png" alt="" /></li>
                <li><img src="../../../skin/images/users/02.png" alt="" /></li>
                <li><img src="../../../skin/images/users/03.png" alt="" /></li>
              </ul>
            </div>
          </div>
        </div><!-- /Generic Images -->
        <!-- Recent Images -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="imagesContainer">
            <h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;genes usadas anteriormente</h4>
            <div class="smallThumbsList">
              <ul class="flex-container flex-wrap ">
                <li><img src="../../../skin/images/users/1/01.png" alt="" /></li>
                <li><img src="../../../skin/images/users/1/02.jpeg" alt="" /></li>
                <li><img src="../../../skin/images/users/1/03.jpeg" alt="" /></li>
                <li><img src="../../../skin/images/users/1/04.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div><!-- /Recent Images -->
      </div><!-- IMAGES -->
    </div><!-- /.box-body -->
    <div class="box-footer btnRightMobCent">
      <button type="button" class="btn btn-success btnGreen "><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>
      <button type="button" class="btn btn-success btnBlue"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>
      <button type="button" class="btn btn-danger btnRed"><i class="fa fa-times"></i> Cancelar</button>
    </div><!-- box-footer -->
  </div><!-- /.box -->
  <button type="button" class="btn btn-success btnGrey" data-toggle="modal" data-target="#helpModal" ><i class="fa fa-question-circle"></i> Ayuda</button>
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
          <p><b><i class="fa fa-pencil"></i> DATOS PRINCIPALES:</b> Complete los campos con la informaci&oacute;n sobre el usuario</p>
          <hr>
          <p><b><i class="fa fa-sitemap"></i> GRUPOS:</b> Para seleccionar los grupos haga click sobre el campo "Grupos" y presione ENTER. Repita la operaci&oacute;n hasta
            seleccionar todos los grupos pertinentes.</p>
          <hr>
          <p><b><i class="fa fa-eye"></i> PERFILES:</b> Haga click en el campo y seleccione un perfil</p>
          <hr>
          <p><b><i class="fa fa-key"></i> PERMISOS:</b> Tilde las cajas correspondientes a los permisos a otorgar.</p>
          <hr>
          <p><i class="fa fa-file-image-o"></i><b> SELECCI&Oacute;N DE IM&Aacute;GENES:</b><br>
            <b>Subir Im&aacute;gen:</b> Haga click en "Im&aacute;gen Actual" para subir una im&aacute;gen desde su dispositivo <br>
            <b>Im&aacute;gen Gen&eacute;rica:</b> Si no tiene una i&aacute;gen puede utilizar una porporcionada por el sistema <br>
            <b>&Uacute;ltimas Im&aacute;genes:</b> Puede volver a utilizar una im&aacute;en utilizada anteriormente<br>
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
<script type="text/javascript">
$('#treeview-checkbox').treeview({
  // Options
});
</script>
