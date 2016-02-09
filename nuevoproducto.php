<?php include('head.php'); ?>
<body>
    <div id="wrapper">
       <?php include('nav.php'); ?> <!-- Nav -->
       <?php include('delpopup.php'); ?> <!-- Del PopUp Window -->
<div id="page-wrapper">
        <div class="container additemtit">
           <h3>Agregar Nuevo Producto</h3>
        </div>
<!-- Filtros -->
<div class="container additemdiv">
        <div class="col-sm-12 form-box">
	                  <div class="row">
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-first-name" placeholder="Nombre de Prod." 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-first-name" placeholder="C&oacute;digo"  
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated fadeIn">
                               <input type="text" name="form-first-name" placeholder="Modelo" 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-last-name"  placeholder="Medida"
                               class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated fadeIn">
	                          <input type="text" name="form-last-name" placeholder="Precio"
                              class="form-last-name form-controlusers" id="form-last-name">
                          </div>
		                  <div class="col-md-6 form-group animated fadeIn">
                              <div class="form-group">
                                  <select class="form-controlusers" id="sel1">
                                    <option>Activo</option>
                                    <option>Pausado</option>
                                  </select>
                          </div>
                      </div>
                      </div>
                      <div class="row">
                          <div class="form-group animated fadeIn">
                              <div class="col-md-12">
                                    <textarea class="form-controlusers textareausers" rows="4" name="message" placeholder="Descripci&oacute;n"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 addprodimgdiv animated fadeInUp">    
                              <div class="text-center example-class1" data-container="body" data-template='<div class="popover1" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>' data-toggle="popover" data-placement="bottom" data-content="Ventana"><button>Agregar Im&aacute;gen</button></div>
                          </div>
                          


                      </div>
                         <div class="productimg">             
                              <img src="skin/images/products/genericproduct.png" class="img-responsive useraddimg animated fadeInUp">
                         </div>
                         <div class="col-md-12 pad0 centrarbtn animated fadeInUp">
                              <button type="submit" class="buttonadduser">Agregar producto</button>
                         </div>              
        </div>    
</div>




<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include('foot.php'); ?>
</body>
</html>