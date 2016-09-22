<?php

class Menu extends DataBase
{
	var $IDs 				= array();
	var $MenuData 			= array();
	var $Parents 			= array();
	var $CheckedMenues 		= array();
	var $Link 				= "";
	var $Children 			= array();
	var $Groups 			= array();
	var $Profiles 			= array();
	const PROFILE			= 333;

	public function __construct($MenuID=0)
	{
		$this->Connect();
		if($MenuID>0)
		{
			$Data	= $this->fetchAssoc('menu','*',"menu_id = ".$MenuID);
			$this->MenuData	= $Data[0];
		}else{
			$this->MenuData	= $this->GetLinkData();
		}
		$this->SetTable('menu');
		$this->SetFields('*');
		//$this->SetWhere("customer_id=".$_SESSION['customer_id']);
		$this->SetOrder('title');
	}

	public function GetLinkData()
	{
		if(count($this->MenuData)<1)
		{
			$Data 				= $this->fetchAssoc('menu','*',"link = '../".$this->getLink()."'");
			$this->MenuData 	= $Data[0];

		}
		return $this->MenuData;
	}

	public function GetTitle()
	{
		return $this->MenuData['title'];
	}
	
	public function GetHTMLicon()
	{
		return '<i class="icon fa '.$this->MenuData['icon'].'"></i>';
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
			echo '<li class="'.$ParentClass.$Active.'"><a href="'.$Link.'" data-target="#ddmenu'.$Row['menu_id'].'" class="faa-parent animated-hover"><i class="fa '.$Row['icon'].' faa-tada"></i> <span>'.$Row['title'].'</span>'.$DropDown.'</a>';
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
				echo '<li class="'.$Active.'"><a href="'.$Link.'" data-target="#ddmenu'.$Row['menu_id'].'" class="faa-parent animated-hover"><i class="fa '.$Row['icon'].' faa-tada"></i> '.$Row['title'].$DropDown.'</a>';
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
			$Title = '<a href="'.$Link.'"><i class="fa '.$Menu[0]['icon'].'"></i> '.$Menu[0]['title'].'</a>';
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

		$this->IDs		= $Menues;
	}
	
	public function GetGroups()
	{
		if(!$this->Groups)
		{
			$Rs 	= $this->fetchAssoc('admin_group','*',"group_id IN (SELECT group_id FROM relation_menu_group WHERE menu_id=".$this->MenuData['menu_id'].")","title");
			$this->Groups = $Rs;
			return $this->Groups;
		}
	}
	
	public function GetProfiles()
	{
		if(!$this->Profiles)
		{
			$Rs 	= $this->fetchAssoc('admin_profile','*',"profile_id IN (SELECT profile_id FROM relation_menu_profile WHERE menu_id=".$this->MenuData['menu_id'].")","title");
			$this->Profiles = $Rs;
			return $this->Profiles;
		}
	}
	
	public function MakeList()
	{
		return $this->MakeRegs('list');
	}
	
	public function MakeGrid()
	{
		return $this->MakeRegs('grid');
	}

