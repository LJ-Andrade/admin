<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Login");
  $Head->setHead();

  if($_COOKIE['rememberuser']){
      $Checked = 'checked="checked"';
  }
?>
<body id="login">
<?php include('../../includes/inc.loader.php'); ?> <!-- Loader -->
  <div class="main">
    <div class="container loginDiv">
      <div class="row logtitdiv">
        <span>RENOVATIO &reg; | By <b>Innova</b></span>
      </div>
      <div class="row loginInner">
        <h4>Inicio de Sesi&oacute;n</h4>
        <form class="formulog">
          <div class="col-md-12 loguser">
            <i class="fa fa-fw fa-user"></i><b> Usuario</b>
            <input type="text" name="user" id="user" placeholder="Ingresar usuario" value="<?php echo $_COOKIE['rememberuser'];?>">
          </div>
          <div class="col-md-12 logpass">
            <i class="fa fa-fw fa-unlock"></i><b> Contrase&ntilde;a</b>
            <input type="password" name="password" id="password" placeholder="Ingresar contrase&ntilde;a" value="<?php echo $_COOKIE['rememberpassword'];?>">
          </div>
          <div class="col-md-12" align="center">
            <button type="button" class="btn mainbtn logBtn ButtonLogin"><i class="fa fa-fw fa-share"></i><b> Ingresar</b></button>
          </div>
          <div class="col-md-12 rememberLoginDiv" align="center">
            <input id="rememberuser" class="checkbox-custom" name="rememberuser" type="checkbox" value="1" <?php echo $Checked ?>>
            <label for="rememberuser" class="checkbox-custom-label"> Recordarme</label>
          </div>
          <div class="clearfix"></div>
          <div class="forgotDiv">
            <span><a href="forgotpass.php">Olvid&eacute; mi contrase&ntilde;a</a></span>
          </div>
        </form>
      </div>
    </div>

  </div>
  <?php $Foot->setFoot(); ?>
