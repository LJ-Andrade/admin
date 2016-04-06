<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Perfil");
    $Head->setHead();

    $Profile = new ProfileData();

?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
      <?php echo insertElement("hidden","action",'insert'); ?>
      <?php echo insertElement("hidden","profileimage",'../../../skin/images/body/pictures/usergen.jpg'); ?>
        <div class="container additemdiv animated fadeIn">
          <div class="col-sm-12 form-box formitems">
            <div class="additemtit">
              <div class="maintitle"><h4 class="maintitletxt">Agregar Nuevo Perfil</h4></div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                <?php echo insertElement('text','title','','form-first-name form-controlusers','placeholder="Nombre del perfil" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="3/El nombre debe contener 3 caracteres como mínimo." validateFromFile="process.php/El perfil ya existe/action:=validate"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <?php echo insertElement('file','image','','form-first-name form-controlusers','placeholder="Imagen" tabindex="3"'); ?>
              </div>
            </div>
            <!-- PROFILE TREE -->
            <div class="row">
              <div class="col-md-6 form-group animated bounceInBottom" id="ProfileTree">
                <?php echo $Profile->MakeNewTree(); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInBottom">
                <img src="../../../skin/images/body/pictures/usergen.jpg" width="200" height="200" id="profileimg" />
              </div>
            </div>
            <!-- PROFILE TREE -->
          </div> 
        </div>  
         <!--  Add Img & Done Button Div  -->
        <div class="container centrarbtn animated fadeInUp donediv">
             <div class="form-group">
               <a href="#" class="btn masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Perfil</a>
             </div>
        </div>                         
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>