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
        <div class="titleDiv">
          <div class="col-md-6 col-sm-7 col-xs-12 breadCrumTitle">
            <span class="breadCrums"><i class="fa fa-home"></i></span><i class="fa fa-angle-right"></i>
            <span class="breadCrums">Categor&iacute;as</span><i class="fa fa-angle-right"></i>
            <span class="mainTitle"><i class="fa fa-user" aria-hidden="true"></i>
             LISTADO DE CATEGOR&Iacute;AS</span>
          </div>
          <div class="col-md-6 col-sm-5 col-xs-12 titleDivOptions"><button type="button" class="mainbtn">Opcion</button></div>
        </div>
      </div><!-- /Title and options -->


      <!-- List View -->
      <div id="" class="row">
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
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
