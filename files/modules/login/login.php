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
        <div class="row col-md-12 logtitdiv">
           <div class="row"><img src="../../../skin/images/body/icons/favicon.png" class="logimg" alt=""><span class="logintit">Renovatio &reg;</span></div>
        </div>
        <div class="row">
            <form class="formulog">
                <div class="logindatos">
                    <div class="col-md-12 loguser">
                        <i class="fa fa-fw fa-user"></i><b> Usuario</b>
                        <input type="text" name="user" id="user" placeholder="Ingresar usuario" value="<?php echo $_COOKIE['rememberuser'];?>">
                    </div>
                    <div class="col-md-12 logpass">
                        <i class="fa fa-fw fa-unlock"></i><b> Contrase&ntilde;a</b>
                        <input type="password" name="password" id="password" placeholder="Ingresar contrase&ntilde;a" value="<?php echo $_COOKIE['rememberpassword'];?>">
                    </div>
                    <div class="col-md-12 loginbtndiv" align="center">
                        <button type="button" class="btn mainbtn center-block ButtonLogin"><i class="fa fa-fw fa-share"></i><b> Ingresar</b></button>
                    </div>
                    <div class="row rememberme">
                        <input id="rememberuser" class="checkbox-custom" name="rememberuser" type="checkbox" value="1" <?php echo $Checked ?>>
                        <label for="rememberuser" class="checkbox-custom-label"> Recordarme</label>
                    </div>
                    <div class="forgotdiv">
                        <br>
                       <p class="forgotpass"><a href="forgotpass.php">Olvid&eacute; mi contrase&ntilde;a</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php $Foot->setFoot(); ?>
