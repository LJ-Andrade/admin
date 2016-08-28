<header class="main-header">
  <!-- Logo -->
  <a href="main.php?view=index" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">S<b>V</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Studio<b>VIMANA</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <?php // include ('header.messages.php'); ?>

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="<?php echo $actualUser[0]['image']; ?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $_SESSION['user'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?php echo $actualUser[0]['image']; ?>" class="img-circle" alt="User Image">
              <p>
              <?php echo $_SESSION['user'] ?>
                <small>Miembro desde <?php echo $actualUser[0]['creation']; ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="process/logout.php" class="btn btn-default btn-flat">Desconectar</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li><a href="process/logout.php"><i class="fa fa-power-off"></i></a></li>
      </ul>
    </div>
  </nav>
</header>
