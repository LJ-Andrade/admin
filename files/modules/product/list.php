<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Listado de Productos");
  $Head->setHead();

  // $Status = $_GET['status']? $_GET['status']: "A' OR status = 'P";
  // $Products = $DB->fetchAssoc('product','product_id',"status='".$Status."'","title");

  $Buttons = new HeadButton('Agregar Producto');
  $Buttons->SetButton('Ver Listado','animated fadeIn mainbtn optionBtn','fa-th-list  fa-fw','viewListBtn');
  $Buttons->SetButton('Ver Grilla','animated fadeIn mainbtn optionBtn Hidden','fa-th  fa-fw','viewGridBtn');
?>
<body>
  <div id="wrapper">
    <?php include '../../includes/inc.subTop.php'; ?>
    <div class="container-fluid pageWrapper">

      <!-- Search Filters -->
      <div id="filteritem" class="row filterdiv">
        <form class="form-inline" role="form">
          <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-bookmark-o fa-fw"></i></span>
              <select class="form-control" name="category">
                <option>Categor&iacute;a...</option>
                <option>Camas</option>
                <option>Perros</option>
                <option>Sillas</option>
                <option>Mesas</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-bookmark-o fa-fw"></i></span>
              <input type="text" class="form-control" placeholder="Nombre"/>
            </div>
          </div>
          <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
              <input type="text" class="form-control" placeholder="Precio"/>
            </div>
          </div>
          <div class="col-lg-3 col-sm-3 col-xs-12 form-group inputsgral">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-qrcode fa-fw"></i></span>
              <input type="text" class="form-control" placeholder="C&oacute;digo \ Modelo"/>
            </div>
          </div>
        </form>
      </div><!-- /Search Filters -->

      <!--- Wrapper of ALL items -->
      <div class="row-centered wrapOverlayItem"><!-- This Div MUST wrap all the items/products divs -->
        <!-- Individual Item (Grid View) -->
        <div class="GridView col-md-4 col-sm-6 col-xs-12 col-centered overlayItem animated fadeIn">
          <div class="selectedItem Hidden">
            <i class="fa fa-check-circle"></i>
          </div>
          <div id="itemProdDiv" class="show overlay1 selectItemProd1">
            <img src="../../../skin/images/products/01.jpg" />
            <div class="mask">
              <div class="row OnOffDiv">
                  <input type="checkbox" name="status" id="status" data-on-text="Publicado" data-off-text="Pausado" data-size="mini" data-label-width="auto" checked>
              </div>
              <div class="overlayDetails">
              <h3><strong>Título</strong></h3>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod td est laborum.</p>
                <h4><strong>Composición:</strong> Raso</h4>
                <h4><strong>Talles:</strong> Xs - S</h4>
                <div class="circles circlesAddItem circlesDisplay">
                  <div class="circle" style="background-color: #c17996"></div>
                  <div class="circle" style="background-color: #768754"></div>
                  <div class="circle" style="background-color: #5643a0"></div>
                </div>
                <h4><strong>Precio:</strong> $1500</h4>
              </div>
              <div class="delModDiv">
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
              </div>
            </div>
          </div>
        </div><!-- / Individual Item-->

      </div><!--- / Wrapper of ALL items -->


      <div class="ListWrapper"><!-- Wrapper of all lists -->
        <!--  // List DeskTop // -->
        <div id="" class="viewlist row animated fadeIn">
          <!-- Titles  -->
          <div class="glassListRow listRow listTits">
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Im&aacute;gen</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>T&iacute;tulo</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Descripci&oacute;n</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Composici&oacute;n</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Talle</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Colores</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Precio</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Mod.</p></div>
          </div> <!-- /Titles  -->
          <!-- Items -->
          <div id="" class="glassListRow listRow listHover">
            <div class="col-md-1 col-sm-1 col-xs-12">
              <img src="../../../skin/images/users/3/user69110__3.jpeg" class="img-responsive listImg">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>Pijama</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Pijama para dormir seguro en casa</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Kevlar</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>XSS - L - SS</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12"><p>Blanco, rojo</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12"><p>$7000</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12">
              <a href=""><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
            </div>
          </div><!-- /Items -->
        </div><!--  /List DeskTop -->
        <!-- List Mobile Large -->
        <div id="" class="row glassListRow viewListMobileLarge viewListMobile1 animated fadeIn">
            <div class="col-md-2 col-sm-2 col-xs-3"><img src="../../../skin/images/users/3/user69110__3.jpeg" class="img-responsive listImg"></div>
            <div class="col-md-3 col-sm-3 col-xs-3"><p>Pijama</p></div>
            <div class="col-md-4 col-sm-4 col-xs-3"><p>$7000</p></div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <a href=""><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
            </div>
        </div><!-- / List Mobile Large -->
        <!-- List Mobile Small -->
        <div id="" class="row glassListRow viewListMobile viewListMobile2 animated fadeIn">
          <div class="col-md-4 col-xs-2 listMobile2Img"><img src="../../../skin/images/users/3/user69110__3.jpeg" class="img-responsive listImg"></div>
          <div class="col-md-4 col-xs-5"><p>Pijama</p></div>
          <div class="col-md-4 col-xs-5"><p><p>$7000</p></p></div>
          <div class="col-xs-12 viewListMobileMod animated fadeIn Hidden">
            <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred modBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User; ?>' ?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
            <div class="listMobileSelected">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </div><!-- /List Mobile Small -->
      </div><!-- /Wrapper of all lists -->
      <!--Pagination-->
      <div class="paginat animated slideInUp">
        <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div><!-- /Pagination-->
    </div><!-- /Container-fluid  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
