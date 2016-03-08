<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Producto");
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
              <div class="maintitle"><h4 class="maintitletxt">Agregar Nuevo Producto</h4></div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                <input type="text" name="form-first-name" placeholder="Nombre de Prod." class="form-first-name form-controlusers" id="form-first-name">
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <input type="text" name="form-first-name" placeholder="C&oacute;digo"  class="form-first-name form-controlusers" id="form-first-name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInLeft">
                <input type="text" name="form-first-name" placeholder="Modelo" class="form-first-name form-controlusers" id="form-first-name">
              </div>
              <div class="col-md-6 form-group animated bounceInRight">
                <input type="text" name="form-last-name"  placeholder="Medida"class="form-last-name form-controlusers" id="form-last-name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group animated bounceInRight">
                <div class="form-group">
                    <select class="form-controlusers" id="sel1">
                      <option>Categor&iacute;a...</option>
                      <option>Muebles</option>
                      <option>Camas</option>
                      <option>Sillas</option>
                      <option>Mesas</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
                <div class="form-group">
                    <select class="form-controlusers" id="sel1">
                      <option>Grupo...</option>
                      <option>Activo</option>
                      <option>Pausado</option>
                    </select>
                </div>
              </div>
            </div>
            <!-- Price - Img - Status -->
            <div class="row priceimgstatus">
              <div class="col-md-6">
                <div class="col-md-12 form-group animated bounceInLeft">
                  <input type="text" name="form-last-name" placeholder="Precio" class="form-last-name form-controlusers" id="form-last-name">
                </div>
                <div class="col-md-12 animated bounceInRight productstatus">
                  <div class="itemstatustit"><span>Estado</span></div>
                  <input type="checkbox" class="centered" name="my-checkbox" data-on-text="Activo" data-off-text="Pausado"  data-label-width="auto" checked>
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-12 additemtxt"><span>Agregar imágen</span></div>
                <div class="col-md-12"><img src="../../../skin/images/body/pictures/mas.jpg" class="img-responsive additemimg" alt=""></div>
              </div>
            </div>
            <!-- /Price - Img - Status -->
            <!-- Character counter -->
            <div class="row-fluid col-md-12 form-group animated bounceInDown itemdesctextarea">
              <form class="form-group">
                <textarea id="description" value="Try me out!" maxlength="150" class="form-controlitems textareaitems text-center" rows="4" name="message" placeholder="Descripci&oacute;n"></textarea>
                <div class="remchar"><p> Caracteres restantes: </p></div>
                <div class="indicator-wrapper">
                    <div class="indicator"><span class="current-length">0</span></div>        
                </div>
              </form>
            </div>
            <!-- /Character counter -->
            <!--  Generic Img and AddImg  -->
            <div id="itemimg" class="itemimgmain">
              <div class="row"> 
                <div class="col-xs-6 col-md-3 addimgdiv">
                     <div id="file"><img src="skin/users/mas.jpg" class="img-responsive thumbimgadd animated fadeInUp thumbimg"></div>
                     <input type="file" name="file" />
                 </div>
                 <div class="col-xs-6 col-md-3 addimgdiv">
                     <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                 </div>   
                 <div class="col-xs-6 col-md-3 addimgdiv">
                     <img src="skin/images/products/cod1.jpg" class="img-responsive thumbimg animated fadeInUp">
                 </div>   
                 <div class="col-xs-6 col-md-3 addimgdiv">
                     <img src="skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeInUp">
                 </div>
                 </div>
                 <div class="row"> 
                 <div class="col-xs-6 col-md-3 addimgdiv">
                     <img src="skin/images/products/cod3.jpg" class="img-responsive thumbimg animated fadeInUp">
                 </div>
                 <div class="col-xs-6 col-md-3 addimgdiv">
                     <img src="skin/images/products/cod4.jpg" class="img-responsive thumbimg animated fadeInUp">
                 </div>   
                 <div class="col-xs-6 col-md-3 addimgdiv">
                     <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                 </div>   
                 <div class="col-md-3 addimgdiv">
                     <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                 </div>
               </div>  
            </div>        
          </div>   
        </div>            
        <!--  Add Img & Done Button Div  -->
        <div class="container centrarbtn animated fadeInUp donediv">
             <div class="form-group">
               <a href="#" class="btn masterbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Producto</a>
             </div>
        </div>
</div><!-- /#wrapper -->
<?php include('../../includes/inc.foot.php'); ?>