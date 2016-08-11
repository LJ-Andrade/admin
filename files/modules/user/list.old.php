<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios Administradores");
    $Head->setHead();

    $Buttons = new HeadButton('Agregar Usuario');
    $Buttons->SetButton('Ver Listado','animated fadeIn mainbtn modBtnList','fa-th-list  fa-fw','viewListBtn');
    $Buttons->SetButton('Ver Grilla','animated fadeIn mainbtn modBtnList Hidden','fa-th  fa-fw','viewGridBtn');

    $Status = $_GET['status']? $_GET['status']: 'A';

    $Users = $DB->fetchAssoc('admin_user','*',"status = '".$Status."' ","admin_id");
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
        </div>
      </div>
      <!-- /Filters / Search -->

      <!-- Grid View -->
      <div id="" class="row-centered rowgridview viewgrid">
        <?php
          foreach($Users as $Key=>$User){
            $User = new AdminData($User['admin_id']);
        ?>
        <!--    Users   -->
        <div id="itemGrid<?php echo $User->AdminID ?>" item="<?php echo $User->AdminID ?>" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral deleteableItem itemGrid <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
          <div class="userMainSection">
            <div class="userimgdiv"><img src="<?php echo $User->Img; ?>" id="userimage" class="img-responsive userimg"></div>
            <div class="row usernamediv">
              <span class="usernametxt"><span class="col-sm-12"><?php echo  $User->FullName; ?></span> <span class="col-lg-12 col-sm-12 col-xs-12">(<?php echo $User->User ?>)</span></span><br>
              <span class="usernametxt2"><?php echo ucfirst($User->ProfileName); ?></span>
            </div>
          </div>
          <div id="usericosid" class="UserButtons delModDivList text-center Hidden">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
            <?php if($User->AdminID!=$Admin->AdminID){ ?>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="itemGrid<?php echo $User->AdminID ?>/itemList<?php echo $User->AdminID ?>/itemMobile1List<?php echo $User->AdminID ?>/itemMobile2List<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- /Grid View  -->

      <div class="ListWrapper Hidden">
      <!-- //////// User List View Titles ///////////-->
        <div id="" class="viewlist row animated fadeIn">
          <!-- Titles  -->
          <div class="glassListRow listRow listTits">
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Im&aacute;gen</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Usuario</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Nombre</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Perfil</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Grupos</p></div>
            <div class="col-md-3 col-sm-3 col-xs-12"><p>&Uacute;ltima Conexi&oacute;n</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Mod.</p></div>
          </div> <!-- /Titles  -->
          <!-- ////////////   Product/Items (List)  ////////////////////////// -->
          <?php foreach($Users as $User){ $User = new AdminData($User['admin_id']);?>
          <div id="itemList<?php echo $User->AdminID ?>" item="<?php echo $User->AdminID ?>" class="glassListRow listRow listHover deleteableItem <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
            <div class="col-md-1 col-sm-1 col-xs-12">
              <img src="<?php echo $User->Img; ?>" class="img-responsive listImg">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p><?php echo $User->User; ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p><?php echo $User->FullName; ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p><?php echo $User->ProfileName; ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Admin</p></div>
            <div class="col-md-3 col-sm-3 col-xs-12"><p><?php echo DateTimeFormat($User->AdminData['last_access']) ?></p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 japi">
              <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="itemGrid<?php echo $User->AdminID ?>/itemList<?php echo $User->AdminID ?>/itemMobile1List<?php echo $User->AdminID ?>/itemMobile2List<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
            </div>
          </div>
          <?php } ?>
          <!-- /User (List)  -->
        </div><!-- /User List View  -->
        <?php foreach($Users as $User){ $User = new AdminData($User['admin_id']);?>
        <!-- ////////////////////  User List View Mobile Large HERE - #ViewListMobile1 //////////////////////////// -->
        <div id="itemMobile1List<?php echo $User->AdminID ?>" item="<?php echo $User->AdminID ?>" class="row glassListRow viewListMobileLarge viewListMobile1 deleteableItem">
          <div class="col-md-2 col-sm-2 col-xs-3"><img id="#" src="<?php echo $User->Img; ?>" class="img-responsive"></div>
          <div class="col-md-3 col-sm-3 col-xs-3"><p><?php echo $User->User; ?></p></div>
          <div class="col-md-4 col-sm-4 col-xs-3"><p><?php echo $User->FullName; ?></p></div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="itemGrid<?php echo $User->AdminID ?>/itemList<?php echo $User->AdminID ?>/itemMobile1List<?php echo $User->AdminID ?>/itemMobile2List<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
          </div>
        </div><!-- /User List View Mobile Large -->
        <?php } ?>
        <!-- ////////////////////// User List View Mobile Small HERE - #ViewListMobile2 ///////////////// -->
        <?php foreach($Users as $User){ $User = new AdminData($User['admin_id']);?>
        <div id="itemMobile2List<?php echo $User->AdminID ?>" item="<?php echo $User->AdminID ?>" class="row glassListRow viewListMobile viewListMobile2 deleteableItem">
          <div class="col-md-4 col-xs-2"><img src="<?php echo $User->Img; ?>" class="img-responsive"></div>
          <div class="col-md-4 col-xs-5"><p><?php echo $User->User; ?></p></div>
          <div class="col-md-4 col-xs-5"><p><?php echo $User->FullName; ?></p></div>
          <div class="col-xs-12 viewListMobileMod animated Hidden">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred modBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="itemGrid<?php echo $User->AdminID ?>/itemList<?php echo $User->AdminID ?>/itemMobile1List<?php echo $User->AdminID ?>/itemMobile2List<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User; ?>' ?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>

            <div class="listMobileSelected">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </div><!-- /User List View Mobile Small  -->
        <?php } ?>
      </div>
      <!--Paginator-->
      <!-- <div class="paginat animated slideInUp">
        <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div> -->
      <!-- /Pagination-->
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
