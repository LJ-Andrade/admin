<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Nueva Categoría");
  $Head->setHead();

?>
<body>
  <div id="wrapper">
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php include '../../includes/inc.subTop.php'; ?>
    <div class="container-fluid pageWrapper">
      <!-- WindowHead -->
      <div class="row windowHead animated fadeInDown">
        <div class="col-md-6 col-xs-12">
          <h3>Complete el formulario</h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <input id="status" type="checkbox" name="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
          <div id="statusErrorDiv" class="ErrorText Red"></div>
        </div>
      </div>
      <!-- /WindowHead -->
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

          </div><!-- New Inputs -->

          <!-- Single Image Selection Window (Hidden) -->
          <div id="SingleImgWd" class="row imgWindow">
            <!-- <span id="cancelImgChange" class="eraseImgX"><i class="fa fa-times"></i></span> -->
            <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
            <div class="imgWindowTitle"><h5>Agregar o Cambiar Im&aacute;genes</h5></div>
            <!-- Choose Img -->
            <div id="SelectImg" class="col-md-12 imgSelector">
              <div class="imgSelectorInner">
                <img src="<?php echo $Admin->DefaultImg ?>" class="MainImg img-responsive SelectNewImg">
                <div class="imgSelectorContent">
                  <div id="SelectImg"><i class="fa fa-picture-o"></i><br>Cambiar Im&aacute;gen</div>
                </div>
              </div>
            </div><!-- /Choose Img -->
            <div class="col-md-12 activeImgs singleImg">
              <ul id="ImageBox">
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive">
                  <span><i class="fa fa-trash delImgIco"></i></span>
                </li>
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive">
                  <span><i class="fa fa-trash delImgIco"></i></span>
                </li>
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive">
                  <span><i class="fa fa-trash delImgIco"></i></span>
                </li>
              </ul>
            </div>
          </div><!-- /Images -->
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

    </div><!-- /container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
