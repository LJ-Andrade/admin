<?php

class ProfileData extends DataBase
{
	var $Menues 	= array();
	var $Parents 	= array();
	var $Users 		= array();
	var $Relations 	= array();
	var $Data 		= array();
	var $ID;
	
	public function __construct($ProfileID=0)
	{
		$this->Connect();
		$this->ID = $ProfileID;
		$this->GetData();
	}
	
	public function GetData()
	{
		if(count($this->Data)<1)
		{
			$Data 		= $this->fetchAssoc("admin_profile","*","profile_id=".$this->ID);
			$this->Data = $Data[0];
		}
		return $this->Data;
	}

	public function MakeProfileList()
	{
		$Regs	= $this->fetchAssoc('admin_profile','*','profile_id>1',"title"); 
			
		foreach($Regs as $Reg)
		{
			$Profile	=	new ProfileData($Reg['profile_id']);
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" id="edit_'.$Reg['profile_id'].'" />';
			$Actions	.= 	'<img src="../../../skin/images/body/icons/cross.png" id="delete_'.$Reg['profile_id'].'" />';
				
			$List	.= '
						<div id="profile'.$Reg['profile_id'].'" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral">
							<div class="userMainSection">
								<div class="userimgdiv"><img src="'.$Reg['image'].'" class="img-responsive userimg"></div>
								<div class="row usernamediv">
		                            <span class="usernametxt"><span class="col-sm-12">'.$Reg['title'].'</span> <span class="col-lg-12 col-sm-12 col-xs-12">('.count($Profile->GetUsers()).' usuarios)</span></span><br>
		                            
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
	
	public function MakeTree($Parent=0)
	{
		$CheckedMenues 	= $this->GetCheckedMenues();
		$Menues			= $this->fetchAssoc('menu','*',"parent_id = ".$Parent." AND status <> 'I'"); 
		$Display 		= in_array($Parent,$CheckedMenues)? '':'display:none;';
		$HTML 			= $Parent == 0? '<ul>': '<ul style="margin-left:1em;'.$Display.'" id="parent'.$Parent.'">';
		$Parents 		= $this->GetParents();

		foreach($Menues as $Menu)
		{
			$IsParent 	= in_array($Menu['menu_id'],$Parents);
			
			$Arrow		= $IsParent? ' style="cursor:pointer;" ' : '';
			if(in_array($Menu['menu_id'],$CheckedMenues))
			{
				$Checked 	= ' checked="checked" ';
				$Disabled 	= '';
			}else{
				$Disabled 	= $Parent != 0 && !in_array($Parent,$CheckedMenues)? ' disabled="disabled" ':'';
				$Checked = '';
			}

			$HTML		.= '<li>'.insertElement('checkbox','menu',$Menu['menu_id'],'TreeCheckbox','value="'.$Menu['menu_id'].'"'.$Disabled.$Checked).'<span id="menu'.$Menu['menu_id'].'" '.$Arrow.' class="TreeElement"> '.$Menu['title'].'</span></li>';
			if($IsParent)
			{
				$HTML	.= $this->MakeTree($Menu['menu_id']);
			}
		}
		
		return $HTML.'</ul>';
	}

	public function MakeNewTree($Parent=0)
	{	
		$Menues	= $this->fetchAssoc('menu','*',"parent_id = ".$Parent." AND status <> 'I'"); 
		$HTML 	= $Parent == 0? '<ul>': '<ul style="margin-left:1em;display:none;" id="parent'.$Parent.'">';

		foreach($Menues as $Menu)
		{
			$Parents 	= $this->GetParents();
			$IsParent 	= in_array($Menu['menu_id'],$Parents);
			
			$Arrow		= $IsParent? ' style="cursor:pointer;" ' : '';
			$Disabled 	= $Parent != 0? ' disabled="disabled" ':'';
			
			$HTML	.= '<li>'.insertElement('checkbox','menu',$Menu['menu_id'],'TreeCheckbox','value="'.$Menu['menu_id'].'"'.$Disabled).'<span id="menu'.$Menu['menu_id'].'" '.$Arrow.' class="TreeElement"> '.$Menu['title'].'</span></li>';
			if($IsParent)
			{
				$HTML	.= $this->MakeNewTree($Menu['menu_id']);
			}
		}
		
		return $HTML.'</ul>';
	}
	
	
	public function GetCheckedMenues()
	{
		if(count($this->Menues)<1)
		{
			$Relations	= $this->GetRelations();
			foreach($Relations as $Relation)
			{
				$this->Menues[]	= $Relation['menu_id'];
			}
		}
		return $this->Menues;
	}
	
	public function GetParents()
	{
		if(count($this->Parents)<1)
		{
			$Parents	= $this->fetchAssoc('menu','DISTINCT(parent_id)',"parent_id <> 0 AND status <> 'I'");
			foreach($Parents as $Parent)
			{
				$this->Parents[] = $Parent['parent_id'];
			}
		}
		return $this->Parents;
	}
	
	public function IsDisabled($ParentID)
	{
		return in_array($ParentID,$this->Menues) ? '' : ' disabled="disabled" ';
	}
	
	public function GetRelations()
	{
		if(!$this->Relations)
			$this->Relations = $this->fetchAssoc('relation_menu_profile','*',"profile_id = ".$this->ID);
		return $this->Relations;
	}

	public function MoveImage($New,$Temp,$Old='')
	{
		$Tmp = array_reverse(explode("/", $Temp));
		if(file_exists($Old)) unlink($Old);
		if(file_exists($Temp))
		{
			copy($Temp, $New);
			unlink($Temp);
		}
		return file_exists($New);
	}
	
	public function GetUsers()
	{	
		if(!$this->Users)
			$this->Users = $this->fetchAssoc('admin_user','*',"profile_id = ".$this->ID." AND status <> 'I'");
		return $this->Users;
	}
	
}


?>