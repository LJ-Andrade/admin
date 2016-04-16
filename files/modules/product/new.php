<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Producto");
    $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
    <?php echo insertElement("hidden","action",'insert'); ?>
    <!-- New Item Window -->
    <div class="windowHead"><h3><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Nuevo Producto</h3></div><!-- WindowHead (Title) -->
    <div class="container animated fadeIn addItemDiv">
      <div class="col-sm-12 form-box formitems">
        <!-- Inputs -->
        <div id="newInputs">
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <!-- Title  -->
              <input id="" name="user" class="form-first-name formNewItem" placeholder="T&iacute;tulo" type="text">
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <!-- Code  -->
              <input id="" name="user" class="form-first-name formNewItem" placeholder="C&oacute;digo" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <!-- Composition (Fabric) -->
              <input id="" name="user" class="form-first-name formNewItem" placeholder="Composici&oacute;n" type="text">
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <!-- Price -->
              <input id="" name="user" class="form-first-name formNewItem" placeholder="Precio" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group animated bounceInRight">
              <div class="addItemSizesTit">
                <span>Talles</span>
                <hr>
              </div>
              <div class="form-group">
                <ul class="col-md-6">
                  <li><input id="sizeXS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXS"><span>XS</span></li>
                  <li><input id="sizeS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeS"><span>S</span></li>
                  <li><input id="sizeM" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeM"><span>M</span></li>
                </ul>
                <ul class="col-md-6">
                  <li><input id="sizeL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeL"><span>L</span></li>
                  <li><input id="sizeXL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXL"><span>XL</span></li>
                  <li><input id="sizeXXL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXXL"><span>XXL</span></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <div class="addItemSizesTit">
                <span>Colores</span>
                <hr>
              </div>
              <div class="circles circlesAddItem">
                <ul>
                  <li><div class="circle circleAddItem" style="background-color: #fff"></div></li>
                  <li><div class="circle circleAddItem" style="background-color: #c17996"></div></li>
                  <li><div class="circle circleAddItem" style="background-color: #768754"></div></li>
                  <li><div class="circle circleAddItem" style="background-color: #5643a0"></div></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Character counter -->
          <div class="row form-group animated bounceInDown addItemDescription">
            <form class="form-group">
              <?php echo insertElement('textarea','description',$Data['description'],'form-controlitems textareaitems text-center','placeholder="Descripción" rows="4" maxlength="150"'); ?>
              <div class="remchar"><p> Caracteres restantes: </p></div>
              <div class="indicator-wrapper">
                <div class="indicator"><span class="current-length">150</span></div>
              </div>
            </form>
          </div>
          <!-- /Character counter -->
          <div class="col-md-6 animated bounceInRight switchuser">
            <div class="col-md-12 userstatustit">Estado</div>
            <div class="col-md-12"><input type="checkbox" class="centered" name="status" id="status" data-on-text="Publicado" data-off-text="Pausado" data-size="mini" data-label-width="auto" checked>
            </div>
          </div>
        </div>
        <!-- /Inputs -->
        <!-- Imgs To select -->
        <div id="imgsToSelect" class="row">
          <div class="row selectImgTitle">
            <h4>Elija una im&aacute;gen</h4>
            <button id="cancelSelectImgBtn" class="btn closeBtn"><i class="fa fa-times"></i></button>
          </div>
          <div class="row imgCatalogue">
            <div class="col-md-3 col-sm-6 col-xs-6">
              <img src="../../../skin/images/users/mas.jpg" alt="" class="img-responsive thumbimgadd AddNewImage">
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
          <div class="centrarbtn">
            <a href="#"><button type="button" name="button" class="btn mainbtn addImgDiv"> Agregar</button></a>
          </div>
        </div>
        <!-- /Imgs To select -->
        <div class="col-md-6 animated bounceInRight selectImgDiv centrarbtn">
          <button id="selectImgBtn" class="btn mainbtn">Seleccionar Im&aacute;gen</button>
        </div>
      </div>
    </div>
    <!-- Create User Button Div  -->
    <div class="container animated fadeInUp donediv">
      <div class="form-group">
        <a href="#" class="btn mainbtn" role="button" id=""><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</a>
        <a href="#" class="btn mainbtn" role="button" id=""><i class="fa fa-plus-square" aria-hidden="true"> </i> Crear y Agregar Otro...</a>
      </div>
    </div>
    <!-- /Create User Button Div  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
