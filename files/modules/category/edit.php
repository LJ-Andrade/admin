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
      <!-- WindowHead -->
      <div class="row windowHead">
        <div class="col-md-6 col-xs-12">
          <h3><i class="fa fa-plus-square" aria-hidden="true"></i> Modificar Categor&iacute;a</h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <input id="status" type="checkbox" name="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
        </div>
      </div><!-- /WindowHead -->
      <div class="container animated fadeIn additemdiv">
        <div class="col-sm-12 form-box formitems">
          <!-- Inputs -->
          <div id="newInputs" class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','title',$EditData['title'],'form-first-name form-controlusers','placeholder="Nombre de la categoría" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." validateFromFile="process.php/La categoría ya existe/actualtitle:='.$EditData['title'].'/action:=validate"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('select','parent',$EditData['parent_id'],'form-controlusers','tabindex="2"',$DB->fetchAssoc("category","category_id,title","status='A'","title"),'0','Categoría Principal'); ?>
            </div>
            <div class="col-md-12 animated bounceInRight">
              <!-- Choose Img -->
              <div id="SelectSingleImg" class="col-md-6 col-centered overlaySingleImg">
                <div class="overlayInnerIcon overlayIcon">
                  <img src="../../../skin/images/users/vio.jpg" class="MainImg img-responsive singleImg">
                  <div class="mask">
                    <p>Cambiar Imagen</p>
                    <i class="fa fa-pencil-square-o"></i>
                  </div>
                </div>
              </div><!-- /Choose Img -->
            </div>
          </div>
          <!-- /Inputs -->
          <!-- Single Image Selection Window (Hidden) -->
          <div id="SingleImgWd" class="row singleImgWindow">
              <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
            <div class="col-md-12">
              <div class="col-md-12 col-centered">
                <div class="overlayInnerIcon overlayIcon">
                  <img src="../../../skin/images/users/vio.jpg" class="MainImg img-responsive singleImg">
                  <div class="mask">
                  <p>Cambiar Imagen</p>
                  <i class="fa fa-pencil-square-o"></i>
                  </div>
                </div>
              </div>
              <div class="clearfix visible-xs"></div>
              <div class="col-md-12 genericSingleImgs">
                <ul>
                  <li><img src="../../../skin/images/users/usergen.png" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/caras1.png" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/caras2.png" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/vio.jpg" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/usergen.png" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/caras1.png" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/caras2.png" alt="" class="img-responsive GenImg genImgThumb" /></li>
                  <li><img src="../../../skin/images/users/vio.jpg" alt="" class="img-responsive GenImg genImgThumb" /></li>
                </ul>
              </div>
            </div>
            <div class="col-md-12 acceptBtnImgDiv text-center">
              <button id="AcceptImg" type="button" name="button" class="btn mainbtn centrarbtn"><i class="fa fa-check"></i> Aceptar</button>
            </div>
          </div>
          <!-- /Single Image Selection Window (Hidden) -->
        </div>
      </div>
      <!-- Create User Button Div  -->
      <div class="container animated fadeInUp donediv">
       <div class="form-group">
         <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Confirmar Modificaci&oacute;n</a>
       </div>
      </div>
      <!-- /Create User Button Div  -->
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
