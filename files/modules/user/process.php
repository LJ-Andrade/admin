<?php

// include('../../includes/inc.main.php');
// $Action = ucfirst($_REQUEST['action']);
// // if(strtolower($_POST['object'])!='admin')
// // {
// // 	$Object= new $_POST['object']();
// // }else{
// // 	$Object='Admin';
// // }
	

// $Object='Admin';

// $$Object->$Action();
// die();

// if($_GET['action']=='newimage')
// {
// 	if(count($_FILES['image'])>0)
// 	{
// 		// $Images = $Admin->UserImages(); // Para cuando se requiera limitar la cantidad de imágenes.
// 		$TempDir = $Admin->ImgGalDir();
// 		$Name	= "user".intval(rand()*rand()/rand())."__".$Admin->AdminID;
// 		$Img	= new FileData($_FILES['image'],$TempDir,$Name);
// 		echo $Img	-> BuildImage(200,200);
// 		die();
// 	}
// }

// switch(strtolower($_POST['action']))
// {
// 	//////////////////////////////////////////// INSERT ///////////////////////////////////////////////////////////////
// 	case 'insert':
// 		$Admin->$_POST['action']();
// 		die();
// 	break;

// 	//////////////////////////////////////////// UPDATE ///////////////////////////////////////////////////////////////
// 	case 'update': 
// 		$Admin->Update();
// 		die;
// 	break;
// 	//////////////////////////////////////////// ACTIVATE USER ///////////////////////////////////////////////////////////////
// 	case 'activate': 
// 		$ID	= $_POST['id'];
// 		$DB->execQuery('update','admin_user',"status = 'A'","admin_id=".$ID);
// 		die;
// 	break;
// 	//////////////////////////////////////////// DELETE ///////////////////////////////////////////////////////////////
// 	case 'delete': 
// 		$ID	= $_POST['id'];
// 		$DB->execQuery('update','admin_user',"status = 'I'","admin_id=".$ID);
// 		die;
// 	break;
// 	//////////////////////////////////////////// DELETE IMAGE FROM GALLERY ///////////////////////////////////////////////////////////////
// 	case 'deleteimage': 
// 		$SRC	= $_POST['src'];
// 		unlink($SRC);
// 		die;
// 	break;

// 	///////////////////////////////////// VALIDATIONS /////////////////////////////////////////////////
// 	case 'validate':
// 		$User 			= strtolower(utf8_encode($_POST['user']));
// 		$ActualUser 	= strtolower(utf8_encode($_POST['actualuser']));

// 	    if($ActualUser)
// 	    	$TotalRegs  = $DB->numRows('admin_user','*',"user = '".$User."' AND user<> '".$ActualUser."'");
//     	else
// 		    $TotalRegs  = $DB->numRows('admin_user','*',"user = '".$User."'");
// 		if($TotalRegs>0) echo $TotalRegs;
// 		die;
// 	break;
	
// 	case 'validate_email':
// 		$Email 			= strtolower(utf8_encode($_POST['email']));
// 		$ActualEmail 	= strtolower(utf8_encode($_POST['actualemail']));

// 	    if($ActualEmail)
// 	    	$TotalRegs  = $DB->numRows('admin_user','*',"email = '".$Email."' AND email<> '".$ActualEmail."'");
//     	else
// 		    $TotalRegs  = $DB->numRows('admin_user','*',"email = '".$Email."'");
// 		if($TotalRegs>0) echo $TotalRegs;
// 		die;
// 	break;

// 	///////////////////////////////////// FILL GROUPS /////////////////////////////////////////////////
// 	case 'fillgroups':
// 		$Profile 	= $_POST['profile'];
// 		$Admin 		= $_POST['admin'];
//         $Groups 	= new GroupData();
//         echo $Groups->GetGroups($Profile,$Admin);
// 		die;
// 	break;
	
// 	//////////////////////////////////// SEARCHER & PAGER ////////////////////////////////////////////////////////
// 	case "search":
// 		$Admin->ConfigureSearchRequest();
// 		echo $Admin->InsertSearchResults();
// 	break;
// }

?>