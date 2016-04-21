<?php

class GroupData extends DataBase
{
	var $Profiles 	= array();
	var $Menues 	= array();
	var $Users 		= array();
	var $Relations 	= array();
	var $RelationsProfiles 	= array();
	var $Data 		= array();
	var $ID;

	const DEFAULTIMG		= "../../../skin/images/body/pictures/usergen.png";

	public function __construct($ID=0)
	{
		$this->Connect();
		$this->ID = $ID;
		$this->GetData();
	}

	public function GetDefaultImg()
	{
		return self::DEFAULTIMG;
	}

	public function GetData()
	{
		if(count($this->Data)<1)
		{
			$Data 		= $this->fetchAssoc("admin_group","*","group_id=".$this->ID);
			$this->Data = $Data[0];
		}
		return $this->Data;
	}

	public function MakeList()
	{
		$Regs	= $this->fetchAssoc('admin_group','*',"status<>'I'","title");

		foreach($Regs as $Reg)
		{
			$ID 		= $Reg['group_id'];
			$Title 		= $Reg['title'];
			$Group		= new GroupData($ID);
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" id="edit_'.$ID.'" />';
			$Actions	.= 	'<img src="../../../skin/images/body/icons/cross.png" id="delete_'.$ID.'" />';

			$List	.= '<div id="group'.$ID.'" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral">
							<div class="userMainSection">
								<div class="userimgdiv"><img src="'.$Reg['image'].'" class="img-responsive userimg"></div>
								<div class="row usernamediv">
		                            <span class="usernametxt"><span class="col-sm-12">'.$Title.'</span> <span class="col-lg-12 col-sm-12 col-xs-12">('.count($Group->GetUsers()).' usuarios)</span><span class="col-lg-12 col-sm-12 col-xs-12">('.count($Group->GetCheckedProfiles()).' perfiles)</span></span><br>

		                        </div>
		                     </div>
		                    <div id="usericosid" class="usericos">
		                        <ul class="userButtons animated slideInUp">
		                            <li class="btnmod animated fadeIn"><a href="edit.php?id='.$ID.'" ><i class="fa fa-fw fa-pencil"></i></a></li>

		                            <li class="deleteElement btndel animated fadeIn" deleteElement="'.$ID.'" deleteParent="group'.$ID.'/grouplist'.$ID.'" deleteProcess="process.php" confirmText="¿Desea eliminar el grupo \''.ucfirst($Title).'\'?" successText="El grupo \''.ucfirst($Title).'\' ha sido eliminado correctamente"><i class="fa fa-fw fa-trash"></i></li>

		                        </ul>
		                    </div>
		                </div>';
        }

		return $List;
	}

	public function GetCheckedProfiles()
	{
		if(count($this->Profiles)<1)
		{
			$Relations	= $this->GetRelationsProfile();
			foreach($Relations as $Relation)
			{
				$this->Profiles[]	= $Relation['profile_id'];
			}
		}
		return $this->Profiles;
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

	public function GetRelations()
	{
		if(!$this->Relations)
			$this->Relations = $this->fetchAssoc('relation_menu_group','*',"group_id = ".$this->ID);
		return $this->Relations;
	}

	public function GetRelationsProfile()
	{
		if(!$this->RelationsProfiles)
			$this->RelationsProfiles = $this->fetchAssoc('relation_group_profile','*',"group_id = ".$this->ID);
		return $this->RelationsProfiles;
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
			$this->Users = $this->fetchAssoc('admin_user','*',"admin_id IN (SELECT admin_id FROM relation_admin_group WHERE group_id=".$this->ID.") AND status <> 'I'");
		return $this->Users;
	}

	public function ProfileTree()
	{
		$CheckedProfiles 	= $this->GetCheckedProfiles();
		$Profiles			= $this->fetchAssoc('admin_profile','*',"status <> 'I'","title");
		$HTML 				= '<ul>';

		foreach($Profiles as $Profile)
		{
			if(in_array($Profile['profile_id'],$CheckedProfiles))
			{
				$Checked 	= ' checked="checked" ';
			}else{
				$Checked = '';
			}

			$HTML		.= '<li>'.insertElement('checkbox','profile'.$Profile['profile_id'],$Profile['profile_id'],'ProfileCheckbox checkbox-custom','value="'.$Profile['profile_id'].'"'.$Checked).'<label class="checkbox-custom-label" for="profile'.$Profile['profile_id'].'"></label><span id="profile'.$Profile['profile_id'].'" class=""> '.$Profile['title'].'</span></li>';
		}

		return $HTML.'</ul>';
	}

}


?>
