<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios Administradores");
    $Head->setHead();

    $Status = $_GET['status']? $_GET['status']: 'A';

    $Categories = $DB->fetchAssoc('category','*',"status = '".$Status."' ","parent_id");
?>
<body>
  <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
  <div id="wrapper"><!--  Wrapper -->
    <div class="container-fluid">
    <!-- Title and options -->
      <div class="row">
        <div class="titleDiv"><!-- Page Title & back btn -->
          <div class="optionIcons backOpt">
            <ul>
              <li id="backtolastpage" class="animated fadeIn SubTopBtn">
                <a href="javascript: history.go(-1)" class="btn subitbtn BackToLastPage" role="button">
                <i class="fa fa-angle-double-left"></i> Volver</a></li>
            </ul>
          </div>
          <h4 class="maintitletxt">Listado de Categorías de Productos</h4>
        </div>
        <div class="optionsDiv"><!-- Option Icons & Buttons-->
          <button id="delselected" class="delselected animated slideInDown mainbtn mainbtnred"><i class="fa fa-trash"></i> Eliminar seleccionados</button>
          <a href="new.php"><button class="mainbtn"><i class="fa fa-user-plus"></i> Agregar Categoría</button></a>
          <div class="optionIcons">
            <ul><!-- View Icons -->
              <li id="viewlistbt" class="animated fadeIn SubTopBtn "><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
              <li id="viewgridbt" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Grilla </a></li>
              <!-- Search -->
              <li id="showitemfiltersuser" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <li id="showitemfilters" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <!-- Add New Item -->
              <li id="newprod" class="Hidden"><a href="../product/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Nuevo Producto</a></li>
              <li id="newuser" class="Hidden"><a href="../user/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-user-plus  fa-fw"></i> Nuevo Usuario</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Title and options -->
      <!-- List View -->
      <div id="viewlist" class="row">
        <!-- Titles  -->
        <!-- <div class="glassListRow listTitDiv">
          <div class="col-md-1 col-sm-1 col-xs-12 listTit"></div>
          <div class="col-md-1 col-sm-1 col-xs-12 listTit"><h5>Categoría</h5></div>
          <div class="col-md-1 col-sm-1 col-xs-12 listTit"><h5>Dependencia</h5></div>
          <div class="col-md-1 col-sm-1 col-xs-12 listTit"><h5>Productos Asociados</h5></div>
          <div class="col-md-1 col-sm-1 col-xs-12 listTit"><h5>Categorías Dependientes</h5></div>
          <div class="col-md-1 col-sm-1 col-xs-12 listTit listTitLast"><h5 class="text-center">Editar / Eliminar</h5>
          </div>
        </div> -->
        <!-- /Titles  -->
        <?php if(count($Categories)<1){ ?>
        <div id="emptylist" class="glassListRow listRow" style="text-align:center;display:block;"><p>No existen categorías, puede crear una haciendo click&nbsp;<a href="new.php">aqui</a></p></div>
        <?php }?>
        <?php
          foreach($Categories as $Category){
            $Category = new Category($Category['category_id']);
        ?>
        <!-- Items -->
        <div id="list<?php echo $Category->ID ?>" class="glassListRow listRow">
          <div class="col-md-1 col-sm-1 col-xs-12 colList colListFirst">
            <img src="<?php echo $Category->Data['image']; ?>" class="img-responsive listImg">
          </div>
          <div class="col-md-3 col-sm-2 col-xs-12 colList"><p><?php echo $Category->Data['title']; ?></p></div>
          <div class="col-md-2 col-sm-2 col-xs-12 colList"><p><?php echo $Category->getParent($Category->Data['parent_id']); ?></p></div>
          <div class="col-md-2 col-sm-1 col-xs-12 colList"><p><?php echo $Category->insertProducts(); ?></p></div>
          <div class="col-md-2 col-sm-1 col-xs-12 colList"><p><?php echo $Category->insertDependencies(); ?></p></div>
          <div class="col-md-2 col-sm-1 col-xs-12 colList colListLast">
            <div class="delModDivList text-center">
              <a href="edit.php?id=<?php echo $Category->ID ?>"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred" deleteElement="<?php echo $Category->ID ?>" deleteParent="list<?php echo $Category->ID ?>/category<?php echo $Category->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar la categoría '<?php echo $Category->Data['title']; ?>'?" successText="La categoría '<?php echo $Category->Data['title'] ?>' ha sido eliminada correctamente"><i class="fa fa-trash"></i></button></a>
            </div>
          </div>
        </div>

        <!-- /Items (List) -->
        <?php } ?>

      </div><!-- /List View  -->
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
