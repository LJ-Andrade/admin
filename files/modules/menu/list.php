<?php
  include('../../includes/inc.main.php');
  $Head->setTitle("Menues");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Menues");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');
  
  /* Body Content */ 
  // Search List Box
  $Menu->ConfigureSearchRequest();
  echo $Menu->InsertSearchList();
  // Help Modal
  include('modal.help.php');
  
  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>