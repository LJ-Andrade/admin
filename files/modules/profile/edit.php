<?php
    include("../../includes/inc.main.php");
    $ID = $_GET['id'];
    $Edit  = new ProfileData($ID);
    $Data  = $Edit->GetData();

    $Title = "Modificar perfil '".$Data['title']."'";

    $Head->setTitle("Modificar Perfil");
    $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
      <?php echo insertElement("hidden","action",'update'); ?>
      <?php echo insertElement("hidden","id",$ID); ?>
      <?php echo insertElement("hidden","oldimage",$Data['image']); ?>
      <?php echo insertElement("hidden","profileimage",''); ?>
        <div class="container additemdiv animated fadeIn">
          <div class="col-sm-12 form-box formitems">
            <div class="additemtit">
              <div class="maintitle"><h4 class="maintitletxt"><?php echo $Title; ?></h4></div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                <?php echo insertElement('text','title',$Data['title'],'form-first-name form-controlusers','placeholder="Nombre del perfil" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="3/El nombre debe contener 3 caracteres como mínimo." validateFromFile="process.php/El perfil ya existe/action:=validate/actual:='.$Data['title'].'"'); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <?php echo insertElement('file','image','','form-first-name form-controlusers','placeholder="Imagen" tabindex="3"'); ?>
              </div>
            </div>
            <!-- PROFILE TREE -->
            <div class="row">
              <div class="col-md-6 form-group animated bounceInBottom" id="ProfileTree">
                <?php echo $Edit->MakeTree(); ?>
              </div>
              <div class="col-md-6 form-group animated bounceInBottom">
                <?php $Hidden = $Data['image']? '':'Hidden'; ?>
                <img src="<?php echo $Data['image']; ?>" width="200" height="200" class="<?php echo $Hidden ?>" id="profileimg" />
              </div>
            </div>
            <!-- PROFILE TREE -->
          </div> 
        </div>  
         <!--  Add Img & Done Button Div  -->
        <div class="container centrarbtn animated fadeInUp donediv">
             <div class="form-group">
               <a href="#" class="btn masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Modificar Perfil</a>
             </div>
        </div>                         
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>