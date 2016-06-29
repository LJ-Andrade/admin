<?php
    include("../../includes/inc.main.php");
    $ID = $_GET['id'];
    $Edit  = new ProfileData($ID);
    $MenuTree = new Menu();
    $MenuTree->SetCheckedMenues($Edit->GetCheckedMenues());
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
      <?php echo insertElement("hidden","profileimage",$Data['image']); ?>
      <?php echo insertElement("hidden","menues",''); ?>
    <div class="container-fluid pageWrapper">
      <!-- WindowHead -->
      <div class="row windowHead animated fadeInDown">
        <button type="button" name="button" class="btn closeBtn MainButton BackToLastPage"><i class="fa fa-times"></i></button>
        <div class="col-md-6 col-xs-12">
          <div class="maintitle"><h3><?php echo $Title; ?></h3></div>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
        </div>
      </div><!-- /WindowHead -->
      <div class="container additemdiv animated fadeIn">
        <div class="col-sm-12 form-box formitems">
          <div class="row">
            <div class="col-md-3 form-group animated bounceInLeft">

            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','title',$Data['title'],'form-first-name form-controlusers text-center','placeholder="Nombre del perfil" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="3/El nombre debe contener 3 caracteres como mínimo." validateFromFile="process.php/El perfil ya existe/action:=validate/actual:='.$Data['title'].'"'); ?>
            </div>
            <div class="col-md-3 form-group animated bounceInRight">
              <?php echo insertElement('file','image','','form-first-name form-controlusers Hidden','placeholder="Imagen" tabindex="3"'); ?>
              <!-- <button type="button" name="buttonimg" id="buttonimg" class="btn mainbtn">Seleccionar Im&aacute;gen</button> -->
            </div>
          </div>
          <!-- PROFILE TREE -->
          <div class="row">
            <div class="col-md-7 form-group animated bounceInBottom">
              <?php $Hidden = $Data['image']? '':'Hidden'; ?>
              <img src="<?php echo $Data['image']; ?>" width="200" height="200" class="<?php echo $Hidden ?>" id="profileimg" class="img-responsive imgBox" />
            </div>
            <div class="col-md-5 form-group animated bounceInBottom" id="ProfileTree">
              <?php echo $MenuTree->MakeTree(); ?>
            </div>
          </div>
          <!-- PROFILE TREE -->
        </div>
      </div>
       <!--  Add Img & Done Button Div  -->
      <div class="container centrarbtn animated fadeInUp donediv">
           <div class="form-group">
             <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Modificar Perfil</a>
           </div>
      </div>
    </div>
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
