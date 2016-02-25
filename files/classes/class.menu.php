<?php

class Menu extends DataBase
{
	
	//var $Menues = array();
	var $IDs 		= array();
	var $MenuData 	= array();

	const PROFILE		= 333;
	
	public function __construct($MenuID=0)
	{
		$this->Connect();
		$Data			= $MenuID>0? $this->fetchAssoc('select','menu','*',"menu_id = ".$MenuID) : array();
		$this->MenuData	= $Data[0];
	}

	public function GetData()
	{
		return $this->MenuData;
	}

	public function hasChild($MenuID)
	{
		return count($this->fetchAssoc('select','menu','menu_id',"parent_id = ".$MenuID." AND status = 'A' AND menu_id IN (".implode(",",$this->IDs).")"))>0;
	}
	
	public function insertMenu($PorfileID=0,$AdminID=0)
	{
		$this->GetMenues($PorfileID,$AdminID);
		$Rows	= $this->fetchAssoc('select','menu','*',"parent_id = 0 AND status = 'A' AND menu_id IN (".implode(",",$this->IDs).")","position");
		
		echo '<div class="collapse navbar-collapse navbar-ex1-collapse"><ul class="navimgback nav navbar-nav side-nav">';
		foreach($Rows as $Row)
		{
			$DropDown = $this->hasChild($Row['menu_id'])? '<i class="fa fa-fw fa-angle-down "></i>' : '';
			echo '<li><a href="'.$Row['link'].'" data-toggle="collapse" data-target="#ddmenu'.$Row['menu_id'].'"><i class="fa fa-fw '.$Row['icon'].'"></i> '.$Row['title'].$DropDown.'</a>';
			$this->insertSubMenu($Row['menu_id']);
			echo '</li>';
			
		}
		echo '</ul></div>';
	}
	
	public function insertSubMenu($Parent_id)
	{
		$Rows		= $this->fetchAssoc('select','menu','*',"parent_id = ".$Parent_id." AND status='A' AND menu_id IN (".implode(",",$this->IDs).")","position");
		$NumRows	= count($Rows);
		if($NumRows>0)
		{
			echo '<ul id="ddmenu'.$Parent_id.'" class="collapse sideddmenu">';
			foreach($Rows as $Row)
			{
				$DropDown = $this->hasChild($Row['menu_id'])? '<i class="fa fa-fw fa-angle-down "></i>' : '';
				echo '<li><a href="'.$Row['link'].'" data-toggle="collapse" data-target="#ddmenu'.$Row['menu_id'].'"><i class="fa fa-fw '.$Row['icon'].'"></i> '.$Row['title'].$DropDown.'</a>';
				$this->insertSubMenu($Row['menu_id']);
				echo '</li>';
			}
			echo '</ul>';
		}
	}
	
