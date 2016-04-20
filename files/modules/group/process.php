<?php

include('../../includes/inc.main.php');

if($_GET['action']=='newimage')
{
	if(count($_FILES['image'])>0)
		{
			if(!file_exists("../../../skin/images/groups")) mkdir("../../../skin/images/groups");
			if(!file_exists("../../../skin/images/groups/temp")) mkdir("../../../skin/images/groups/temp");
			if(file_exists($_POST['groupimage'])) unlink($_POST['groupimage']);
			$Name	= "group".intval(rand()*rand()/rand());
			$Img	= new FileData($_FILES['image'],"../../../skin/images/groups/temp/",$Name);
			echo $Img	-> BuildImage(200,200);
			die();
		}
}

switch(strtolower($_POST['action']))
{
	case 'insert':
		$Temp 		= $_POST['groupimage'];
		$Group 	= new GroupData();
		if($Temp)
		{
			$Tmp 		= array_reverse(explode("/", $Temp));
			$Image 		= "../../../skin/images/group/".$Tmp[0];
			$Profile->MoveImage($Image,$Temp);
		}else{
			$Image = $Profile->GetDefaultImg();
		}

		$Title		= htmlentities(strtolower($_POST['title']));
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();

		$Insert		= $DB->execQuery('insert','admin_group','title,image,status,creation_date',"'".$Title."','".$Image."','A',NOW()");
		$ID 		= $DB->GetInsertId();

		for($i=0;$i<count($Menues);$i++)
		{
			$Values .= $i==0? $ID.",".$Menues[$i] : "),(".$ID.",".$Menues[$i];
		}
		$DB->execQuery('insert','relation_menu_group','group_id,menu_id',$Values);
		die;
	break;

	case 'update':
		$ID 	= $_POST['id'];
		$Edit	= new ProfileData($ID);
		$Temp = $_POST['profileimage'];
		$OldImg = $_POST['oldimage'];
		$NewImg = $OldImg;

		if($Temp)
		{
			$Tmp 	= array_reverse(explode("/", $Temp));
			$NewImg = "../../../skin/images/profiles/".$Tmp[0];
			$Edit->MoveImage($NewImg,$Temp,$OldImg);
		}
		$Title		= htmlentities(strtolower($_POST['title']));
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();

		$Insert		= $DB->execQuery('update','admin_profile',"title='".$Title."',image='".$NewImg."'","profile_id=".$ID);
		//echo $DB->lastQuery();
		$DB->execQuery('delete','relation_menu_profile',"profile_id = ".$ID);

		for($i=0;$i<count($Menues);$i++)
		{
			$Values .= $i==0? $ID.",".$Menues[$i] : "),(".$ID.",".$Menues[$i];
		}
		$DB->execQuery('insert','relation_menu_profile','profile_id,menu_id',$Values);
		die;
	break;
	case 'delete':
		$ID	= $_POST['id'];
		$DB->execQuery('update','admin_profile',"status = 'I'","profile_id=".$ID);
		die;
	break;

	///////////////////////////////////// VALIDATIONS /////////////////////////////////////////////////
	case 'validate':
		$Title 	= strtolower(utf8_encode($_POST['title']));
		$Actual = strtolower(utf8_encode($_POST['actual']));

	    if($Actual)
	    	$TotalRegs  = $DB->numRows('admin_profile','*',"title = '".$Title."' AND title<> '".$Actual."'");
    	else
		    $TotalRegs  = $DB->numRows('admin_profile','*',"title = '".$Title."'");
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
