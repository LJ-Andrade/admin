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
                <ul class="nav navbar-nav side-nav">
                    <li><a href="inicio.php"><i class="fa fa-fw fa-home"></i> Inicio</a></li>
                    <li><a href="productos.php"><i class="fa fa-fw fa-tree"></i> Productos</a></li>                 
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
</nav>
