<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle($Menu->GetLinkTitle());
  $Head->setHead();
  include('../../includes/inc.top.php');
 ?>

   <div class="form-group heckbox icheck">
     <label class="control-sidebar-subheading">
       <input type="checkbox" data-sidebarskin="toggle" class="pull-right iCheckbox" id="change_sidebar_color" />
       Checkbox de prueba
     </label>
     <p>Esto es una prueba</p>
   </div>

<?php
  include('../../includes/inc.bottom.php');
?>
