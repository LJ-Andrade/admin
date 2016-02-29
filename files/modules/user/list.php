<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Usuarios Administradores");
    $Head->setHead();

    $Status = $_GET['status']? $_GET['status']: 'A';

    $Users = $DB->fetchAssoc('admin_user','*',"status = '".$Status."' ","admin_id"); 
?>
<body>
    <div id="wrapper">
        <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
       <?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">           
            <div class="container-fluid">
                <div class="userstit"><h3 class="usertittxt">Listado de Usuarios Administradores</h3></div>
                    
                    <div class="glasscontainer1 adduserdiv"> 
                        <a href="new.php"><button class="masterbtn"><i class="fa fa-user-plus"></i> Agregar usuario</button></a>
                    </div>
                        
                    <div class="row row-centered"> 
                        
                        <?php 
                            foreach($Users as $User){ 
                                $User = new AdminData($User['admin_id']);
                        ?>
                        <!--    Users   -->
                        <div id="delelem<?php echo $User->AdminID ?>" class="col-lg-3 col-sm-6 col-xs-12 col-centered animated fadeIn usergral">
 
                                <img src="<?php echo $User->Img; ?>" class="img-responsive userimg">
                                
                                <div class="row usernamediv"><span class="usernametxt"><?php echo  $User->FullUserName; ?></span></div>
                                
                                    <div class="usericos">
                                        
                                        <ul>
                                            <li><a href="edit.php?id=<?php echo $User->AdminID ?>" class="btnmod btnuser"><i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php if($User->AdminID!=$Admin->AdminID){ ?>
                                            <li delete="<?php echo $User->AdminID ?>" class="deleteelem btndel btnuser"><i class="fa fa-fw fa-trash"></i></li>
                                            <?php } ?>
                                        </ul>                
                                    
                                    </div>
                  
                        </div>





                        <?php } ?>
                        <!--   Add User    -->
                        <!--  <div id="" class="col-lg-3 col-sm-6 col-xs-6 col-centered usergral adduserdiv animated fadeIn">
                            <div id="trans">
                                <a href="new.php">
                                <img src="../../../skin/images/body/pictures/mas.jpg" class="img-responsive userimg useraddimg">
                                <div class="usernamediv"><p><b>Agregar Usuario</b></p></div>
                                </a>
                                <div id="transhover">
                                    <div class="col-md-12 usericos">
                                        <br>               
                                    </div>
                                </div>
                            </div>    
                        </div>   -->



                    </div><!-- End Of Row  -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<script>
$(document).ready(function() {  
    $('#newuser').fadeIn( 500 );
});
    
</script>
<?php include('../../includes/inc.foot.php'); ?>