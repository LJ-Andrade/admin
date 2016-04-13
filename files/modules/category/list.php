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
          <div class="listtit glassListRow">
            <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 titlist1">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 titlist2">
              <h5>Categoría</h5>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist3">
              <h5>Dependencia</h5>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist4">
              <h5>Productos Asociados</h5>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist5">
              <h5>Categorías Dependientes</h5>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist6">
              <h5 class="text-center">Editar / Eliminar</h5>
            </div>
          </div>
          <!-- /Titles  -->
          <?php if(count($Categories)<1){ ?>
          <div id="emptylist" class="container-fluid listrow glassListRow" style="text-align:center;display:block;"><p>No existen categorías, puede crear una haciendo click&nbsp;<a href="new.php">aqui</a></p></div>
          <?php }?>
          <?php
            foreach($Categories as $Category){
            $Category = new Category($Category['category_id']);
          ?>
          <!-- Items -->
          <div id="list<?php echo $Category->ID ?>" class="container-fluid glassListRow listrow">
            <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 col1listus">
              <img src="<?php echo $Category->Data['image']; ?>" class="img-responsive userimglist">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col2listus">
              <?php echo $Category->Data['title']; ?>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col3listus">
              <p><?php echo $Category->getParent($Category->Data['parent_id']); ?></p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col4listus">
              <p><?php echo $Category->insertProducts(); ?></p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col5listus">
              <p><?php echo $Category->insertDependencies(); ?></p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col6listus">
              <div class="delmoddiv">
                <ul>
                  <li class="btnmod"><a href="edit.php?id=<?php echo $Category->ID ?>"><i class="fa fa-fw fa-pencil"></i></a></li>
                  <li class="btndel deleteElement" deleteElement="<?php echo $Category->ID ?>" deleteParent="list<?php echo $Category->ID ?>/category<?php echo $Category->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar la categoría '<?php echo $Category->Data['title']; ?>'?" successText="La categoría '<?php echo $Category->Data['title'] ?>' ha sido eliminada correctamente"><i class="fa fa-fw fa-trash"></i></li>
                  <!--
                  Cambiar por esto
                  <li><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></li>
                  <li><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></li> -->
                </ul>
              </div>
            </div>
          </div>
        <!-- /Items (List) -->
        <?php } ?>
      </div><!-- /List View  -->
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
