<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Renovatio Home");
  $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include '../../includes/inc.subTop.php'; ?>
    <div class="container-fluid pageWrapper">
        <!-- Cards For Links -->

        <div class="cardContainer">
          <div class="col-md-4 col-sm-6 col-xs-12 genCard">
            <div class="genCardHead">
              <a href="#"><i class="fa fa-tags"></i></a>
            </div>
            <div class="genCardContent">
              <span>Agregar Producto</span>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 genCard">
            <div class="genCardHead">
              <a href="#"><i class="fa fa-list-ul"></i></a>
            </div>
            <div class="genCardContent">
              <span>Lista de Productos</span>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 genCard">
            <div class="genCardHead">
              <a href="#"><i class="fa fa-user-plus"></i></a>
            </div>
            <div class="genCardContent">
              <span>Agregar Usuario</span>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 genCard">
            <div class="genCardHead">
              <a href="#"><i class="fa fa-list-ul"></i></a>
            </div>
            <div class="genCardContent">
              <span>Lista de Usuarios</span>
            </div>
          </div>
        </div><!-- /Cards For Links -->
        <div class="container">
          <a href="../elements/listElements.php">Common Elements</a>
        </div>

    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
