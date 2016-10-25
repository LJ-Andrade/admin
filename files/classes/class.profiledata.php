<?php

class ProfileData extends DataBase
{
	var $Menues 			= array();
	var $MenuRelations 		= array();
	var $Users 				= array();
	var $Data				= array();
	var $ID;
	var $ImgGalDir			= '../../../skin/images/profiles/';

	const DEFAULTIMG		= "../../../skin/images/profiles/default/profilegen.jpg";

	public function __construct($ID=0)
	{
		$this->Connect();
		$this->ID = $ID;
		if($ID>0)
		{
			$Data 		= $this->fetchAssoc("admin_profile","*","profile_id=".$this->ID);
			$this->Data = $Data[0];
		}
	}

	public function GetDefaultImg()
	{
		return self::DEFAULTIMG;
	}
	
	public function GetImg()
	{
		if(!$this->Data['image'])
			return $this->GetDefaultImg();
		else
			return $this->Data['image'];
	}

	public function GetMenues()
	{
		if(count($this->Menues)<1)
		{
			$Relations	= $this->GetMenuRelations();
			foreach($Relations as $Relation)
			{
				$this->Menues[]	= $Relation['menu_id'];
			}
		}
		return $this->Menues;
	}

	public function GetMenuRelations()
	{
		if(!$this->MenuRelations)
			$this->MenuRelations = $this->fetchAssoc('relation_menu_profile','*',"profile_id = ".$this->ID);
		return $this->MenuRelations;
	}

	public function GetUsers()
	{
		if(!$this->Users)
			$this->Users = $this->fetchAssoc('admin_user','*',"profile_id = ".$this->ID." AND status <> 'I'");
		return $this->Users;
	}
	
	public function GetGroups()
	{
		if(!$this->Groups)
		{
			$Rs 	= $this->fetchAssoc('admin_group','*',"status = 'A' AND group_id IN (SELECT group_id FROM relation_group_profile WHERE profile_id=".$this->ID.")","title");
			$this->Groups = $Rs;
		}
		return $this->Groups;
	}
	
