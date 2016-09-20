<?php

include('../../includes/inc.main.php');

if($_GET['action']=='newimage')
{
	if(count($_FILES['image'])>0)
		{
			// $Images = $Admin->UserImages(); // Para cuando se requiera limitar la cantidad de imágenes.
			$TempDir = $Admin->ImgGalDir();
			$Name	= "user".intval(rand()*rand()/rand())."__".$Admin->AdminID;
			$Img	= new FileData($_FILES['image'],$TempDir,$Name);
			echo $Img	-> BuildImage(200,200);
			die();
		}
}

switch(strtolower($_POST['action']))
{
	//////////////////////////////////////////// CREATE ///////////////////////////////////////////////////////////////
	case 'insert':
	
		$Image 		= $_POST['newimage'];
		$User		= htmlentities(strtolower($_POST['user']));
		$Password	= md5(htmlentities($_POST['password']));
		$FirstName	= htmlentities(ucfirst($_POST['first_name']));
		$LastName	= htmlentities(ucfirst($_POST['last_name']));
		$Email 		= htmlentities(strtolower($_POST['email']));
		$ProfileID	= $_POST['profile'];
		$Status		= 'A';//= $_POST['status']=="on"? 'A': 'I';
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		
		$Insert		= $DB->execQuery('insert','admin_user','user,password,first_name,last_name,email,status,profile_id,img,creation_date,creator_id,customer_id',"'".$User."','".$Password."','".$FirstName."','".$LastName."','".$Email."','".$Status."','".$ProfileID."','".$Image."',NOW(),".$_SESSION['admin_id'].",".$_SESSION['customer_id']);
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
			if(intval($Groups[$i])>0)
				$Values .= !$Values? $NewID.",".$Groups[$i] : "),(".$NewID.",".$Groups[$i];
		}
		$DB->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);
		
		$Values = "";

		for($i=0;$i<count($Menues);$i++)
		{
			if(intval($Menues[$i])>0)
				$Values .= !$Values? $NewID.",".$Menues[$i] : "),(".$NewID.",".$Menues[$i];
		}
		$DB->execQuery('insert','menu_exception','admin_id,menu_id',$Values);
		
		die();
		
	break;

	//////////////////////////////////////////// UPDATE ///////////////////////////////////////////////////////////////
	case 'update': 
		$ID 	= $_POST['id'];
		$Edit	= new AdminData($ID);

		

		if($_POST['password'])
		{
			$Password	= md5(htmlentities($_POST['password']));
			$PasswordFilter	= ",password='".$Password."'";
		}

		$Image 		= $_POST['newimage'];
		$User		= htmlentities(strtolower($_POST['user']));
		$FirstName	= htmlentities($_POST['first_name']);
		$LastName	= htmlentities($_POST['last_name']);
		$Email 		= htmlentities($_POST['email']);
		$ProfileID	= $_POST['profile'];
		$Status		= 'A';//$_POST['status']=="on"? 'A': 'I';
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
	//////////////////////////////////////////// ACTIVATE USER ///////////////////////////////////////////////////////////////
	case 'activate': 
		$ID	= $_POST['id'];
		$DB->execQuery('update','admin_user',"status = 'A'","admin_id=".$ID);
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
	
	case 'validate_email':
		$Email 			= strtolower(utf8_encode($_POST['email']));
		$ActualEmail 	= strtolower(utf8_encode($_POST['actualemail']));

	    if($ActualEmail)
	    	$TotalRegs  = $DB->numRows('admin_user','*',"email = '".$Email."' AND email<> '".$ActualEmail."'");
    	else
		    $TotalRegs  = $DB->numRows('admin_user','*',"email = '".$Email."'");
		if($TotalRegs>0) echo $TotalRegs;
		die;
	break;

	///////////////////////////////////// FILL GROUPS /////////////////////////////////////////////////
	case 'fillgroups':
		$Profile 	= $_POST['profile'];
		$Admin 		= $_POST['admin'];
        $Groups 	= new GroupData();
        echo $Groups->GetGroups($Profile,$Admin);
		die;
	break;
	
	//////////////////////////////////// SEARCHER & PAGER ////////////////////////////////////////////////////////
	case "search":
		foreach($_POST as $Key => $Value)
		{
			$_POST[$Key] = htmlentities($Value);
		}
		
		if($_POST['name'])
		{
			$Name = $_POST['name'];
			$Admin->AddWhereString(" AND (first_name LIKE '%".$Name."%' OR last_name LIKE '%".$Name."%')");	
		}
		if($_POST['email']) $Admin->SetWhereCondition("email","LIKE","%".$_POST['email']."%");
		if($_POST['user']) $Admin->SetWhereCondition("user","LIKE","%".$_POST['user']."%");
		if($_POST['profile']) $Admin->SetWhereCondition("profile_id","=", $_POST['profile']);
		if($_POST['group'])
		{
			$Admin->AddWhereString(" AND admin_id IN (SELECT admin_id FROM relation_admin_group WHERE group_id = ".$_POST['group'].")");	
		}
		if($_REQUEST['status'])
		{
			if($_POST['status']) $Admin->SetWhereCondition("status","=", $_POST['status']);
			if($_GET['status']) $Admin->SetWhereCondition("status","=", $_GET['status']);	
		}else{
			$Admin->SetWhereCondition("status","=","A");
		}
		$Admin->SetRegsPerView($_POST['regsperview']);
		if(intval($_POST['view_page'])>0)
			$Admin->SetPage($_POST['view_page']);
		
		if($_POST['view_type']=='list')
			$GridClass = 'Hidden';
		else
			$ListClass = 'Hidden';
			
		echo '<div class="contentContainer txC" id="SearchResult"><!-- List Container -->
        <div class="GridView row horizontal-list flex-justify-center GridElement '.$GridClass.' animated fadeIn">
          <ul>
            '.$Admin->MakeGrid().'
          </ul>
        </div><!-- /.horizontal-list -->
        <!-- Item List View -->
        <div class="row ListView ListElement '.$ListClass.' animated fadeIn">
          <div class="container-fluid">
            '.$Admin->MakeList().'
          </div><!-- container-fluid -->
        </div><!-- row -->
    	'.insertElement('hidden','totalregs',$Admin->GetTotalRegs()).'
    	</div><!-- /Content Container -->';
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