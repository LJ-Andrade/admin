<?php
  include('../../includes/inc.main.php');
  $Company = new Company();
  $Head->setTitle("Empresas");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Empresas");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');
  
  /* Body Content */ 
  // Search List Box
  $Company->ConfigureSearchRequest();
  echo $Company->InsertSearchList();
  // Help Modal
  //include('modal.help.php');
  
  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>