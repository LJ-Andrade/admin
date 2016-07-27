<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Perfil");
    $Head->setHead();

    $Profile  = new ProfileData();
    $MenuTree = new Menu();

?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.subtop.php'); ?>
    <?php echo insertElement("hidden","action",'insert'); ?>
    <?php echo insertElement("hidden","profileimage",''); ?>
    <?php echo insertElement("hidden","menues",''); ?>
    <div class="container-fluid pageWrapper">
      <!-- WindowHead -->
      <div class="row windowHead animated fadeInDown">
        <button type="button" name="button" class="btn closeBtn MainButton BackToLastPage"><i class="fa fa-times"></i></button>
        <div class="col-md-6 col-xs-12">
          <h3>CREACI&Oacute;N DE PERFIL</h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
        </div>
      </div><!-- /WindowHead -->
      <div class="container animated fadeIn additemdiv">
        <div class="col-sm-12 form-box formitems">
          <div class="row">
            <div class="col-md-3 form-group animated bounceInLeft">
            </div>
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','title','','form-first-name form-controlusers text-center','placeholder="Nombre del perfil" tabindex="1" validateEmpty="El nombre es obligatorio." validateMinLength="3/El nombre debe contener 3 caracteres como mínimo." validateFromFile="process.php/El perfil ya existe/action:=validate"'); ?>
            </div>
            <div class="col-md-3 form-group animated bounceInRight">
              <?php echo insertElement('file','image','','form-first-name form-controlusers Hidden','placeholder="Imagen" tabindex="3"'); ?>
            </div>
          </div>
          <!-- PROFILE TREE -->
          <div class="row">
            <div class="col-md-6 flex-container">

              <!-- Old image selector -->
              <!-- <div class="form-group animated bounceInBottom">
                <img src="<?php // echo $Profile->GetDefaultImg(); ?>" width="200" height="200" id="profileimg" />
              </div> -->


              <!-- Choose Img -->
              <div class="imgSelectorInner imgSelector">
                <img src="<?php echo $Profile->GetDefaultImg(); ?>" class="img-responsive" id="profileimg" />
                <div class="imgSelectorContent">
                  <div id="SelectImg">
                    <i class="fa fa-picture-o"></i><br>
                    Cambiar Im&aacute;gen
                  </div>
                </div>
              </div>
              <!-- /Choose Img -->
            </div>
            <div class="col-md-6">

              <br>
              <div class="form-group animated bounceInBottom checkboxDiv" id="ProfileTree">
                <?php echo $MenuTree->MakeTree(); ?>
              </div>
            </div>
          </div>
          <!-- PROFILE TREE -->
          <br>
        </div>
      </div>
    <!--  Add Img & Done Button Div  -->
      <div class="container centrarbtn animated fadeInUp donediv">
       <div class="form-group">
         <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Perfil</a>
       </div>
      </div>
    </div>
  </div>
<!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
