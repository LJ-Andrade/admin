<?php include('head.php'); ?>
<body>
    <div id="wrapper">
        <?php include('nav.php'); ?> <!-- Navegación -->
        <?php include('delpopup.php'); ?> <!-- Del PopUp Window -->
<div id="page-wrapper">
    <div class="addprodtit"><h3>Agregar Nuevo Usuario</h3></div><br>
<!-- Filtros -->
<!-- New Prod-->
<div class="container addproddiv">
        <div class="col-sm-12 form-box">
	                  <div class="row">
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-first-name" placeholder="Nombre de Usuario" 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-first-name" placeholder="Perfil"  
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated fadeIn">
                               <input type="text" name="form-first-name" placeholder="Nombre" 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-last-name"  placeholder="Apellido"
                               class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated fadeIn">
	                          <input type="text" name="form-last-name" placeholder="Contrase&ntilde;a"
                              class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                          <div class="col-md-6 form-group animated fadeIn">
	                           <input type="text" name="form-last-name"  placeholder="Repita Contrase&ntilde;a"
                               class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                      </div>
                      <div class="row">
		                  <div class="col-md-6 form-group animated fadeIn">
                              <div class="form-group">
                                  <select class="form-controlusers" id="sel1">
                                    <option>Activo</option>
                                    <option>Inactivo</option>
                                  </select>
                          </div>
                          </div>
                          <div class="col-md-6 form-group animated fadeIn">
                              <div class="form-group">
                                  <select class="form-controlusers" id="sel1">
                                    <option>Activo</option>
                                    <option>Inactivo</option>
                                  </select>
                          </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 adduserimgdiv animated fadeInUp">    
                              <div class="centrarbtn">
                                  <button class="btn btncargarimg">Agregar Im&aacute;gen...</button>
                              </div> 
                          </div>
                      </div>
                      <div class="userimg">          
                           <img src="skin/users/caras1.jpg" class="img-responsive useraddimg animated fadeInUp">
                      </div>   
                      <div class="col-md-12 pad0 centrarbtn animated fadeInUp">
                           <button type="submit" class="buttonadduser">Agregar Usuario</button>
                      </div>
                      
    </div>    
</div>




<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include('foot.php'); ?>
</body>
</html>