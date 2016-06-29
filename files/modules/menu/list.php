<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Listado de Menúes");
    $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.subtop.php'); ?>
    <div class="container-fluid pageWrapper">
      
      <div id="" class="row">
          <!-- Titles  -->
        <div class="glassListRow listRow listTits">
          <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12"><h5>Icono</h5></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><h5>Nombre</h5></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><h5>Link</h5></div>
          <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12"><h5>Permisos</h5></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><h5>Grupo</h5></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><h5>&Uacute;ltimo Acceso</h5></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><h5>Editar / Eliminar</h5></div>
        </div> <!-- /Titles  -->
        <!-- Menu Items -->
        <div id="" class="glassListRow listRow listHover">
          <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12">
            <i class="fa fa-home"></i>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><p>Inicio</p></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><p>index.php</p></div>
          <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12"><p>Activo</p></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><p>Menu Principal</p></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><p>21-21-1998</p></div>
          <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a href="edit.php?id=<?php echo $Category->ID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList" deleteElement="<?php echo $Category->ID ?>" deleteParent="list<?php echo $Category->ID ?>/category<?php echo $Category->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar la categoría '<?php echo $Category->Data['title']; ?>'?" successText="La categoría '<?php echo $Category->Data['title'] ?>' ha sido eliminada correctamente"><i class="fa fa-trash"></i></button></a>
          </div>
        </div><!-- Menu Items -->


        <?php echo $Menu->MakeList() ?>
      </div>
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
