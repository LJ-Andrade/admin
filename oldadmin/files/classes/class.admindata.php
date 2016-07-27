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
	var	$Img;
	var $AdminData;
	var $DefaultImg	= '../../../skin/images/users/default/default.jpg';
	var $DefaultImgDir = '../../../skin/images/users/default';
	var $ImgGalDir = '../../../skin/images/users/';
	var $LastAccess;
	var $Where 			= "";
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
		$this->ProfileID	= $this->AdminData['profile_id'];
		$this->Img			= file_exists($this->AdminData['img'])? $this->AdminData['img'] : $this->DefaultImg;
		$this->FullName		= $this->FirstName." ".$this->LastName;
		$this->FullUserName	= $this->FirstName." ".$this->LastName." (".$this->User.")";
		$this->LastAccess	= "&Uacute;ltimo acceso: ".DateTimeFormat($this->AdminData['last_access']);
		$ProfileData		= $this->fetchAssoc('admin_profile','*'," profile_id = ".$this->ProfileID);
		$this->ProfileName	= $ProfileData[0]['title'];
	}
	
	public function MakeList($From=-1, $To=-1,$Where="")
	{	

		$Limit = $From>=0 && $To>=0 ? $From.",".$To : "";
		$AdminRegs	= $this->fetchAssoc('admin_user','*',"status = 'A' AND profile_id > ".$this->ProfileID." ".$Where,"first_name",$Limit); 
		$AtLeastOne	= false;
		for($i=0;$i<count($AdminRegs);$i++)
		{
			$AdminReg	=	new AdminData($AdminRegs[$i]['admin_id']);
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" action="edit" class="actionImg" target="edit.php" id="admin_'.$AdminReg->AdminID.'" />';
			$Actions	.= 	$AdminRegs[$i]['admin_id']!=$_SESSION['admin_id'] ? '<img src="../../../skin/images/body/icons/cross.png" class="actionImg" action="delete" process="process.abm.php" id="admin_'.$AdminReg->AdminID.'" />': '' ;
				
			$Regs	.= '<div class="RegWrapper BlackGray" id="Row'.$AdminReg->AdminID.'">
							<div class="ImgWrapper Left"><img src="'.$AdminReg->Img.'" /></div>
							<div class="DataWrapper Left">
								<div class="BlueCyan">'.$AdminReg->User.'</div>
								<div>'.$AdminReg->FullName.'</div>
								<div class="Green">'.$AdminReg->ProfileName.'</div>
							</div>
							<div class="InfoWrapper Left">'.$AdminReg->LastAccess.'</div>
							<div class="ActionsWrapper Right">'.$Actions.'</div>
							<div class="Clear"></div>
						</div>';  
			$AtLeastOne	= true;
        } 
        if(!$AtLeastOne) $Regs	.= '<div class="RegWrapper DarkRed" id="EmptyRow" style="text-align:center;padding:40px;font-size:20px;">No hay registros.</div>';
		return $Regs;
	}

	public function MakeListInactive($From=-1, $To=-1,$Where="")
	{	

		$Limit = $From>=0 && $To>=0 ? $From.",".$To : "";
		$AdminRegs	= $this->fetchAssoc('admin_user','*',"status = 'I' AND profile_id > ".$this->ProfileID." ".$Where,"first_name",$Limit); 
		$AtLeastOne	= false;
		for($i=0;$i<count($AdminRegs);$i++)
		{
			$AdminReg	=	new AdminData($AdminRegs[$i]['admin_id']);
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" action="edit" class="actionImg" target="edit.php" id="admin_'.$AdminReg->AdminID.'" />';
			$Actions	.= 	$AdminRegs[$i]['admin_id']!=$_SESSION['admin_id'] ? '<img src="../../../skin/images/body/icons/cross.png" class="actionImg" action="delete" process="process.abm.php" id="admin_'.$AdminReg->AdminID.'" />': '' ;
				
			$Regs	.= '<div class="RegWrapper BlackGray" id="Row'.$AdminReg->AdminID.'">
							<div class="ImgWrapper Left"><img src="'.$AdminReg->Img.'" /></div>
							<div class="DataWrapper Left">
								<div class="BlueCyan">'.$AdminReg->User.'</div>
								<div>'.$AdminReg->FullName.'</div>
								<div class="Green">'.$AdminReg->ProfileName.'</div>
							</div>
							<div class="InfoWrapper Left">'.$AdminReg->LastAccess.'</div>
							<div class="ActionsWrapper Right">'.$Actions.'</div>
							<div class="Clear"></div>
						</div>';  
			$AtLeastOne	= true;
        } 
        if(!$AtLeastOne) $Regs	.= '<div class="RegWrapper DarkRed" id="EmptyRow" style="text-align:center;padding:40px;font-size:20px;">No hay registros.</div>';
		return $Regs;
	}

	public function GetData()
	{
		return $this->AdminData;
	}

	public function GetGroups()
	{
		if($this->Groups){
			return $this->Groups;
		}else{
			$Groups = array();
			$Rs 	= $this->fetchAssoc('relation_admin_group','*',"admin_id=".$this->AdminID,"group_id");
			
			foreach ($Rs as $Row) {
				$Groups[] = $Row['group_id'];
			}
			$this->Groups = $Groups;
			return $Groups;
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
	
	public function GetTotalRegs($Where="",$Status="A")
	{
		return $this->numRows('admin_user','*',"status = '".$Status."' AND profile_id > ".$this->ProfileID." ".$Where);
	}

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
					$this->DefaultImages[] = $Image;
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
					$this->UserImages[] = $Image;
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

	public function CleanTmpImgDir()
	{
		$Images = $this->DefaultImages($this->ImgGalDir());
		foreach($Imgaes as $Image)
		{
			$Img = $this->ImgGalDir().$Image;
			if(file_exists($Img)) unlink($Img);
		}
	}

	public function AllImages()
	{
		$Images = array();
		foreach($this->DefaultImages() as $Image)
		{
			$Images[] = $this->DefaultImgDir.'/'.$Image;
		}
		foreach ($this->UserImages() as $Image)
		{
        	$Images[] = $this->ImgGalDir().$Image;
        }
        return $Images;
	}
}
?>