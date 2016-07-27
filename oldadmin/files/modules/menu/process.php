<?php

include('../../includes/inc.main.php');

switch(strtolower($_POST['action']))
{
	case 'insert':
		
		$Title		= htmlentities($_POST['title']);
		$Link		= $_POST['link'];
		$Position	= $_POST['position'];
		$Parent_id	= $_POST['parent'];
		$Icon		= $_POST['icon'];
		$Status		= $_POST['status'];
		$Public		= $_POST['public']=='on'? 'Y':'N';
		if(!$Link) $Link="#";
		
		$DB->execQuery('insert','menu','title,link,position,icon,parent_id,status,public',"'".$Title."','".$Link."',".$Position.",'".$Icon."',".$Parent_id.",'".$Status."','".$Public."'");
		die;
		
	break;
	case 'update': 
		$ID	= $_POST['id'];
		$Menu		= new Menu($ID);
		
		$Title		= htmlentities($_POST['title']);
		$Link		= $_POST['link']==""? "#" : $_POST['link'];
		$Position	= $_POST['position'];
		$ParentID	= $_POST['parent'];
		$Status		= $_POST['status'];
		$Icon		= $_POST['icon'];
		$Public		= $_POST['public']=='on'? 'Y':'N';
		if(!$Link) $Link="#";

		$DB->execQuery('update','menu',"title='".$Title."',link='".$Link."',position='".$Position."',icon='".$Icon."',status='".$Status."',parent_id=".$ParentID.",public='".$Public."'","menu_id=".$ID);
		die;
	break;
	case 'delete': 
		$ID	= $_POST['id'];
		$DB->execQuery('delete','menu',"menu_id=".$ID);
		//print_r($Delete);
		die;
	break;
	case 'pager':
		$Page 		= $_POST['page'];
		if($Page){
		   	$Menu = new Menu();
		    $Pager = $_SESSION[$_POST['pagerid']];
		    $Pager->SetActualPage($Page);
		    echo utf8_encode($Menu->MakeList($Pager->CalculateRegFrom(),$Pager->GetPageRegs(),$Pager->GetWhere()));
		    $_SESSION[$_POST['pagerid']] = $Pager;
	   	}
	   	die;
	break;
	case 'changepagerview':
		$Regs 		= $_POST['regs'];
		if($Regs){
			$ID 	= $_POST['pagerid'];
			$Pager 	= $_SESSION[$ID];
			$Pager ->SetPageRegs($Regs);
			$Result	= $Pager->CalculatePages()>1? $Pager->InsertAjaxPager() : "erase";
			echo  $Result;
			$_SESSION[$ID] = $Pager;
			die;
	   	}
	break;
	case 'searcher': 
		$Table 	= 'menu';
		$Menu 	= new Menu();
		
		$Pager 	= $_SESSION[$_POST['pagerid']];
		$Pager->SetFieldValue($_POST['field'],$_POST['value']);
		$Pager->SetWhere($Pager->GetFields(),$Table);
		$Pager->SetTotalRegs($Menu->GetTotalRegs($Pager->GetWhere()));
		$_SESSION[$_POST['pagerid']] = $Pager;
		die;
	break;
}

?>