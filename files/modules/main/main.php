<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle($Menu->GetTitle());
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setHead();

  /******* MELI **********/
  if($_SESSION['meli'])
  {
    $Params = array('access_token'=>$_SESSION['meli_access_token']);
    $Result = $Meli->get('/users/me',$Params);
    $Me     = $Result['body'];
    $Checked = ' checked="checked" ';
  }
  /******* MELI **********/

  include('../../includes/inc.top.php');
 ?>

   <div class="form-group heckbox icheck">
     <label class="control-sidebar-subheading">
       <input type="checkbox" <?php echo $Checked ?> data-sidebarskin="toggle" class="pull-right iCheckbox" id="meli_status" />
       Cuenta vinculada con Mercado Libre
     </label>
     <p>Esto es una prueba</p>
   </div>

   <button id="activateLoader" type="button" onclick="toggleLoader()" class="btn btnBlue animated fadeIn">Activate Loader</button>
   <br><br>

  <?php if($_SESSION['meli']){ ?>
    <div class="form-group">
      <button type="button" id="melinosync">Devincular mi cuenta de Mercado Libre</button>
    </div>
   <div class="box box-success">
   <div class="box-header with-border">
     <h3 class="box-title">Informaci&oacute;n de tu usuario de Mercado Libre</h3>
   </div>
   <div class="box-body">
    <pre>
      <?php print_r($Me); ?>
    </pre>
    <pre>
      <?php print_r($_SESSION); ?>
    </pre>
   </div>
   <div class="box-footer">
     Ah re loco! 
   </div>
 </div>
 <?php }else{ ?>
  <button type="button" id="melisync">Vincular mi cuenta de Mercado Libre</button>
 <?php } ?>

<?php
  include('../../includes/inc.bottom.php');
?>
