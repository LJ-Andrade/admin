<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios Administradores");
    $Head->setHead();

    $Status = $_GET['status']? $_GET['status']: 'A';

    $Categories = $DB->fetchAssoc('category','*',"status = '".$Status."' ","parent_id");
?>
<body>
  <div id="wrapper"><!--  Wrapper -->
    <?php include '../../includes/inc.subTop.php'; ?>
    <div class="container-fluid pageWrapper">

      <div class="ListWrapper">
      <!-- List View -->
        <div id="" class="row viewlist animated fadeIn">
          <!-- Titles  -->
          <div class="glassListRow listRow listTits">
            <div class="col-md-1 col-sm-1 col-xs-12"><h5>Im&aacute;gen</h5></div>
            <div class="col-md-3 col-sm-3 col-xs-12"><h5>Categoría</h5></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><h5>Dependencia</h5></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><h5>Productos Asociados</h5></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><h5>Categorías Dependientes</h5></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><h5>Editar / Eliminar</h5>
            </div>
          </div>
          <!-- /Titles  -->
          <?php if(count($Categories)<1){ ?>
          <div id="emptylist" class="glassListRow listRow" style="text-align:center;display:block;"><p>No existen categorías, puede crear una haciendo click&nbsp;<a href="new.php">aqui</a></p></div>
          <?php }?>
          <?php
            foreach($Categories as $Category){
              $Category = new Category($Category['category_id']);
          ?>
          <!-- Items -->
          <div id="list<?php echo $Category->ID ?>" class="glassListRow listRow listHover">
            <div class="col-md-1 col-sm-1 col-xs-12">
              <img src="<?php echo $Category->Data['image']; ?>" class="img-responsive">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-12"><p><?php echo $Category->Data['title']; ?></p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p><?php echo $Category->getParent($Category->Data['parent_id']); ?></p></div>
            <div class="col-md-2 col-sm-1 col-xs-12"><p><?php echo $Category->insertProducts(); ?></p></div>
            <div class="col-md-2 col-sm-1 col-xs-12"><p><?php echo $Category->insertDependencies(); ?></p></div>
            <div class="col-md-2 col-sm-1 col-xs-12">
              <a href="edit.php?id=<?php echo $Category->ID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList" deleteElement="<?php echo $Category->ID ?>" deleteParent="list<?php echo $Category->ID ?>/category<?php echo $Category->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar la categoría '<?php echo $Category->Data['title']; ?>'?" successText="La categoría '<?php echo $Category->Data['title'] ?>' ha sido eliminada correctamente"><i class="fa fa-trash"></i></button></a>
            </div>
          </div>

          <!-- /Items (List) -->
          <?php } ?>

        </div><!-- /List View  -->

        <!-- User List View Mobile Large  -->
        <div id="" item="" class="row glassListRow viewListMobileLarge viewListMobile1 deleteableItem">
          <div class="col-md-2 col-sm-2 col-xs-3"><img id="#" src="../../../skin/images/products/01.jpg" class="img-responsive"></div>
          <div class="col-md-3 col-sm-3 col-xs-3"><p>Categoria</p></div>
          <div class="col-md-4 col-sm-4 col-xs-3"><p>Otro</p></div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="itemGrid<?php echo $User->AdminID ?>/itemList<?php echo $User->AdminID ?>/itemMobile1List<?php echo $User->AdminID ?>/itemMobile2List<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
          </div>
        </div><!-- /User List View Mobile Large -->


        <!-- User List View Mobile Small -->
        <div id="" item="" class="row glassListRow viewListMobile viewListMobile2 deleteableItem">
          <div class="col-md-4 col-xs-2"><img id="#" src="../../../skin/images/products/01.jpg"></div>
          <div class="col-md-4 col-xs-5"><p>Categoria</p></div>
          <div class="col-md-4 col-xs-5"><p>Otro</p></div>
          <div class="col-xs-12 viewListMobileMod animated Hidden">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred modBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="itemGrid<?php echo $User->AdminID ?>/itemList<?php echo $User->AdminID ?>/itemMobile1List<?php echo $User->AdminID ?>/itemMobile2List<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User; ?>' ?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>

            <div class="listMobileSelected">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </div><!-- /User List View Mobile Small  -->
      </div>
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
