<?php

class ProfileData extends DataBase
{
	var $Menues = array();
	var $Parents = array();
	
	public function __construct()
	{
		$this->Connect();
	}
	
	public function MakeProfileList()
	{
		$Regs	= $this->fetchAssoc('admin_profile','*','profile_id>1',"title"); 
			
		foreach($Regs as $Reg)
		{
			//$AdminReg	=	new AdminData($AdminRegs[$i]['admin_id']);
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" id="edit_'.$Reg['profile_id'].'" />';
			$Actions	.= 	'<img src="../../../skin/images/body/icons/cross.png" id="delete_'.$Reg['profile_id'].'" />';
				
			$List	.= '
						<div id="profile'.$Reg['profile_id'].'" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral">
							<div class="userMainSection">
								<div class="userimgdiv"><img src="'.$Reg['img'].'" class="img-responsive userimg"></div>
								<div class="row usernamediv">
		                            <span class="usernametxt"><span class="col-sm-12">'.$Reg['title'].'</span> <span class="col-lg-12 col-sm-12 col-xs-12">('.count(self::Users($Reg['profile_id'])).' usuarios)</span></span><br>
		                            
		                        </div>
		                     </div>
		                    <div id="usericosid" class="usericos">
		                        <ul class="userButtons animated slideInUp">
		                            <li class="btnmod animated fadeIn"><a href="edit.php?id='.$Reg['profile_id'].'" ><i class="fa fa-fw fa-pencil"></i></a></li>
		                    
		                            <li class="deleteElement btndel animated fadeIn" deleteElement="'.$Reg['profile_id'].'" deleteParent="profile'.$Reg['profile_id'].'/profilelist'.$Reg['profile_id'].'" deleteProcess="process.php" confirmText="¿Desea eliminar el perfil \''.ucfirst($Reg['title']).'\'?" successText="El perfil \''.ucfirst($Reg['title']).'\' ha sido eliminado correctamente"><i class="fa fa-fw fa-trash"></i></li>
		                  
		                        </ul>                
		                    </div>
		                </div>';
        } 
			
		return $List;
	}
	
	public function MakeTree($ProfileID=1,$Parent=0)
	{
		if($Parent==0)
		{
			$this->GetCheckedMenues($ProfileID);
			$this->GetParents();
			$HTML	.= insertElement('hidden','ProfileID',$ProfileID);
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
			
			$HTML	.= '<div>'.insertElement('checkbox','menu'.$Menu['menu_id'],$Menu['menu_id'],'Left Pointer MenuCheckbox Menu'.$Menu['parent_id'],$Selected.$Disabled).'<div class="Parent Left Frutiger12px BlueCyan" id="'.$Menu['menu_id'].'">'.$Menu['title'].'</div>'.$Arrow.'<div class="Clear"></div></div>';
			if($IsParent)
			{
				$HTML	.= '<div class="ProfileChild '.$Hidden.'" id="Child'.$Menu['menu_id'].'" >';
				$HTML	.= $this->MakeTree($ProfileID,$Menu['menu_id']);
				$HTML	.= "</div>";
			}
		}
		
		return $HTML;
	}

	public function MakeNewTree($ProfileID=1,$Parent=0)
	{
		if($Parent==0)
		{
			//$this->GetCheckedMenues($ProfileID);
			//$this->GetParents();
			$HTML	.= insertElement('hidden','ProfileID',$ProfileID);
		}
		
		$Menues	= $this->fetchAssoc('menu','*',"parent_id = ".$Parent." AND status <> 'I'"); 
		
		foreach($Menues as $Menu)
		{
			$IsParent = in_array($Menu['menu_id'],$this->Parents);
			
			if(in_array($Menu['menu_id'],$this->Menues))
			{
				//$Hidden 	= '';
				//$Selected	= ' checked = "checked" ';
				$Arrow	= $IsParent? '<div class="Arrow ArrowLeft" id="img'.$Menu['menu_id'].'"></div>' : "";
				
			}else{
				//$Hidden 	= ' Hidden ';
				//$Selected	= '';
				$Arrow	= $IsParent? '<div class="Arrow ArrowDown" id="img'.$Menu['menu_id'].'"></div>' : "";
			}
			
			if($Parent!=0)$Disabled	= $this->IsDisabled($Menu['parent_id']);
			
			$HTML	.= '<div>'.insertElement('checkbox','menu'.$Menu['menu_id'],$Menu['menu_id'],'Left Pointer MenuCheckbox Menu'.$Menu['parent_id'],$Disabled).'<div class="Parent Left Frutiger12px BlueCyan" id="'.$Menu['menu_id'].'">'.$Menu['title'].'</div>'.$Arrow.'</div>';
			if($IsParent)
			{
				$HTML	.= '<div class="ProfileChild '.$Hidden.'" id="Child'.$Menu['menu_id'].'" >';
				$HTML	.= $this->MakeNewTree($ProfileID,$Menu['menu_id']);
				$HTML	.= "</div>";
			}
		}
		
		return $HTML;
	}
	
	
	public function GetCheckedMenues($ProfileID)
	{
		$Relations	= $this->fetchAssoc('relation_menu_profile','*',"profile_id = ".$ProfileID);
		foreach($Relations as $Relation)
		{
			$this->Menues[]	= $Relation['menu_id'];
		}
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
	
	public function GetRelations($ProfileID)
	{
		return $this->fetchAssoc('relation_menu_profile','*',"profile_id = ".$ProfileID);
	}
	
	public function Users($ProfileID)
	{
		return $this->fetchAssoc('admin_user','*',"profile_id = ".$ProfileID." AND status <> 'I'");
		
	}
	
}


?>