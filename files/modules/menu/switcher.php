<?php
    include("../../includes/inc.main.php");
    

    if($_GET['id'])
    {
      $MenuID   = $_GET['id'];
      $Switcher = new Menu($MenuID);
      $Children = $Switcher->getChildren();
      if(count($Children)<1)
      {
        if($Switcher->MenuData['link']!="#" && $Switcher->MenuData['link'])
        {
          header("Location: ".$Switcher->MenuData['link']);
          die();
        }
      }
    }else{
      header("Location: ../main/main.php");
      die();
    }

    $Head->setTitle($Switcher->MenuData['title']);
    $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.subtop.php');?>
    <div class="container">
      
      <div class="mainDemoTitles"><h2><?php echo $Switcher->MenuData['title'] ?></h2></div>
      <?php foreach ($Children as $Child) { ?>
      <div class="col-md-4 genCard">
        <a href="<?php echo $Child['link']; ?>">
          <div class="genCardHead">
            <i class="fa <?php echo $Child['icon']; ?>"></i>
          </div>
        </a>
        <div class="genCardContent">
          <span><?php echo $Child['title']; ?></span>
        </div>
      </div>
      <?php } ?>

    </div>


  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
