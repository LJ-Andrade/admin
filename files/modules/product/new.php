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
    <!-- WindowHead -->
    <div class="row windowHead">
      <div class="col-md-6 col-xs-12">
        <h3><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Nuevo Producto</h3>
      </div>
      <div class="col-md-6 col-xs-12 switchDiv switchHead">
        <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto">
      </div>
    </div><!-- /WindowHead -->
    <div class="container animated fadeIn addItemDiv">
      <div class="col-sm-12 form-box formitems">
        <!-- Inputs -->
        <div id="newInputs">
          <div class="row"><!-- Title & Code -->
            <div class="col-md-6 form-group animated bounceInLeft">
              <input id="" name="user" class="form-first-name formNewItem" placeholder="T&iacute;tulo" type="text">
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">

              <input id="" name="user" class="form-first-name formNewItem" placeholder="C&oacute;digo" type="text">
            </div>
          </div>
          <div class="row"><!-- Composition & Price -->
            <div class="col-md-6 form-group animated bounceInLeft">
              <input id="" name="user" class="form-first-name formNewItem" placeholder="Composici&oacute;n" type="text">
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <input id="" name="user" class="form-first-name formNewItem" placeholder="Precio" type="text">
            </div>
          </div>
          <div class="row"><!-- Sizes & Colors -->
            <div class="col-md-6 form-group animated bounceInRight">
              <div class="addItemSizesTit">
                <span>Talles</span>
                <hr>
              </div>
              <div class="form-group addItemSizes">
                <ul>
                  <li><input id="sizeXS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXS"><span>XS</span></li>
                  <li><input id="sizeS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeS"><span>S</span></li>
                  <li><input id="sizeM" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeM"><span>M</span></li>
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
          <!-- Description & To Select Image Link -->
          <!-- Description (Character counter) -->
          <div class="col-md-6 form-group animated bounceInDown addItemDescription">
            <form class="form-group">
              <?php echo insertElement('textarea','description',$Data['description'],'form-controlitems textareaitems text-center','placeholder="Descripción" rows="4" maxlength="150"'); ?>
              <div class="remchar"><p> Caracteres restantes: </p></div>
              <div class="indicator-wrapper">
                <div class="indicator"><span class="current-length">150</span></div>
              </div>
            </form>
          </div>
          <!-- /Description (Character counter) -->
          <div class="col-md-6 animated bounceInRight text-center selectedImg"><!-- Select Img Button -->
            <span id="selectImgBtn"><img src="../../../skin/images/users/mas.jpg" alt="" /></span>
          </div>
        </div><!-- /newInputs -->
        <div class="row selectImgMain"><!-- Images -->
          <!-- <span id="cancelImgChange" class="eraseImgX"><i class="fa fa-times"></i></span> -->
          <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
          <h5>Im&aacute;genes del Producto</h5>
          <div class="row col-md-12 dragImgPublic">
            <ul class="connected sortable grid">
              <li><img src="../../../skin/images/users/mas.jpg" alt="" /></li>
        			<li><img src="../../../skin/images/users/usergen.png" alt="" /></li>
        			<li><img src="../../../skin/images/products/7.jpg" alt="" /></li>
        			<li><img src="../../../skin/images/products/cod1.jpg" alt="" /></li>
        			<li><img src="../../../skin/images/products/cod2.jpg" alt="" /></li>
              <li><img src="../../../skin/images/products/cod3.jpg" alt="" /></li>
        			<li><img src="../../../skin/images/products/cod4.jpg" alt="" /></li>
        		</ul>
          </div>
          <div class="col-md-12 advancedDragBtn">
            <button id="adDragBtn" type="button" name="button" class="btn mainbtn advanImgBtn"><i class="fa fa-rocket"></i> Avanzado...</button>
          </div>
          <div class="row col-md-12 dragImgTemp">
            <ul class="connected sortable grid no2">
        			<li><img src="../../../skin/images/users/usergen.png" alt="" /></li>
        			<li><img src="../../../skin/images/users/usergen.png" alt="" /></li>
        			<li><img src="../../../skin/images/users/usergen.png" alt="" /></li>
        		</ul>
          </div>
          <div class="col-md-12 text-center">
            <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn"><i class="fa fa-check"></i> Aceptar</button>
          </div>
        </div><!-- /Images -->
      </div><!-- /FormItems -->

    </div><!-- /addItemDiv -->
      <!-- Create User Button Div  -->
    <div class="container animated fadeInUp donediv">
      <div class="form-group">
        <a href="#" class="btn mainbtn" role="button" id=""><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</a>
        <a href="#" class="btn mainbtn" role="button" id=""><i class="fa fa-plus-square" aria-hidden="true"> </i> Crear y Agregar Otro...</a>
      </div>
    </div>    <!-- /Create User Button Div  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