	public function GetMenues($PorfileID=0,$AdminID=0)
	{
		$QueryMenues 	= array(0 => 0);
		$Menues 		= array(0 => 0);
		
		
		//$RestringedMenues		= $this->fetchAssoc('select','relation_menu_profile','DISTINCT(menu_id)');
		//$RestringedMenues		= $this->fetchAssoc('select','menu','menu_id',"public <> 'Y'");

		//$AllowedMenues 			= $this->fetchAssoc('select','menu m, realtion_menu_profile r, menu_exception e','DISTINCT(m.menu_id)',"m.public = 'Y' OR ()");
		if($PorfileID==self::PROFILE)
		{
			$AllowedMenues 	= $this->fetchAssoc('select','menu','menu_id');
		}else{
			if($PorfileID>0)
			{	
				$MGroup 		= array();
				$MGroup[] 		= 0;
				$MenuGroups		= $this->fetchAssoc('select','relation_menu_group','menu_id',"group_id IN (SELECT group_id FROM relation_admin_group WHERE admin_id = ".$AdminID.")");
				
				foreach($MenuGroups as $MenuGroup)
				{
					$MGroup[] =  $MenuGroup['menu_id'];
				}
				$MenuesGroup = implode(",",$MGroup);
			
				$AllowedMenues 	= $this->fetchAssoc('select','menu','DISTINCT(menu_id)',"public = 'Y' OR menu_id IN (SELECT menu_id FROM relation_menu_profile WHERE profile_id= ".$PorfileID.") OR menu_id IN (SELECT menu_id FROM menu_exception WHERE admin_id = ".$AdminID.") OR menu_id IN (".$MenuesGroup.")");
				
			}else{
				$AllowedMenues 	= $this->fetchAssoc('select','menu','menu_id',"public = 'Y'");
			}
		}

		foreach($AllowedMenues as $Menu)
		{
			$Menues[]			= $Menu['menu_id'];
		}
		
		/*
		foreach($RestringedMenues as $RestringedMenu)
		{
			$QueryMenues[]		= $RestringedMenu['menu_id'];
		}
		
		
		$PublicMenues			= $this->fetchAssoc('select','menu','menu_id'," menu_id NOT IN (".implode(",",$QueryMenues).") AND status = 'A'");
		
		foreach($PublicMenues as $PublicMenu)
		{
			$Menues[]			= $PublicMenu['menu_id'];
		}
		
		
		if($PorfileID>0)
		{
			
			$ProfileMenues		= $this->fetchAssoc('select','relation_menu_profile','DISTINCT(menu_id)',"profile_id = ".$PorfileID);
				
			foreach($ProfileMenues as $ProfileMenu)
			{
				$Menues[]			= $ProfileMenu['menu_id'];
			}
		}*/
		
		$this->IDs		= $Menues;
	}


	public function MakeList($From=-1, $To=-1,$Where="")
	{	

		$Limit = $From>=0 && $To>=0 ? $From.",".$To : "";
		$MenuRegs	= $this->fetchAssoc('select','menu','*',"1 = 1 ".$Where,"title",$Limit); 
		$AtLeastOne	= false;
		for($i=0;$i<count($MenuRegs);$i++)
		{
			$MenuReg	=	$MenuRegs[$i];
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" action="edit" class="actionImg" target="edit.php" id="menu_'.$MenuReg['menu_id'].'" />';
			$Actions	.= 	'<img src="../../../skin/images/body/icons/cross.png" action="delete" class="actionImg" process="process.abm.php" id="menu_'.$MenuReg['menu_id'].'" />';
			
			$Parent 	= $MenuReg['parent_id'] != 0 ? 	$this->GetParent($MenuReg['parent_id']) : 'Sin Padre';
			$Link 		= $MenuReg['link'] && $MenuReg['link']!="#"  ? $MenuReg['link'] : 'Sin Link';

			switch(strtoupper($MenuReg['status']))
			{
				case 'A':
					$Status = 'Activo';
				break;
				case 'I':
					$Status = 'Inactivo';
				break;
				case 'O':
					$Status = 'Oculto';
				break;
			}			

			$Regs	.= '<div class="RegWrapper BlackGray" id="Row'.$MenuReg['menu_id'].'">
							<div class="ImgWrapperMenu Left"><img src="../../../skin/images/body/icons/menu_icon.png" /></div>
							<div class="DataWrapper Left">
								<div class="BlueCyan">'.$MenuReg['title'].'</div>
								<div>'.$Parent.'</div>
								<div>'.$Link.'</div>
							</div>
							<div class="InfoWrapper Left">Estado: '.$Status.'</div>
							<div class="ActionsWrapper Right">'.$Actions.'</div>
							<div class="Clear"></div>
						</div>';  
			$AtLeastOne	= true;
        } 
        if(!$AtLeastOne) $Regs	.= '<div class="RegWrapper DarkRed" id="EmptyRow" style="text-align:center;padding:40px;font-size:20px;">No hay registros.</div>';
		return $Regs;
	}

	public function GetParent($Menu_id)
	{
		$Parent = $this->fetchAssoc('select','menu','title','menu_id='.$Menu_id);
		return $Parent[0]['title'];	
	}

	public function GetTotalRegs($Where="")
	{
		return $this->numRows('select','menu','*',"1 = 1 ".$Where);
	}

}

?>