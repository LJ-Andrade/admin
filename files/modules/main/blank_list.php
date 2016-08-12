<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Blank");
  $Head->setSubTitle("List & Grid");
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>

  <div class="box">
    <div class="box-body">
      <div class="changeView">
        <button class="ShowList btn"><i class="fa fa-list"></i></button>
        <button class="ShowGrid btn"><i class="fa fa-th-large"></i></button>
      </div>
      <div class="horizontal-list flex-justify-center">
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
      <div class="row">
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
            <div class="listActions flex-justify-center Hidden">
              <div>
                <a><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>
                <a><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>
              </div>
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
            <div class="listActions flex-justify-center Hidden">
              <div>
                <a><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>
                <a><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>
              </div>
            </div>
          </div>
          <!-- List Item -->

        </div><!-- container-fluid -->
      </div><!-- row -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->

<!-- DELETE SELECTED BUTTON -->
<a href="#">
  <div class="deleteSelectedAbs Hidden">
    Eliminar Seleccionados
  </div>
</a>
<!-- DELETE SELECTED BUTTON-->
<?php
  include('../../includes/inc.bottom.php');
?>
