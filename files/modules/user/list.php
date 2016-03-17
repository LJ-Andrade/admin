<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios Administradores");
    $Head->setHead();

    $Status = $_GET['status']? $_GET['status']: 'A';

    $Users = $DB->fetchAssoc('admin_user','*',"status = '".$Status."' ","admin_id"); 
?>
<body>
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
    <div id="wrapper"><!--  Wrapper -->
        <div class="container-fluid">
            <div class="maintitle"><h4 class="maintitletxt">Listado de Usuarios Administradores</h4></div>
                <div class="glasscontainer1 optionsdiv"> 
                    <span id="delselected" class="delselected animated slideInDown"><i class="fa fa-trash"></i> Eliminar seleccionados</span>
                    <a href="new.php"><button class="masterbtn"><i class="fa fa-user-plus"></i> Agregar usuario</button></a>    
                </div>
            <!-- Filters / Search -->
            <div class="container-fluid">
                <div id="filtersuser" class="row row-centered filterdiv">
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
            </div><!-- /Container Filters / Search -->
            
            <!-- Grid View -->
            <div id="viewgrid" class="row-centered rowgridview"> 
                <?php 
                    foreach($Users as $User){ 
                        $User = new AdminData($User['admin_id']);
                ?>
                <!--    Users   -->
                <div id="user<?php echo $User->AdminID ?>" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
                    <div class="userMainSection">
                        <div class="userimgdiv"><img src="<?php echo $User->Img; ?>" id="userimage" class="img-responsive userimg"></div>
                        <div class="row usernamediv">
                            <span class="usernametxt"><span class="col-sm-12"><?php echo  $User->FullName; ?></span> <span class="col-lg-12 col-sm-12 col-xs-12">(<?php echo $User->User ?>)</span></span><br>
                            <span class="usernametxt2">Administrador</span>
                        </div>
                    </div>
                    <div id="usericosid" class="delmoddiv delmoduser">
                        <ul class="userButtons animated slideInUp">
                            <li class="btnmod animated fadeIn"><a href="edit.php?id=<?php echo $User->AdminID ?>" ><i class="fa fa-fw fa-pencil"></i></a></li>
                            <?php if($User->AdminID!=$Admin->AdminID){ ?>
                            <li class="deleteElement btndel animated fadeIn" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-fw fa-trash"></i></li>
                            <?php } ?>
                        </ul>                
                    </div>
                </div>
                <?php } ?>
            </div><!-- /Grid View  -->

            <!-- List View -->
            <div id="viewlist" class="row">
                <!-- Titles  -->
                <div class="listtit glasscontainer1">
                    <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 titlist1">
                    
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 titlist2">
                        <h5>Nombre</h5>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist3">
                        <h5>Perfil</h5>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist4">
                        <h5>Grupo</h5>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist5">
                        <h5>&Uacute;ltimo Acceso</h5>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist6">
                        <h5 class="text-center">Editar / Eliminar</h5>
                    </div> 
                </div> <!-- /Titles  -->
                <?php 
                        foreach($Users as $User){ 
                            $User = new AdminData($User['admin_id']);
                ?>
                <!-- Items -->
                <div id="userlist<?php echo $User->AdminID ?>" class="container-fluid glasscontainer1 listrow <?php if($User->AdminID==$Admin->AdminID){ echo "undeleteable"; } ?>">
                    <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 col1listus">
                        <img src="<?php echo $User->Img; ?>" class="img-responsive userimglist">
                    </div> 
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col2listus">
                        <?php echo $User->FullUserName; ?>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col3listus">
                        <p><?php echo $User->ProfileName; ?></p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col4listus">
                        <p>Admin</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col5listus">
                        <p><?php echo DateTimeFormat($User->AdminData['last_access']) ?></p>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col6listus">
                        <div class="delmoddiv">
                             <ul>
                                <li class="btnmod"><a href="edit.php?id=<?php echo $User->AdminID ?>"><i class="fa fa-fw fa-pencil"></i></a></li>
                                <?php if($User->AdminID!=$Admin->AdminID){ ?>
                                <li class="btndel deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-fw fa-trash"></i></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Items (List) -->
                <?php } ?>
            </div><!-- /List View  -->

            
        </div><!-- /.container-fluid -->
    </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>