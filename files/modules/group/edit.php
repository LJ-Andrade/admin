<?php
    include("../../includes/inc.main.php");
    $ID       = $_GET['id'];
    $Edit     = new GroupData($ID);
    $Profile  = new ProfileData(); 
    $MenuTree = new Menu();
    $MenuTree->SetCheckedMenues($Edit->GetCheckedMenues());
    $Data     = $Edit->GetData();

    $Title = "Modificar grupo '".$Data['title']."'";

    $Head->setTitle("Modificar Grupo");
    $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
      <?php echo insertElement("hidden","action",'update'); ?>
      <?php echo insertElement("hidden","id",$ID); ?>
      <?php echo insertElement("hidden","oldimage",$Data['image']); ?>
      <?php echo insertElement("hidden","groupimage"); ?>
      <?php echo insertElement("hidden","menues",''); ?>
      <?php echo insertElement("hidden","profiles",''); ?>
        <div class="container additemdiv animated fadeIn">
          <div class="col-sm-12 form-box formitems">
            <div class="additemtit">
              <div class="maintitle"><h4 class="maintitletxt"><?php echo $Title; ?></h4></div>
            </div>
            <div class="row">
              <div class="col-md-3 form-group animated bounceInLeft">

              </div>
              <div class="col-md-6 form-group animated bounceInLeft">
                <?php echo insertElement('text','title',$Data['title'],'form-first-name form-controlusers text-center','placeholder="Nombre del grupo" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="3/El nombre debe contener 3 caracteres como mínimo." validateFromFile="process.php/El grupo ya existe/action:=validate/actual:='.$Data['title'].'"'); ?>
              </div>
              <div class="col-md-3 form-group animated bounceInRight">
                <?php echo insertElement('file','image','','form-first-name form-controlusers Hidden','placeholder="Imagen" tabindex="3"'); ?>
                <!-- <button type="button" name="buttonimg" id="buttonimg" class="btn mainbtn">Seleccionar Im&aacute;gen</button> -->
              </div>
            </div>
            <!-- MENU TREE -->
            <div class="row">
              <div class="col-md-4 form-group animated bounceInBottom">
                <img src="<?php echo $Data['image']; ?>" width="200" height="200" class="" id="groupimg" class="img-responsive imgBox" />
              </div>
              <div class="col-md-4 form-group animated bounceInBottom">
                <?php echo $MenuTree->MakeTree(); ?>
              </div>
              <div class="col-md-4 form-group animated bounceInBottom">
                <?php echo $Profile->ProfileTree($ID); ?>
              </div>
            </div>
            <!-- MENU TREE -->
          </div>
        </div>
         <!--  Add Img & Done Button Div  -->
        <div class="container centrarbtn animated fadeInUp donediv">
             <div class="form-group">
               <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Modificar Grupo</a>
             </div>
        </div>
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
