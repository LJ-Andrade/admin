<?php include('head.php'); ?>
<body>
    <div id="wrapper">
       <?php include('nav.php'); ?> <!-- Nav -->
       <?php include('delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">
        <!-- Filtros -->
            <div class="container additemdiv animated fadeIn">
                <div class="col-sm-12 form-box">
                  <div class="additemtit">
                       <h3>Agregar Nuevo Producto</h3>
                  </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <input type="text" name="form-first-name" placeholder="Nombre de Prod." 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <input type="text" name="form-first-name" placeholder="C&oacute;digo"  
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <input type="text" name="form-first-name" placeholder="Modelo" 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <input type="text" name="form-last-name"  placeholder="Medida"
                               class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                              <input type="text" name="form-last-name" placeholder="Precio"
                              class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                  <select class="form-controlusers" id="sel1">
                                    <option>Activo</option>
                                    <option>Pausado</option>
                                  </select>
                          </div>
                      </div>
                      </div>
                      <div class="row">
                          <div class="form-group animated bounceInDown">
                              <div class="col-md-12">
                                    <textarea class="form-controlitems textareaitems" rows="4" name="message" placeholder="Descripci&oacute;n"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 addprodimgdiv animated fadeInUp">    
                              <div class="text-center example-class1" data-container="body" data-template='<div class="popover1" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>' data-toggle="popover" data-placement="bottom" data-content="Ventana">
                            <a href="nuevoitem.php" class="btn additembtn" role="button"><i class="fa fa-image fa-fw"></i> Elegir Im&aacute;gen...</a>
                              </div>
                          </div>
                      </div>
                         <div class="productimg">             
                              <img src="skin/images/products/genericproduct.png" class="img-responsive useraddimg animated fadeInUp">
                         </div>
                         <div class="col-md-12 pad0 centrarbtn animated fadeInUp">
                             <div class="form-group inputsgral">
                                <a href="nuevoitem.php" class="btn additembtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Agregar Producto</a>
                             </div>
                         </div>              
                </div>    
            </div>
        <!-- /#page-wrapper -->
        </div>
<!-- /#wrapper -->
<?php include('foot.php'); ?>
</body>
</html>