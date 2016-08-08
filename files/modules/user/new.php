<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetLinkTitle());
    $Head->setStyle('../../../vendors/select2/select2.min.css');
    $Head->setStyle('../../../vendors/treemultiselect/jquery.tree-multiselect.min.css');
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
      <div class="col-sm-12 col-md-6">

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
        <div class="form-group">
          <img src="<?php echo $Admin->Img; ?>" alt="" />
        </div>
      </div>

      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label>Grupos</label>
          <select class="form-control select2 selectTags" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
          </select>
        </div>
        <div class="form-group">
          <label>Perfiles</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Perfil 1</option>
            <option>Perfil 2</option>
          </select>
        </div>
        <select id="demo1" multiple="multiple">
          <option value="one" data-section="top" selected="selected" data-index="3">One</option>
          <option value="two" data-section="top" selected="selected" data-index="1">Two</option>
          <option value="three" data-section="top" selected="selected" data-index="2" data-description="A natural number">Three</option>
          <option value="four" data-section="top">Four</option>
          <!-- <option value="wow" data-section="top/inner/this/is/really/nested">Wow</option> -->
        </select>
      </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="button" class="btn  btn-success">Crear Nuevo Usuario</button>
      <button type="button" class="btn  btn-danger">Cancelar</button>
    </div><!-- box-footer -->
  </div><!-- /.box -->

<?php
  $Foot->setScript('../../../vendors/select2/select2.min.js');
  $Foot->setScript('../../../vendors/treemultiselect/jquery.tree-multiselect.min.js');
  include('../../includes/inc.bottom.php');
?>
