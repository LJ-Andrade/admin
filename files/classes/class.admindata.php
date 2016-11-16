<?php

class AdminData extends DataBase
{
	var	$AdminID;
	var	$FirstName;
	var	$LastName;
	var	$FullName;
	var $FullUserName;
	var	$ProfileID;
	var	$ProfileName;
	var	$User;
	var	$Email;
	var	$Img;
	var $AdminData;
	var $DefaultImg	= '../../../skin/images/users/default/default.jpg';
	var $DefaultImgDir = '../../../skin/images/users/default';
	var $ImgGalDir = '../../../skin/images/users/';
	var $LastAccess;
	var $Customer 		= array();
	var $Groups 		= array();
	var $Parent 		= array();
	var $Menues 		= array();
	var $DefaultImages 	= array();
	var $UserImages 	= array();

	public function __construct($AdminID='')
	{
		$this->Connect();
		$this->AdminID 		= $AdminID==''? $_SESSION['admin_id'] : $AdminID;
		$this->AdminData 	= $this->fetchAssoc('admin_user','*',"admin_id = '".$this->AdminID."'");
		$this->AdminData	= $this->AdminData[0];
		$this->FirstName	= $this->AdminData['first_name'];
		$this->LastName		= $this->AdminData['last_name'];
		$this->User			= $this->AdminData['user'];
		$this->Email		= $this->AdminData['email'];
		$this->ProfileID	= $this->AdminData['profile_id'];
		$this->Img			= file_exists($this->AdminData['img'])? $this->AdminData['img'] : $this->DefaultImg;
		$this->FullName		= $this->FirstName." ".$this->LastName;
		$this->FullUserName	= $this->FirstName." ".$this->LastName." (".$this->User.")";
		$this->LastAccess	= $this->AdminData['last_access']=="0000-00-00 00:00:00"? "Nunca se ha conectado":"&Uacute;ltima conexi&oacute;n: ".DateTimeFormat($this->AdminData['last_access']);
		$ProfileData		= $this->fetchAssoc('admin_profile','*'," profile_id = ".$this->ProfileID);
		$this->ProfileName	= $ProfileData[0]['title'];
	}
	
	public function GetCustomer()
	{
		if(!$this->Customer)
		{
			$Rs 	= $this->fetchAssoc("admin_company",'*',"company_id =".$this->AdminData['company_id']);
			$this->Customer = $Rs[0];
		}
		return $this->Customer;
	}

	public function GetGroups()
	{
		if(!$this->Groups)
		{
			$Rs 	= $this->fetchAssoc('admin_group','*',"status = 'A' AND group_id IN (SELECT group_id FROM relation_admin_group WHERE admin_id=".$this->AdminID.")","title");
			$this->Groups = $Rs;
		}
		return $this->Groups;

	}

	public function GetImg()
	{
		return $this->Img;
	}

	public function GetProfileID()
	{
		return $this->ProfileID;
	}

	

	public function GetCheckedMenues()
	{
		if(count($this->Menues)<1)
		{
			$Relations	= $this->fetchAssoc('relation_admin_menu','*',"admin_id = ".$this->AdminID);
			foreach($Relations as $Relation)
			{
				$this->Menues[]	= $Relation['menu_id'];
			}
		}
		return $this->Menues;

	}

	public function GetParents()
	{
		$Parents	= $this->fetchAssoc('menu','DISTINCT(parent_id)',"parent_id <> 0 AND status <> 'I'");

		foreach($Parents as $Parent){
			$this->Parents[] = $Parent['parent_id'];
		}
	}

	public function IsDisabled($ParentID)
	{
		return in_array($ParentID,$this->Menues) ? '' : ' disabled="disabled" ';
	}

	public function DefaultImages($Dir='')
	{
		if(!$Dir) $Dir = $this->DefaultImgDir;

		if(count($this->DefaultImages)<1)
		{
			$Elements = scandir($Dir);
			foreach($Elements as $Image)
			{
				if(strlen($Image)>4 && $Image[0]!=".")
				{
					$this->DefaultImages[] = $Dir."/".$Image;
				}
			}
		}

		return $this->DefaultImages;
	}

	public function UserImages($Dir='')
	{
		if(!$Dir) $Dir = $this->ImgGalDir();

		if(count($this->UserImages)<1)
		{
			$Elements = scandir($Dir);
			foreach($Elements as $Image)
			{
				if(strlen($Image)>4 && $Image[0]!=".")
				{
					$this->UserImages[] = $Dir."/".$Image;
				}
			}
		}

		return $this->UserImages;
	}

