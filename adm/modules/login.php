<?php
  include ('files/config.php');
?>

<!DOCTYPE html>
<html>
<head>
  <?php include ('files/includes/head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini mainLogin">
<div class="wrapper wrapperLogin">
  <!-- Main Header -->

  <!-- Left side column. contains the logo and sidebar -->


  <div class="container loginContainer">
    <div class="loginForm">
      <img src="skin/images/body/logoVimana.png" alt="" class="img-responsive" />
      <div class="box boxLogin">
        <div class="box-header">
          <!-- <h3 class="box-title">Bienvenidos a <b>SITE</b>Craft</h3> -->
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="loginForm" action="process/processlogin.php"  onsubmit="return validateForm()" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input class="form-control" id="user" name="user" placeholder="Ingrese su nombre de usuario" type="text">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contrase&ntilde;a</label>
              <input class="form-control" id="pass" name="password" placeholder="Ingrese su contrase&ntilde;a" type="password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Recordarme
              </label>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" value="Enviar" onclick="verifyMail();" class="btn btn-primary">Ingresar</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Main Footer -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->
<?php include ('files/includes/scripts.php'); ?>
<script type="text/javascript">
// Verify

function validateForm() {
  var user = document.forms["loginForm"]["user"].value;
  var password = document.forms["loginForm"]["password"].value;

  // Usuario Vacio
  if (user == null || user == "" || password == null || user == "") {
    alertError("Debe Llenar el formulario","");
      return false;
  }
  if (user == null || user == "") {
    alertError("Debe colocar su nombre de USUARIO","");
      return false;
  }
  // Password Vacio
  else if (password == null || password == "" ) {
    alertError("Debe colocar su PASSWORD","");
      return false;
  }
}

alertErrorUrl('?msg=error','Error','fa fa-ban');
alertErrorUrl('?msg=userDenied','Los datos son incorrectos','fa fa-ban');
alertErrorUrl('?msg=logError','Datos Incorrectos','fa fa-ban');
alertErrorUrl('?msg=accessDenied','Acceso Denegado','fa fa-ban');

</script>


</body>
</html>
