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
                <img src="" class="Hidden" id="profileimg" />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group animated bounceInBottom" id="ProfileTree">
                  <?php //echo $Profile->MakeNewTree(); ?>
                  <ul>
                    <li><input type="checkbox" class="TreeCheckbox"><span id="menu1" class="TreeElement"> Menu 1</span></li>
                    <li><input type="checkbox" class="TreeCheckbox"><span class="TreeElement" style="cursor:pointer;" id="menu2"> Menu 2</span></li>
                    <ul style="margin-left:1em;display:none;" parent="menu2">
                        <li><input type="checkbox" class="TreeCheckbox"><span id="menu21" class="TreeElement"> Menu 2.1</span></li>
                        <li><input type="checkbox" class="TreeCheckbox"><span id="menu22" class="TreeElement" style="cursor:pointer;"> Menu 2.2</span></li>
                        <ul style="margin-left:1em;display:none;" parent="menu22">
                          <li><input type="checkbox" class="TreeCheckbox"><span id="menu221" class="TreeElement"> Menu 2.2.1</span></li>
                          <li><input type="checkbox" class="TreeCheckbox"><span id="menu222" class="TreeElement"> Menu 2.2.2</span></li>
                          <li><input type="checkbox" class="TreeCheckbox"><span id="menu223" class="TreeElement"> Menu 2.2.3</span></li>
                        </ul>
                    </ul>
                  </ul>
              </div>
            </div>

            <!-- <div class="col-md-6 animated bounceInRight switchuser">
              <div class="col-md-12 userstatustit">Estado</div>
              <div class="col-md-12"><input type="checkbox" class="centered" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="large" data-label-width="auto" checked>
              </div>                                     
            </div>
            <div class="col-md-6 animated bounceInRight switchuser ">
                  <li id="chooseimg" class="btn masterbtn animated fadeIn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>                                  
            </div> -->
            <!--   Generic Img and AddImg Div       -->
            <!-- <div id="itemimg" class="itemimgmain brd">
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
            </div>  -->       
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