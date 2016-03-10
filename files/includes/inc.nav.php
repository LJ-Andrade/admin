<!--Nav-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../login/login.php"><span class="ownername"><b>Fascination </b>&#124;</span> <span class="marca">Renovatio &reg;</span></a>
    </div>
        <ul class="nav navbar-right top-nav">
        <!--   Logged User   -->
            <li class="dropdown userloggeddiv">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $Admin->Img; ?>" class="userloginimg"> <?php echo $Admin->FullName; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu menuuser">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Mi Perfil</a></li>
                    <li><a href="#" id="Logout"><i class="fa fa-fw fa-power-off"></i> Desconectar</a></li>
                </ul>
            </li>
        </ul>
    <!-- Side Nav Menu -->
    <?php
        $Menu   = new Menu();
        $Menu   ->insertMenu($_SESSION['profile_id'],$_SESSION['admin_id']);
    ?>
    <!-- Sub Top Bar -->
    <div class="container-fluid subtop">
        <div class="subtop1">
            <ol class="breadcrumb">
                <?php $Menu -> insertBreadCrumbs(); ?>
              
            </ol>
        </div>
        <div class="subtop2">
            <ul><!-- View Icons -->
                <li id="volverprod" class="animated fadeIn"><a href="../../files/modules/product/items.php" class="btn subitbtn" role="button"><i class="fa fa-caret-left fa-fw"></i> Volver</a></li>
                <li id="volverusers" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-caret-left fa-fw"></i> Volver</a></li>
                <li id="viewlistbt" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
                <li id="viewgridbt" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Grilla </a></li>
                <!-- Search -->
                <li id="showitemfiltersuser" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
                <li id="showitemfilters" class="animated fadeIn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
                <!-- Add New Item -->
                <li id="newprod"><a href="../../modules/product/new.php" class="btn subitbtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Nuevo Producto</a></li> 
                <li id="newuser"><a href="../../modules/user/new.php" class="btn subitbtn" role="button"><i class="fa fa-user-plus  fa-fw"></i> Nuevo Usuario</a></li>  
            </ul>
        </div>
    </div>
    <!-- /Subtop -->
</nav>