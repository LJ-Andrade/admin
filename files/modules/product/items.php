<!DOCTYPE html>
<html lang="es">
<head>
<?php include('../../includes/inc.head.php'); ?>
</head>
<?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
<body>
      <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->
        <div id="page-wrapper">    
          <div class="container">
            <div class="userstitulo"><h3>Administrador de Productos</h3></div>
              <!-- Filters -->
              <div id="itemfilters" class="row filterdiv">
                    <form class="form-inline filterformdiv" role="form">
                        <div class="col-lg-2 col-sm-3 col-xs-12 form-group inputsgral">
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
                        <div class="col-lg-2 col-sm-3 col-xs-12 form-group inputsgral">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bookmark-o fa-fw"></i></span>
                                <input type="password" class="form-control" placeholder="Nombre"/>
                            </div>
                        </div> 
                        <div class="col-lg-2 col-sm-3 col-xs-12 form-group inputsgral">    
                            <div class="input-group">         
                                <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                                <input type="email" class="form-control" placeholder="Precio"/>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-xs-12 form-group inputsgral">
                            <div class="input-group">         
                                <span class="input-group-addon"><i class="fa fa-qrcode fa-fw"></i></span>
                                <input type="email" class="form-control" placeholder="C&oacute;digo \ Modelo"/>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12 col-xs-12 form-group inputsgral itemsearchbtndiv">
                        <button type="submit" class="btn itemsearchbtn"><i class="fa fa-search fa-fw"></i> Buscar</button>
                        </div>
                    </form>
            </div>
          </div><!-- Container Filters -->
            <div class="container-fluid">
            <!-- Item (Grid) -->
            <div id="viewcards" class="row row-centered">
                    <!--    Item 1   -->
                    <div id="delelem1" class="col-md-2 col-sm-6 col-xs-12 col-centered itemdiv animated bounceInUp">
                      <div class="row itemstatus">
                        <p class="col-md-4 col-xs-12 itemstattxt">Estado: </p>
                      <input type="checkbox" class="centered col-md-8 col-xs-12 itemstatswitch" name="my-checkbox" data-on-text="Activo" data-off-text="Pausado"  data-label-width="auto" data-size="mini" checked>        
                      </div>
                      <div class="card">
                        <div>
                          <img src="../../../skin/images/products/cod1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-12 itemtit">
                          <p>Cama Loca - F128</p>
                        </div>
                        <div class="card_content">
                          <div class="col-md-12 itemtit">
                            <p><b>Cama Loca</b></p>
                          </div>
                            <p><b>Descripci&oacute;n:</b> Es una cama muy buena, blabla Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Cumque temporibus labore, nostrum non arpa loca toca fuerte</p>
                        <div class="row itemrow2">
                          <div class="col-md-4 col-xs-4">
                              <p>Modelo<br><span class="itemtxtcolor"><b>F128</b></span></p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                              <p>Medida<br><span class="itemtxtcolor"><b>10x4 mt</b></span></p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                              <p>Precio<br><span class="itemtxtcolor"><b>$1280,50</b></span></p>
                          </div>
                        </div>
                        <div class="col-md-12 itemicos">
                              <ul>
                                  <li><a href="moditem.php" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a>
                                  </li>
                                  <li><a href='#modal1' id="1" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a>
                                  </li>
                              </ul>                
                        </div>
                              </div>
                      </div>
                    </div>

                    <!--    End Item 1   -->
                    <!--    Item 2   -->
                    <div id="delelem2" class="col-md-2 col-sm-6 col-xs-12 col-centered itemdiv card animated bounceInUp">
                              <div>
                                  <img src="../../../skin/images/products/cod2.jpg" alt="" class="img-responsive">
                              </div>
                                  <div class="col-md-12 itemtit">
                                      <p>Octamueble - F128</p>
                                  </div>
                              <div class="card_content">
                                 <div class="col-md-12 itemtit">
                                      <p><b>Octamueble</b></p>
                                  </div>
                                  <p>Descripci&oacute;n: Es una cama muy buena, blabla Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque temporibus labore, nostrum non</p>
                                  <div class="row itemrow2">
                                  <div class="col-md-4 col-xs-4">
                                      <p>Modelo<br><span class="itemtxtcolor"><b>F128</b></span></p>
                                  </div>
                                  <div class="col-md-4 col-xs-4">
                                      <p>Medida<br><span class="itemtxtcolor"><b>10x4 mt</b></span></p>
                                  </div>
                                  <div class="col-md-4 col-xs-4">
                                      <p>Precio<br><span class="itemtxtcolor"><b>$1280,50</b></span></p>
                                  </div>
                                  </div>
                                  <div class="col-md-12 itemicos">
                                        <ul>
                                            <li><a href="moditem.php" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a>
                                            </li>
                                            <li><a href='#modal1' id="2" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a>
                                            </li>
                                        </ul>              
                                  </div>
                              </div>
                    </div>
                    <!--    End Item 2   -->
                    <!--    Item 3   -->
                    <div id="delelem3" class="col-md-2 col-sm-6 col-xs-12 col-centered itemdiv card animated bounceInUp">
                              <div>
                                  <img src="../../../skin/images/products/cod3.jpg" alt="" class="img-responsive">
                              </div>
                                  <div class="col-md-12 itemtit">
                                      <p>Mueble Loco</p>
                                  </div>
                              <div class="card_content">
                                 <div class="col-md-12 itemtit">
                                      <p>Mueble Loco</p>
                                  </div>
                                  <p>Descripci&oacute;n: Es una cama muy buena, blabla Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque temporibus labore, nostrum non</p>
                                  <div class="row itemrow2">
                                  <div class="col-md-4 col-xs-4">
                                      <p>Modelo<br><span class="itemtxtcolor"><b>F128</b></span></p>
                                  </div>
                                  <div class="col-md-4 col-xs-4">
                                      <p>Medida<br><span class="itemtxtcolor"><b>10x4 mt</b></span></p>
                                  </div>
                                  <div class="col-md-4 col-xs-4">
                                      <p>Precio<br><span class="itemtxtcolor"><b>$1280,50</b></span></p>
                                  </div>
                                  </div>
                                  <div class="col-md-12 itemicos">
                                        <ul>
                                            <li><a href="moditem.php" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a>
                                            </li>
                                            <li><a href='#modal1' id="3" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a>
                                            </li>
                                        </ul>                
                                  </div>
                              </div>
                    </div>
                    <!--    End Item 3   -->
                </div>  <!-- Item (Square) end -->        
                <!-- Alternative Visualization - Products -->
                <!-- Prod 1-->
                <div id="delelemf1" class="row animated bounceInUp prodfilediv">
                     <div class="col-md-2 col-sm-3 col-xs-12">
                        <img src="../../../skin/images/products/cod1.jpg" class="img-responsive prodfileimg">
                     </div>
                     <div class="col-md-1 col-sm-3 col-xs-3 colprod1">
                        <div class="colprodtit">
                        <p>T&iacute;tulo<br></brt><b>Cama</b></p>
                        </div>    
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-3 colprod1">
                        <div class="colprod">
                        <p>Modelo<br></brt><b>F.128</b></p>
                        </div>  
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-3 colprod1">
                        <div class="colprod">
                        <p>Medida<br><b>10x4cm</b></p>
                        </div>
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-3 colprod1">
                        <div class="colprod">
                        <p><p>Precio<br><b>$128</b></p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-12 col-xs-12 colprod1">
                        <div class="colprod">
                        Es una cama muy buena. Sirve para domir. Tiene 4 patas. Almohada de madera. Todo de madera.
                        </div> 
                        </div>
                     <div class="col-md-2 col-sm-12 col-xs-12  colprod1">
                      <div class="colprodico">
                       <div class="prodicos">
                                <ul>
                                    <li><a href="moditem.php" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a>
                                    </li>
                                    <li><a href='#modal1' id="1" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a>
                                    </li>
                                </ul>                
                            </div>
                        </div>
                     </div>
                </div>
                <!-- End Prod 1-->
                    <!-- Prod 2-->
                <div id="delelemf2" class="row animated bounceInUp prodfilediv">
                     <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="../../../skin/images/products/cod2.jpg" class="img-responsive prodfileimg">
                     </div>
                     <div class="col-md-1 col-sm-3 col-xs-2 colprod1">
                        <div class="colprodtit">
                        <p>T&iacute;tulo<br></brt><b>Octamueble</b></p>
                        </div>    
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-2 colprod1">
                        <div class="colprod">
                        <p>Modelo<br></brt><b>F.128</b></p>
                        </div>  
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-2  colprod1">
                        <div class="colprod">
                        <p>Medida<br><b>10x4cm</b></p>
                        </div>
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-2  colprod1">
                        <div class="colprod">
                        <p><p>Precio<br><b>$128</b></p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-12 col-xs-12 colprod1">
                        <div class="colprod">
                        Es una cama muy buena. Sirve para domir. Tiene 4 patas. Almohada de madera. Todo de madera.
                        </div> 
                        </div>
                     <div class="col-md-2 col-sm-12 col-xs-12  colprod1">
                      <div class="colprodico">
                       <div class="prodicos">
                                <ul>
                                    <li><a href="moditem.php" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a>
                                    </li>
                                    <li><a href='#modal1' id="2" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a>
                                    </li>
                                </ul>                
                            </div>
                        </div>
                     </div>
                </div>
                <!-- End Prod 2-->
                    <!-- Prod 3-->
                <div id="delelemf3" class="row animated bounceInUp prodfilediv">
                     <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="../../../skin/images/products/cod3.jpg" class="img-responsive prodfileimg">
                     </div>
                     <div class="col-md-1 col-sm-3 col-xs-2 colprod1">
                        <div class="colprodtit">
                        <p>T&iacute;tulo<br></brt><b>Mueble</b></p>
                        </div>    
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-2 colprod1">
                        <div class="colprod">
                        <p>Modelo<br></brt><b>F.128</b></p>
                        </div>  
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-2  colprod1">
                        <div class="colprod">
                        <p>Medida<br><b>10x4cm</b></p>
                        </div>
                     </div>
                     <div class="col-md-1 col-sm-2 col-xs-2  colprod1">
                        <div class="colprod">
                        <p><p>Precio<br><b>$128</b></p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-12 col-xs-12 colprod1">
                        <div class="colprod">
                        Es una cama muy buena. Sirve para domir. Tiene 4 patas. Almohada de madera. Todo de madera.
                        </div> 
                        </div>
                     <div class="col-md-2 col-sm-12 col-xs-12  colprod1">
                      <div class="colprodico">
                       <div class="prodicos">
                                <ul>
                                    <li><a href="moditem.php" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a>
                                    </li>
                                    <li><a href='#modal1' id="3" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a>
                                    </li>
                                </ul>                
                            </div>
                        </div>
                     </div>
                </div>
                <!-- End Prod 1-->
                <!-- End Alt Vis Prod-->
                <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    </div>
    <!-- End Pagination-->
<?php include('../../includes/inc.foot.php'); ?>
<script>
// Show or Hide Icons On subtop
//==============================================

$(document).ready(function() {
    $('#showitemfilters').click(function() {
         $('#itemfilters').toggle("slide");
    });
    $('#viewlist').show( 0 );
    $('#newprod').show( 100 );
    $('#showitemfilters').show( 0 );
});
    
    
// Switch Viewmode
//==============================================

$('div[id^="delelemf"]').hide();
$('#viewgrid').hide();
		
    $("#viewlist").on( "click", function() {
		$('div[id^="delelem"]').hide( 500 );
        $('div[id^="delelemf"]').show( 500 ); 
        $("#viewlist").hide();
        $("#viewgrid").show( 500 );
	 });
    
    $("#viewgrid").on( "click", function() {
		$('div[id^="delelem"]').show( 500 ); 
        $('div[id^="delelemf"]').hide( 500 );
        $("#viewgrid").hide();
        $("#viewlist").show( 500 );
	 });
    
// Active Inactive Switch
$("[name='my-checkbox']").bootstrapSwitch(); 
    
</script>
</body>
</html>