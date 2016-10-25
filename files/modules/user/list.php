<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Usuarios");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Usuarios");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');
  
  /* Body Content */ 
  // Search List Box
  $Admin->ConfigureSearchRequest();
  echo $Admin->InsertSearchList();
  // Help Modal
  include('modal.help.php');
  
  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>