<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Usuarios");
  $Head->setSubTitle("Listado de Usuarios");
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>

  <div class="box">
    <div class="box-body">
      <div class="changeView">
        <button class="ShowList btn"><i class="fa fa-list"></i></button>
        <button class="ShowGrid btn"><i class="fa fa-th-large"></i></button>
      </div>
      <div class="GridView row horizontal-list flex-justify-center">
        <ul>
          <!-- Item Grid View -->
          <li class="RoundItemSelect roundItemBig">
            <div class="flex-allCenter imgSelector">
              <div class="imgSelectorInner">
                <img src="<?php echo $Admin->Img; ?>" class="img-responsive MainImg">
                <div class="imgSelectorContent">
                  <div class="roundItemBigActions">
                    <a href="index.php"><button type="button" class="btn btnBlue" name="button"><i class="fa fa-pencil"></i></button></a>
                    <a href="index.php"><button type="button" class="btn btnRed" name="button"><i class="fa fa-trash-o"></i></button></a>
                    <a href="#"><button type="button" class="btn btnGreen Hidden" name="button"><i class="fa fa-check"></i></button></a>
                  </div>
                </div>
              </div>
              <div class="roundItemText">
                <p><b>Leandro Andrade</b></p>
                <p>(Javzero)</p>
                <p>Administrador</p>
              </div>
            </div>
          </li>
          <!-- /Item User Grid -->
        </ul>
      </div><!-- /.horizontal-list -->

      <!-- Item List View -->
      <div class="row ListView">
        <div class="container-fluid">
          <!-- List Item -->
          <div class="row listRow">
            <div class="col-lg-3 col-md-4 col-md-5">
              <div class="listRowInner">
                <img class="img-circle" src="<?php echo $Admin->Img; ?>" alt="user image">
                <span class="itemRowtitle">Leandro Andrade (Javzero)</span>
                <span class="smallDetails">Ultima Conexi&oacute;n: 22/25/24 | 22:00Hs.</span>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 hideMobile990">
              <div class="listRowInner">
                <span class="itemRowtitle">Perfil</span>
                <span class="smallDetails">Nombre Perfil</span>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 hideMobile990">
              <div class="listRowInner">
                <span class="itemRowtitle">Permisos</span>
                <span class="smallDetails">Detalle Permisos</span>
              </div>
            </div>
            <div class="col-lg-3 col-sm-2 hideMobile990">
              <div class="listRowInner">
                <span class="itemRowtitle">Grupos</span>
                <span class="smallDetails">Detalles grupos</span>
              </div>
            </div>
            <div class="listActions Hidden">
              <a><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>
              <a><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>
            </div>
          </div>
          <!-- List Item -->
          <!-- List Item -->
          <div class="row listRow listRow2">
            <div class="col-lg-3 col-md-4 col-md-5">
              <div class="listRowInner">
                <img class="img-circle" src="<?php echo $Admin->Img; ?>" alt="user image">
                <span class="itemRowtitle">Leandro Andrade (Javzero)</span>
                <span class="smallDetails">Ultima Conexi&oacute;n: 22/25/24 | 22:00Hs.</span>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 hideMobile990">
              <div class="listRowInner">
                <span class="itemRowtitle">Perfil</span>
                <span class="smallDetails">Nombre Perfil</span>
              </div>
            </div>
            <div class="col-lg-2 col-sm-2 hideMobile990">
              <div class="listRowInner">
                <span class="itemRowtitle">Permisos</span>
                <span class="smallDetails">Detalle Permisos</span>
              </div>
            </div>
            <div class="col-lg-3 col-sm-2 hideMobile990">
              <div class="listRowInner">
                <span class="itemRowtitle">Grupos</span>
                <span class="smallDetails">Detalles grupos</span>
              </div>
            </div>
            <div class="listActions Hidden">
              <a><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>
              <a><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>
            </div>
          </div>
          <!-- List Item -->

        </div><!-- container-fluid -->
      </div><!-- row -->
    </div><!-- /.box-body -->
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