	public function ImgGalDir()
	{
		$TempDir = $this->ImgGalDir.$this->AdminID."/";
		if(!file_exists($TempDir)) mkdir($TempDir);
		return $TempDir;
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// SEARCHLIST FUNCTIONS ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function MakeRegs($Mode="List")
	{
		$Rows	= $this->GetRegs();
		//echo $this->lastQuery();
		for($i=0;$i<count($Rows);$i++)
		{
			$Row	=	new AdminData($Rows[$i]['admin_id']);
			$UserGroups = $Row->GetGroups();
			$Groups='';
			foreach($UserGroups as $Group)
			{
				$Groups .= '<span class="label label-warning">'.$Group['title'].'</span> ';
			}
			if(!$Groups) $Groups = 'Ninguno';
			$Actions	= 	'<span class="roundItemActionsGroup"><a href="edit.php?id='.$Row->AdminID.'"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>';
			if($Row->AdminData['status']=="A")
			{
				if($Row->AdminID!=$_SESSION['admin_id'])
				{
					$Actions	.= '<a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_'.$Row->AdminID.'"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>';
					$Restrict	= '';
				}else{
					$Restrict	= ' undeleteable ';
				}
			}else{
				$Actions	.= '<a class="activateElement" process="../../library/processes/proc.common.php" id="activate_'.$Row->AdminID.'"><button type="button" class="btn btnGreen"><i class="fa fa-check-circle"></i></button></a>';
			}
			$Actions	.= '</span>';
			switch(strtolower($Mode))
			{
				case "list":
					$RowBackground = $i % 2 == 0? '':' listRow2 ';
					$Regs	.= '<div class="row listRow'.$RowBackground.$Restrict.'" id="row_'.$Row->AdminID.'" title="'.$Row->FullName.'">
									<div class="col-lg-3 col-md-3 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<img class="img-circle" src="'.$Row->Img.'" alt="'.$Row->FullName.'">
											<span class="listTextStrong">'.$Row->FullName.' ('.$Row->User.')</span>
											<span class="smallDetails">'.$Row->LastAccess.'<!--22/25/24 | 22:00Hs.--></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-3 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Email</span>
											<span class="emailTextResp">'.$Row->Email.'</span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Perfil</span>
											<span class="listTextStrong"><span class="label label-primary">'.ucfirst($Row->ProfileName).'</span></span>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												'.$Groups.'
											</span>
										</div>
									</div>
									<div class="col-lg-1 col-md-1 col-sm-1 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div>'.$Actions.'</div>
									</div>
								</div>';
				break;
				case "grid":
				$Regs	.= '<li id="grid_'.$Row->AdminID.'" class="RoundItemSelect roundItemBig'.$Restrict.'" title="'.$Row->FullName.'">
						            <div class="flex-allCenter imgSelector">
						              <div class="imgSelectorInner">
						                <img src="'.$Row->Img.'" alt="'.$Row->FullName.'" class="img-responsive">
						                <div class="imgSelectorContent">
						                  <div class="roundItemBigActions">
						                    '.$Actions.'
						                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
						                  </div>
						                </div>
						              </div>
						              <div class="roundItemText">
						                <p><b>'.$Row->FullName.'</b></p>
						                <p>('.$Row->User.')</p>
						                <p>'.ucfirst($Row->ProfileName).'</p>
						              </div>
						            </div>
						          </li>';
				break;
			}
        }
        if(!$Regs) $Regs.= '<div class="callout callout-info"><h4><i class="icon fa fa-info-circle"></i> No se encontraron usuarios.</h4><p>Puede crear un nuevo usuario haciendo click <a href="new.php">aqui</a>.</p></div>';
		return $Regs;
	}
	
	protected function InsertSearchField()
	{
		return '<!-- First Name -->
          <div class="input-group">
            <span class="input-group-addon order-arrows sort-activated" order="first_name" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','first_name','','form-control','placeholder="Nombre"').'
          </div>
          <!-- Last Name -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="last_name" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','last_name','','form-control','placeholder="Apellido"').'
          </div>
          <!-- User -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="user" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','user','','form-control','placeholder="Usuario"').'
          </div>
          <!-- Email -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="email" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','email','','form-control','placeholder="Email"').'
          </div>
          <!-- Profile -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="profile" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','profile','','form-control','',$this->fetchAssoc('admin_profile','profile_id,title',"company_id=".$_SESSION['company_id']." AND status='A' AND profile_id >= ".$_SESSION['profile_id']),'', 'Perfil').'
          </div>
          <!-- Group -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="group" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','group','','form-control','',$this->fetchAssoc('admin_group','group_id,title',"company_id=".$_SESSION['company_id']." AND status='A' AND group_id IN (SELECT group_id FROM relation_group_profile WHERE profile_id >= ".$_SESSION['profile_id'].")","title"),'', 'Grupo').'
          </div>';
	}
	
	protected function InsertSearchButtons()
	{
		return '<!-- New User Button -->
		    	<a href="new.php"><button type="button" class="NewElementButton btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Usuario</button></a>
		    	<!-- /New User Button -->';
	}
	
	public function ConfigureSearchRequest()
	{
		$this->SetTable('admin_user AS a,admin_group AS g, relation_admin_group AS r, admin_profile AS p');
		$this->SetFields('a.*,p.title as profile, g.title as group_title');
		$this->SetWhere("a.company_id=".$_SESSION['company_id']);
		$this->AddWhereString(" AND a.profile_id = p.profile_id");
		$this->SetOrder('first_name');
		$this->SetGroupBy("a.admin_id");
		if($_SESSION['profile_id']!=333)
		{
			$this->SetWhereCondition("a.profile_id",">",$this->ProfileID);
		}
		
		foreach($_POST as $Key => $Value)
		{
			$_POST[$Key] = htmlentities($Value);
		}
		
		// if($_REQUEST['status'])
		// {
		// 	$this->SetWhereCondition("a.status","=",$_REQUEST['status']);
		// }else{
		// 	$this->SetWhereCondition("a.status","=","A");
		// }
			
		if($_POST['first_name']) $this->SetWhereCondition("a.first_name","LIKE","%".$_POST['first_name']."%");
		if($_POST['last_name']) $this->SetWhereCondition("a.last_name","LIKE","%".$_POST['last_name']."%");
		if($_POST['email']) $this->SetWhereCondition("a.email","LIKE","%".$_POST['email']."%");
		if($_POST['user']) $this->SetWhereCondition("a.user","LIKE","%".$_POST['user']."%");
		if($_POST['profile']) $this->SetWhereCondition("p.profile_id","=", $_POST['profile']);
		if($_POST['group'])
		{
			$this->AddWhereString(" AND a.admin_id = r.admin_id AND r.group_id = g.group_id AND g.group_id = ".$_POST['group']);	
		}
		if($_REQUEST['status'])
		{
			if($_POST['status']) $this->SetWhereCondition("a.status","=", $_POST['status']);
			if($_GET['status']) $this->SetWhereCondition("a.status","=", $_GET['status']);	
		}else{
			$this->SetWhereCondition("a.status","=","A");
		}
		if($_POST['view_order_field'])
		{
			if(strtolower($_POST['view_order_mode'])=="desc")
				$Mode = "DESC";
			else
				$Mode = $_POST['view_order_mode'];
			
			$Order = strtolower($_POST['view_order_field']);
			switch($Order)
			{
				case "group": 
					$this->AddWhereString(" AND a.admin_id = r.admin_id AND r.group_id = g.group_id");
					$Order = 'title';
					$Prefix = "g.";
				break;
				case "profile": 
					$Order = 'title';
					$Prefix = "p.";
				break;
				default:
					$Prefix = "a.";
				break;
			}
			$this->SetOrder($Prefix.$Order." ".$Mode);
		}
		if($_POST['regsperview'])
		{
			$this->SetRegsPerView($_POST['regsperview']);
		}
		if(intval($_POST['view_page'])>0)
			$this->SetPage($_POST['view_page']);
	}

	public function MakeList()
	{
		return $this->MakeRegs("List");
	}

	public function MakeGrid()
	{
		return $this->MakeRegs("Grid");
	}

	public function GetData()
	{
		return $this->AdminData;
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PROCESS METHODS ///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function Insert()
	{
		$Image 		= $_POST['newimage'];
		$User		= htmlentities(strtolower($_POST['user']));
		$Password	= md5(htmlentities($_POST['password']));
		$FirstName	= htmlentities(ucfirst($_POST['first_name']));
		$LastName	= htmlentities(ucfirst($_POST['last_name']));
		$Email 		= htmlentities(strtolower($_POST['email']));
		$ProfileID	= $_POST['profile'];
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		$Insert		= $this->execQuery('insert','admin_user','user,password,first_name,last_name,email,status,profile_id,img,creation_date,creator_id,company_id',"'".$User."','".$Password."','".$FirstName."','".$LastName."','".$Email."','".$Status."','".$ProfileID."','".$Image."',NOW(),".$_SESSION['admin_id'].",".$_SESSION['company_id']);
		//echo $this->lastQuery();
		$NewID 		= $this->GetInsertId();
		$New 	= new AdminData($NewID);
		$Dir 	= array_reverse(explode("/",$Image));
		if($Dir[1]!="default")
		{
			$Temp 	= $Image;
			$Image 	= $New->ImgGalDir().$Dir[0];
			copy($Temp,$Image);
		}
		$this->execQuery('update','admin_user',"img='".$Image."'","admin_id=".$NewID);
		for($i=0;$i<count($Groups);$i++)
		{
			if(intval($Groups[$i])>0)
				$Values .= !$Values? $NewID.",".$Groups[$i] : "),(".$NewID.",".$Groups[$i];
		}
		$this->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);
		$Values = "";
		for($i=0;$i<count($Menues);$i++)
		{
			if(intval($Menues[$i])>0)
				$Values .= !$Values? $NewID.",".$Menues[$i] : "),(".$NewID.",".$Menues[$i];
		}
		$this->execQuery('insert','relation_admin_menu','admin_id,menu_id',$Values);
	}
	
	public function Update()
	{
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
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		$Dir 		= array_reverse(explode("/",$Image));
		if($Dir[1]!="default" && $ID!=$this->AdminID)
		{
			$Temp 	= $Image;
			$Image 	= $Edit->ImgGalDir().$Dir[0];
			copy($Temp,$Image);
		}
		$Update		= $this->execQuery('update','admin_user',"user='".$User."'".$PasswordFilter.",first_name='".$FirstName."',last_name='".$LastName."',email='".$Email."',profile_id='".$ProfileID."',img='".$Image."'","admin_id=".$ID);
		//echo $this->lastQuery();
		$this->execQuery('delete','relation_admin_group',"admin_id = ".$ID);
		$this->execQuery('delete','relation_admin_menu',"admin_id = ".$ID);
		foreach($Groups as $Group)
		{
			if(intval($Group)>0)
				$Values .= !$Values? $ID.",".$Group : "),(".$ID.",".$Group;
		}
		$this->execQuery('insert','relation_admin_group','admin_id,group_id',$Values);
		//echo $this->lastQuery();
		$Values = "";
		foreach($Menues as $Menu)
		{
			if(intval($Menu)>0)
				$Values .= !$Values? $ID.",".$Menu : "),(".$ID.",".$Menu;
		}
		$this->execQuery('insert','relation_admin_menu','admin_id,menu_id',$Values);
	}
	
	public function Activate()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','admin_user',"status = 'A'","admin_id=".$ID);
	}
	
