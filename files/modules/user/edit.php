<?php
    include("../../includes/inc.main.php");
    $Admin_id = $_GET['id'];
    $AdminEdit  = new AdminData($Admin_id);
    $AdminData  = $AdminEdit->GetData();

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
    <div id="page-wrapper">
      <?php echo insertElement("hidden","action",'update'); ?>
      <?php echo insertElement("hidden","id",$Admin_id); ?>
        <!-- Filtros -->
        <div class="container additemdiv animated fadeIn">
          <div class="col-sm-12 form-box formitems">
            <div class="additemtit">
              <div class="maintitle"><h4 class="maintitletxt"><?php echo $Title ?></h4></div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group animated bounceInLeft">
                     <?php echo insertElement('text','user',$AdminData['user'],'form-first-name form-controlusers','placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3/El usuario debe contener 3 caracteres como mínimo." validateFromFile="process.php/El usuario ya existe/actualuser:='.$AdminData['user'].'/action:=validate"'); ?>
                </div>
                <div class="col-md-6 form-group animated bounceInRight">
                     <?php echo insertElement('text','first_name',$AdminData['first_name'],'form-first-name form-controlusers','placeholder="Nombre" validateEmpty="El nombre es obligatorio." validateMinLength="2/El nombre debe contener 2 caracteres como mínimo." tabindex="3"'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group animated bounceInLeft">
                     <?php echo insertElement('password','password','','form-first-name form-controlusers','placeholder="Contrase&ntilde;a" validateMinLength="4/La contraseña debe contener 4 caracteres como mínimo." tabindex="2"'); ?>
                </div>
                <div class="col-md-6 form-group animated bounceInRight">
                     <?php echo insertElement('text','last_name',$AdminData['last_name'],'form-first-name form-controlusers','placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2/El apellido debe contener 2 caracteres como mínimo." tabindex="4"'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group animated bounceInLeft">
                     <?php echo insertElement('password','password_confirm','','form-first-name form-controlusers','placeholder="Confirmar Contrase&ntilde;a" validateEqualToField="password/Las contraseñas deben coincidir." tabindex="2"'); ?>
                </div>
                <div class="col-md-6 form-group animated bounceInRight">
                     <?php echo insertElement('text','email',$AdminData['email'],'form-first-name form-controlusers','placeholder="Email" validateEmail="Ingrese un email válido." validateMinLength="4/El email debe contener 4 caracteres como mínimo." tabindex="4"'); ?>
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
                  <?php echo insertElement('select','profile',$AdminData['profile_id'],'form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","","title"),'','Elegir Perfil'); ?>
                </div>
              </div>
            </div>
            <div class="row animated bounceInRight switchuser">
                  <span class="userstatustit">Estado:</span>
                  <?php $Checked = $AdminData['status']=='A'? 'checked="checked"':''; ?>
                  <input type="checkbox" class="centered" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="large" data-label-width="auto" <?php echo $Checked; ?> >                                     
            </div>
           <!--   Generic Img and AddImg Div       -->
           <div id="itemimg" class="itemimgmain">
              <div class="row"> 
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <div id="file"><img src="../../../skin/images/users/mas.jpg" class="img-responsive thumbimgadd animated fadeInUp thumbimg"></div>
                  <input type="file" name="img" id="img" />
                </div>
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                </div>   
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod1.jpg" class="img-responsive thumbimg animated fadeInUp">
                </div>   
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeInUp">
                </div>
                </div>
                <div class="row"> 
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod3.jpg" class="img-responsive thumbimg animated fadeInUp">
                </div>
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/cod4.jpg" class="img-responsive thumbimg animated fadeInUp">
                </div>   
                <div class="col-xs-6 col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                </div>   
                <div class="col-md-3 addimgdiv">
                  <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                </div>
              </div>  
            </div>        
          </div>   
      </div>
                 
                  <!--  Add Img & Done Button Div  -->
                  <div class="container centrarbtn animated fadeInUp donediv">
                       <div class="form-group">
                         <div id="chooseimg" class="masterbtn animated fadeIn "><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></div>
                         <div><a href="#" class="masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Modificar Usuario</a></div>
                       </div>
                  </div>  
        <!-- /#page-wrapper -->
        </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>