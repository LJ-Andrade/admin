<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Blank");
  $Head->setSubTitle("Page");
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>

 <!-- Default box -->
 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Title</h3>

     <div class="box-tools pull-right">
       <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
         <i class="fa fa-minus"></i></button>
       <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
         <i class="fa fa-times"></i></button>
     </div>
   </div>
   <div class="box-body">
     Start creating your amazing application!
   </div>
   <!-- /.box-body -->
   <div class="box-footer">
     Footer
   </div>
   <!-- /.box-footer-->
 </div>
 <!-- /.box -->

<?php
  $Foot->setScript("../../../vendors/slimScroll/jquery.slimscroll.min.js");
  $Foot->setScript("../../../vendors/fastclick/fastclick.js");
  include('../../includes/inc.bottom.php');
?>
