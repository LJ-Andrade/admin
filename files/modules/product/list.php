<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Listado de Productos");
    $Head->setHead();
?>
<body>
    <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->   
        <div class="container-fluid">
            <div class="maintitle"><h4 class="maintitletxt">Listado de Productos</h4></div>
                <div class="glasscontainer1 optionsdiv"> 
                    <span id="delselected" class="delselected animated slideInDown"><i class="fa fa-trash"></i> Eliminar seleccionados</span>
                    <a href="new.php"><button class="masterbtn"><i class="fa fa-user-plus"></i> Agregar Producto</button></a>    
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
        </div><!-- Container Filters -->

        <!-- Grid View -->
        <div id="viewgrid" class="row row-centered">
          <!--    Items (Grid)   -->
          <div id="delelem1" class="col-md-2 col-sm-6 col-xs-12 col-centered animated bounceInUp itemdiv">
            <div class="row itemstatus">
              <p class="col-md-4 col-xs-12 itemstattxt">Publicaci&oacute;n: </p>
              <input type="checkbox" class="col-md-8 col-xs-12 centered itemstatswitch" name="my-checkbox" data-on-text="Activa" data-off-text="Pausada"  data-label-width="auto" data-size="mini" checked>        
            </div>
            <div class="grid">
                <div>
                    <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive">
                </div>
                <div class="col-md-12 itemtit">
                    <p>Cama - Mod: 128</p>
                </div>
                <div class="grid_content">
                  <div class="col-md-12 itemtit">
                    <p><b>Cama</b></p>
                  </div>
                    <p><b>Descripci&oacute;n:</b> Es una cama muy buena, blabla Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Cumque temporibus labore, nostrum non arpa loca toca fuerte</p>
                  <div class="row itemrow2">
                    <div class="col-md-4 col-xs-4">
                      <p>Modelo<br><span class="itemtxtcolor"><b>128</b></span></p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <p>Medida<br><span class="itemtxtcolor"><b>10x4 mt</b></span></p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <p>Precio<br><span class="itemtxtcolor"><b>$1280</b></span></p>
                    </div>
                  </div>
                    <div class="col-md-12 itemicos">
                        <ul>
                            <li class="btnmod"><a href="moditem.php"><i class="fa fa-fw fa-pencil"></i></a></li>
                            <li class="btndel"><a href="#"><i class="fa fa-fw fa-trash"></i></a></li>
                        </ul>                
                    </div>
                </div>
            </div>
          </div> <!-- /Item (Grid) -->
        </div>  <!-- /Grid View -->


       <!-- List View -->
            <div id="viewlist" class="row">
                <!-- Titles  -->
                <div class="listtit glasscontainer1">
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12 titlist1">
                        <h5>Imagen</h5>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 titlist2">
                        <h5>Nombre</h5>
                    </div> 
                    <div class="col-lg-4 col-md-2 col-sm-6 col-xs-12 titlist3">
                        <h5>Descripci&oacute;n</h5>
                    </div> 
                    <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 titlist4">
                        <h5>Modelo</h5>
                    </div> 
                    <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 titlist5">
                        <h5>Medida</h5>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12 titlist5">
                        <h5>Precio</h5>
                    </div> 
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 titlist6">
                        <h5 class="text-center">Editar / Eliminar</h5>
                    </div> 
                </div> <!-- /Titles  -->
               
                <!-- Items (List) -->
                <div id="ID1" class="container-fluid glasscontainer1 listrow">
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12 col1listprod">
                        <img src="../../../skin/images/products/genericproduct.jpg" id="" class="img-responsive prodimglist">
                    </div> 
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 col2listprod">
                        <p>Cama</p>
                    </div>
                    <div class="col-lg-4 col-md-2 col-sm-6 col-xs-12 col3listprod">
                        <p>Cama...</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 col4listprod">
                        <p>128</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 col5listprod">
                        <p>12x4</p>
                    </div> 
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12 col5listprod">
                        <p>1200</p>
                    </div> 
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 col6listprod">
                        <div class="delmoddiv">
                             <ul>
                                <li class="btnmod"><a href="edit.php"><i class="fa fa-fw fa-pencil"></i></a></li>
                                <li class="btndel"><a href="#"><i class="fa fa-fw fa-trash"></i></a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
                <!-- /Items (List)  -->
            </div><!-- /List View  -->
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
    </div><!-- /Container  -->
  </div><!-- /#wrapper -->
    
    <!-- End Pagination-->
<?php include('../../includes/inc.foot.php'); ?>