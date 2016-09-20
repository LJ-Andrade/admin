<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Menues");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Menues");
  $Head->setHead();

  if($_GET['status'])
  {
    $Menu->SetWhereCondition("status","=",addslashes($_GET['status']));
  }else{
    $Menu->SetWhereCondition("status","=","A");
  }

  include('../../includes/inc.top.php');
 ?>
  <div class="box">
    <div class="box-body">
      <!-- New Button -->
      <a href="new.php"><button type="button" class="NewUser btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Men&uacute;</button></a>
      <!-- /New Button -->
      <!-- Search Filters -->
      <div class="SearFilters searchFiltersHorizontal animated fadeIn Hidden">
        <form class="form-inline">
          <?php echo insertElement('hidden','action','search'); ?>
          <?php echo insertElement('hidden','view_type','list'); ?>
          <?php echo insertElement('hidden','view_page','1'); ?>
          
          <div class="form-group">
            <?php echo insertElement('text','title','','form-control','placeholder="T&iacute;tulo"'); ?>
          </div>
          
          <div class="form-group">
            <?php echo insertElement('text','link','','form-control','placeholder="Link"'); ?>
          </div>
          
          <div class="form-group">
            <?php echo insertElement('text','email','','form-control','placeholder="Email"'); ?>
          </div>
          <!-- Profile -->
          <?php echo insertElement('select','profile','','form-control','',$DB->fetchAssoc('admin_profile','profile_id,title',"customer_id=".$_SESSION['customer_id']." AND status='A' AND profile_id >= ".$_SESSION['profile_id']),'', 'Perfil'); ?>
          <!-- Group -->
          <?php echo insertElement('select','group','','form-control','',$DB->fetchAssoc('admin_group','group_id,title',"customer_id=".$_SESSION['customer_id']." AND status='A' AND group_id IN (SELECT group_id FROM relation_group_profile WHERE profile_id >= ".$_SESSION['profile_id'].")","title"),'', 'Grupo'); ?>
          <!-- Submit Button -->
          <button type="button" class="btn btnGreen searchButton">Buscar</button>
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
      
      <div class="contentContainer txC"><!-- List Container -->
        <div class="GridView row horizontal-list flex-justify-center GridElement Hidden animated fadeIn">
          <ul>
            <?php echo $Menu->MakeGrid(); ?>
          </ul>
        </div><!-- /.horizontal-list -->
         
        <div class="row ListView ListElement animated fadeIn">
          <div class="container-fluid">
            <?php echo $Menu->MakeList(); ?>
          </div><!-- container-fluid -->
        </div><!-- row -->
        <?php echo insertElement('hidden','totalregs',$Menu->GetTotalRegs()); ?>
      </div><!-- /Content Container -->
      
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
      <!-- Paginator -->

      <div class="pull-left form-inline paginationLeft">
          <label for="RegsPerView" class="control-label">Mostrar </label>
          <?php echo insertElement('select','regsperview','','form-control','',array("5"=>"5","10"=>"10","25"=>"25","50"=>"50","100"=>"100")); ?>
          de <b><span id="TotalRegs"><?php echo $Menu->GetTotalRegs(); ?></span></b>
      </div>
      <ul class="paginationRight pagination no-margin pull-right"></ul>

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
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>
