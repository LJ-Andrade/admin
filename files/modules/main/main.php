<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Renovatio Home");
    $Head->setHead();
?>
<body>
    <!-- Loader  -->
    <script>

    /// Boton Juira Test borrar despues de probar ///
        $(document).ready(function() {
            $("#testloader").click(function(){
                $('#page_loader').fadeIn( 500 );
            });


            $(".juirabtn").click(function(){
                $('#page_loader').fadeOut( 500 );
            });
        });
    </script>
    <div id="page_loader" style="display: none">
        <div id="loadgif">
            <img src="../../../skin/images/body/icons/loader.gif" alt="">
<br>
            <div class="juira col-centered" ><button class="juirabtn masterbtn"> JUIRA </button></div>
        </div>
    </div><!-- /Loader  -->
    <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->         
            <div class="container-fluid maincontainer">
                
                    <div class="maintitle"><h4 class="maintitletxt">Bienvenidos</h4></div>
                        <br><br>
                        <button id="oklogmsg" class="masterbtn">Test mensaje</button>
                        <br><br><br>
                        <button id="testloader" class="masterbtn">Test Loader</button>
                        <br><br>             
            </div><!-- /.container-fluid -->
    </div><!-- /#wrapper -->
<?php include('../../includes/inc.foot.php'); ?>
