<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Home");
    $Head->setHead();

    $Users = $DB->fetchAssoc('select','admin_user','*',"status = 'A' ","admin_id"); 
?>
<body>
    <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
       <?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">           
            <div class="container-fluid">
                <div class="userstitulo"><h3>Listado de Usuarios Administradores</h3></div>
                    <div class="row usergraldiv row-centered"> 
                        
                        <?php 
                            foreach($Users as $User){ 
                                $User = new AdminData($User['admin_id']);
                        ?>
                        <!--    User 1   -->
                        <div id="delelem<?php echo $User->AdminID ?>" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral userback animated fadeIn">
                            <div id="trans">
                                <img src="<?php echo $User->Img; ?>" class="img-responsive centrarimg usimg">
                                <div class="usernamediv"><p><b><?php echo  $User->FullUserName; ?></b></p></div>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <ul>
                                            <li><a href="edit.php?id=<?php echo $User->AdminID ?>" class="btnmod btnuser"><i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php if($User->AdminID!=$Admin->AdminID){ ?>
                                            <li id="<?php echo $User->AdminID ?>" class="deleteelem btndel btnuser"><i class="fa fa-fw fa-trash"></i></li>
                                            <?php } ?>
                                        </ul>                
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <?php } ?>
                         <!--   Add User    -->
                        <div id="" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral adduserdiv animated fadeIn">
                            <div id="trans">
                                <a href="new.php">
                                <img src="../../../skin/images/body/pictures/mas.jpg" class="img-responsive centrarimg usimg useraddimg">
                                <div class="usernamediv"><p><b>Agregar Usuario</b></p></div>
                                </a>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <br>               
                                    </div>
                                </div>
                            </div>    
                        </div> 
                    </div><!-- End Of Row  -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<script>
$(document).ready(function() {  
    $('#newuser').show( 500 );
});
    
</script>
<?php include('../../includes/inc.foot.php'); ?>