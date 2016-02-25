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
		
		$User		= strtolower($_POST['user']);
		$Password	= md5($_POST['password']);
		$FirstName	= $_POST['first_name'];
		$LastName	= $_POST['last_name'];
		$ProfileID	= $_POST['profile'];
		$Status		= $_POST['status'];
		$Groups		= $_POST['group_id'] ? explode(",",$_POST['group_id']) : array();
		$Menues		= $_POST['menu'] ? explode(",",$_POST['menu']) : array();
		
		$Insert		= $DB->execQuery('insert','admin_user','user,password,first_name,last_name,status,profile_id,img',"'".$User."','".$Password."','".$FirstName."','".$LastName."','".$Status."','".$ProfileID."','".$Image."'");
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
		$Admin_id	= $_POST['admin_id'];
		$AdminEdit		= new AdminData($_POST['admin_id']);

		if($_POST['password'] && $Admin->AdminData['profile_id']<3){
			$Password		= md5($_POST['password']);
			$PasswordFilter	= ",password='".$Password."'";
		}

		if($_POST['password'] && $_POST['oldpassword']){
			if(md5($_POST['oldpassword'])!=$AdminEdit->AdminData['password']){
				echo "Ha ingresado incorrectamente su antigua clave.";
				die;
			}
			$Password		= md5($_POST['password']);
			$PasswordFilter	= ",password='".$Password."'";
		}
		
		if(count($_FILES['img'])>0)
		{
			
			$Name		= "file".intval((rand()*rand())/rand()+rand());
			$Img		= new FileData($_FILES['img'],"../../../skin/images/users/",$Name);
			
			if(file_exists($AdminEdit->AdminData['img']))
					$Img -> DeleteFile($AdminEdit->AdminData['img']);
			
			$Image		= $Img	-> BuildImage(45,45);
			
			$ImgFilter	= ",img='".$Image."'";
		}

		$User		= $_POST['user'];
		$FirstName	= $_POST['first_name'];
		$LastName	= $_POST['last_name'];
		$ProfileID	= $_POST['profile_id'];
		$Status		= $_POST['status'];
		$Groups		= $_POST['group_id'] ? explode(",",$_POST['group_id']) : array();
		$Menues		= $_POST['menu'] ? explode(",",$_POST['menu']) : array();

		$Insert		= $DB->execQuery('update','admin_user',"user='".$User."'".$PasswordFilter.",first_name='".$FirstName."',last_name='".$LastName."',status='".$Status."',profile_id='".$ProfileID."'".$ImgFilter,"admin_id=".$Admin_id);
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
		$Admin_id	= $_POST['id'];
		//$Result		= $DB->fetchAssoc('select','admin_user','img',"admin_id = ".$Admin_id);
		$Delete		= $DB->execQuery('update','admin_user',"status = 'I'","admin_id=".$Admin_id);
		//if(file_exists($Result[0]['img'])) unlink($Result[0]['img']);
		print_r($Delete);
		die;
	break;

	///////////////////////////////////// VALIDATIONS /////////////////////////////////////////////////
	case 'validate':
		$User 			= strtolower(utf8_encode($_POST['user']));
		$ActualUser 	= strtolower(utf8_encode($_POST['actualuser']));

	    if($ActualUser)
	    	$TotalRegs  = $DB->numRows('select','admin_user','*',"user = '".$User."' AND user<> '".$ActualUser."'");
    	else
		    $TotalRegs  = $DB->numRows('select','admin_user','*',"user = '".$User."'");
		if($TotalRegs>0) echo $TotalRegs;
		die;
	break;


	///////////////////////////////////// FILL GROUPS /////////////////////////////////////////////////
	case 'fillgroups':
		$Profile = $_POST['profile'];

        $Groups = $DB->fetchAssoc('select','admin_group','*',"group_id IN (SELECT group_id FROM relation_group_profile WHERE profile_id = ".$Profile.")","name");
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