	public function ImgGalDir()
	{
		$Dir = $this->ImgGalDir.$this->ID.'/';
		if(!file_exists($Dir)) mkdir($Dir);
		return $Dir;
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// SEARCHLIST FUNCTIONS ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function MakeRegs($Mode="List")
	{
		$Rows	= $this->GetRegs();
		//echo $this->lastQuery();
		foreach($Rows as $Row)
		{
			$Row		= new ProfileData($Row['profile_id']);
			$ID 		= $Row->ID;
			$AllGroups	= $Row->GetGroups();
			$Groups		= '';
			foreach($AllGroups as $Group)
			{
				$Groups .= '<span class="label label-warning">'.$Group['title'].'</span> ';
			}
			if(!$Groups) $Groups = 'Ninguno';
			$Actions	= 	'<span class="roundItemActionsGroup"><a href="edit.php?id='.$ID.'"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>';
			if($Row->Data['status']=="A")
			{
				if($Row->ID!=$_SESSION['profile_id'])
				{
					$Actions	.= '<a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_'.$ID.'"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>';
					$Restrict	= '';
				}else{
					$Restrict	= ' undeleteable ';
				}
			}else{
				$Actions	.= '<a class="activateElement" process="../../library/processes/proc.common.php" id="activate_'.$ID.'"><button type="button" class="btn btnGreen"><i class="fa fa-check-circle"></i></button></a>';
			}
			$Actions	.= '</span>';
			switch(strtolower($Mode))
			{
				case "list":
					$RowBackground = $i % 2 == 0? '':' listRow2 ';
					$Regs	.= '<div class="row listRow'.$RowBackground.$Restrict.'" id="row_'.$ID.'" title="'.$Row->Data['title'].'">
									<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<img class="img-circle" src="'.$Row->Data['image'].'" alt="'.$Row->Data['title'].'">
											<span class="smallTitle">T&iacute;tulo</span>
											<span class="listTextStrong">'.$Row->Data['title'].'</span>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												'.$Groups.'
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div>'.$Actions.'</div>
									</div>
								</div>';
				break;
				case "grid":
				$Regs	.= '<li id="grid_'.$ID.'" class="RoundItemSelect roundItemBig '.$Restrict.'" title="'.$Row->Data['title'].'">
						            <div class="flex-allCenter imgSelector">
						              <div class="imgSelectorInner">
						                <img src="'.$Row->Data['image'].'" alt="'.$Row->Data['title'].'" class="img-responsive">
						                <div class="imgSelectorContent">
						                  <div class="roundItemBigActions">
						                    '.$Actions.'
						                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
						                  </div>
						                </div>
						              </div>
						              <div class="roundItemText">
						                <p><b>'.$Row->Data['title'].'</b></p>
						              </div>
						            </div>
						          </li>';
				break;
			}
        }
        if(!$Regs) $Regs.= '<div class="callout callout-info"><h4><i class="icon fa fa-info-circle"></i> No se encontraron perfiles.</h4><p>Puede crear un nuevo perfil haciendo click <a href="new.php">aqui</a>.</p></div>';
		return $Regs;
	}
	
	protected function InsertSearchField()
	{
		return '<!-- Title -->
          <div class="input-group">
            <span class="input-group-addon order-arrows sort-activated" order="title" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','title','','form-control','placeholder="T&iacute;tulo"').'
          </div>
          <!-- Group -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="group" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','group','','form-control','',$this->fetchAssoc('admin_group','group_id,title',"customer_id=".$_SESSION['customer_id']." AND status='A'","title"),'', 'Grupo').'
          </div>';
	}
	
	protected function InsertSearchButtons()
	{
		return '<!-- New User Button -->
		    	<a href="new.php"><button type="button" class="NewElementButton btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Perfil</button></a>
		    	<!-- /New User Button -->';
	}
	
	public function ConfigureSearchRequest()
	{
		$this->SetTable('admin_profile AS p,admin_group AS g, relation_group_profile AS r');
		$this->SetFields('p.*,g.title AS group_title');
		$this->SetWhere("p.customer_id = ".$_SESSION['customer_id']);
		//$this->AddWhereString(" AND a.profile_id = p.profile_id");
		$this->SetOrder('title');
		$this->SetGroupBy("p.profile_id");
		if($_SESSION['profile_id']!=333)
		{
			$this->SetWhereCondition("p.profile_id","<>","333");
		}
		
		foreach($_POST as $Key => $Value)
		{
			$_POST[$Key] = htmlentities($Value);
		}
			
		if($_POST['title']) $this->SetWhereCondition("p.title","LIKE","%".$_POST['title']."%");
		if($_POST['group'])
		{
			$this->AddWhereString(" AND p.profile_id = r.profile_id AND r.group_id = g.group_id AND g.group_id = ".$_POST['group']);	
		}
		if($_REQUEST['status'])
		{
			if($_GET['status']) $this->SetWhereCondition("p.status","=", $_GET['status']);
			else
				if($_POST['status']) $this->SetWhereCondition("p.status","=", $_POST['status']);	
		}else{
			$this->SetWhereCondition("p.status","=","A");
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
					$this->AddWhereString(" AND p.profile_id = r.profile_id AND r.group_id = g.group_id");
					$Order = 'title';
					$Prefix = "g.";
				break;
				default:
					$Prefix = "p.";
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
		return $this->Data;
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PROCESS METHODS ///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function Insert()
	{
		$Image 		= $_POST['newimage'];	
		$Title		= htmlentities(ucfirst($_POST['title']));
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		$Insert		= $this->execQuery('insert','admin_profile','customer_id,title,creation_date',$_SESSION['customer_id'].",'".$Title."',NOW()");
		$NewID 		= $this->GetInsertId();
		$New 		= new ProfileData($NewID);
		$Dir 		= array_reverse(explode("/",$Image));
		if($Dir[1]=="profile")
		{
			$Temp 	= $Image;
			if(file_exists($Image))
				unlink($Image);
			$Image 	= $New->ImgGalDir().$Dir[0];
			copy($Temp,$Image);
			
		}
		$this->execQuery('update','admin_profile',"image='".$Image."'","profile_id=".$NewID);
		
		
		foreach($Groups as $Group)
		{
			if(intval($Group)>0)
				$Values .= !$Values? $NewID.",".$Group : "),(".$NewID.",".$Group;
		}
		$this->execQuery('insert','relation_group_profile','profile_id,group_id',$Values);
		$Values = "";
		foreach($Menues as $Menu)
		{
			if(intval($Menu)>0)
				$Values .= !$Values? $NewID.",".$Menu : "),(".$NewID.",".$Menu;
		}
		$this->execQuery('insert','relation_menu_profile','profile_id,menu_id',$Values);
	}
	
	public function Update()
	{
		$ID 	= $_POST['id'];
		$Edit	= new ProfileData($ID);
		
		$Image 		= $_POST['newimage'];
		$Dir 		= array_reverse(explode("/",$Image));
		if($Dir[1]=="profile")
		{
			$Temp 	= $Image;
			if(file_exists($Image))
				unlink($Image);
			$Image 	= $Edit->ImgGalDir().$Dir[0];
			copy($Temp,$Image);
		}
		$Title		= htmlentities(ucfirst($_POST['title']));
		$Groups		= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Menues		= $_POST['menues'] ? explode(",",$_POST['menues']) : array();
		
		$Insert		= $this->execQuery('update','admin_profile',"title='".$Title."',image='".$Image."'","profile_id=".$ID);
		$this->execQuery('delete','relation_group_profile',"profile_id = ".$ID);
		$this->execQuery('delete','relation_menu_profile',"profile_id = ".$ID);
		foreach($Groups as $Group)
		{
			if(intval($Group)>0)
				$Values .= !$Values? $ID.",".$Group : "),(".$ID.",".$Group;
		}
		$this->execQuery('insert','relation_group_profile','profile_id,group_id',$Values);
		$Values = "";
		foreach($Menues as $Menu)
		{
			if(intval($Menu)>0)
				$Values .= !$Values? $ID.",".$Menu : "),(".$ID.",".$Menu;
		}
		$this->execQuery('insert','relation_menu_profile','profile_id,menu_id',$Values);
	}
	
	public function Activate()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','admin_profile',"status = 'A'","profile_id=".$ID);
	}
	
	public function Delete()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','admin_profile',"status = 'I'","profile_id=".$ID);
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
			if($_POST['newimage']!=$this->GetDefaultImg() && file_exists($_POST['newimage']))
				unlink($_POST['newimage']);
			$TempDir = $this->ImgGalDir;
			$Name	= "profile".intval(rand()*rand()/rand());
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
		$Title 			= strtolower(utf8_encode($_POST['title']));
		$ActualTitle 	= strtolower(utf8_encode($_POST['actualtitle']));

	    if($ActualTitle)
	    	$TotalRegs  = $this->numRows('admin_profile','*',"title = '".$Title."' AND title <> '".$ActualTitle."' AND customer_id = ".$_SESSION['customer_id']);
    	else
		    $TotalRegs  = $this->numRows('admin_profile','*',"title = '".$Title."' AND customer_id = ".$_SESSION['customer_id']);
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