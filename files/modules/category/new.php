<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Nueva Categoría");
  $Head->setHead();

?>
<body>
  <div id="wrapper">
  <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
  <?php echo insertElement("hidden","action",'insert'); ?>
    <div class="row windowHead">
      <div class="col-md-6 col-xs-12">
        <h3><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Nueva Categor&iacute;a</h3>
      </div>
      <div class="col-md-6 col-xs-12 switchDiv switchHead">
        <input id="status" type="checkbox" name="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
      <div id="statusErrorDiv" class="ErrorText Red"></div></div>
    </div>
    <div class="container animated fadeIn addItemDiv">
      <div class="col-md-12 form-box formitems">
        <!-- User Data -->
        <div id="newInputs">
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','title','','form-first-name form-controlusers','placeholder="Nombre de la categoría" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." validateFromFile="process.php/La categoría ya existe/action:=validate"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('select','parent','','form-controlusers','tabindex="2"',$DB->fetchAssoc("category","category_id,title","status='A'","title"),'0','Categoría Principal'); ?>
            </div>
          </div>
          <!-- /User Data -->
          <!-- Single Image -->
          <div class="col-md-12">
            <!-- Choose Img -->
            <div class="col-md-12 imgSelector">
              <div class="imgSelectorInner">
                <img src="../../../skin/images/profiles/profile48000197.jpeg">
                <div class="imgSelectorContent">
                  <div id="SelectImg">
                    <i class="fa fa-picture-o"></i><br>
                    Cambiar Im&aacute;gen
                  </div>
                </div>
              </div>
            </div><!-- /Choose Img -->
          </div><!-- /Single Image-->
        </div><!-- New Inputs -->
        <!-- Single Image Selection Window (Hidden) -->
        <div style="display: none;" id="SingleImgWd" class="row imgWindow">
          <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
          <div class="col-md-12">
            <!-- Actual Img -->
            <div class="col-md-12 imgSelector">
              <div class="imgSelectorInner">
                <img src="../../../skin/images/products/cod1.jpg" class="MainImg SelectNewImg img-responsive">
                <div class="imgSelectorContent">
                  <div id="SelectImg">
                    <i class="fa fa-picture-o"></i><br>
                    Subir Im&aacute;gen...
                  </div>
                </div>
              </div>
            </div><!-- /Actual Img -->
            <input readonly="readonly" id="Fileimage" name="FileField" class="Hidden" type="text"><div style="height: 0px; width: 0px; overflow: hidden;"><input id="image" name="image" class="Hidden" type="file"></div>              <div class="clearfix visible-xs"></div>
            <div class="col-md-12 genericSingleImgs">
              <ul id="ImageBox">
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive "></li>
                <li><img src="../../../skin/images/users/default/caras2.png" alt="" class="img-responsive GenImg "></li>
                <li><img src="../../../skin/images/users/default/default.jpg" alt="" class="img-responsive GenImg selectImg LastClicked"></li>
                <li><img src="../../../skin/images/users/default/usuario.jpg" alt="" class="img-responsive GenImg "></li>
                <li><img src="../../../skin/images/users/3/user69110__3.jpeg" alt="" class="img-responsive GenImg ">
                  <i style="display: none;" class="fa fa-trash DelIconX" aria-hidden="true"></i>
                </li>
              </ul>
            </div>
            <div id="FileimageErrorDiv" class="ErrorText Red"></div><div id="imageErrorDiv" class="ErrorText Red"></div>
          </div>
        </div>
        <!-- /Single Image Selection Window (Hidden) -->
      </div>
    </div>
    <div class="container animated fadeInUp donediv">
      <div class="form-group">
        <button id="createUser" type="button" name="button" class="btn mainbtn" role="button"><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</button>
        <button id="createAndAdd" type="button" name="button" class="btn mainbtn" role="button"><i class="fa fa-plus-square"></i> Crear y Agregar Otro...</button>
        <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
