<?php include('head.php'); ?>
<?php include('delpopup.php'); ?> <!-- Del PopUp Window -->
<body>
    <div id="wrapper">
       <?php include('nav.php'); ?> <!-- Nav -->
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
                <!-- Item (Square) -->
                <div id="viewcards" class="row">
                    <!--    Item 1   -->
                    <div id="delelem1" class="col-md-2 col-sm-6 col-xs-12 col-centered itemdiv card animated bounceInUp">
                              <div>
                                  <img src="skin/images/products/cod1.jpg" alt="" class="img-responsive">
                              </div>
                                  <div class="col-md-12 itemtit">
                                      <p><b>Cama Loca - F128</b></p>
                                  </div>
                              <div class="card_content">
                                 <div class="col-md-12 itemtit">
                                      <p><b>Cama de 6 plazas</b></p>
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
                                            <li><a href=""><i class="fa fa-fw fa-pencil prodicoadd"></i></a></li>
                                            <li><a href="#modal1" id="1" class="deleteelem"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                  </div>
                              </div>
                    </div>
                    <!--    Item 1   -->
                    <!--    Item 2   -->
                    <div id="delelem2" class="col-md-2 col-sm-6 col-xs-12 col-centered itemdiv card animated bounceInUp">
                              <div>
                                  <img src="skin/images/products/cod2.jpg" alt="" class="img-responsive">
                              </div>
                                  <div class="col-md-12 itemtit">
                                      <p><b>Octamueble - F128</b></p>
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
                                            <li><a href=""><i class="fa fa-fw fa-pencil prodicoadd"></i></a></li>
                                            <li><a href="#modal1" id="2" class="deleteelem"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                  </div>
                              </div>
                    </div>
                    <!--    End Item 2   -->
                </div>  <!-- Item (Square) end -->
                
                
                
                <!-- Alternative Visualization - Products -->
                <!-- Prod 1-->
                <div id="delelemf1" class="row animated bounceInUp">
                     <div class="container-fluid prodfilediv">
                     <div class="col-md-1 col-sm-12 col-xs-12">
                        <img src="skin/images/products/cod1.jpg" class="img-responsive prodfileimg">
                     </div>
                     <div class="col-md-2 col-sm-12 col-xs-12 colprod1">
                        <div class="colprodtit">
                        <p><b>Cama Loca</b></p>
                        </div>    
                     </div>
                     <div class="col-md-2 col-sm-4 col-xs-4 colprod1">
                        <div class="colprod">
                        <p>Modelo<br></brt><b>F.128</b></p>
                        </div>  
                     </div>
                     <div class="col-md-2 col-sm-4 col-xs-4  colprod1">
                        <div class="colprod">
                        <p>Medida<br><b>10x4cm</b></p>
                        </div>
                     </div>
                     <div class="col-md-1 col-sm-4 col-xs-4  colprod1">
                        <div class="colprod">
                        <p><p>Precio<br><b>$128</b></p>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-12 col-xs-12 colprod1">
                        <div class="colprod">
                        Es una cama muy buena. Sirve para domir. Tiene 4 patas. Almohada de madera. Todo de madera.
                        </div> 
                        </div>
                     <div class="col-md-1 col-sm-12 col-xs-12  colprod1">
                      <div class="colprodico">
                       <div class="prodicos">
                                <ul>
                                    <li><a href=""><i class="fa fa-fw fa-pencil prodicoadd"></i></a></li>
                                    <li><a href="#modal1" id="1"><i class="fa fa-fw fa-trash"></i></a></li>
                                </ul>                
                            </div>
                        </div>
                     </div>
                     </div>
                </div>
                <!-- End Prod 1-->
                <!-- Prod 2-->
                <div id="delelemf2" class="row animated bounceInUp">
                     <div class="container-fluid prodfilediv">
                     <div class="col-md-1 col-sm-12 col-xs-12">
                        <img src="skin/images/products/cod2.jpg" class="img-responsive prodfileimg">
                     </div>
                     <div class="col-md-2 col-sm-12 col-xs-12 colprod1">
                        <div class="colprodtit">
                        <p><b>Octamueble</b></p>
                        </div>    
                     </div>
                     <div class="col-md-2 col-sm-4 col-xs-4 colprod1">
                        <div class="colprod">
                        <p>Modelo<br></brt><b>F.128</b></p>
                        </div>  
                     </div>
                     <div class="col-md-2 col-sm-4 col-xs-4  colprod1">
                        <div class="colprod">
                        <p>Medida<br><b>10x4cm</b></p>
                        </div>
                     </div>
                     <div class="col-md-1 col-sm-4 col-xs-4  colprod1">
                        <div class="colprod">
                        <p><p>Precio<br><b>$128</b></p>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-12 col-xs-12 colprod1">
                        <div class="colprod">
                        Es una cama muy buena. Sirve para domir. Tiene 4 patas. Almohada de madera. Todo de madera.
                        </div> 
                        </div>
                     <div class="col-md-1 col-sm-12 col-xs-12  colprod1">
                      <div class="colprodico">
                       <div class="prodicos">
                                <ul>
                                    <li><a href=""><i class="fa fa-fw fa-pencil prodicoadd"></i></a></li>
                                    <li><a href="#modal1" id="2"><i class="fa fa-fw fa-trash"></i></a></li>
                                </ul>                
                            </div>
                        </div>
                     </div>
                     </div>
                </div>
                <!-- End Prod 2-->
                <!-- End Alt Vis Prod-->
                <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--Pagination-->
    <div class="paginat">
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
<?php include('foot.php'); ?>
<script>
// Show or Hide Icons On subtop
//==============================================
    
$(document).ready(function() {
    $('#showitemfilters').click(function() {
         $('#itemfilters').toggle("slide");
    });
    $('#viewlist').show();
    $('#showitemfilters').show();
});
    
    
// Switch Viewmode
//==============================================

$('div[id^="delelemf"]').hide();
$('#viewsquare').hide();
		
    $("#viewlist").on( "click", function() {
		$('div[id^="delelem"]').hide( 500 );
        $('div[id^="delelemf"]').show( 500 ); 
        $("#viewlist").hide();
        $("#viewsquare").show();
	 });
    
    $("#viewsquare").on( "click", function() {
		$('div[id^="delelem"]').show( 500 ); 
        $('div[id^="delelemf"]').hide( 500 );
        $("#viewsquare").hide();
        $("#viewlist").show();
	 });

</script>
</body>
</html>