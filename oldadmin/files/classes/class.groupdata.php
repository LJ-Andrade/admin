<?php

class GroupData extends DataBase
{
	var $Profiles 	= array();
	var $Menues 	= array();
	var $Users 		= array();
	var $Relations 	= array();
	var $RelationsProfiles 	= array();
	var $Data 		= array();
	var $AdminID;
	var $ID;
	var $Icon;

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
			$Profile 	= new ProfileData();
			$Actions	= 	'<img src="../../../skin/images/body/icons/pencil.png" id="edit_'.$ID.'" />';
			$Actions	.= 	'<img src="../../../skin/images/body/icons/cross.png" id="delete_'.$ID.'" />';

			$List	.= '<div id="group'.$ID.'" class="col-centered col-lg-3 col-sm-6 col-xs-12 animated fadeIn usergral">
							<div class="userMainSection">
								<div class="userimgdiv"><img src="'.$Reg['image'].'" class="img-responsive userimg"></div>
								<div class="row usernamediv">
		                            <span class="usernametxt"><span class="col-sm-12">'.$Title.'</span> <span class="col-lg-12 col-sm-12 col-xs-12">('.count($Group->GetUsers()).' usuarios)</span><span class="col-lg-12 col-sm-12 col-xs-12">('.count($Profile->GetCheckedProfiles($ID)).' perfiles)</span></span><br>

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

	public function GetCheckedGroups()
	{
		if($this->AdminID!=0)
		{
			if(count($this->Groups)<1)
			{
				$Relations	= $this->GetRelationsGroup();
				foreach($Relations as $Relation)
				{
					$this->Groups[]	= $Relation['group_id'];
				}
			}
		}else{
			$this->Groups = array();	
		}
		return $this->Groups;
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

	public function GetRelationsGroup()
	{
		
		if(!$this->RelationsProfiles)
			$this->RelationsProfiles = $this->fetchAssoc('relation_admin_group','*',"admin_id = ".$this->AdminID);
		//echo $this->lastQuery();
		return $this->RelationsProfiles;
	}

	public function GetUsers()
	{
		if(!$this->Users)
			$this->Users = $this->fetchAssoc('admin_user','*',"admin_id IN (SELECT admin_id FROM relation_admin_group WHERE group_id=".$this->ID.") AND status <> 'I'");
		return $this->Users;
	}

	public function GroupTree($ProfileID=0,$AdminID=0)
	{
		$HTML 				= '<div class="form-group checkboxDiv"><div class="checkboxTitle"><h5>Grupos Asociados</h5></div><ul>';
		if($ProfileID!=0)
		{
			$this->AdminID 	= $AdminID;
			$CheckedGroups 	= $this->GetCheckedGroups();
			$Groups			= $this->fetchAssoc('admin_group','*',"group_id IN (SELECT group_id FROM relation_group_profile WHERE profile_id = ".$ProfileID.")","title");			

			foreach($Groups as $Group)
			{
				if($CheckedGroups && in_array($Group['group_id'],$CheckedGroups))
				{
					$Checked 	= ' checked="checked" ';
				}else{
					$Checked = '';
				}

				$HTML		.= '<li class="treeLv1">'.insertElement('checkbox','group'.$Group['group_id'],$Group['group_id'],'checkbox-custom GroupCheckbox CheckBox','value="'.$Group['group_id'].'"'.$Checked).'<label class="checkbox-custom-label" for="group'.$Group['group_id'].'"> <i class="fa fa-users"></i> '.$Group['title'].'</label></li>';
			}
		}else{
			$HTML		.= '<li class="treeLv1">No hay grupos asociados a este perfil<li>';
		}
		return $HTML.'</ul></div>';
	}

}


?>
