<?php

class Menu extends DataBase
{

	//var $Menues = array();
	var $IDs 						= array();
	var $MenuData 			= array();
	var $Parents 				= array();
	var $CheckedMenues 	= array();
	var $Link 					= "";
	var $LinkTitle 			= "";
	var $LinkData 			= array();
	var $Children 			= array();

	const PROFILE		= 333;

	public function __construct($MenuID=0)
	{
		$this->Connect();
		$Data			= $MenuID>0? $this->fetchAssoc('menu','*',"menu_id = ".$MenuID) : array();
		$this->MenuData	= $Data[0];
	}

	public function GetLinkData()
	{
		if(count($this->LinkData)<1)
		{
			$Data 						= $this->fetchAssoc('menu','*',"link = '../".$this->getLink()."'");
			$this->LinkData 	= $Data[0];
			$this->LinkTitle 	= $Data[0]['title'];

		}
		return $this->LinkData;
	}

	public function GetLinkTitle()
	{
		if(!$this->LinkTitle)
		{
			$this->GetLinkData();
		}
		return $this->LinkTitle;
	}

	public function GetData()
	{
		return $this->MenuData;
	}

	public function hasChild($MenuID)
	{
		return count($this->fetchAssoc('menu','menu_id',"parent_id = ".$MenuID." AND status = 'A' AND menu_id IN (".implode(",",$this->IDs).")"))>0;
	}

	public function insertMenu($PorfileID=0,$AdminID=0)
	{
		$this->GetMenues($PorfileID,$AdminID);
		$Rows	= $this->fetchAssoc('menu','*',"parent_id = 0 AND status = 'A' AND menu_id IN (".implode(",",$this->IDs).")","position");


		foreach($Rows as $Row)
		{
			if($this->hasChild($Row['menu_id']))
			{
					$DropDown 		= '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
					$ParentClass 	= ' treeview ';
					$Link 				= '';
					$Active 			= '';
			}else{
					$DropDown 		= '';
					$ParentClass 	= '';
					$Link 				= $Row['link'];
					if('../'.$this->getLink() == $Link)
					{
						$Active 		= ' active ';
					}else{
						$Active 		= '';
					}
			}
			echo '<li class="'.$ParentClass.$Active.'"><a href="'.$Link.'" data-target="#ddmenu'.$Row['menu_id'].'"><i class="fa '.$Row['icon'].'"></i> <span>'.$Row['title'].'</span>'.$DropDown.'</a>';
				$this->insertSubMenu($Row['menu_id']);
			echo '</li>';
		}
	}

	public function insertSubMenu($Parent_id)
	{
		$Rows		= $this->fetchAssoc('menu','*',"parent_id = ".$Parent_id." AND status='A' AND menu_id IN (".implode(",",$this->IDs).")","position");
		$NumRows	= count($Rows);
		if($NumRows>0)
		{
			echo '<ul class="treeview-menu">';
			foreach($Rows as $Row)
			{
				if($this->hasChild($Row['menu_id']))
				{
						$DropDown 		= '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
						$Link 				= '';
						$Active 			= '';
				}else{
						$DropDown 		= '';
						$Link 				= $Row['link'];
						if('../'.$this->getLink() == $Link)
						{
							$Active 		= ' active ';
						}else{
							$Active 		= '';
						}
				}
				echo '<li class="'.$Active.'"><a href="'.$Link.'" data-target="#ddmenu'.$Row['menu_id'].'"><i class="fa '.$Row['icon'].'"></i> '.$Row['title'].$DropDown.'</a>';
					$this->insertSubMenu($Row['menu_id']);
				echo '</li>';
			}
			echo '</ul>';
		}
	}

	public function insertBreadCrumbs($ID=0)
	{
		if($this->getLink() == "menu/switcher.php" && $ID == 0)
		{
			$MenuID = !$_GET['id']? "0":$_GET['id'];

			$Menu = $this->fetchAssoc('menu','*'," menu_id = ".$MenuID);
		}else{
			if($ID==0)
				$Menu = $this->fetchAssoc('menu','*',"link = '../".$this->getLink()."' ");
			else
				$Menu = $this->fetchAssoc('menu','*'," menu_id = ".$ID);
		}


		$Parent = $Menu[0]['parent_id'];

		$Link = !$Menu[0]['link'] || $Menu[0]['link']=="#"?"../menu/switcher.php?id=".$ID:$Menu[0]['link'];



		if($Parent!=0) $this->insertBreadCrumbs($Parent);
		//
		// echo ' <i class="fa fa-angle-right"></i>';

		if($ID==0)
		{
			$Title = '<i class="fa '.$Menu[0]['icon'].'"></i> '.$Menu[0]['title'];
		}else{
			$Title = '<a href=""><i class="fa '.$Menu[0]['icon'].'"></i> '.$Menu[0]['title'].'</a>';
		}
		echo '<li>'.$Title.'</li>';
	}

