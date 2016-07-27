<?php

include('../../includes/inc.main.php');

if($_GET['action']=='newimage')
{
	if(count($_FILES['AddNewImage'])>0)
		{
			$Name	= "img".rand()*rand()/rand();
			$Img	= new FileData($_FILES['AddNewImage'],"../../../skin/images/temp/",$Name);
			echo $Img	-> BuildImage(60,60);
		}
}

switch(strtolower($_POST['action']))
{
	case 'insert':
	
		if(count($_FILES['img'])>0)
		{
			$Name	= "file".rand()*rand()/rand();
			$Img	= new FileData($_FILES['img'],"../../../skin/images/users/",$Name);
			$Image	= $Img	-> BuildImage(45,45);
			
		}

		$Title		= htmlentities($_POST['title']);
		$Parent		= $_POST['parent'];
		$Status		= $_POST['status']=="on"? 'A': 'I';
		
		$Insert		= $DB->execQuery('insert','category','title,parent_id,status,image,creation_date',"'".$Title."',".$Parent.",'".$Status."','".$Image."',NOW()");
		$ID 		= $DB->GetInsertId();
		//echo $DB->lastQuery();
		die;
		
	break;
	case 'update': 
		$ID 	= $_POST['id'];
		$Edit	= new Category($ID);
		
		if(count($_FILES['img'])>0)
		{
			
			$Name		= "file".intval((rand()*rand())/rand()+rand());
			$Img		= new FileData($_FILES['img'],"../../../skin/images/categories/",$Name);
			
			if(file_exists($Edit->Data['image']))
					$Img -> DeleteFile($Edit->Data['image']);
			
			$Image		= $Img	-> BuildImage(45,45);
			
			$ImgFilter	= ",img='".$Image."'";
		}

		$Title		= htmlentities($_POST['title']);
		$Parent		= $_POST['parent'];
		$Status		= $_POST['status']=="on"? 'A': 'I';

		$Insert		= $DB->execQuery('update','category',"title='".$Title."',parent_id=".$Parent.",status='".$Status."'".$ImgFilter,"category_id=".$ID);
		//echo $DB->lastQuery();
		die;
	break;
	case 'delete': 
		$ID	= $_POST['id'];
		$DB->execQuery('update','category',"status = 'I'","category_id=".$ID);
		die;
	break;

	///////////////////////////////////// VALIDATIONS /////////////////////////////////////////////////
	case 'validate':
		$Title 			= strtolower(utf8_encode($_POST['title']));
		$ActualTitle 	= strtolower(utf8_encode($_POST['actualtitle']));

	    if($ActualTitle)
	    	$TotalRegs  = $DB->numRows('category','*',"title = '".$Title."' AND title<> '".$ActualTitle."'");
    	else
		    $TotalRegs  = $DB->numRows('category','*',"title = '".$Title."'");
		if($TotalRegs>0) echo $TotalRegs;
		die;
	break;


	///////////////////////////////////// FILL GROUPS /////////////////////////////////////////////////
	case 'fillgroups':
		$Profile = $_POST['profile'];

        $Groups = $DB->fetchAssoc('admin_group','*',"group_id IN (SELECT group_id FROM relation_group_profile WHERE profile_id = ".$Profile.")","name");
        foreach ($Groups as $Group)
        {
         echo '<div style="width:auto;">'.insertElement('checkbox','group_id',$Group['group_id'],'Arial12px BlueCyan Bold','tabindex="9"').' '.htmlentities($Group['name']).'</div>';   
        }
        
		die;
	break;

	//////////////////////////////////// PAGER ////////////////////////////////////////////////////////
	case 'pager':
		$Page 		= $_POST['page'];
		if($Page){
		   
		    $Pager = $_SESSION[$_POST['pagerid']];
		    $Pager->SetActualPage($Page);
		    if($_SESSION['inactive_status'])
		    	echo utf8_encode($Admin->MakeListInactive($Pager->CalculateRegFrom(),$Pager->GetPageRegs(),$Pager->GetWhere()));
		    else
		    	echo utf8_encode($Admin->MakeList($Pager->CalculateRegFrom(),$Pager->GetPageRegs(),$Pager->GetWhere()));
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
		$Pager = $_SESSION[$_POST['pagerid']];
		$Pager->SetFieldValue($_POST['field'],$_POST['value']);
		$Pager->SetWhere($Pager->GetFields(),'admin_user');
		$Pager->SetTotalRegs($Admin->GetTotalRegs($Pager->GetWhere(),$_SESSION['inactive_status']));
		$_SESSION[$_POST['pagerid']] = $Pager;
		die;
	break;
}

?>