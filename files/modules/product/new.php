<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Blank");
  $Head->setSubTitle("Page");
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>

 <div class="box box-success">
   <div class="box-header with-border">
     <h3 class="box-title">Prod</h3>
     <div class="box-tools pull-right">
       <!-- Buttons, labels, and many other things can be placed here! -->
     </div><!-- /.box-tools -->
   </div><!-- /.box-header -->
   <div class="box-body">
     The body of the box
   </div><!-- /.box-body -->
   <div class="box-footer">
     The footer of the box
   </div><!-- box-footer -->
 </div><!-- /.box -->

<?php
  include('../../includes/inc.bottom.php');
?>
