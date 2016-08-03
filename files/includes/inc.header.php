<!-- =============================================== -->

<header class="main-header">
  <!-- Logo -->
  <a href="../main/main.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>R</b>VT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Re</b>novatio</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="SidebarToggle"></a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Ten&eacute;s 10 notificaciones</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 nuevos usuarios creados hoy
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">Ver todas las alertas</a></li>
          </ul>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo $Admin->Img; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs" id="userfullname"><?php echo $Admin->FullName; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo $Admin->Img; ?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $Admin->FullUserName; ?>
                <small><?php echo ucfirst($Admin->ProfileName); ?></small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-primary btn-flat">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="../login/process.logout.php" class="btn btn-danger btn-flat">Cerrar Sesi&oacute;n</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- =============================================== -->

<?php include('../../includes/inc.nav.php'); ?>

<!-- =============================================== -->

<?php include('../../includes/inc.sidebar.php'); ?>
