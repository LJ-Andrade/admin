<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../../includes/inc.head.php'); ?>
</head>
<body id="login">
    <div class="main">
        <div class="row col-md-12 logtitdiv">
           <div class="row"><img src="../../../skin/images/body/logos/favicon.png" class="logimg" alt=""><span class="maintit">VIMANA Auto-Admin &reg;</span></div>
        </div>
        <div class="row">
            <form class="formulog">       
                <div class="logindatos">
                    <div class="col-md-12 loguser">
                        <label for="login"><i class="fa fa-fw fa-user"></i><b> Nombre de Usuario</b></label>
                        <input type="text" name="login" placeholder="Ingrese nombre de usuario">
                    </div>
                    <div class="col-md-12 logpass">
                        <label for="login"><i class="fa fa-fw fa-unlock"></i><b> Contrase&ntilde;a</b></label>
                        <input type="password" name="login" placeholder="Ingrese contrase&ntilde;a">
                    </div>
                    <div class="col-md-12 loginbtndiv">
                        <a href="../main/inicio.php"><button type="button" class="btn loginbtn center-block">
                        <i class="fa fa-fw fa-share"></i><b> Ingresar</b></button></a>
                    </div>
                    <div class="forgotdiv">
                       <a href="forgotpass.php"><p class="forgotpass">Olvid&eacute; mi contrase&ntilde;a...</p></a>
                    </div>
                    <div class="row rememberme">
                        <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
                        <label for="checkbox-1" class="checkbox-custom-label"> Recordarme</label>
                    </div>
                </div>
            </form>     
        </div>
    </div><!--  Main  -->
    <?php include('../../includes/inc.foot.php'); ?>
</body>
</html 