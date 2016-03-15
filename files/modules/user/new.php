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
            <!-- Inputs -->
            <div id="newInputs">
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
            </div>
            <!-- /Inputs -->
            <!-- Imgs To select -->
            <div id="imgsToSelect" class="row ">
              <div class="row selectImgTitle">Elija una im&aacute;gen</div>
              <div class="row imgCatalogue">
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/users/mas.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/genericproduct.png" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/cod3.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/cod4.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive thumbimgadd">
                </div>
              </div>
            </div>
            <!-- /Imgs To select -->

            
            
            <div class="col-md-6 animated bounceInRight selectImgDiv centrarbtn">
              <button id="selectImgBtn" class="btn masterbtn">Seleccionar Im&aacute;gen</button>                               
            </div>
            <div class="col-md-12 animated bounceInRight cancelImgDiv centrarbtn">
              <button id="cancelSelectImgBtn" class="btn closeBtn"><i class="fa fa-times-circle"></i></button>                           
            </div>             

         

          </div> 
        </div>  
        <!-- Create User Button Div  -->
        <div class="container animated fadeInUp donediv">
             <div class="form-group">
               <a href="#" class="btn masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</a>
               <a href="#" class="btn masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear y Agregar Otro...</a>
             </div>
        </div>
        <!-- /Create User Button Div  -->                   
  </div>
<!-- /#wrapper -->

<?php $Foot->setFoot(); ?>