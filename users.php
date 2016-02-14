<?php include('head.php'); ?>
<body>
    <div id="wrapper">

        <?php include('nav.php'); ?> <!-- Nav -->
        <?php include('delpopup.php'); ?> <!-- Del Pop Up -->
        <div id="page-wrapper">           
            <div class="container-fluid">
                <div class="userstitulo"><h3>Administrador de Usuarios</h3></div>
                    <div class="row adminrow row-centered"> 
                        <!--    User 1   -->
                        <div id="delelem1" class="container col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="skin/users/ale.jpg" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b>Alejandro</b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href=""><i class="fa fa-fw fa-pencil usericoadd"></i></a></li>
                                            <li><a href="#modal1" id="1" class="deleteelem"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <!--    User 2    -->
                        <div id="delelem2" class="container col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="skin/users/vio.jpg" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b>Violeta</b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href=""><i class="fa fa-fw fa-pencil usericoadd"></i></a></li>
                                            <li><a href="#modal1" id="2" class="deleteelem"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <!--    User 3    -->
                        <div id="delelem3" class="container col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="skin/users/lea.jpg" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b>Leandro</b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href=""><i class="fa fa-fw fa-pencil usericoadd"></i></a></li>
                                            <li><a href="#modal1" id="3" class="deleteelem"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <!--   Add User  -->
                        <div class="container col-lg-3 col-sm-6 col-xs-6 col-centered usergral animated fadeIn lastcol">
                            <div id="trans">
                               <a href="nuevousuario.php"><img src="skin/users/mas.jpg" class="img-responsive centrarimg usimg useradd">
                                <div id="transhover">
                                    <p class="usernamediv"><b>Agregar Usuario</b></p>
                                </div></a>
                            </div>    
                        </div> 
                    </div><!-- End Of Row  -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<?php include('foot.php'); ?>
</body>
</html>