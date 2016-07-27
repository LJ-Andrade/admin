<?php
    include("../../includes/inc.main.php");
    $ID = $_GET['id'];
    $Edit  = new Category($ID);
    $EditData  = $Edit->getData();

    $Title = "Modificar categoría '".$EditData['title']."'";

    $Head->setTitle("Modificar Categoría");
    $Head->setHead();
?>
<body>
<div id="wrapper">
  <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
  <?php echo insertElement("hidden","action",'update'); ?>
  <?php echo insertElement("hidden","id",$ID); ?>
  <?php include '../../includes/inc.subTop.php'; ?>
  <div class="container-fluid pageWrapper">
    
    <div class="row windowHead">
      <div class="col-md-6 col-xs-12">
        <h3><i class="fa fa-plus-square" aria-hidden="true"></i>  Modificar Categor&iacute;a</h3>
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
              <?php echo insertElement('text','title',$EditData['title'],'form-first-name form-controlusers','placeholder="Nombre de la categoría" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." validateFromFile="process.php/La categoría ya existe/actualtitle:='.$EditData['title'].'/action:=validate"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('select','parent',$EditData['parent_id'],'form-controlusers','tabindex="2"',$DB->fetchAssoc("category","category_id,title","status='A'","title"),'0','Categoría Principal'); ?>
            </div>
          </div>
          <!-- /User Data -->
          <!-- Single Image -->
          <div class="col-md-12">
            <!-- Choose Img -->
            <div id="SelectImg" class="col-md-12 col-centered overlaySingleImg">
              <div class="overlayInnerIcon overlayIcon">
                <img src="../../../skin/images/profiles/profile48000197.jpeg" class="MainImg img-responsive singleImg">
                <div class="mask">
                  <button type="button" name="button" class="btn mainbtn">Cambiar Imagen</button>
                </div>
              </div>
            </div><!-- /Choose Img -->
          </div><!-- /Single Image-->
        </div><!-- New Inputs -->
        <!-- Single Image Selection Window (Hidden) -->
        <div style="display: none;" id="SingleImgWd" class="row singleImgWindow">
            <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
          <div class="col-md-12">
            <div class="col-md-12 col-centered">
              <div class="overlayInnerIcon overlayIcon">
                <img src="../../../skin/images/users/default/default.jpg" class="MainImg img-responsive singleImg SelectNewImg">
                <div class="mask SelectNewImg">
                <p>Cambiar Im&aacute;gen</p>
                <i class="fa fa-pencil-square-o"></i>
                </div>
              </div>
            </div>
            <input readonly="readonly" id="Fileimage" name="FileField" class="Hidden" type="text"><div style="height: 0px; width: 0px; overflow: hidden;"><input id="image" name="image" class="Hidden" type="file"></div>              <div class="clearfix visible-xs"></div>
            <div class="col-md-12 genericSingleImgs">
              <ul id="ImageBox">
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive GenImg genImgThumb "></li>
                <li><img src="../../../skin/images/users/default/caras2.png" alt="" class="img-responsive GenImg genImgThumb "></li>
                <li><img src="../../../skin/images/users/default/default.jpg" alt="" class="img-responsive GenImg genImgThumb selectImg LastClicked"></li>
                <li><img src="../../../skin/images/users/default/usuario.jpg" alt="" class="img-responsive GenImg genImgThumb "></li>
                <li><img src="../../../skin/images/users/3/user69110__3.jpeg" alt="" class="img-responsive GenImg genImgThumb ">
                  <i style="display: none;" class="fa fa-trash DelIconX" aria-hidden="true"></i>
                </li>
              </ul>
            </div>
          <div id="FileimageErrorDiv" class="ErrorText Red"></div><div id="imageErrorDiv" class="ErrorText Red"></div></div>
        </div>
        <!-- /Single Image Selection Window (Hidden) -->
      </div>
    </div>
    <div class="container animated fadeInUp donediv">
      <div class="form-group">
        <button id="ConfModBtn" type="button" name="button" class="btn mainbtn"><i class="fa fa-check-square-o fa-fw"></i> Confirmar Modificaci&oacute;n</button>
        <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
    </div>
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
