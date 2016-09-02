<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Usuarios");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Usuarios");
  $Head->setHead();

  if($_GET['status'])
  {
    $Admin->SetWhereCondition("status","=",addslashes($_GET['status']));
  }else{
    $Admin->SetWhereCondition("status","=","A");
  }

  include('../../includes/inc.top.php');
  include('../../includes/inc.modals.php');
 ?>
  <div class="box">
    <div class="box-body">
      <!-- New User Button -->
      <button type="button" class="NewUser btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Usuario</button>
      <!-- /New User Button -->
      <!-- Search Filters -->
      <div class="SearFilters searchFiltersHorizontal animated fadeIn Hidden">
        <form class="form-inline">
          <!-- Name -->
          <div class="form-group">
            <input type="name" class="form-control" id="name" placeholder="Nombre">
          </div>
          <!-- User -->
          <div class="form-group">
            <input type="name" class="form-control" id="user" placeholder="Usuario">
          </div>
          <!-- Email -->
          <div class="form-group">
            <input type="name" class="form-control" id="email" placeholder="E-mail">
          </div>
          <!-- Profile -->
          <select id="profile" name="profile" class="form-control" placeholder="Perfil">
            <option value="" disabled selected>Perfil</option>
            <option value="1">Opcion 1</option>
            <option value="2">Opcion 1</option>
          </select>
          <!-- Group -->
          <select id="profile" name="profile" class="form-control" placeholder="Perfil">
            <option value="" disabled selected>Grupo</option>
            <option value="1">Opcion 1</option>
            <option value="2">Opcion 1</option>
          </select>
          <!-- Submit Button -->
          <button type="submit" class="btn btnGreen">Buscar</button>
          <!-- Decoration Arrow -->
          <div class="arrow-right-border">
            <div class="arrow-right-sf"></div>
          </div>
        </form>
      </div>
      <!-- /Search Filters -->
      <div class="changeView">
        <button class="ShowFilters SearchElement btn"><i class="fa fa-search"></i></button>
        <button class="ShowList GridElement btn Hidden"><i class="fa fa-list"></i></button>
        <button class="ShowGrid ListElement btn"><i class="fa fa-th-large"></i></button>
      </div>
      <div class="contentContainer"><!-- List Container -->
        <div class="GridView row horizontal-list flex-justify-center GridElement Hidden animated fadeIn">
          <ul>
            <?php echo $Admin->MakeGrid(); ?>
          </ul>
        </div><!-- /.horizontal-list -->
        <!-- Item List View -->
        <div class="row ListView ListElement animated fadeIn">
          <div class="container-fluid">
            <?php echo $Admin->MakeList(); ?>
          </div><!-- container-fluid -->
        </div><!-- row -->
      </div><!-- /Content Container -->
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
      <!-- Paginator -->
      <ul class="pagination no-margin pull-right">
        <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></i></a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></i></a></li>
        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
      </ul>
      <!-- Paginator -->
    </div>
  </div><!-- /.box -->
  <!-- Help Modal Trigger -->
  <button type="button" class="btn btn-success btnGrey" data-toggle="modal" data-target="#helpModal" ><i class="fa fa-question-circle"></i> Ayuda</button>
  <!-- Help Modal Trigger -->
  <!-- DELETE SELECTED BUTTON -->
  <a href="#">
    <div class="deleteSelectedAbs Hidden">
      Eliminar Seleccionados
    </div>
  </a>
  <!-- DELETE SELECTED BUTTON-->

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
  include('../../includes/inc.bottom.php');
?>
