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

		$this->SetTable('admin_user');
		$this->SetFields('*');
		$this->SetWhere("customer_id=".$_SESSION['customer_id']);
		$this->SetOrder('first_name');
	}

	public function MakeRegs($Mode="List")
	{
		if($this->ProfileID!=333)
		{
			$this->SetWhereCondition("profile_id",">",$this->ProfileID);
		}
		$Rows	= $this->GetRegs();
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
			$Actions	= 	'<a href="edit.php?id='.$Row->AdminID.'"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>';
			if($Row->AdminData['status']=="A")
			{
				if($Row->AdminID!=$_SESSION['admin_id'])
				{
					$Actions	.= '<a class="deleteElement" process="process.php" id="delete_'.$Row->AdminID.'"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>';
					$Restrict	= '';
				}else{
					$Restrict	= ' undeleteable ';
				}
			}else{
				$Actions	.= '<a class="activateElement" process="process.php" id="activate_'.$Row->AdminID.'"><button type="button" class="btn btnGreen"><i class="fa fa-check-circle"></i></button></a>';
			}

			switch(strtolower($Mode))
			{
				case "list":

					$RowBackground = $i % 2 == 0? '':' listRow2 ';
					$Regs	.= '<div class="row listRow'.$RowBackground.$Restrict.'" id="row_'.$Row->AdminID.'" title="'.$Row->FullName.'">
									<div class="col-lg-3 col-md-3 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<img class="img-circle" src="'.$Row->Img.'" alt="'.$Row->FullName.'">
											<span class="itemRowtitle">'.$Row->FullName.' ('.$Row->User.')</span>
											<span class="smallDetails">'.$Row->LastAccess.'<!--22/25/24 | 22:00Hs.--></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-3 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Email</span>
											<span class="itemRowtitle">'.$Row->Email.'</span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfil</span>
											<span class="itemRowtitle"><span class="label label-primary">'.ucfirst($Row->ProfileName).'</span></span>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Grupos</span>
											<span class="itemRowtitle">
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
					$Actions.= 	'<a href="#"><button type="button" class="btn btnGreen Hidden" name="button"><i class="fa fa-check"></i></button></a>';
					$Regs	.= '<li id="grid_'.$Row->AdminID.'" class="RoundItemSelect roundItemBig'.$Restrict.'" title="'.$Row->FullName.'">
						            <div class="flex-allCenter imgSelector">
						              <div class="imgSelectorInner">
						                <img src="'.$Row->Img.'" alt="'.$Row->FullName.'" class="img-responsive">
						                <div class="imgSelectorContent">
						                  <div class="roundItemBigActions">
						                    '.$Actions.'
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

	private function GetGroups()
	{
		// if($this->Groups){
		// 	return $this->Groups;
		// }else{
		// 	$Groups = array();
		// 	$Rs 	= $this->fetchAssoc('relation_admin_group','*',"admin_id=".$this->AdminID,"group_id");

		// 	foreach ($Rs as $Row) {
		// 		$Groups[] = $Row['group_id'];
		// 	}
		// 	$this->Groups = $Groups;
		// 	return $Groups;
		// }
		if(!$this->Groups)
		{
			$Groups = array();
			$Rs 	= $this->fetchAssoc('admin_group','*',"group_id IN (SELECT group_id FROM relation_admin_group WHERE admin_id=".$this->AdminID.")","title");
			$this->Groups = $Rs;
			return $this->Groups;
		}

	}

	public function GetImg()
	{
		return $this->Img;
	}

	public function GetProfileID()
	{
		return $this->ProfileID;
	}

	// public function GetTotalRegs($Where="",$Status="A")
	// {
	// 	return $this->numRows('admin_user','*',"status = '".$Status."' AND profile_id > ".$this->ProfileID." ".$Where);
	// }

	public function AllowedSections()
	{
		if($this->ProfileID<4)
		{
			return $this->fetchAssoc('section','section_id,title',"status='A'",'title');
		}else{
			return $this->fetchAssoc('section','section_id,title',"section_id IN (SELECT section_id FROM relation_section_admin WHERE admin_id = ".$this->AdminID.") AND status='A'",'title');
		}
	}

	public function MakeMenuList($Parent=0)
	{
		if($Parent==0)
		{
			$this->GetCheckedMenues($this->AdminID);
			$this->GetParents();
		}

		$Menues	= $this->fetchAssoc('menu','*',"parent_id = ".$Parent." AND status <> 'I'");

		foreach($Menues as $Menu)
		{
			$IsParent = in_array($Menu['menu_id'],$this->Parents);

			if(in_array($Menu['menu_id'],$this->Menues))
			{
				$Hidden 	= '';
				$Selected	= ' checked = "checked" ';
				$Arrow	= $IsParent? '<div class="Arrow ArrowLeft" id="img'.$Menu['menu_id'].'"></div>' : "";

			}else{
				$Hidden 	= ' Hidden ';
				$Selected	= '';
				$Arrow	= $IsParent? '<div class="Arrow ArrowDown" id="img'.$Menu['menu_id'].'"></div>' : "";
			}

			if($Parent!=0)$Disabled	= $this->IsDisabled($Menu['parent_id']);

			$HTML	.= '<div>'.insertElement('checkbox','menu',$Menu['menu_id'],'Left Pointer MenuCheckbox Menu'.$Menu['parent_id'],$Selected.$Disabled).'<div class="Parent Left Frutiger12px BlueCyan" id="'.$Menu['menu_id'].'">'.$Menu['title'].'</div>'.$Arrow.'<div class="Clear"></div></div>';
			if($IsParent)
			{
				$HTML	.= '<div class="ProfileChild '.$Hidden.'" id="Child'.$Menu['menu_id'].'" >';
				$HTML	.= $this->MakeMenuList($Menu['menu_id']);
				$HTML	.= "</div>";
			}
		}

		return $HTML;
	}

	public function GetCheckedMenues()
	{
		if(count($this->Menues)<1)
		{
			$Relations	= $this->fetchAssoc('menu_exception','*',"admin_id = ".$this->AdminID);
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
}
?>
