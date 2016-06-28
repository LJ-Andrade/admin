<!--Nav-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php include("../../includes/inc.top.php"); ?>
    <?php
        $Menu   = new Menu();
        $Menu   ->insertMenu($_SESSION['profile_id'],$_SESSION['admin_id']);
    ?>
    <?php// include("../../includes/inc.subtop.php"); ?>


    <!-- <div class="nav navbar-nav side-nav">
      <ul class="mainMenu">
        <li>HOLA</li>
      </ul>
    </div> -->

</nav>