	public function Delete()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','admin_user',"status = 'I'","admin_id=".$ID);
	}
	
	public function Search()
	{
		$this->ConfigureSearchRequest();
		echo $this->InsertSearchResults();
	}
	
	public function Newimage()
	{
		if(count($_FILES['image'])>0)
		{
			// $Images = $Admin->UserImages(); // Para cuando se requiera limitar la cantidad de imágenes.
			$TempDir = $this->ImgGalDir();
			$Name	= "user".intval(rand()*rand()/rand())."__".$this->AdminID;
			$Img	= new FileData($_FILES['image'],$TempDir,$Name);
			echo $Img	-> BuildImage(200,200);
		}
	}
	
	public function Deleteimage()
	{
		$SRC	= $_POST['src'];
		unlink($SRC);
	}
	
	public function Validate()
	{
		$User 			= strtolower(utf8_encode($_POST['user']));
		$ActualUser 	= strtolower(utf8_encode($_POST['actualuser']));

	    if($ActualUser)
	    	$TotalRegs  = $this->numRows('admin_user','*',"user = '".$User."' AND user<> '".$ActualUser."'");
    	else
		    $TotalRegs  = $this->numRows('admin_user','*',"user = '".$User."'");
		if($TotalRegs>0) echo $TotalRegs;
	}
	
	public function Validate_email()
	{
		$Email 			= strtolower(utf8_encode($_POST['email']));
		$ActualEmail 	= strtolower(utf8_encode($_POST['actualemail']));

	    if($ActualEmail)
	    	$TotalRegs  = $this->numRows('admin_user','*',"email = '".$Email."' AND email<> '".$ActualEmail."'");
    	else
		    $TotalRegs  = $this->numRows('admin_user','*',"email = '".$Email."'");
		if($TotalRegs>0) echo $TotalRegs;
	}
	
	public function Fillgroups()
	{
		$Profile 	= $_POST['profile'];
		$Admin 		= $_POST['admin'];
        $Groups 	= new GroupData();
        echo $Groups->GetGroups($Profile,$Admin);
	}
}
?>
