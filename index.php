<?php include('head.php'); ?>
<body id="login">
			<section class="main">
				<form class="formulog">
					<div class="logindatos">
                    <div class="col-md-12 logusuario">
					    <label for="login"><i class="fa fa-fw fa-user"></i><b> Usuario</b></label>
					    <input type="text" name="login" placeholder="Ingrese nombre de usuario">
					</div>
					<div class="col-md-12">
					    <label for="login"><i class="fa fa-fw fa-unlock"></i><b> Contrase&ntilde;a</b>                                               </label>
					    <input type="text" name="login" placeholder="Ingrese Contrase&ntilde;a">
					</div>
				    </div>
					<p class="clearfix">   
				        <a href="inicio.php"><button type="button" class="btn loginbtn">
                        <i class="fa fa-fw fa-share"></i> <b>Ingresar</b></button></a>
				    </p>
                </form>
           </section>
    </div>
    <!-- /#wrapper -->
<?php include('foot.php'); ?>
</body>
</html>