<?php
  include('../../includes/inc.main.php');
  $Profile = new ProfileData();
  $Head->setTitle("Perfiles");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Perfiles");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');
  
  /* Body Content */ 
  // Search List Box
  $Profile->ConfigureSearchRequest();
  echo $Profile->InsertSearchList();
  // Help Modal
  //include('modal.help.php');
  
  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>