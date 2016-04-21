<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios Administradores");
    $Head->setHead();

    $Status = $_GET['status']? $_GET['status']: 'A';

    $Users = $DB->fetchAssoc('admin_user','*',"status = '".$Status."' ","admin_id");
?>
<body>
  <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
  <div id="wrapper"><!--  Wrapper -->
    <div class="container-fluid">
      <div class="maintitle"><h4 class="maintitletxt">Listado de Usuarios Administradores</h4></div>
      <div class="glasscontainer1 optionsdiv">
        <span id="delselected" class="delselected animated slideInDown"><i class="fa fa-trash"></i> Eliminar seleccionados</span>
        <a href="new.php"><button class="mainbtn"><i class="fa fa-user-plus"></i> Agregar usuario</button></a>
      </div>
      <!-- Filters / Search -->
      <div class="container-fluid">
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
        </div>
      </div><!-- /Filters / Search -->
      <!-- Grid View -->
      <div id="viewgrid" class="row-centered rowgridview">
        <?php
          foreach($Users as $User){
            $User = new AdminData($User['admin_id']);
        ?>
        <!--    Users   -->
        <div id="user<?php echo $User->AdminID ?>" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
          <div class="userMainSection">
            <div class="userimgdiv"><img src="<?php echo $User->Img; ?>" id="userimage" class="img-responsive userimg"></div>
            <div class="row usernamediv">
              <span class="usernametxt"><span class="col-sm-12"><?php echo  $User->FullName; ?></span> <span class="col-lg-12 col-sm-12 col-xs-12">(<?php echo $User->User ?>)</span></span><br>
              <span class="usernametxt2"><?php echo ucfirst($User->ProfileName); ?></span>
            </div>
          </div>
          <div id="usericosid" class="UserButtons delModDivList text-center">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
            <?php if($User->AdminID!=$Admin->AdminID){ ?>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div><!-- /Grid View  -->
      <!-- List View -->
      <div id="viewlist" class="row">
        <!-- Titles  -->
        <div class="glassListRow listTitDiv">
          <div class="col-md-1 col-sm-1 listTit"><p>Imágen</p></div>
          <div class="col-md-3 col-sm-2 listTit"><p>Nombre</p></div>
          <div class="col-md-2 col-sm-3 listTit"><p>Permisos</p></div>
          <div class="col-md-2 col-sm-1 listTit"><p>Grupo</p></div>
          <div class="col-md-3 col-sm-2 listTit"><p>Última Conexion</p></div>
          <div class="col-md-1 col-sm-2 listTit listTitLast"><p>Mod.</p></div>
        </div> <!-- /Titles  -->
        <?php
          foreach($Users as $User){
            $User = new AdminData($User['admin_id']);
        ?>
        <!-- Items -->
        <div id="userlist<?php echo $User->AdminID ?>" class="glassListRow listRow <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
          <div class="col-md-1 col-sm-1 colList colListFirst"><img src="<?php echo $User->Img; ?>" class="img-responsive listImg radio100"></div>
          <div class="col-md-3 col-sm-2 colList"><?php echo $User->FullUserName; ?></div>
          <div class="col-md-2 col-sm-2 colList"><p><?php echo $User->ProfileName; ?></p></div>
          <div class="col-md-2 col-sm-1 colList"><p>Admin</p></div>
          <div class="col-md-3 col-sm-2 colList"><p><?php echo DateTimeFormat($User->AdminData['last_access']) ?></p></div>
          <div class="col-md-1 col-sm-2 colList colListLast">
            <div class="delModDivList text-center">
              <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
              <?php if($User->AdminID!=$Admin->AdminID){ ?>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
              <?php } ?>
            </div>
          </div>
        </div><!-- /Items (List) -->
        <?php } ?>
      </div><!-- /ViewList  -->


      <!-- Product List View Mobile  -->
      <div class="row viewListMobile">
        <div class="col-md-12 col-xs-12 pad0">
          <div class="col-md-4 col-xs-4 pad0">
            <img id="#" src="../../../skin/images/products/01.jpg" class="img-responsive listImg">
          </div>
          <div class="col-md-4 col-xs-4 vlMobileTxt pad0"><p>Vestido Loco</p></div>
          <div class="col-md-1 col-xs-4 vlMobileTxt"><p>$150</p></div>
        </div>
        <div class="col-xs-12 viewListMobileMod">
          <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
          <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
        </div>
      </div>
      <!-- /Product List View Mobile  -->


    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
