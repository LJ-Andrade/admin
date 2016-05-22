<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Listado de Productos");
  $Head->setHead();

  // $Status = $_GET['status']? $_GET['status']: "A' OR status = 'P";
  // $Products = $DB->fetchAssoc('product','product_id',"status='".$Status."'","title");
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->
    <div class="container-fluid">
      <!-- ///////// Title and options //////////-->
      <div class="row">
        <div class="titleDiv"><!-- Page Title & back btn -->
          <div class="backOption"><a href=""><i class="fa fa-angle-double-left"></i> Volver</a></div>
          <h4 class="maintitletxt"> Título</h4>
        </div>
        <div class="optionsDiv"><!-- Options Buttons-->
          <button id="delselected" class="animated slideInDown mainbtn mainbtnred"><i class="fa fa-trash"></i> Eliminar seleccionados</button>
          <button id="" class="animated slideInDown mainbtn"><i class="fa fa-user-plus"></i> Agregar Producto</button>
          <button id="" class="animated slideInDown mainbtn optionBtn"><i class="fa fa-search"></i></button>
          <button id="" class="animated slideInDown mainbtn optionBtn"><i class="fa fa-th-list"></i></button>
          <button id="" class="animated slideInDown mainbtn optionBtn"><i class="fa fa-th"></i></button>

          <!-- <div class="optionIcons"> OBSOLETE
            <ul>
              <li><a href="new.php"><button class="mainbtn"><i class="fa fa-search"></i></a></li>
              <li id="viewlistbt" class="animated fadeIn SubTopBtn "><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
              <li id="viewgridbt" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Grilla </a></li>
              <li id="showitemfiltersuser" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <li id="showitemfilters" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <li id="newuser" class="Hidden"><a href="../user/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-user-plus  fa-fw"></i> Nuevo Usuario</a></li>
            </ul>
          </div> OBSOLETE -->

        </div><!-- /Title and options -->
      </div>
      <!-- //////////// Filters /////////// -->
      <div class="container-fluid pad0">
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
        </div>
      </div><!-- /Filters -->


          <!-- ////// Note /////////
          There is 4 type of view:
          #gridView = grid (large/desktop)
          #viewlist = list (large/desktop)
          #ViewListMobile1 = list (medium/tablet-notebook-landscape)
          #ViewListMobile2 = list (small cell/vertical)
         -->


      <div class="row mainContainer">
        <!--- //// General Product Wrapper (Grid) //// -->
        <div class="row-centered wrapOverlayItem"><!-- This Div MUST wrap all the items/products divs -->
          <!-- //////////  Product/Item HERE - #gridView//////////////// -->
          <div id="gridView" class="col-md-4 col-sm-6 col-xs-12 col-centered overlayItem">
            <div class="Hidden selectedItem">
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
          </div><!-- /Product/Item -->
        </div><!--- /General Product Wrapper (Grid) -->

        <!-- //////// Product List View Titles - #viewlist ///////////-->
        <div id="viewlist" class="row">
          <!-- Titles  -->
          <div class="glassListRow listTitDiv">
            <div class="col-md-1 col-sm-1 col-xs-12 listTit"><p>Im&aacute;gen</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 listTit"><p>Titulo</p></div>
            <div class="col-md-2 col-sm-3 col-xs-12 listTit"><p>Descripci&oacute;n</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 listTit"><p>Composicion</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 listTit"><p>Talles</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 listTit"><p>Colores</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 listTit"><p>Precio</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 listTit listTitLast"><p>Mod.</p></div>
          </div> <!-- /Titles  -->
          <!-- ////////////   Product/Items (List)  ////////////////////////// -->
          <div id="#" class="glassListRow listRow">
            <div class="col-md-1 col-sm-1 col-xs-12 colList colListFirst">
              <img id="#" src="../../../skin/images/products/01.jpg" class="img-responsive listImg">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 colList"><p>Titulo Test</p></div>
            <div class="col-md-2 col-sm-3 col-xs-12 colList"><p>Descripci&oacute;n blablabla</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 colList"><p>Composicion</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 colList"><p>Talles</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 colList"><p>Colores</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 colList"><p>Precio</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 colList colListLast">
              <div class="delModDivList text-center">
                <a href="#"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList"><i class="fa fa-trash"></i></button></a>
              </div>
            </div>
          </div>
          <!-- /Product (List)  -->
        </div><!-- /Product List View  -->
        <!-- ////////////////////  Product List View Mobile Large HERE - #ViewListMobile1 //////////////////////////// -->
        <div id="ViewListMobile1" class="row viewListMobileLarge">
            <div class="col-md-3 col-sm-3 col-xs-3"><img id="#" src="../../../skin/images/products/01.jpg" class="img-responsive listImg"></div>
            <div class="col-md-3 col-sm-3 col-xs-3"><p>Titulo</p></div>
            <div class="col-md-3 col-sm-2 col-xs-4"><p>$precio</p></div>
            <div class="col-md-3 col-sm-4 col-xs-4">
              <a href="#"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
              <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList"><i class="fa fa-trash"></i></button></a>
            </div>
        </div><!-- /Product List View Mobile Large -->
        <!-- ////////////////////// Product List View Mobile Small HERE - #ViewListMobile2 ///////////////// -->
        <div id="ViewListMobile2" class="row viewListMobile">
          <div class="col-md-4 col-xs-4"><img id="#" src="../../../skin/images/products/01.jpg" class="img-responsive listImg"></div>
          <div class="col-md-4 col-xs-4"><p>Vestido Loco</p></div>
          <div class="col-md-1 col-xs-4"><p>$150</p></div>
          <div class="col-xs-12 viewListMobileMod">
            <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
          </div>
        </div><!-- /Product List View Mobile Small  -->
      </div> <!-- /mainContainer / This Div Wrap ONLY all the existing products/Items views -->
      <!--Paginator-->
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
      </div>
      <!-- /Pagination-->
    </div><!-- /Container-fluid  -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
