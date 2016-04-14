<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Listado de Productos");
    $Head->setHead();

    $Status = $_GET['status']? $_GET['status']: "A' OR status = 'P";
    $Products = $DB->fetchAssoc('product','product_id',"status='".$Status."'","title");
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
        </div><!-- Container Filters -->

        <!-- Grid View -->
        <div id="viewgrid" class="row row-centered">
            <?php if(count($Products)<1){ ?>
                <div id="emptylist" class="container-fluid glasscontainer1 listrow" style="text-align:center;display:block;"><p>No existen productos, puede crear uno haciendo click&nbsp;<a href="new.php">aqui</a></p></div>
            <?php }?>
            <?php
                foreach($Products as $Product){
                    $Product = new Product($Product['product_id']);
                    $Image = $Product->getFirstImage();
            ?>
            <!-- Item 1 -->
            <div id="product<?php echo $Product->ID; ?>" class="col-md-4 col-sm-6 col-xs-12 col-centered overlayItem">
              <div class="show overlay1">
                <img src="<?php echo $Image['src']; ?>" />
                <div class="mask">
                  <div class="OnOffDiv">
                    <?php $Checked = $Product->Data['status']=='A'? 'checked="checked"':''; ?>
                    <?php echo insertElement('checkbox','gridstatus'.$Product->ID,'','col-md-8 col-xs-12 centered SwitchCheckbox ChangeStatus',' target="'.$Product->ID.'" data-on-text="Activa" data-off-text="Pausada"  data-label-width="auto" data-size="mini" '.$Checked); ?>
                  </div>
                  <div class="overlayDetails">
                  <h3><strong><span id="title<?php echo $Product->ID; ?>"><?php echo $Product->Data['title']; ?></span>(<?php echo $Product->Data['code']; ?>)</strong></h3>
                    <hr>
                    <p><?php echo $Product->Data['description']; ?></p>
                    <h4><strong>Composición:</strong> <?php echo $Product->Data['model']; ?></h4>
                    <h4><strong>Talles:</strong> <?php echo $Product->Data['size']; ?></h4>
                    <div class="circles">
                      <span><strong>Colores:</strong></span>
                                <ul>
                                    <li><div class="circle" style="background-color: #fff"></div></li>
                                    <li><div class="circle" style="background-color: #c17996"></div></li>
                                    <li><div class="circle" style="background-color: #768754"></div></li>
                                    <li><div class="circle" style="background-color: #5643a0"></div></li>
                                </ul>
                            </div>
                    <h4><strong>Precio:</strong> $<?php echo money_format('%.2n', $Product->Data['price']); ?></h4>
                  </div>
                  <div class="delModDiv">
                    <a href="edit.php?id=<?php echo $Product->ID ?>"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                    <a href="#" class="deleteElement" deleteElement="<?php echo $Product->ID ?>" deleteParent="list<?php echo $Product->ID ?>/product<?php echo $Product->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el producto '<?php echo $Product->Data['title']; ?>'?" successText="El producto '<?php echo $Product->Data['title'] ?>' ha sido eliminado correctamente"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Item 1 -->

            <!--    Items (Grid)   -->
            <!-- <div id="product<?php echo $Product->ID; ?>" class="col-md-2 col-sm-6 col-xs-12 col-centered animated bounceInUp itemdiv">
                <div class="row itemstatus">
                    <p class="col-md-4 col-xs-12 itemstattxt">Publicaci&oacute;n: </p>
                    <?php $Checked = $Product->Data['status']=='A'? 'checked="checked"':''; ?>
                    <?php echo insertElement('checkbox','gridstatus'.$Product->ID,'','col-md-8 col-xs-12 centered SwitchCheckbox',' target="'.$Product->ID.'" data-on-text="Activa" data-off-text="Pausada"  data-label-width="auto" data-size="mini" '.$Checked); ?>
                </div>
                <div class="grid">
                    <div>
                        <img src="<?php echo $Image['src']; ?>" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-12 itemtit">
                        <p id="title<?php echo $Product->ID; ?>"><?php echo $Product->Data['title']; ?></p>
                        <p id="code<?php echo $Product->ID; ?>">(<?php echo $Product->Data['code']; ?>)</p>
                    </div>
                    <div class="grid_content">
                        <div class="col-md-12 itemtit">
                            <p><b><?php echo $Product->Data['title']; ?></b></p>
                        </div>
                        <p>
                            <b>Descripci&oacute;n:</b>
                            <?php echo $Product->Data['description']; ?>
                        </p>
                        <div class="row itemrow2">
                            <div class="col-md-4 col-xs-4">
                                <p>Modelo<br><span class="itemtxtcolor"><b><?php echo $Product->Data['model']; ?></b></span></p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <p>Medida<br><span class="itemtxtcolor"><b><?php echo $Product->Data['size']; ?> mt</b></span></p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <p>Precio<br><span class="itemtxtcolor"><b>$ <?php echo money_format('%.2n', $Product->Data['price']); ?></b></span></p>
                            </div>
                        </div>
                        <div class="itemicos">
                            <ul>
                                <li class="btnmod"><a href="edit.php?id=<?php echo $Product->ID ?>"><i class="fa fa-fw fa-pencil"></i></a></li>
                                <li class="btndel deleteElement" deleteElement="<?php echo $Product->ID ?>" deleteParent="list<?php echo $Product->ID ?>/product<?php echo $Product->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el producto '<?php echo $Product->Data['title']; ?>'?" successText="El producto '<?php echo $Product->Data['title'] ?>' ha sido eliminado correctamente"><i class="fa fa-fw fa-trash"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --> <!-- /Item (Grid) -->
            <?php } ?>
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

                <?php if(count($Products)<1){ ?>
                    <div id="emptylist" class="container-fluid glasscontainer1 listrow" style="text-align:center;display:block;"><p>No existen productos, puede crear uno haciendo click&nbsp;<a href="new.php">aqui</a></p></div>
                <?php }?>
                <?php
                    foreach($Products as $Product){
                        $Product = new Product($Product['product_id']);
                        $Image = $Product->getFirstImage();
                ?>
                <!-- Items (List) -->
                <div id="list<?php echo $Product->ID; ?>" class="container-fluid glasscontainer1 listrow">
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12 col1listprod">
                        <img src="<?php echo $Image['src']; ?>" id="" class="img-responsive prodimglist">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 col2listprod">
                        <p><?php echo $Product->Data['title']; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-2 col-sm-6 col-xs-12 col3listprod">
                        <p><?php echo $Product->Data['description']; ?></p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 col4listprod">
                        <p><?php echo $Product->Data['model']; ?></p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 col5listprod">
                        <p><?php echo $Product->Data['size']; ?></p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12 col5listprod">
                        <p><?php echo money_format('%.2n',floatval($Product->Data['price'])); ?></p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 col6listprod">
                        <div class="delmoddiv">
                             <ul>
                                <li class="btnmod"><a href="edit.php?id=<?php echo $Product->ID ?>"><i class="fa fa-fw fa-pencil"></i></a></li>
                                <li class="btndel deleteElement" deleteElement="<?php echo $Product->ID ?>" deleteParent="list<?php echo $Product->ID ?>/product<?php echo $Product->ID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el producto '<?php echo $Product->Data['title']; ?>'?" successText="El producto '<?php echo $Product->Data['title'] ?>' ha sido eliminado correctamente"><i class="fa fa-fw fa-trash"></i></li>
                                <li>
                                    <?php $Checked = $Product->Data['status']=='A'? 'checked="checked"':''; ?>
                                    <?php echo insertElement('checkbox','liststatus'.$Product->ID,'','centered SwitchCheckbox status ChangeStatus',' target="'.$Product->ID.'" data-on-text="Activa" data-off-text="Pausada"  data-label-width="auto" data-size="mini" '.$Checked); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
<?php $Foot->setFoot(); ?>
