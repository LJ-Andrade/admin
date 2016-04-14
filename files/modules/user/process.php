<?php

include('../../includes/inc.main.php');

switch(strtolower($_POST['action']))
{
	case 'insert':
	
		if(count($_FILES['img'])>0)
		{
			$Name		= "file".rand()*rand()/rand();
			$Img		= new FileData($_FILES['img'],"../../../skin/images/users/",$Name);
			$Image		= $Img	-> BuildImage(45,45);
			
		}
		
		$User		= htmlentities(strtolower($_POST['user']));
		$Password	= md5(htmlentities($_POST['password']));
		$FirstName	= htmlentities($_POST['first_name']);
		$LastName	= htmlentities($_POST['last_name']);
		$Email 		= htmlentities($_POST['email']);
		$ProfileID	= $_POST['profile'];
		$Status		= $_POST['status']=="on"? 'A': 'I';
		$Groups		= $_POST['group_id'] ? explode(",",$_POST['group_id']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		
		$Insert		= $DB->execQuery('insert','admin_user','user,password,first_name,last_name,email,status,profile_id,img',"'".$User."','".$Password."','".$FirstName."','".$LastName."','".$Email."','".$Status."','".$ProfileID."','".$Image."'");
		$AdminID 	= $DB->GetInsertId();
		
		for($i=0;$i<count($Groups);$i++)
		{
			$Values .= $i==0? $AdminID.",".$Groups[$i] : "),(".$AdminID.",".$Groups[$i];
		}
		$DB->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);

		$Values = "";

		for($i=0;$i<count($Menues);$i++)
		{
			$Values .= $i==0? $AdminID.",".$Menues[$i] : "),(".$AdminID.",".$Menues[$i];
		}
		$DB->execQuery('insert','menu_exception','admin_id,menu_id',$Values);
		die;
		
	break;
	case 'update': 
		$ID 	= $_POST['id'];
		$Edit	= new AdminData($ID);

		

		if($_POST['password'])
		{
			$Password	= md5(htmlentities($_POST['password']));
			$PasswordFilter	= ",password='".$Password."'";
		}

		if($_POST['password'] && $_POST['oldpassword'])
		{
			if(md5(htmlentities($_POST['oldpassword']))!=$Edit->AdminData['password'])
			{
				echo "Ha ingresado incorrectamente su antigua clave.";
				die;
			}
			$Password		= md5(htmlentities($_POST['password']));
			$PasswordFilter	= ",password='".$Password."'";
		}
		
		if(count($_FILES['img'])>0)
		{
			
			$Name		= "file".intval((rand()*rand())/rand()+rand());
			$Img		= new FileData($_FILES['img'],"../../../skin/images/users/",$Name);
			
			if(file_exists($Edit->AdminData['img']))
					$Img -> DeleteFile($Edit->AdminData['img']);
			
			$Image		= $Img	-> BuildImage(45,45);
			
			$ImgFilter	= ",img='".$Image."'";
		}

		$User		= htmlentities(strtolower($_POST['user']));
		$FirstName	= htmlentities($_POST['first_name']);
		$LastName	= htmlentities($_POST['last_name']);
		$Email 		= htmlentities($_POST['email']);
		$ProfileID	= $_POST['profile'];
		$Status		= $_POST['status']=="on"? 'A': 'I';
		$Groups		= $_POST['group'] ? explode(",",$_POST['group_id']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();

		$Insert		= $DB->execQuery('update','admin_user',"user='".$User."'".$PasswordFilter.",first_name='".$FirstName."',last_name='".$LastName."',email='".$Email."',status='".$Status."',profile_id='".$ProfileID."'".$ImgFilter,"admin_id=".$ID);
		//echo $DB->lastQuery();
		$DB->execQuery('delete','relation_admin_group',"admin_id = ".$Admin_id);
		$DB->execQuery('delete','menu_exception',"admin_id = ".$Admin_id);

		for($i=0;$i<count($Groups);$i++)
		{
			$Values .= $i==0? $Admin_id.",".$Groups[$i] : "),(".$Admin_id.",".$Groups[$i];
		}
		$DB->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);

		$Values = "";

		for($i=0;$i<count($Menues);$i++)
		{
			$Values .= $i==0? $Admin_id.",".$Menues[$i] : "),(".$Admin_id.",".$Menues[$i];
		}
		$DB->execQuery('insert','menu_exception','admin_id,menu_id',$Values);

		die;
	break;
	case 'delete': 
		$ID	= $_POST['id'];
		$DB->execQuery('update','admin_user',"status = 'I'","admin_id=".$ID);
		die;
	break;

	///////////////////////////////////// VALIDATIONS /////////////////////////////////////////////////
	case 'validate':
		$User 			= strtolower(utf8_encode($_POST['user']));
		$ActualUser 	= strtolower(utf8_encode($_POST['actualuser']));

	    if($ActualUser)
	    	$TotalRegs  = $DB->numRows('admin_user','*',"user = '".$User."' AND user<> '".$ActualUser."'");
    	else
		    $TotalRegs  = $DB->numRows('admin_user','*',"user = '".$User."'");
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