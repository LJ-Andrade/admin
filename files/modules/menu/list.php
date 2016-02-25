<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Home");
    $Head->setHead();
?>
<body>
    <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
       <?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">           
            <div class="container-fluid">
                <div class="userstitulo"><h3>Administrador de Usuarios</h3></div>
                    <div class="row usergraldiv row-centered"> 
                        <!--    User 1   -->
                        <div id="delelem1" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="skin/users/ale.jpg" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b>Alejandro</b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href="moduser.php" class="btnmod btnuser"><i class="fa fa-fw fa-pencil"></i></a>
                                            </li>
                                            <li><a href="#modal1" id="1" class="deleteelem btndel btnuser"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <!--    User 2    -->
                        <div id="delelem2" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="skin/users/vio.jpg" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b>Violeta</b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href="moduser.php" class="btnmod btnuser"><i class="fa fa-fw fa-pencil"></i></a>
                                            </li>
                                            <li><a href="#modal1" id="2" class="deleteelem btndel btnuser"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <!--    User 3    -->
                        <div id="delelem3" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="skin/users/lea.jpg" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b>Leandro</b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href="moduser.php" class="btnmod btnuser"><i class="fa fa-fw fa-pencil"></i></a>
                                            </li>
                                            <li><a href="#modal1" id="3" class="deleteelem btndel btnuser"><i class="fa fa-fw fa-trash"></i></a></li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div> 
                         <!--   Add User    -->
                        <div id="" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral adduserdiv animated fadeIn">
                            <div id="trans">
                                <a href="nuevousuario.php">
                                <img src="skin/users/mas.jpg" class="img-responsive centrarimg usimg useraddimg">
                                <div class="usernamediv"><p><b>Agregar Usuario</b></p></div>
                                </a>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <br>               
                                    </div>
                                </div>
                            </div>    
                        </div> 
                    </div><!-- End Of Row  -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<script>
$(document).ready(function() {  
    $('#newuser').show( 500 );
});
    
</script>
<?php include('../../includes/inc.foot.php'); ?>