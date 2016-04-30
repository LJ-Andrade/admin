<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Recuperar Contraseña");
    $Head->setHead();
?>
<body id="login">
<div class="main">
  <div class="container loginDiv">
    <div class="row logtitdiv">
      <img src="../../../skin/images/body/icons/favicon.png" class="logimg" alt=""><span class="maintit">VIMANA Auto-Admin &reg;</span>
    </div>
    <div class="row loginInner">
      <h4>Recuperar contrase&ntilde;a</h4>
      <form class="formulog">
        <div class="col-md-12 forgotInput">
          <input type="text" name="login" placeholder="Ingrese su Email">
        </div>
        <div class="col-md-12">
          <a href="inicio.php"><button type="button" class="mainbtn logBtn"><b>Recuperar</b></button></a>
          <br></br>
          <p class="forgotsubtit">Si no recuerda su e-mail contactes&eacute; con el soporte t&eacute;nico</p>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $Foot->setFoot(); ?>
