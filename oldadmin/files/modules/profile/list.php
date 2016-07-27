<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Perfiles");
    $Head->setHead();

    //$Status = $_GET['status']? $_GET['status']: 'A';

    $Profile = new ProfileData();
?>
<body>
  <div id="wrapper"><!--  Wrapper -->
    <?php include('../../includes/inc.subtop.php'); ?>
    <div class="container-fluid pageWrapper">

      <!-- Filters / Search -->
        <div id="filtersuser" class="row row-centered filterdiv">
          <form class="form-inline filterformdiv" role="form">
            <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bookmark-o fa-fw"></i></span>
                <select class="form-control" name="category">
                  <option>Categor&iacute;a...</option>
                  <option>Camas</option>
                  <option>Perros</option>
                  <option>Sillas</option>
                  <option>Mesas</option>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bookmark-o fa-fw"></i></span>
                <input type="text" class="form-control" placeholder="Nombre"/>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                <input type="text" class="form-control" placeholder="Precio"/>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-qrcode fa-fw"></i></span>
                <input type="text" class="form-control" placeholder="C&oacute;digo \ Modelo"/>
              </div>
            </div>
          </form>
        </div><!-- /Container Filters / Search -->
      <!-- Grid View -->
      <div id="viewgrid" class="row-centered rowgridview">
        <?php echo $Profile->MakeProfileList();  ?>
      </div><!-- /Grid View  -->
      <!-- List View -->
      <div id="viewlist" class="row">
        <!-- Titles  -->
        <div class="listtit glasscontainer1">
          <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 titlist1">
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 titlist2">
            <h5>Nombre</h5>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist3">
            <h5>Permisos</h5>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist4">
            <h5>Grupo</h5>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist5">
            <h5>&Uacute;ltimo Acceso</h5>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist6">
            <h5 class="text-center">Editar / Eliminar</h5>
          </div>
        </div> <!-- /Titles  -->
        <?php
                // foreach($Users as $User){
                //     $User = new AdminData($User['admin_id']);
        ?>
        <!-- Items -->
        <div id="userlist<?php echo $User->AdminID ?>" class="container-fluid glasscontainer1 listrow <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
          <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 col1listus">
            <img src="<?php echo $User->Img; ?>" class="img-responsive userimglist">
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col2listus">
            <?php echo  $User->FullUserName; ?>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col3listus">
            <p>Administrador</p>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col4listus">
            <p>Admin</p>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col5listus">
            <p>5 de Marzo 2016 &#124; 22:33 hs</p>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col6listus">
            <div class="usericoslist">
              <ul>
                <li class="btnmod"><a href="edit.php?id=<?php echo $User->AdminID ?>"><i class="fa fa-fw fa-pencil"></i></a></li>
                <li deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente" class="deleteElement btndel"><i class="fa fa-fw fa-trash"></i></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /Items  -->
        <?php //} ?>
      </div><!-- /List View  -->
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
