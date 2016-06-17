<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="../login/login.php"><span class="ownername"><b>Fascination </b>&#124;</span> <span class="brand">Renovatio &reg;</span></a>
</div>
  <ul class="nav navbar-right top-nav">
  <!--   Logged User   -->
    <li class="dropdown userloggeddiv">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="usernametext"><img src="<?php echo $Admin->Img; ?>" class="userloginimg"><?php echo $Admin->FullName; ?><b class="caret"></b></a>
      <ul class="dropdown-menu menuuser">
        <li><a href="#"><i class="fa fa-fw fa-user"></i> Mi Perfil</a></li>
        <li><a href="#" id="Logout"><i class="fa fa-fw fa-power-off"></i> Desconectar</a></li>
      </ul>
    </li>
  </ul>
<!-- Side Nav Menu -->
