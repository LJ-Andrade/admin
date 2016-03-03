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
            <div class="titlesgral"><h3 class="text-center">Listado de Usuarios Administradores</h3></div>
                <div class="glasscontainer1 adduserdiv"> 
                    <a href="new.php"><button class="masterbtn"><i class="fa fa-user-plus"></i> Agregar usuario</button></a>
                </div>
                
            <!-- Filters / Search -->
            <div class="container">
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
            <div id="viewgrid" class="row row-centered"> 
                
                <?php 
                    foreach($Users as $User){ 
                        $User = new AdminData($User['admin_id']);
                ?>
                <!--    Users   -->
                <div id="user<?php echo $User->AdminID ?>" class="col-lg-3 col-sm-6 col-xs-12 col-centered animated fadeIn usergral">

                        <img src="<?php echo $User->Img; ?>" id="userimage" class="img-responsive userimg">
                        
                        <div class="row usernamediv">
                            <span class="usernametxt"><?php echo  $User->FullUserName; ?></span><br>
                            <span class="usernametxt2">Administrador&#124; Grupo </span>
                            
                        </div>
                        
                            <div id="usericosid" class="usericos hidden">
                                
                                <ul>
                                    <li><a href="edit.php?id=<?php echo $User->AdminID ?>" class="btnmod btnuser"><i class="fa fa-fw fa-pencil"></i></a></li>
                                    <?php if($User->AdminID!=$Admin->AdminID){ ?>
                                    <li deleteElement="<?php echo $User->AdminID ?>" deleteParent="user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente" class="deleteElement btndel btnuser"><i class="fa fa-fw fa-trash"></i></li>
                                    <?php } ?>
                                </ul>                
                            
                            </div>
          
                </div>
                <?php } ?>
            </div><!-- /Grid View  -->

            <!-- List View -->
            <div id="viewlist" class="row">
                <!-- Titles  -->
                <div class="container-fluid listrow listtit glasscontainer1">
                    <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 titlist1">
                    
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 titlist2">
                        <h5>Nombre</h5>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist3">
                        <h5>Permisos</h5>
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
                <!-- Item 1 -->
                <div id="user<?php echo $User->AdminID ?>" class="container-fluid glasscontainer1 listrow">
                    <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 col1listus">
                        <img src="<?php echo $User->Img; ?>" class="img-responsive userimglist">
                    </div> 
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col2listus">
                        <?php echo  $User->FullUserName; ?>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col3listus">
                        <p>Administrador</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col4listus">
                        <p>Admin</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col5listus">
                        <p>5 de Marzo 2016 &#124; 22:33 hs</p>
                    </div> 
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col6listus">
                        <div class="usericoslist">
                             <ul>
                                <li class="btnmod btnuser"><a href="edit.php?id=<?php echo $User->AdminID ?>"><i class="fa fa-fw fa-pencil"></i></a></li>
                                    <?php if($User->AdminID!=$Admin->AdminID){ ?>
                                <li deleteElement="<?php echo $User->AdminID ?>" deleteParent="user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente" class="deleteElement btndel btnuser"><i class="fa fa-fw fa-trash"></i></li>
                                    <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Item 1  -->
                <?php } ?>
            </div><!-- /List View  -->

            
        </div><!-- /.container-fluid -->
    </div><!-- /#wrapper -->
<script>
    $(document).ready(function() {  
        $('#newuser').fadeIn( 500 );
    });
        
    $(window).scroll(function(){
      $('#wrapper')[0].scrollTop=$(window).scrollTop();
    });
</script>
<?php include('../../includes/inc.foot.php'); ?>