	public function MakeRegs($Mode='list')
	{
		$Rows	= $this->GetRegs();
		
		for($i=0;$i<count($Rows);$i++)
		{
			$Row	=	new Menu($Rows[$i]['menu_id']);
			$MenuGroups = $Row->GetGroups();
			$Groups = '';
			foreach($MenuGroups as $Group)
			{
				$Groups .= '<span class="label label-warning">'.$Group['title'].'</span> ';
			}
			if(!$Groups) $Groups = 'Ninguno';
			$MenuProfiles = $Row->GetProfiles();
			$Profiles = '';
			foreach($MenuProfiles as $Profile)
			{
				$Profiles .= '<span class="label label-primary">'.$Profile['title'].'</span> ';
			}
			if(!$Profiles) $Profiles = 'Ninguno';
			
			$Actions	= 	'<a href="edit.php?id='.$Row->MenuData['menu_id'].'"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>';
			if($Row->MenuData['status']!="I")
			{
				
				$Actions	.= '<a class="deleteElement" process="process.php" id="delete_'.$Row->MenuData['menu_id'].'"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>';
				
			}else{
				$Actions	.= '<a class="activateElement" process="process.php" id="activate_'.$Row->MenuData['menu_id'].'"><button type="button" class="btn btnGreen"><i class="fa fa-check-circle"></i></button></a>';
			}
			
			if($Row->MenuData['link']=="#")
				$Row->MenuData['link'] = "";
				
			if($Row->MenuData['public']=='Y')
				$Row->MenuData['public'] = 'P&uacute;blico';
			else
				$Row->MenuData['public'] = 'Privado';

			switch(strtolower($Mode))
			{
				case "list":

					$RowBackground = $i % 2 == 0? '':' listRow2 ';
					$Regs	.= '<div class="row listRow'.$RowBackground.'" id="row_'.$Row->MenuData['menu_id'].'" title="'.$Row->MenuData['title'].'">
									<div class="col-lg-1 col-md-1 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa '.$Row->MenuData['icon'].'" alt="'.$Row->MenuData['title'].'"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-3 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">'.$Row->MenuData['title'].'</span>
											<span class="smallDetails">'.$Row->MenuData['link'].'</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Tipo de Men&uacute;</span>
											<span class="itemRowtitle">'.$Row->MenuData['public'].'</span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											'.$Profiles.'
											</span>
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
					$Regs	.= '<li id="grid_'.$Row->MenuData['menu_id'].'" class="RoundItemSelect roundItemBig" title="'.$Row->MenuData['title'].'">
						            <div class="flex-allCenter imgSelector">
						              <div class="imgSelectorInner">
						                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="'.$Row->MenuData['title'].'" class="img-responsive">
						                <div class="imgSelectorContent">
						                  <div class="roundItemBigActions">
						                    '.$Actions.'
						                  </div>
						                </div>
						              </div>
						              <div class="roundItemText">
						                <p><b>'.$Row->MenuData['title'].'</b></p>
						                <p>('.$Row->MenuData['link'].')</p>
						              </div>
						            </div>
						          </li>';
				break;
			}
        }
        if(!$Regs) $Regs.= '<div class="callout callout-info"><h4><i class="icon fa fa-info-circle"></i> No se encontraron usuarios.</h4><p>Puede crear un nuevo usuario haciendo click <a href="new.php">aqui</a>.</p></div>';
		return $Regs;

		// $Limit = $From>=0 && $To>=0 ? $From.",".$To : "";
		// $MenuRegs	= $this->fetchAssoc('menu','*',"1 = 1 ".$Where,"title",$Limit);
		// $AtLeastOne	= false;
		// for($i=0;$i<count($MenuRegs);$i++)
		// {
		// 	$MenuReg	=	$MenuRegs[$i];
		// 	$Actions	= 	'<li><a href="edit.php?id='.$MenuReg['menu_id'].'" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a></li>';
		// 	$Actions	.= 	'<li><a href="#" deleteElement="'.$MenuReg['menu_id'].'" deleteParent="menu'.$MenuReg['menu_id'].'" deleteProcess="process.php" confirmText="¿Desea eliminar el menú \''.$MenuReg['title'].'\'?" successText="\''.$MenuReg['title'].'\' ha sido eliminado correctamente" class="btndel deleteElement"><i class="fa fa-fw fa-trash"></i></a></li>';

		// 	$Parent 	= $MenuReg['parent_id'] != 0 ? 	$this->GetParent($MenuReg['parent_id']) : 'Men&uacute; Principal';
		// 	$Link 		= $MenuReg['link']!="#"  ? $MenuReg['link'] : 'Sin Link';
		// 	$Public 	= $MenuReg['public'] == 'Y'? 'Público' : 'Restringido';

		// 	switch(strtoupper($MenuReg['status']))
		// 	{
		// 		case 'A':
		// 			$Status = 'Activo';
		// 		break;
		// 		case 'I':
		// 			$Status = 'Inactivo';
		// 		break;
		// 		case 'O':
		// 			$Status = 'Oculto';
		// 		break;
		// 	}

		// 	$Regs	.= '<div id="menu'.$MenuReg['menu_id'].'" class="container-fluid glassListRow listrow listrowclick">
  //                       <div class="col-md-1 col-sm-3 col-xs-12 titlist1 menulistcol1">
  //                          <i class="fa fa-fw '.$MenuReg['icon'].' menulistico"></i>
  //                       </div>
  //                       <div class="col-md-2 col-sm-3 col-xs-3 titlist2">
  //                          <div class="padtoplist">
  //                          <p>'.$MenuReg['title'].'</p>
  //                          </div>
  //                       </div>
  //                       <div class="col-md-2 col-sm-2 col-xs-3 titlist3">
  //                          <div class="padtoplist">
  //                          <p>'.$Link.'</p>
  //                          </div>
  //                       </div>
  //                       <div class="col-md-1 col-sm-2 col-xs-3 titlist4">
  //                          <div class="padtoplist">
  //                          <p>'.$Status.'</p>
  //                          </div>
  //                       </div>
  //                       <div class="col-md-2 col-sm-2 col-xs-3 titlist5">
  //                          <div class="padtoplist">
  //                          <p>'.$Parent.'</p>
  //                          </div>
  //                       </div>
  //                       <div class="col-md-2 col-sm-12 col-xs-12 titlist6ult">
  //                          <div class="padtoplist">
  //                          	'.$Public.'
  //                          </div>
  //                       </div>
  //                       <div class="col-md-2 col-sm-12 col-xs-12 titlist7">
  //                        <div class="colprodico">
  //                         <div class="prodicos">
  //                                  <ul>
  //                                      '.$Actions.'
  //                                  </ul>
  //                              </div>
  //                          </div>
  //                       </div>
  //                  </div>';
		// 	$AtLeastOne	= true;
  //      }
  //      if(!$AtLeastOne) $Regs	.= '<div class="RegWrapper DarkRed" id="EmptyRow" style="text-align:center;padding:40px;font-size:20px;">No hay registros.</div>';
		// return $Regs;
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

	public function MakeTree($Parent=0)
	{
		$HTML		= '<ul>';
		$Menues 	= $this->fetchAssoc('menu','*',"parent_id = ".$Parent." AND status <> 'I'","position");
		$Parents	= $this->GetParents();
		foreach($Menues as $Menu)
		{
			$HTML .= '<li data-value="'.$Menu['menu_id'].'"> <i class="fa '.$Menu['icon'].'"></i> '.$Menu['title'];
			if(in_array($Menu['menu_id'],$Parents))
			{
				$HTML .= $this->MakeTree($Menu['menu_id']);
			}
			$HTML .= '</li>';
		}
		$HTML .= '</ul>';
		return $HTML;
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