	public function getChildren()
	{
		if(count($this->Children)<1)
		{
			$Children = $this->fetchAssoc('menu','*'," status = 'A' AND parent_id = ".$this->MenuData['menu_id']);
			foreach ($Children as $Child)
			{
				if(!$Child['link'] || $Child['link']=="#")
				{
					$Child['link'] = "../menu/switcher.php?id=".$Child['menu_id'];
				}
				$this->Children[] = $Child;
			}

		}
		return $this->Children;
	}


	public function getLink()
	{
		if(!$this->Link)
		{
			$ActualUrl  = explode("/",$_SERVER['PHP_SELF']);
			$this->Link = $ActualUrl[count($ActualUrl)-2]."/".basename($_SERVER['PHP_SELF']);

		}
		return $this->Link;
	}

	public function GetMenues($PorfileID=0,$AdminID=0)
	{
		$QueryMenues 	= array(0 => 0);
		$Menues 		= array(0 => 0);


		//$RestringedMenues		= $this->fetchAssoc('relation_menu_profile','DISTINCT(menu_id)');
		//$RestringedMenues		= $this->fetchAssoc('menu','menu_id',"public <> 'Y'");

		//$AllowedMenues 			= $this->fetchAssoc('menu m, realtion_menu_profile r, menu_exception e','DISTINCT(m.menu_id)',"m.public = 'Y' OR ()");
		if($PorfileID==self::PROFILE)
		{
			$AllowedMenues 	= $this->fetchAssoc('menu','menu_id');
		}else{
			if($PorfileID>0)
			{
				$MGroup 		= array();
				$MGroup[] 		= 0;
				$MenuGroups		= $this->fetchAssoc('relation_menu_group','menu_id',"group_id IN (SELECT group_id FROM relation_admin_group WHERE admin_id = ".$AdminID.")");

				foreach($MenuGroups as $MenuGroup)
				{
					$MGroup[] =  $MenuGroup['menu_id'];
				}
				$MenuesGroup = implode(",",$MGroup);

				$AllowedMenues 	= $this->fetchAssoc('menu','DISTINCT(menu_id)',"public = 'Y' OR menu_id IN (SELECT menu_id FROM relation_menu_profile WHERE profile_id= ".$PorfileID.") OR menu_id IN (SELECT menu_id FROM menu_exception WHERE admin_id = ".$AdminID.") OR menu_id IN (".$MenuesGroup.")");

			}else{
				$AllowedMenues 	= $this->fetchAssoc('menu','menu_id',"public = 'Y'");
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


		$PublicMenues			= $this->fetchAssoc('menu','menu_id'," menu_id NOT IN (".implode(",",$QueryMenues).") AND status = 'A'");

		foreach($PublicMenues as $PublicMenu)
		{
			$Menues[]			= $PublicMenu['menu_id'];
		}


		if($PorfileID>0)
		{

			$ProfileMenues		= $this->fetchAssoc('relation_menu_profile','DISTINCT(menu_id)',"profile_id = ".$PorfileID);

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
		$MenuRegs	= $this->fetchAssoc('menu','*',"1 = 1 ".$Where,"title",$Limit);
		$AtLeastOne	= false;
		for($i=0;$i<count($MenuRegs);$i++)
		{
			$MenuReg	=	$MenuRegs[$i];
			$Actions	= 	'<li><a href="edit.php?id='.$MenuReg['menu_id'].'" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a></li>';
			$Actions	.= 	'<li><a href="#" deleteElement="'.$MenuReg['menu_id'].'" deleteParent="menu'.$MenuReg['menu_id'].'" deleteProcess="process.php" confirmText="¿Desea eliminar el menú \''.$MenuReg['title'].'\'?" successText="\''.$MenuReg['title'].'\' ha sido eliminado correctamente" class="btndel deleteElement"><i class="fa fa-fw fa-trash"></i></a></li>';

			$Parent 	= $MenuReg['parent_id'] != 0 ? 	$this->GetParent($MenuReg['parent_id']) : 'Men&uacute; Principal';
			$Link 		= $MenuReg['link']!="#"  ? $MenuReg['link'] : 'Sin Link';
			$Public 	= $MenuReg['public'] == 'Y'? 'Público' : 'Restringido';

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

			$Regs	.= '<div id="menu'.$MenuReg['menu_id'].'" class="container-fluid glassListRow listrow listrowclick">
                         <div class="col-md-1 col-sm-3 col-xs-12 titlist1 menulistcol1">
                            <i class="fa fa-fw '.$MenuReg['icon'].' menulistico"></i>
                         </div>
                         <div class="col-md-2 col-sm-3 col-xs-3 titlist2">
                            <div class="padtoplist">
                            <p>'.$MenuReg['title'].'</p>
                            </div>
                         </div>
                         <div class="col-md-2 col-sm-2 col-xs-3 titlist3">
                            <div class="padtoplist">
                            <p>'.$Link.'</p>
                            </div>
                         </div>
                         <div class="col-md-1 col-sm-2 col-xs-3 titlist4">
                            <div class="padtoplist">
                            <p>'.$Status.'</p>
                            </div>
                         </div>
                         <div class="col-md-2 col-sm-2 col-xs-3 titlist5">
                            <div class="padtoplist">
                            <p>'.$Parent.'</p>
                            </div>
                         </div>
                         <div class="col-md-2 col-sm-12 col-xs-12 titlist6ult">
                            <div class="padtoplist">
                            	'.$Public.'
                            </div>
                         </div>
                         <div class="col-md-2 col-sm-12 col-xs-12 titlist7">
                          <div class="colprodico">
                           <div class="prodicos">
                                    <ul>
                                        '.$Actions.'
                                    </ul>
                                </div>
                            </div>
                         </div>
                    </div>';
			$AtLeastOne	= true;
        }
        if(!$AtLeastOne) $Regs	.= '<div class="RegWrapper DarkRed" id="EmptyRow" style="text-align:center;padding:40px;font-size:20px;">No hay registros.</div>';
		return $Regs;
	}

	public function GetParent($Menu_id)
	{
		$Parent = $this->fetchAssoc('menu','title','menu_id='.$Menu_id);
		return $Parent[0]['title'];
	}

	public function GetTotalRegs($Where="")
	{
		return $this->numRows('menu','*',"1 = 1 ".$Where);
	}

	public function SetCheckedMenues($CheckedMenues)
	{
		$this->CheckedMenues = $CheckedMenues;
	}

	public function GetCheckedMenues()
	{
		return $this->CheckedMenues;
	}

	public function MakeTree($Name='',$Parent=0)
	{
		$Name 	= $Name? '<div class="checkboxTitle"><h5>'.$Name.'</h5></div>':'';
		$HTML 	= '<div class="form-group checkboxDiv">'.$Name;
		$HTML 	.= $this->FillTree($Parent);
		return $HTML.'</div>';
	}

	public function FillTree($Parent=0,$Level=1)
	{
		$CheckedMenues 	= $this->GetCheckedMenues();
		$Menues			= $this->fetchAssoc('menu','*',"parent_id = ".$Parent." AND status <> 'I'","position");
		$Display 		= in_array($Parent,$CheckedMenues)? '':' style="display:none" ';
		$Parents 		= $this->GetParents();
		$HTML 			= $Parent==0? '<ul id="parent'.$Parent.'">':'<ul '.$Display.' id="parent'.$Parent.'">';
		$Level 			= $Level>3? 1:$Level;

		foreach($Menues as $Menu)
		{
			$IsParent 	= in_array($Menu['menu_id'],$Parents);

			$Arrow		= $IsParent? '<i class="fa fa-caret-down" aria-hidden="true"></i>' : '';
			if(in_array($Menu['menu_id'],$CheckedMenues))
			{
				$Checked 	= ' checked="checked" ';
				$Disabled 	= '';
			}else{
				$Disabled 	= $Parent != 0 && !in_array($Parent,$CheckedMenues)? ' disabled="disabled" ':'';
				$Checked = '';
			}

			//$HTML		.= '<li class="treeLv1">'.insertElement('checkbox','menu'.$Menu['menu_id'],$Menu['menu_id'],'CheckBox TreeCheckbox checkbox-custom','value="'.$Menu['menu_id'].'"'.$Disabled.$Checked).'<label class="checkbox-custom-label" for="menu'.$Menu['menu_id'].'"></label><span id="menu'.$Menu['menu_id'].'" '.$Arrow.' class="TreeElement"> '.$Menu['title'].'</span></li>';
			$HTML		.= '<li class="TreeElement treeLv'.$Level.'">'.insertElement('checkbox','menu'.$Menu['menu_id'],$Menu['menu_id'],'CheckBox TreeCheckbox checkbox-custom','value="'.$Menu['menu_id'].'"'.$Disabled.$Checked).'<label class="checkbox-custom-label" for="menu'.$Menu['menu_id'].'"> <i class="fa '.$Menu['icon'].'"></i> '.$Menu['title'].'</label>'.$Arrow.'</li>';
			if($IsParent)
			{
				$HTML	.= $this->FillTree($Menu['menu_id'],$Level+1);
			}
		}
		return $HTML.'</ul>';
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

}

?>
