<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Clientes");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Clientes");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');

  /* Body Content */
  // Search List Box
  ?>
  <div class="box animated fadeIn">
    <div class="box-header">
      <!-- List -->
      <div class="row ListView ListElement animated fadeIn ">
        <div class="container-fluid">
        En proceso
        </div><!-- container-fluid -->
      </div>

      <!-- /List -->
    </div><!-- box -->
  </div><!-- box -->

<?php

  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>
