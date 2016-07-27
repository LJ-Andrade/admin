<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios de Testeo");
    $Head->setHead();

    $Buttons = new HeadButton();
    $Buttons->SetButton('Agregar Usuario de Testeo','animated fadeIn mainbtn modBtnList','fa-user-plus  fa-fw','generate');
    //$Buttons->SetButton('Ver Grilla','animated fadeIn mainbtn modBtnList Hidden','fa-th  fa-fw','viewGridBtn');
    $TestUsers = $DB->fetchAssoc("test_user","*","","creation_date");
?>
<body>
  <div id="wrapper"><!--  Wrapper -->
      
      <?php include('../../includes/inc.subtop.php'); print_r($TestUsers); echo $_SESSION['access_token'].'****'; ?>

       
      <div class="ListWrapper">
      <!-- //////// User List View Titles ///////////-->
        <div id="" class="viewlist row animated fadeIn">
          <!-- Titles  -->
          <div class="glassListRow listRow listTits">
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Im&aacute;gen</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Usuario</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Password</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Email</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Estado</p></div>
            <div class="col-md-3 col-sm-3 col-xs-12"><p>&Uacute;ltima Conexi&oacute;n</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>ID</p></div>
          </div> <!-- /Titles  -->
          <!-- ////////////   Product/Items (List)  ////////////////////////// -->
          <?php foreach($TestUsers as $User){?>
          <div id="itemList<?php echo $User['id'] ?>" item="<?php echo $User['id'] ?>" class="glassListRow listRow listHover deleteableItem">
            <div class="col-md-1 col-sm-1 col-xs-12">
              <img src="<?php echo $Admin->DefaultImg; ?>" class="img-responsive listImg">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p><?php echo $User['nickname'] ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p><?php echo $User['password'] ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p><?php echo $User['email'] ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p><?php echo $User['site_status'] ?></p></div>
            <div class="col-md-3 col-sm-3 col-xs-12"><p><?php echo DateTimeFormat($User['creation_date']) ?></p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p><?php echo $User['id'] ?></p></div>
          </div>
          <?php } ?>
          <!-- /User (List)  -->
        </div><!-- /User List View  -->
        <?php foreach($Users as $User){ $User = new AdminData($User['admin_id']);?>
        <!-- ////////////////////  User List View Mobile Large HERE - #ViewListMobile1 //////////////////////////// -->
        <div id="itemMobile1List<?php echo $User->AdminID ?>" item="<?php echo $User->AdminID ?>" class="row viewListMobileLarge viewListMobile1 deleteableItem">
          <div class="col-md-2 col-sm-2 col-xs-3"><img id="#" src="<?php echo $User->Img; ?>" class="img-responsive listImg"></div>
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
        <div id="itemMobile2List<?php echo $User->AdminID ?>" item="<?php echo $User->AdminID ?>" class="row viewListMobile viewListMobile2 deleteableItem">
          <div class="col-md-4 col-xs-2 listMobile2Img"><img src="<?php echo $User->Img; ?>" class="img-responsive listImg"></div>
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
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
