<?php
    include("../../includes/inc.main.php");
    $Admin_id = $_GET['id'];
    $AdminEdit  = new AdminData($Admin_id);
    $AdminData  = $AdminEdit->GetData();

    $MenuTree = new Menu();
    $MenuTree->SetCheckedMenues($AdminEdit->GetCheckedMenues());

    $Title = "Modificar usuario '".$AdminEdit->FullName."'";

    $Head->setTitle("Modificar Usuario");
    $Head->setHead();

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
          <h3><i class="fa fa-plus-square"></i> <?php echo $Title ?></h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <?php $Checked = $AdminData['status']=='A'? 'checked="checked"':''; ?>
          <input type="checkbox" class="centered" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" <?php echo $Checked; ?> >
        </div>
      </div><!-- /WindowHead -->
      <div class="container animated fadeIn addItemDiv">
        <div class="col-md-12 form-box formitems">
          <!-- User Data -->
          <div id="newInputs">
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft"><!-- User -->
                <?php echo insertElement('text','user',$AdminData['user'],'form-first-name form-controlusers','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3/El usuario debe contener 3 caracteres como mínimo." validateFromFile="process.php/El usuario ya existe/actualuser:='.$AdminData['user'].'/action:=validate"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight"><!-- Name -->
                <?php echo insertElement('text','first_name',$AdminData['first_name'],'form-first-name form-controlusers','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." tabindex="3"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft"><!-- PassWord -->
                <?php echo insertElement('password','password','','form-first-name form-controlusers','placeholder="Contrase&ntilde;a" validateMinLength="4/La contraseña debe contener 4 caracteres como mínimo." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <?php echo insertElement('text','last_name',$AdminData['last_name'],'form-first-name form-controlusers','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2/El apellido debe contener 2 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft"><!-- Confirm PassWord -->
                <?php echo insertElement('password','password_confirm','','form-first-name form-controlusers','placeholder="Confirmar Contrase&ntilde;a" validateEqualToField="password/Las contraseñas deben coincidir." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight"><!-- E-Mail -->
                <?php echo insertElement('text','email',$AdminData['email'],'form-first-name form-controlusers','placeholder="Email" validateEmail="Ingrese un email válido." validateMinLength="4/El email debe contener 4 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <!-- /User Data -->
            <!-- Single Image - Groups/Perm -->
            <div class="col-md-12">
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
              <!-- Group and Perm -->
              <div class="col-md-6 form-group animated bounceInRight centrarbtn">
                <div class="form-group">
                  <div class="marg20">
                    <?php echo insertElement('select','profile','','form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","","title"),'','Elegir Perfil'); ?>
                  </div>
                  <div class="marg20">
                    <button id="showTreeDiv" class="btn mainbtn">Permisos y Grupo</button>
                  </div>
                </div>
              </div>
            </div><!-- /Single Image - Groups/Perm -->
          </div><!-- New Inputs -->
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
          <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Confirmar Modificaci&oacute;n</a>
        </div>
      </div>
      <!-- /Create User Button Div  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
