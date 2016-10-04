<?php
    include("../../includes/inc.main.php");
    $Menu   = new Menu();
    $Group  = new GroupData();
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
    <div class="box-body">
      <div class="row main-wrapper profile-section">
        <div class="col-md-5 profile-user-info">
          <div class="">
            <img class="profile-img img-responsive" src="../../../skin/images/users/1/01.png" alt="User profile picture">
            <h3 class="profile-username text-center">Nombre de Usuario</h3>
            <p class="text-muted text-center">Nombre Apellido</p>
            <p class="text-muted text-center">mail@hotmail.com</p>
            <p class="text-muted text-center">&Uacute;ltima Conexi&oacute;n: 25/05/18 | 22:00Hs.</p>
          </div>
        </div>
        <div class="col-md-7 profile-user-misc">
          <div class="box-body">
            <span class="profile-titles"><strong><i class="fa fa-lock"></i> Perfil</strong></span>
            <p>
              <span class="label label-primary">Perfil1</span>
              <span class="label label-primary">Perfil2</span>
            </p>
            <hr>
            <span class="profile-titles"><strong><i class="fa fa-users"></i> Grupos</strong></span>
            <p>
              <span class="label label-primary">Grupo1</span>
              <span class="label label-primary">Grupo2</span>
            </p>
            <hr>
            <span class="profile-titles"><strong><i class="fa fa-key"></i> Permisos especiales</strong></span>
            <p>
              <span class="label label-primary">Permisos1</span>
              <span class="label label-primary">Permisos2</span>
            </p>
            <hr>
            <div class="profile-bussines-logo">
              <img src="../../../skin/images/body/logos/innovalogo.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

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
