<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Usuario");
    $Head->setHead();

    $Groups[1] = "Pepe";
    $Groups[2] = "Pepe2";
    $Groups[3] = "Pepe3";
     
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
      <?php echo insertElement("hidden","action",'insert'); ?>
        <div class="container additemdiv animated fadeIn">
          <div class="col-sm-12 form-box formitems">
            <div class="additemtit">
              <div class="maintitle"><h4 class="maintitletxt">Agregar Nuevo Usuario</h4></div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                <?php echo insertElement('text','user','','form-first-name form-controlusers','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3/El usuario debe contener 3 caracteres como mínimo." validateFromFile="process.php/El usuario ya existe/action:=validate"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <?php echo insertElement('text','first_name','','form-first-name form-controlusers','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." tabindex="3"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                <?php echo insertElement('password','password','','form-first-name form-controlusers','placeholder="Contrase&ntilde;a" validateEmpty="La contraseña es obligatoria." validateMinLength="4/La contraseña debe contener 4 caracteres como mínimo." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <?php echo insertElement('text','last_name','','form-first-name form-controlusers','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2/El apellido debe contener 2 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                   <?php echo insertElement('password','password_confirm','','form-first-name form-controlusers','placeholder="Confirmar Contrase&ntilde;a" validateEmpty="Confirmar la contraseña es obligatorio." validateEqualToField="password/Las contraseñas deben coincidir." tabindex="2"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                   <?php echo insertElement('text','email','','form-first-name form-controlusers','placeholder="Email" validateEmail="Ingrese un email válido." validateMinLength="4/El email debe contener 4 caracteres como mínimo." tabindex="4"'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInRight">
                  <div class="form-group">
                    <?php echo insertElement('select','group','','form-controlusers','tabindex="5"',$Groups,'0','Elegir Grupo'); ?>
                  </div>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <div class="form-group">
                  <?php echo insertElement('select','profile','','form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","","title"),'','Elegir Perfil'); ?>
                </div>
              </div>
            </div>
            <div class="col-md-6 animated bounceInRight switchuser">
              <div class="col-md-12 userstatustit">Estado</div>
              <div class="col-md-12"><input type="checkbox" class="centered" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="large" data-label-width="auto" checked>
              </div>                                     
            </div>
            <div class="col-md-6 animated bounceInRight switchuser ">
                  <li id="chooseimg" class="btn masterbtn animated fadeIn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>                                  
            </div>
            <!--   Generic Img and AddImg Div       -->
            <div id="itemimg" class="itemimgmain brd">
              <div class="row"> 
                <div class="col-xs-12 col-md-6 addimgdiv">
                  <div id="file"><img src="../../../skin/images/users/mas.jpg" class="img-responsive thumbimgadd animated fadeIn thumbimg"></div>
                  <input type="file" name="img" id="img" />
                </div>
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeIn">
                </div>   
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod1.jpg" class="img-responsive thumbimg animated fadeIn">
                </div>   
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeIn">
                </div>
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeIn">
                </div>
              </div>
              <div class="row"> 
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod3.jpg" class="img-responsive thumbimg animated fadeIn">
                </div>
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod4.jpg" class="img-responsive thumbimg animated fadeIn">
                </div>   
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeIn">
                </div>   
                <div class="col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeIn">
                </div>
              </div>  
            </div>        
          </div> 
        </div>  
         <!--  Add Img & Done Button Div  -->
        <div class="container centrarbtn animated fadeInUp donediv">
             <div class="form-group">
               <a href="#" class="btn masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</a>
             </div>
        </div>                         
  </div>
<!-- /#wrapper -->

<?php include('../../includes/inc.foot.php'); ?>