<?php

include('../../includes/inc.main.php');

if($_GET['action']=='newimage')
{
	if(count($_FILES['image'])>0)
		{
			$TempDir = $Admin->ImgGalDir();
			$Name	= "user".intval(rand()*rand()/rand())."__".$Admin->AdminID;
			$Img	= new FileData($_FILES['image'],$TempDir,$Name);
			echo $Img	-> BuildImage(200,200);
			die();
		}
}

switch(strtolower($_POST['action']))
{
	//////////////////////////////////////////// NEW ///////////////////////////////////////////////////////////////
	case 'insert':
	
		$Image 		= $_POST['newimage'];
		$User		= htmlentities(strtolower($_POST['user']));
		$Password	= md5(htmlentities($_POST['password']));
		$FirstName	= htmlentities($_POST['first_name']);
		$LastName	= htmlentities($_POST['last_name']);
		$Email 		= htmlentities($_POST['email']);
		$ProfileID	= $_POST['profile'];
		$Status		= $_POST['status']=="on"? 'A': 'I';
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		
		$Insert		= $DB->execQuery('insert','admin_user','user,password,first_name,last_name,email,status,profile_id,img',"'".$User."','".$Password."','".$FirstName."','".$LastName."','".$Email."','".$Status."','".$ProfileID."','".$Image."'");
		$NewID 		= $DB->GetInsertId();


		$New 	= new AdminData($NewID);
		$Dir 	= array_reverse(explode("/",$Image));
		if($Dir[1]!="default")
		{
			$Temp 	= $Image;
			$Image 	= $New->ImgGalDir().$Dir[0];
			copy($Temp,$Image);
		}
		$DB->execQuery('update','admin_user',"img='".$Image."'","admin_id=".$NewID);

		
		for($i=0;$i<count($Groups);$i++)
		{
			$Values .= $i==0? $NewID.",".$Groups[$i] : "),(".$NewID.",".$Groups[$i];
		}
		$DB->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);

		$Values = "";

		for($i=0;$i<count($Menues);$i++)
		{
			$Values .= $i==0? $NewID.",".$Menues[$i] : "),(".$NewID.",".$Menues[$i];
		}
		$DB->execQuery('insert','menu_exception','admin_id,menu_id',$Values);
		die;
		
	break;

	//////////////////////////////////////////// EDIT ///////////////////////////////////////////////////////////////
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

		$Image 		= $_POST['newimage'];
		$User		= htmlentities(strtolower($_POST['user']));
		$FirstName	= htmlentities($_POST['first_name']);
		$LastName	= htmlentities($_POST['last_name']);
		$Email 		= htmlentities($_POST['email']);
		$ProfileID	= $_POST['profile'];
		$Status		= $_POST['status']=="on"? 'A': 'I';
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();

		$Dir 		= array_reverse(explode("/",$Image));
		if($Dir[1]!="default" && $ID!=$Admin->AdminID)
		{
			$Temp 	= $Image;
			$Image 	= $Edit->ImgGalDir().$Dir[0];
			// echo $Image;
			// echo "<br><br>".$ID."/".$Admin->AdminID;
			copy($Temp,$Image);
		}

		$Insert		= $DB->execQuery('update','admin_user',"user='".$User."'".$PasswordFilter.",first_name='".$FirstName."',last_name='".$LastName."',email='".$Email."',status='".$Status."',profile_id='".$ProfileID."',img='".$Image."'","admin_id=".$ID);
		//echo $DB->lastQuery();
		$DB->execQuery('delete','relation_admin_group',"admin_id = ".$ID);
		$DB->execQuery('delete','menu_exception',"admin_id = ".$ID);

		for($i=0;$i<count($Groups);$i++)
		{
			$Values .= $i==0? $ID.",".$Groups[$i] : "),(".$ID.",".$Groups[$i];
		}
		$DB->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);

		$Values = "";

		for($i=0;$i<count($Menues);$i++)
		{
			$Values .= $i==0? $ID.",".$Menues[$i] : "),(".$ID.",".$Menues[$i];
		}
		$DB->execQuery('insert','menu_exception','admin_id,menu_id',$Values);

		die;
	break;

	//////////////////////////////////////////// DELETE ///////////////////////////////////////////////////////////////
	case 'delete': 
		$ID	= $_POST['id'];
		$DB->execQuery('update','admin_user',"status = 'I'","admin_id=".$ID);
		die;
	break;
	//////////////////////////////////////////// DELETE IMAGE FROM GALLERY ///////////////////////////////////////////////////////////////
	case 'deleteimage': 
		$SRC	= $_POST['src'];
		unlink($SRC);
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
		$Profile 	= $_POST['profile'];
		$Admin 		= $_POST['admin'];
		
        $Groups 	= new GroupData();
        echo $Groups->GroupTree($Profile,$Admin);
		
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