<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle($Menu->GetLinkTitle());
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>



<?php
  $Foot->setScript("../../../vendors/slimScroll/jquery.slimscroll.min.js");
  $Foot->setScript("../../../vendors/fastclick/fastclick.js");
  include('../../includes/inc.bottom.php');
?>
