<?php include('head.php'); ?>
<body>
    <div id="wrapper">
       <?php include('nav.php'); ?> <!-- Navegación -->
        <div id="page-wrapper">           
            <div class="container-fluid">
                <div class="userstitulo">
                    <h3>Bienvenidos al Auto Administrador</h3>
                </div>
              </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<?php include('foot.php'); ?>
<script>
$(document).ready(function() {
    $('#newuser').show( 500 );
    $('#newprod').show( 500 );
});    
</script>
</body>
</html>