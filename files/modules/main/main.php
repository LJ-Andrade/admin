<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Renovatio Home");
  $Head->setHead();
?>
<body>
  <?php include('../../includes/inc.loader.php'); ?> <!-- Loader -->
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->
    <div class="container-fluid">
      <div class="row">
        <div class="container">
          <h2>Common Elements</h2>
          <!--- Item-Cards -->
          <div class="row-centered wrapOverlayItem">
            <!-- Item 1 -->
            <div class="col-md-4 col-sm-6 col-xs-12 col-centered overlayItem">
              <div class="show overlay1">
                <img src="../../../skin/images/products/01.jpg" />
                <div class="mask">
                  <div class="OnOffDiv">
                    <input type="checkbox" name="status" id="status" data-on-text="Publicado" data-off-text="Pausado" data-size="mini" data-label-width="auto">
                  </div>
                  <div class="overlayDetails">
                  <h3><strong>Título</strong></h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod td est laborum.</p>
                    <h4><strong>Composición:</strong> Raso</h4>
                    <h4><strong>Talles:</strong> Xs - S</h4>
                    <div class="circles">
                      <span><strong>Colores:</strong></span>
            					<ul>
            						<li><div class="circle" style="background-color: #fff"></div></li>
            						<li><div class="circle" style="background-color: #c17996"></div></li>
            						<li><div class="circle" style="background-color: #768754"></div></li>
            						<li><div class="circle" style="background-color: #5643a0"></div></li>
            					</ul>
            				</div>
                    <h4><strong>Precio:</strong> $1500</h4>
                  </div>
                  <div class="delModDiv">
                    <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                    <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Item 1 -->
            <!-- Item 1 -->
            <div class="col-md-4 col-sm-6 col-xs-12 col-centered overlayItem">
              <div class="show overlay1">
                <img src="../../../skin/images/products/01.jpg" />
                <div class="mask">
                  <div class="OnOffDiv">
                    <input type="checkbox" name="status" id="status" data-on-text="Publicado" data-off-text="Pausado" data-size="mini" data-label-width="auto">
                  </div>
                  <div class="overlayDetails">
                  <h3><strong>Título</strong></h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod td est laborum.</p>
                    <h4><strong>Composición:</strong> Raso</h4>
                    <h4><strong>Talles:</strong> Xs - S</h4>
                    <div class="circles">
                      <span><strong>Colores:</strong></span>
            					<ul>
            						<li><div class="circle" style="background-color: #fff"></div></li>
            						<li><div class="circle" style="background-color: #c17996"></div></li>
            						<li><div class="circle" style="background-color: #768754"></div></li>
            						<li><div class="circle" style="background-color: #5643a0"></div></li>
            					</ul>
            				</div>
                    <h4><strong>Precio:</strong> $1500</h4>
                  </div>
                  <div class="delModDiv">
                    <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                    <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Item 1 -->
            <!-- Item 1 -->
            <div class="col-md-4 col-sm-6 col-xs-12 col-centered overlayItem">
              <div class="show overlay1">
                <img src="../../../skin/images/products/01.jpg" />
                <div class="mask">
                  <div class="OnOffDiv">
                    <input type="checkbox" name="status" id="status" data-on-text="Publicado" data-off-text="Pausado" data-size="mini" data-label-width="auto">
                  </div>
                  <div class="overlayDetails">
                  <h3><strong>Título</strong></h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod td est laborum.</p>
                    <h4><strong>Composición:</strong> Raso</h4>
                    <h4><strong>Talles:</strong> Xs - S</h4>
                    <div class="circles">
                      <span><strong>Colores:</strong></span>
            					<ul>
            						<li><div class="circle" style="background-color: #fff"></div></li>
            						<li><div class="circle" style="background-color: #c17996"></div></li>
            						<li><div class="circle" style="background-color: #768754"></div></li>
            						<li><div class="circle" style="background-color: #5643a0"></div></li>
            					</ul>
            				</div>
                    <h4><strong>Precio:</strong> $1500</h4>
                  </div>
                  <div class="delModDiv">
                    <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                    <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Item 1 -->
            <div class="mobile-clear"></div>
          </div>
          <!--- /Item-Card -->
          <div class="row">
            <div class="container">
              <!-- Buttons -->
              <div class="col-md-12 demotittles">
                <a href="#"><button type="button" name="button" class="btn mainbtn"> Button</button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn"> Button <i class="fa fa-hand-spock-o"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-hand-spock-o"></i> Button</button><br></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn acceptBtn"><i class="fa fa-hand-spock-o"></i> Button</button><br></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"> Button Red</button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"> Button Red <i class="fa fa-hand-spock-o"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-hand-spock-o"></i> Button Red</button></a>
                <hr>
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-times"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button></a>
              </div>
              <!-- /Buttons -->
              <!-- checkboxes -->

                <div class="col-md-12 democheck checkboxDiv">
                  <ul>
                    <li><input id="sizeXS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXS"><span>Item1</span></li>
                    <li><input id="sizeS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeS"><span>Item2</span></li>
                    <li><input id="sizeM" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeM"><span>Item3</span></li>
                  </ul>
                </div>

              <!-- checkboxes -->
            </div>

            <br><br>
          </div>

          <!-- New Item Window -->
          <!-- WindowHead -->
          <div class="row windowHead">
            <div class="col-md-6 col-xs-12">
              <h3><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Nuevo Item</h3>
            </div>
            <div class="col-md-6 col-xs-12 switchDiv switchHead">
              <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto">
            </div>
          </div><!-- /WindowHead -->
          <div class="container animated fadeIn addItemDiv">
            <div class="col-sm-12 form-box formitems">
              <!-- Inputs -->
              <div id="newInputs">
                <div class="row">
                  <div class="col-md-6 form-group animated bounceInLeft">
                    <input id="" name="user" class="form-first-name formNewItem" placeholder="Item1" type="text">
                  </div>
                  <div class="col-md-6 form-group animated bounceInLeft">
                    <input id="" name="user" class="form-first-name formNewItem" placeholder="Item2" type="text">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group animated bounceInRight">
                    <div class="form-group">
                      <?php echo insertElement('select','group','','form-controlusers','tabindex="5"',$Groups,'0','Elegir Grupo'); ?>
                    </div>
                  </div>
                  <div class="col-md-6 form-group animated bounceInRight">
                    <div class="form-group">
                      <?php echo insertElement('select','profile','','form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","","title"),'','Elegir Perfil'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 animated bounceInRight">
                  <div class="col-md-12 userstatustit">Estado</div>
                  <div class="col-md-12"><input type="checkbox" class="centered" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="large" data-label-width="auto" checked>
                  </div>
                </div>
              </div>
              <!-- /Inputs -->
              <!-- Imgs To select -->
              <div id="imgsToSelect" class="row">
                <div class="row selectImgTitle">
                  <h4>Elija una im&aacute;gen</h4>
                  <button id="cancelSelectImgBtn" class="btn closeBtn"><i class="fa fa-times"></i></button>
                </div>
                <div class="row imgCatalogue">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/users/mas.jpg" alt="" class="img-responsive thumbimgadd AddNewImage">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/genericproduct.png" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/cod3.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/cod4.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive thumbimgadd Selecteable">
                  </div>
                </div>
              </div>
              <!-- /Imgs To select -->
              <div class="col-md-6 animated bounceInRight selectImgDiv centrarbtn">
                <button id="selectImgBtn" class="btn mainbtn">Seleccionar Im&aacute;gen</button>
              </div>
            </div>
          </div>
          <!-- Create User Button Div  -->
          <div class="container animated fadeInUp donediv">
            <div class="form-group">
              <a href="#" class="btn mainbtn" role="button" id=""><i class="fa fa-check-square-o fa-fw"></i> Crear Usuario</a>
              <a href="#" class="btn mainbtn" role="button" id=""><i class="fa fa-check-square-o fa-fw"></i> Crear y Agregar Otro...</a>
            </div>
          </div>
          <!-- /Create User Button Div  -->
          <div class="col-md-12 demotittles">
            <h1>Title h1</h1>
            <h2>Title h2</h2>
            <h3>Title h3</h3>
            <h4>Title h4</h4>
            <h5>Title h5</h5>
          </div>

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
      </div><!-- Row -->
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
