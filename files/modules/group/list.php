<?php
  include('../../includes/inc.main.php');
  $Group = new GroupData();
  $Head->setTitle("Grupos");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Grupos");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');
  
  /* Body Content */ 
  // Search List Box
  $Group->ConfigureSearchRequest();
  echo $Group->InsertSearchList();
  // Help Modal
  //include('modal.help.php');
  
  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>