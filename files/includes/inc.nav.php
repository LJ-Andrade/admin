<!--Nav-->
<!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php// include("../../includes/inc.top.php"); ?>
    <?php
        //$Menu   = new Menu();
        //$Menu   ->insertMenu($_SESSION['profile_id'],$_SESSION['admin_id']);
    ?>
</nav> -->

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../../skin/images/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Juan Pelotudo</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <li class="treeview">
        <a href="#"><i class="fa fa-home"></i> <span> Inicio</span></a>
        <ul class="treeview-menu">
          <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-tree"></i> <span>Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-plus"></i> Agregar Producto</a></li>
          <li><a href="#"><i class="fa fa-list"></i> Listado de Productos</a></li>
          <li><a href="#"><i class="fa fa-trash"></i> Productos Eliminados</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-gears"></i> <span>Administraci&oacute;n</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-user"></i> Usuarios
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-plus"></i> Nuevo Usuario</a></li>
              <li><a href="#"><i class="fa fa-list"></i> Listado de Usuarios</a></li>
              <li><a href="#"><i class="fa fa-trash"></i> Usuarios Eliminados</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-eye"></i> Perfiles
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-plus"></i> Nuevo Perfil</a></li>
              <li><a href="#"><i class="fa fa-list"></i> Listado de Perfiles</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-sitemap"></i> Grupos</a></li>
          <li><a href="#"><i class="fa fa-bars"></i> Men&uacute;es
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-plus"></i> Nuevo Men&uacute;</a></li>
              <li><a href="#"><i class="fa fa-list"></i> Listado de Men&uacute;es</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
