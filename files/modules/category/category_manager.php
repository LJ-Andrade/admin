<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Administrador de Categor&iacute;as");
  $Head->setSubTitle("");
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>

 <div class="box box-success">
   <div class="box-header with-border">
     <h3 class="box-title">Listado de Pa&iacute;ses Categor&iacute;as</h3>
   </div><!-- /.box-header -->
   <div class="box-body">
     
     <div class="row">
         <div class="col-md-4">
             MLA    
         </div>
         <div class="col-md-4">
             Argentina
         </div>
         <div class="col-md-4">
             <button type="button" id="refresh_categories" site="MLA">Actualizar Categor&iacute;as</button>
         </div>
         
     </div>
     
   </div><!-- /.box-body -->
   <div class="box-footer">
     
   </div><!-- box-footer -->
 </div><!-- /.box -->

<?php
  include('../../includes/inc.bottom.php');
?>
