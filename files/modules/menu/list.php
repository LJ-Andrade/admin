<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Listado de Menúes");
    $Head->setHead();
?>
<body>
    <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->          
        <div class="container-fluid">
            <div class="maintitle"><h4 class="maintitletxt">Listado de Men&uacute;es</h4></div>
                <div class="glasscontainer1 optionsdiv"> 
                    <span id="delselected" class="delselected animated slideInDown"><i class="fa fa-trash"></i> Eliminar seleccionados</span>
                    <a href="new.php"><button class="masterbtn"><i class="fa fa-user-plus"></i> Agregar Men&uacute;</button></a>    
                </div>
                
                <div id="viewlist" class="row">
                    <!-- Titles  -->
                    <div class="listtit glasscontainer1">
                        <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 titlist1">
                            <h5>Icono</h5>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist2">
                            <h5>Icono</h5>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist3">
                            <h5>Nombre</h5>
                        </div> 
                        <div class="col-lg-1 col-md-4 col-sm-6 col-xs-12 titlist4">
                            <h5>Permisos</h5>
                        </div> 
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist5">
                            <h5>Grupo</h5>
                        </div> 
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist6ult">
                            <h5>&Uacute;ltimo Acceso</h5>
                        </div> 
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 titlist7">
                            <h5 class="text-center">Editar / Eliminar</h5>
                        </div> 
                    </div> <!-- /Titles  -->
                    <?php echo $Menu->MakeList() ?>
                </div>

    
        </div><!-- /.container-fluid -->
    </div><!-- /#wrapper -->
<?php include('../../includes/inc.foot.php'); ?>