<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Listado de Menúes");
    $Head->setHead();
?>
<body>
    <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
        <div id="page-wrapper">           
            <div class="container-fluid">
                <div class="userstitulo"><h3>Listado de Menúes</h3></div>
                    <div class="container-fluid">
                    <!-- Alternative Visualization - Products -->
                    <!-- Prod 1-->
                    <?php echo $Menu->MakeList() ?>
                <!-- /.container-fluid -->
                </div>
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<?php include('../../includes/inc.foot.php'); ?>