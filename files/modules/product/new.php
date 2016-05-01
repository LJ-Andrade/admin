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
        <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
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
                  <li><button type="button" name="button" class="DelSelColors btn mainbtnred delColBtn"><i class="fa fa-trash-o"></i></button></li>
                  <li><div class="circleInput"><input name="color" type="color" value="#8551d9" /> Elegir Color</div></li><br>
                  <li><div class="ColorSelect circle circleAddItem" style="background-color: #fff"></div></li>
                  <li><i class="fa fa-trash-o delColorBtn"></i></li>
                  <li><div class="ColorSelect circle circleAddItem" style="background-color: #c17996"></div></li>
                  <li><i class="fa fa-trash-o delColorBtn"></i></li>
                  <li><div class="ColorSelect circle circleAddItem" style="background-color: #768754"></div></li>
                  <li><i class="fa fa-trash-o delColorBtn"></i></li>
                  <li><div class="ColorSelect circle circleAddItem" style="background-color: #5643a0"></div></li>
                  <li><i class="fa fa-trash-o delColorBtn"></i></li>
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
          <!-- Choose Img -->
          <div class="col-md-6 col-centered overlaySingleImg">
            <div class="overlayInnerIcon overlayIcon multipleImgThumb">
              <img src="../../../skin/images/products/cod1.jpg" class="img-responsive">
              <div class="mask">
              <button id="SelectImg" type="button" name="button" class="btn mainbtn"><i class="fa fa-picture-o"></i> Cambiar Im&aacute;gen</button>
              </div>
            </div>
          </div><!-- /Choose Img -->
        </div><!-- /newInputs -->
        <!-- Images -->
        <div id="MultipleImgWd" class="row multipleImgWindow">
          <!-- <span id="cancelImgChange" class="eraseImgX"><i class="fa fa-times"></i></span> -->
          <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
          <div class="col-md-12 text-center">
            <!-- <h5>Im&aacute;genes del Producto</h5> -->
            <button type="button" name="button" class="btn mainbtn thirdBtn"><i class="fa fa-plus"></i> Agregar Im&aacute;gen</button>
          </div>
            <div class="col-md-12 dragImgPublic multipleImgs imgHovering">
              <ul id="ImageBox" class="connected sortable grid">
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive GenImg"><b>1</b><i class="fa fa-trash DelIconX"></i></li>
                <li><img src="../../../skin/images/users/default/caras2.png" alt="" class="img-responsive GenImg"><b>2</b><i class="fa fa-trash DelIconX"></i></li>
                <li><img src="../../../skin/images/users/default/default.jpg" alt="" class="img-responsive GenImg"><b>3</b><i class="fa fa-trash DelIconX"></i></li>
                <li><img src="../../../skin/images/users/default/usuario.jpg" alt="" class="img-responsive GenImg"><b>4</b><i class="fa fa-trash DelIconX"></i></li>
                <li><img src="../../../skin/images/users/3/user69110__3.jpeg" alt="" class="img-responsive GenImg"><b>5</b></i><i class="fa fa-trash DelIconX"></i></li>
              </ul>
            </div>
          <div class="col-md-12 advancedDragBtn">
            <button id="adDragBtn" type="button" name="button" class="btn mainbtn advanImgBtn"><i class="fa fa-picture-o"></i> Galer&iacute;a</button>
          </div>
          <div class="col-md-12 dragImgTemp imgHovering">
            <ul class="connected sortable grid no2">
        			<li><img src="../../../skin/images/users/mas.jpg" alt="" /></li>
        			<li><img src="../../../skin/images/users/usergen.png" alt="" /></li>
        			<li><img src="../../../skin/images/users/usergen.png" alt="" /></li>
              <i style="display: none;" class="fa fa-trash DelIconX" aria-hidden="true"></i>
        		</ul>
            <div class="clearfix"></div>
          </div>
        </div><!-- /Images -->
      </div><!-- /FormItems -->
    </div><!-- /addItemDiv -->
      <!-- Create User Button Div  -->
    <div class="container animated fadeInUp donediv">
      <div class="form-group">
        <button id="createUser" type="button" name="button" class="btn mainbtn" role="button"><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</button>
        <button id="createAndAdd" type="button" name="button" class="btn mainbtn" role="button"><i class="fa fa-plus-square"></i> Crear y Agregar Otro...</button>
        <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn"><i class="fa fa-check"></i> Aceptar</button>

      </div>
    </div>    <!-- /Create User Button Div  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
