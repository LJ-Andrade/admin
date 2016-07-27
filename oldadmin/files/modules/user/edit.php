<?php
    include("../../includes/inc.main.php");
    $Admin_id = $_GET['id'];
    $AdminEdit  = new AdminData($Admin_id);
    $AdminData  = $AdminEdit->GetData();

    $MenuTree = new Menu();
    $MenuTree->SetCheckedMenues($AdminEdit->GetCheckedMenues());

    $Group    = new GroupData();

    $Title = "Editar usuario '".$AdminEdit->FullName."'";

    $Head->setTitle("Editar Usuario");
    $Head->setHead();


?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.subtop.php'); ?>
    <?php echo insertElement("hidden","action",'update'); ?>
    <?php echo insertElement("hidden","id",$Admin_id); ?>
    <?php echo insertElement("hidden","menues"); ?>
    <?php echo insertElement("hidden","groups"); ?>
    <?php echo insertElement("hidden","newimage",$AdminEdit->Img); ?>



    <div class="conatiner-fluid pageWrapper">
      <!-- WindowHead -->
      <div class="row windowHead animated fadeInDown">
        <div class="col-md-6 col-xs-12 ">
          <h3><i class="fa fa-plus-square" aria-hidden="true"></i> <?php echo $Title ?></h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <?php $Checked = $AdminData['status']=='A'? 'checked="checked"':''; ?>
          <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" <?php echo $Checked; ?>>
        </div>
      </div><!-- /WindowHead -->
      <div class="container animated fadeIn addItemDiv">
        <div class="col-md-12 form-box formitems">
          <!-- User Data -->
          <div id="newInputs">
            <div class="row">
              <div class="col-md-6 form-group"><!-- User -->
                <?php echo insertElement('text','user',$AdminData['user'],'form-first-name form-controlusers','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3/El usuario debe contener 3 caracteres como mínimo." validateFromFile="process.php/El usuario ya existe/actualuser:='.$AdminData['user'].'/action:=validate"'); ?>
              </div>
              <div class="col-md-6 form-group"><!-- Name -->
                <?php echo insertElement('text','first_name',$AdminData['first_name'],'form-first-name form-controlusers','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." tabindex="3"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group"><!-- PassWord -->
                <?php echo insertElement('password','password','','form-first-name form-controlusers','placeholder="Contrase&ntilde;a" validateMinLength="4/La contraseña debe contener 4 caracteres como mínimo." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group">
                <?php echo insertElement('text','last_name',$AdminData['last_name'],'form-first-name form-controlusers','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2/El apellido debe contener 2 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group"><!-- Confirm PassWord -->
                <?php echo insertElement('password','password_confirm','','form-first-name form-controlusers','placeholder="Confirmar Contrase&ntilde;a" validateEqualToField="password/Las contraseñas deben coincidir." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group"><!-- E-Mail -->
                <?php echo insertElement('text','email',$AdminData['email'],'form-first-name form-controlusers','placeholder="Email" validateEmail="Ingrese un email válido." validateMinLength="4/El email debe contener 4 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <!-- /User Data -->
            <!-- Image and Groups -->
            <div class="col-md-12">
              <!-- Group and Perm -->
              <div class="col-md-6 form-group centrarbtn">
                <div class="form-group">
                  <div class="marg20">
                    <?php echo insertElement('select','profile',$AdminEdit->ProfileID,'form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","status = 'A'","title"),'','Elegir Perfil'); ?>
                  </div>
                  <div class="marg20">
                    <button id="showTreeDiv" class="btn mainbtn">Permisos y Grupos</button>
                  </div>
                </div>
              </div>
              <!-- Choose Img -->
              <div id="SelectImg" class="col-md-6 col-sm-12 imgSelector">
                <div class="imgSelectorInner">
                  <img src="<?php echo $AdminEdit->Img ?>" class="img-responsive MainImg">
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
              <div id="SingleImgWd" class="row imgWindow Hidden animated fadeIn">
                <!-- <span id="cancelImgChange" class="eraseImgX"><i class="fa fa-times"></i></span> -->
                <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
                <div class="imgWindowTitle"><h5>Agregar o Cambiar Im&aacute;genes</h5></div>
                <!-- Choose Img -->
                <div id="SelectImg" class="col-md-12 imgSelector">
                  <div class="imgSelectorInner">
                    <img src="<?php echo $AdminEdit->Img ?>" id="MainImageSelector" class="MainImg img-responsive">
                    <div class="imgSelectorContent SelectNewImg">
                      <div id="SelectImg"><i class="fa fa-picture-o"></i><br>Cambiar Im&aacute;gen</div>
                    </div>
                  </div>
                </div><!-- /Choose Img -->
                <?php echo insertElement('file','image','','Hidden'); ?>
                <div class="col-md-12 activeImgs singleImg">
                  <ul id="ImageBox">
                    <?php
                    if(!in_array($AdminEdit->Img, $Admin->AllImages()))
                    {
                    ?>
                    <li>
                      <img src="<?php echo $AdminEdit->Img ?>" alt="" class="img-responsive"/>
                      <span class="GenImg selectImg LastClicked"><i class="fa fa-trash delImgIco Hidden"></i></span>
                    </li>
                    <?php
                    }
                    foreach($Admin->AllImages() as $Image)
                    {
                      if($Image==$Admin->Img)
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
        <div class="row treeDivRow Hidden">
          <!-- <div class="col-md-6 col-xs-5 form-group animated bounceInLeft checkboxDiv">
            <h4>Grupos Asociados</h4>
            <span id="GroupTree"></span>
          </div> -->
          <div class="col-md-6 col-xs-12">
            <?php echo $MenuTree->MakeTree('Permisos Especiales'); ?>
          </div>
          <div id="GroupTree" class="col-md-6 col-xs-12 GroupTree">

          </div>


        </div><!-- /Menu Tree -->
      </div><!-- /addItemDiv -->
      <!-- Create User Button Div  -->
      <div class="container animated fadeInUp donediv">
        <div class="form-group">
          <button id="createUser" type="button" name="button" class="btn mainbtn MainButton" role="button"><i class="fa fa-check-square-o fa-fw"></i> Confirmar Edici&oacute;n</button>
          <button type="button" name="button" class="btn mainbtn mainbtnred MainButton BackToLastPage"><i class="fa fa-times"></i> Cancelar</button>
          <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn Hidden"><i class="fa fa-check"></i> Aceptar</button>
          <button id="acceptPermGroup" type="button" name="button" class="btn mainbtn centrarbtn Hidden"><i class="fa fa-check"></i> Aceptar</button><br>
        </div>
      </div>
      <!-- /Create User Button Div  -->
    </div>
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
