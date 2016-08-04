<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Login");
  $Head->setHead();

  if($_COOKIE['rememberuser']){
      $Checked = 'checked="checked"';
  }
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Re</b>novatio</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesi&oacute;n</p>


      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="user" id="user" placeholder="Email o Usuario" value="<?php echo $_COOKIE['rememberuser'];?>">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Contrase&ntilde;a" value="<?php echo $_COOKIE['rememberpassword'];?>">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" <?php echo $Checked ?> class="iCheckbox" name="rememberuser" id="rememberuser" value="1" > Recordarme
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat ButtonLogin">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    <a href="forgotuser.php">Olvid&eacute; mi contrase&ntilde;a</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
$Foot->setFoot();
?>
