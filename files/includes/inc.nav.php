<!--Nav-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
        </button>
                <a class="navbar-brand" href="../../../index.php"><b>Mundo Pino </b>&#124; <span class="marca">Vimana Auto-Admin &reg;</span></a>
    </div>
            <ul class="nav navbar-right top-nav">
            <!--   Loged User   -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../../../skin/images/users/vio.jpg" class="userloginimg"> Violeta Raffin <b class="caret"></b></a>
                    <ul class="dropdown-menu menuuser">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Desconectar</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Side Nav Menu -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="navimgback nav navbar-nav side-nav">
                    <li class="navnicio"><a href="inicio.php"><i class="fa fa-fw fa-home"></i> Inicio</a></li>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#ddmenu1"><i class="fa fa-fw fa-tree"></i> Productos<i class="fa fa-fw fa-angle-down "></i></a>
                    <ul id="ddmenu1" class="collapse sideddmenu">
                        <li><a href="../../modules/product/items.php"><i class="fa fa-fw fa-navicon"></i> Lista de Productos</a></li>
                        <li><a href="../../modules/product/nuevoitem.php"><i class="fa fa-fw fa-plus"></i> Nuevo Producto</a></li>
                    </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#menucateg"><i class="fa fa-fw fa-sitemap"></i> Categor&iacute;as<i class="fa fa-fw fa-angle-down "></i></a>
                        <ul id="menucateg" class="collapse sideddmenu">
                            <li><a href="#"><i class="fa fa-fw fa-navicon"></i> Lista de Categor&iacute;as</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-plus"></i> Nueva Categor&iacute;a</a></li>
                        </ul>
                    </li>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#ddmenu2" class="ddmenu2"><i class="fa fa-fw fa-gears"></i> Administraci&oacute;n<i class="fa fa-fw fa-angle-down "></i></a>
                        <ul id="ddmenu2" class="collapse sideddmenu">
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#menuusuarios"><i class="fa fa-fw fa-user"></i> Usuarios<i class="fa fa-fw fa-angle-down "></i></a>
                                <ul id="menuusuarios" class="collapse">
                                    <li><a href="../../modules/user/user.php"><i class="fa fa-fw fa-list-ul"></i> Lista de Usuarios</a></li>
                                    <li><a href="../../modules/user/newuser.php"><i class="fa fa-fw fa-plus-square"></i> Nuevo Usuario</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#menuperf"><i class="fa fa-fw fa-eye"></i> Perfiles<i class="fa fa-fw fa-angle-down "></i></a>
                                <ul id="menuperf" class="collapse">
                                    <li><a href="#"><i class="fa fa-fw fa-list-ul"></i> Listado de Perfiles</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-plus-square"></i> Nuevo Perfil</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#menugrupos"><i class="fa fa-fw fa-sitemap"></i> Grupos<i class="fa fa-fw fa-angle-down "></i></a>
                                <ul id="menugrupos" class="collapse">
                                    <li><a href="#"><i class="fa fa-fw fa-list-ul"></i> Listado de Grupos</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-plus-square"></i> Nuevo Grupo</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#menumenues"><i class="fa fa-fw fa-bars"></i> Men&uacute;es<i class="fa fa-fw fa-angle-down "></i></a>
                                <ul id="menumenues" class="collapse">
                                    <li><a href="#"><i class="fa fa-fw fa-list-ul"></i> Listado de Men&uacute;es</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-plus-square"></i> Nuevo Men&uacute;</a></li>
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
                <li id="volverprod" class="animated fadeIn"><a href="../../files/modules/product/items.php" class="btn subitbtn" role="button"><i class="fa fa-caret-left fa-fw"></i> Volver</a></li>
                <li id="volverusers" class="animated fadeIn"><a href="../../modules/user/user.php" class="btn subitbtn" role="button"><i class="fa fa-caret-left fa-fw"></i> Volver</a></li>
                <li id="viewlist" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
                <li id="viewgrid" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Grilla </a></li>
                <!-- Search -->
                <li id="showitemfilters" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
                <!-- Add New Item -->
                <li id="newprod"><a href="../../modules/product/nuevoitem.php" class="btn subitbtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Nuevo Producto</a></li> 
                <li id="newuser"><a href="../../modules/user/newuser.php" class="btn subitbtn" role="button"><i class="fa fa-user-plus  fa-fw"></i> Nuevo Usuario</a></li>  
            </ul>
        </div>
    </div>
</nav>
