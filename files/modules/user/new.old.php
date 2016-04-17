<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Usuario");
    $Head->setHead();

    $MenuTree = new Menu();

    $Groups[1] = "Pepe";
    $Groups[2] = "Pepe2";
    $Groups[3] = "Pepe3";

?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
    <?php echo insertElement("hidden","action",'insert'); ?>
    <?php echo insertElement("hidden","menues",''); ?>
      <!-- WindowHead -->
      <div class="row windowHead">
        <div class="col-md-6 col-xs-12">
          <h3><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Nuevo Usuario</h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto">
        </div>
      </div><!-- /WindowHead -->
      <div class="container additemdiv animated fadeIn">
        <div class="col-sm-12 form-box formitems">
          <!-- User Data -->
          <div id="newInputs">
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft"><!-- User -->
                <?php echo insertElement('text','user','','form-first-name form-controlusers','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3/El usuario debe contener 3 caracteres como mínimo." validateFromFile="process.php/El usuario ya existe/action:=validate"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight"><!-- Name -->
                <?php echo insertElement('text','first_name','','form-first-name form-controlusers','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." tabindex="3"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft"><!-- PassWord -->
                <?php echo insertElement('password','password','','form-first-name form-controlusers','placeholder="Contrase&ntilde;a" validateEmpty="La contraseña es obligatoria." validateMinLength="4/La contraseña debe contener 4 caracteres como mínimo." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <?php echo insertElement('text','last_name','','form-first-name form-controlusers','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2/El apellido debe contener 2 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft"><!-- Confirm PassWord -->
                <?php echo insertElement('password','password_confirm','','form-first-name form-controlusers','placeholder="Confirmar Contrase&ntilde;a" validateEmpty="Confirmar la contraseña es obligatorio." validateEqualToField="password/Las contraseñas deben coincidir." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight"><!-- E-Mail -->
                <?php echo insertElement('text','email','','form-first-name form-controlusers','placeholder="Email" validateEmail="Ingrese un email válido." validateMinLength="4/El email debe contener 4 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <div class="row"><!-- Groups -->
              <div class="col-md-6 animated bounceInRight mainImgDiv"><!-- Choose Img -->
                <div class="changeImg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                <img src="../../../skin/images/users/usergen.png" class="img-responsive mainImgSelected">
              </div>
              <div class="col-md-6 form-group animated bounceInRight centrarbtn"><!-- Group and Perm -->
                <div class="form-group">
                  <div class="marg20">
                    <?php echo insertElement('select','profile','','form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","","title"),'','Elegir Perfil'); ?>
                  </div>
                  <div class="marg20">
                    <button id="showTreeDiv" class="btn mainbtn">Permisos y Grupo</button>
                  </div>
                </div>
              </div>
            </div><!-- /Groups -->
          </div>
          <!-- /User Data -->
          <!-- Images -->
          <div class="row selectImgMain">
            <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
            <div class="col-md-3 col-sm-12">
              <img src="../../../skin/images/users/usergen.png" class="img-responsive mainSelectedImg">
            </div>
            <div class="col-md-9 carouselDiv">
              <h4> Seleccione una im&aacute;gen</h4>
              <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="col-md-3 col-xs-6 ThumbImgDiv">
                      <div class="eraseImgX"><i class="fa fa-trash"></i></div>
                      <div class="thumbImg"><img src="../../../skin/images/users/caras1.png" class="img-responsive"></div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="col-md-3 col-xs-6 ThumbImgDiv">
                      <div class="eraseImgX"><i class="fa fa-trash"></i></div>
                      <div class="thumbImg"><img src="../../../skin/images/users/caras2.png" class="img-responsive"></div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="col-md-3 col-xs-6 ThumbImgDiv">
                      <div class="eraseImgX"><i class="fa fa-trash"></i></div>
                      <div class="thumbImg"><img src="../../../skin/images/users/usergen.png" class="img-responsive"></div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="col-md-3 col-xs-6 ThumbImgDiv">
                      <div class="eraseImgX"><i class="fa fa-trash"></i></div>
                      <div class="thumbImg"><img src="../../../skin/images/users/vio.jpg" class="img-responsive"></div>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <div class="col-md-12 acceptBtnImgDiv">
              <a href="#"><button id="acceptPermGroup" type="button" name="button" class="btn mainbtn centrarbtn"><i class="fa fa-check"></i> Aceptar</button><br></a>
            </div>
          </div>
          <!-- /Images -->
        </div>
        <!-- Menu Tree -->
        <div class="row treeDivRow">
          <div class="col-md-6 form-group animated bounceInBottom checkboxDiv">
            <h4>Grupos</h4>
            <?php echo $MenuTree->MakeTree(); ?>
          </div>
          <div class="col-md-6 form-group animated bounceInBottom checkboxDiv">
            <h4>Permisos</h4>
            <?php echo $MenuTree->MakeTree(); ?>
          </div>
          <div class="col-md-12 acceptBtnDiv">
            <button id="acceptPermGroup" type="button" name="button" class="btn mainbtn centrarbtn"><i class="fa fa-check"></i> Aceptar</button><br>
          </div>
        </div>
        <!-- /Menu Tree -->

      </div>
      <!-- Create User Button Div  -->
      <div class="container animated fadeInUp donediv">
        <div class="form-group">
          <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</a>
          <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear y Agregar Otro...</a>
        </div>
      </div>
      <!-- /Create User Button Div  -->
  </div><!-- /#wrapper -->

<?php $Foot->setFoot(); ?>
