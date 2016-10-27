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
    
    $Head->setTitle($Switcher->GetTitle());
    $Head->setHead();
    include('../../includes/inc.top.php');
?>

  <div class="box box-success">
    <div class="box-body">
      <?php foreach ($Children as $Child) { ?>
        <div class="col-md-4 col-sm-6">
          <a href="<?php echo $Child['link']; ?>">
          <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa <?php echo $Child['icon']; ?>"></i></span>
              <div class="info-box-content">
                <h3><?php echo $Child['title']; ?></h3>
              </div>
          </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
<?php
include('../../includes/inc.bottom.php');
?>
