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
        <div class="maintitle"><h4 class="maintitletxt">Listado de Productos</h4></div>
        <div class="glasscontainer1 optionsdiv">
          <span id="delselected" class="delselected animated slideInDown"><i class="fa fa-trash"></i> Eliminar seleccionados</span>
          <a href="new.php"><button class="mainbtn"><i class="fa fa-user-plus"></i> Agregar Producto</button></a>
        </div>
        <!-- Filters -->
        <div class="container-fluid">
          <div id="filteritem" class="row row-centered filterdiv">
            <form class="form-inline filterformdiv" role="form">
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
        <!--- General Product Wrapper (Grid) -->
        <div class="row-centered wrapOverlayItem">
          <!-- Product -->
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
          </div><!-- /Product -->
        </div><!--- /General Product Wrapper (Grid) -->

        <!-- Product List View -->
        <div id="viewlist" class="row">
          <!-- Titles  -->
          <div class="glassListRow listTitDiv">
            <div class="col-md-1 col-sm-1 col-xs-12 listTit"><p>Imagen</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 listTit"><p>Titulo</p></div>
            <div class="col-md-2 col-sm-3 col-xs-12 listTit"><p>Descripci&oacute;n</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 listTit"><p>Composicion</p></div>
            <div class="col-md-2 col-sm-2 col-xs-12 listTit"><p>Talles</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 listTit"><p>Colores</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 listTit"><p>Precio</p></div>
            <div class="col-md-1 col-sm-1 col-xs-12 listTit listTitLast"><p>Mod.</p></div>
          </div> <!-- /Titles  -->
            <!-- <div id="emptylist" class="container-fluid glassListRow listrow" style="text-align:center;display:block;">
              <p>No existen productos, puede crear uno haciendo click&nbsp;<a href="new.php">aqui</a></p>
            </div> -->
          <!-- Product (List) -->
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
              <div class="delModDiv text-center">
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
              </div>
            </div>
          </div>
          <!-- /Product (List)  -->
        </div><!-- /Product List View  -->
        <!-- Product List View Mobile  -->
        <div class="row viewListMobile">
          <div class="col-md-12 col-xs-12 pad0">
            <div class="col-md-4 col-xs-4 pad0">
              <img id="#" src="../../../skin/images/products/01.jpg" class="img-responsive listImg">
            </div>
            <div class="col-md-4 col-xs-4 vlMobileTxt pad0"><p>Vestido Loco</p></div>
            <div class="col-md-1 col-xs-4 vlMobileTxt"><p>$150</p></div>
          </div>
          <div class="col-xs-12 viewListMobileMod">
            <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
            <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
          </div>
        </div>
        <!-- /Product List View Mobile  -->
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
