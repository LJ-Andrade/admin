<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Usuario");
    $Head->setHead();
    $MenuTree = new Menu();
    $Group    = new GroupData();


?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
    <?php echo insertElement("hidden","action",'insert'); ?>
    <?php echo insertElement("hidden","menues"); ?>
    <?php echo insertElement("hidden","groups"); ?>
    <?php echo insertElement("hidden","newimage",$Admin->DefaultImg); ?>
      <!-- WindowHead -->
      <div class="titleDiv">  
        
        
              <a href="javascript: history.go(-1)" class="btn subitbtn BackToLastPage" role="button">
              <i class="fa fa-angle-double-left"></i> Volver</a>
        
        
      </div>

      <div class="optionsDiv"><!-- Option Icons & Buttons-->
          <button id="delselected" class="animated slideInDown mainbtn mainbtnred"><i class="fa fa-trash"></i> Eliminar seleccionados</button>
          <a href="new.php"><button class="mainbtn"><i class="fa fa-user-plus"></i> Agregar Producto</button></a>
          <div class="optionIcons">
            <!-- <ul> --><!-- View Icons -->
              <!-- <li id="viewlistbt" class="animated fadeIn SubTopBtn "><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
              <li id="viewgridbt" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Grilla </a></li> -->
              <!-- Search -->
              <!-- <li id="showitemfiltersuser" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <li id="showitemfilters" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li> -->
              <!-- Add New Item -->
              <!-- <li id="newprod" class="Hidden"><a href="../product/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Nuevo Producto</a></li>
              <li id="newuser" class="Hidden"><a href="../user/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-user-plus  fa-fw"></i> Nuevo Usuario</a></li> -->
            <!-- </ul> -->
          </div>
        </div><!-- /Title and options -->

      <div class="row windowHead animated zoomInUp">
        <div class="col-md-6 col-xs-12 animated bounceInLeft">
          <h3><i class="fa fa-plus-square" aria-hidden="true"></i> Crear Usuario</h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead animated bounceInRight">
          <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
        </div>
      </div><!-- /WindowHead -->
      <div class="container animated fadeInDown addItemDiv">
        <div class="col-md-12 form-box formitems">
          <!-- User Data -->
          <div id="newInputs" class="animated rotateInUpLeft">
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
            <!-- /User Data -->
            <!-- Image and Groups -->
            <div class="col-md-12">
              <!-- Group and Perm -->
              <div class="col-md-6 form-group animated bounceInRight centrarbtn">
                <div class="form-group">
                  <div class="marg20">
                    <?php echo insertElement('select','profile','','form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","status = 'A'","title"),'','Elegir Perfil'); ?>
                  </div>
                  <div class="marg20">
                    <button id="showTreeDiv" class="btn mainbtn">Permisos y Grupos</button>
                  </div>
                </div>
              </div>
              <!-- Choose Img -->
              <div id="SelectImg" class="col-md-6 col-sm-12 imgSelector animated bounceInLeft">
                <div class="imgSelectorInner">
                  <img src="<?php echo $Admin->DefaultImg ?>" class="img-responsive MainImg">
                  <div class="imgSelectorContent">
                    <div id="SelectImg">
                      <i class="fa fa-picture-o"></i><br>
                      Cambiar Im&aacute;gen
                    </div>
                  </div>
                </div>
              </div><!-- /Choose Img -->
            </div><!-- /Image and Groups  -->
          </div><!-- New Inputs -->
          <!-- Single Image Selection Window (Hidden) -->
              <div id="SingleImgWd" class="row imgWindow Hidden animated zoomInUp">
                <!-- <span id="cancelImgChange" class="eraseImgX"><i class="fa fa-times"></i></span> -->
                <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
                <div class="imgWindowTitle"><h5>Agregar o Cambiar Im&aacute;genes</h5></div>
                <!-- Choose Img -->
                <div id="SelectImg" class="col-md-12 imgSelector animated bounceInLeft">
                  <div class="imgSelectorInner">
                    <img src="<?php echo $Admin->DefaultImg ?>" id="MainImageSelector" class="MainImg img-responsive">
                    <div class="imgSelectorContent SelectNewImg">
                      <div id="SelectImg"><i class="fa fa-picture-o"></i><br>Cambiar Im&aacute;gen</div>
                    </div>
                  </div>
                </div><!-- /Choose Img -->
                <?php echo insertElement('file','image','','Hidden'); ?>
                <div class="col-md-12 activeImgs singleImg animated bounceInRight">
                  <ul id="ImageBox">
                    <?php
                    foreach($Admin->AllImages() as $Image)
                    {
                      if($Image==$Admin->DefaultImg)
                        $MainImg = 'selectImg LastClicked';
                      else
                        $MainImg = '';

                      $GalleryID = array_reverse(explode('/',$Image));
                      if($Admin->AdminID == $GalleryID[1] && $Admin->Img != $Image)
                        $DelIcon = '<span class="GenImg '.$MainImg.'"><i class="fa fa-trash delImgIco Hidden"></i></span>';
                      else
                        $DelIcon = '<span class="GenImg '.$MainImg.'"></span>';
                    ?>
                    <li>
                      <img src="<?php echo $Image ?>" alt="" class="img-responsive" >
                      <?php echo $DelIcon; ?>
                    </li>
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              </div><!-- /Images -->
          <!-- /Single Image Selection Window (Hidden) -->
        </div><!-- /Formitems -->
        <!-- Menu Tree -->
        <div class="row treeDivRow animated rotateIn Hidden">
          <div class="col-md-6 form-group animated bounceInLeft checkboxDiv">
            <h4>Grupos Asociados</h4>
            <span id="GroupTree"></span>
          </div>
          <div class="col-md-6 form-group animated bounceInRight checkboxDiv">
            <h4>Permisos Especiales</h4>
            <?php echo $MenuTree->MakeTree(); ?>
          </div>
        </div><!-- /Menu Tree -->
      </div><!-- /addItemDiv -->
      <!-- Create User Button Div  -->
      <div class="container animated fadeInUp donediv">
        <div class="form-group">
          <button id="createUser" type="button" name="button" class="btn mainbtn animated bounceInLeft" role="button"><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</button>
          <button id="createAndAdd" type="button" name="button" class="btn mainbtn animated bounceInRight" role="button"><i class="fa fa-plus-square"></i> Crear y Agregar Otro...</button>
          <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn Hidden animated bounceInRight"><i class="fa fa-check"></i> Aceptar</button>
          <button id="acceptPermGroup" type="button" name="button" class="btn mainbtn centrarbtn animated bounceInRight Hidden"><i class="fa fa-check"></i> Aceptar</button><br>
        </div>
      </div>
      <!-- /Create User Button Div  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
