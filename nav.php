<!--Nav-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
        </button>
                <a class="navbar-brand" href="index.php"><b>Mundo Pino </b>&#124; <span class="marca">Vimana Auto-Admin &reg;</span></a>
    </div>
            <ul class="nav navbar-right top-nav">
            <!--   Loged User   -->
                <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="skin/users/vio.jpg" class="userloginimg"> Violeta Raffin <b class="caret"></b></a>
                    <ul class="dropdown-menu menuuser">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Desconectar</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Lateral Nav Menu -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="navimgback nav navbar-nav side-nav">
                    <li><a href="inicio.php"><i class="fa fa-fw fa-home"></i> Inicio</a></li>
                    <li><a href="items.php"><i class="fa fa-fw fa-tree"></i> Productos</a></li>                 
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#ddmenu1"><i class="fa fa-fw fa-gear"></i> Administraci&oacute;n<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ddmenu1" class="collapse">
                            <li>
                                <a href="users.php"><i class="fa fa-fw fa-users fa-fw"></i> Usuarios</a>
                            </li>
<!--
                            <li>
                                <a href="nuevousuario.php"><i class="fa fa-fw fa-user-plus"></i> Nuevo Usuario</a>
                            </li>
-->
                        </ul>
                      </li>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#ddmenu2"><i class="fa fa-fw fa-arrows-v"></i> Item<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ddmenu2" class="collapse">
                            <li>
                                <a href="#">Otro Item</a>
                            </li>
                            <li>
                                <a href="#">Otro Item</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#ddmenu3"><i class="fa fa-fw fa-arrows-v"></i> Item<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="ddmenu3" class="collapse">
                                    <li>
                                        <a href="#">Otro Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Otro Item</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                      </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
    <!-- Sub Top Bar -->
    <div class="container-fluid subtop">
        <div class="subtop1">   
            <?php
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
            ?>
        </div>
        <div class="subtop2">
            <ul><!-- View Icons -->
                <li id="volverprod" class="animated fadeIn"><a href="items.php" class="btn subitbtn" role="button"><i class="fa fa-caret-left fa-fw"></i> Volver</a></li>
                <li id="viewlist" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
                <li id="viewsquare" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Cuadros </a></li>
                <!-- Search -->
                <li id="showitemfilters" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
                <!-- Add New Item -->
                <li><a href="nuevoitem.php?test=321" class="btn subitbtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Nuevo Producto</a></li>
                
            </ul>
        </div>
    </div>
</nav>
