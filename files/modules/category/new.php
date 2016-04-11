<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Nueva Categoría");
  $Head->setHead();

?>
<body>
  <div id="wrapper">
  <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
  <?php echo insertElement("hidden","action",'insert'); ?>
    <div class="windowHead"><h3>Agregar Nueva Categoría</h3></div>
    <div class="container animated fadeIn additemdiv">
      <div class="col-sm-12 form-box formitems">
        <!-- Inputs -->
        <div id="newInputs">
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','title','','form-first-name form-controlusers','placeholder="Nombre de la categoría" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." validateFromFile="process.php/La categoría ya existe/action:=validate"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <?php echo insertElement('select','parent','','form-controlusers','tabindex="2"',$DB->fetchAssoc("category","category_id,title","status='A'","title"),'0','Categoría Principal'); ?>
            </div>
          </div>
          <div class="col-md-6 animated bounceInRight switchuser">
            <div class="col-md-12 userstatustit">Estado</div>
            <div class="col-md-12"><input type="checkbox" class="centered" name="status" id="status" data-on-text="Activa" data-off-text="Inactiva" data-size="large" data-label-width="auto" checked>
            </div>
          </div>
        </div>
        <!-- /Inputs -->
        <!-- Imgs To select -->
        <div id="imgsToSelect" class="row ">
          <div class="row selectImgTitle">
            <h4>Elija una im&aacute;gen</h4>
            <button id="cancelSelectImgBtn" class="btn closeBtn"><i class="fa fa-times"></i></button>
          </div>
          <div class="row imgCatalogue">
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/users/mas.jpg" alt="" class="img-responsive thumbimgadd AddNewImage">
              <?php echo insertElement('file','AddNewImage','','Hidden') ?>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/genericproduct.png" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/cod3.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/cod4.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
            </div>
          </div>
        </div>
        <!-- /Imgs To select -->
        <div class="col-md-6 animated bounceInRight selectImgDiv centrarbtn">
          <img src="" alt="" id="shownimg" class="img-responsive thumbimgadd Hidden">
          <?php echo insertElement('hidden','img','') ?>
          <button id="selectImgBtn" class="btn mainbtn">Seleccionar Im&aacute;gen</button>
        </div>
      </div>
    </div>
    <!-- Create User Button Div  -->
    <div class="container animated fadeInUp donediv">
         <div class="form-group">
           <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Categoría</a>
           <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear y Agregar Otra</a>
         </div>
    </div>
    <!-- /Create User Button Div  -->
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
