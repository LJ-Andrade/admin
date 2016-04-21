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
      <h4 class="mainTitle">Listado de Categorías de Productos</h4>
        <div class="glassListRow optionsdiv">
          <span id="delselected" class="delselected animated slideInDown"><i class="fa fa-trash"></i> Eliminar seleccionadas</span>
          <a href="new.php"><button class="mainbtn"><i class="fa fa-user-plus"></i> Agregar Categoría</button></a>
        </div>
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
            <div class="delModDiv text-center">
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
