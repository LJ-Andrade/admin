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
		// $this->SetTable('menu');
		// $this->SetFields('*');
		//$this->SetWhere("customer_id=".$_SESSION['customer_id']);
		// $this->SetOrder('title');
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

	public function hasChild($MenuID)
	{
		return count($this->fetchAssoc('menu','menu_id',"parent_id = ".$MenuID." AND status = 'A' AND view_status = 'A' AND menu_id IN (".implode(",",$this->IDs).")"))>0;
	}

	public function insertMenu($PorfileID=0,$AdminID=0)
	{
		$this->GetMenues($PorfileID,$AdminID);
		$Rows	= $this->fetchAssoc('menu','*',"parent_id = 0 AND status = 'A' AND view_status = 'A' AND menu_id IN (".implode(",",$this->IDs).")","position");


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
		$Rows		= $this->fetchAssoc('menu','*',"parent_id = ".$Parent_id." AND status='A' AND view_status = 'A' AND menu_id IN (".implode(",",$this->IDs).")","position");
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
			$Children = $this->fetchAssoc('menu','*'," status = 'A' AND view_status='A' AND parent_id = ".$this->MenuData['menu_id']);
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

		//$AllowedMenues 			= $this->fetchAssoc('menu m, realtion_menu_profile r, relation_admin_menu e','DISTINCT(m.menu_id)',"m.public = 'Y' OR ()");
		if($PorfileID==self::PROFILE)
		{
			$AllowedMenues 	= $this->fetchAssoc('menu','menu_id',"status = 'A'");
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

				$AllowedMenues 	= $this->fetchAssoc('menu','DISTINCT(menu_id)',"public = 'Y' OR menu_id IN (SELECT menu_id FROM relation_menu_profile WHERE profile_id= ".$PorfileID.") OR menu_id IN (SELECT menu_id FROM relation_admin_menu WHERE admin_id = ".$AdminID.") OR menu_id IN (".$MenuesGroup.")  AND status = 'A'");

			}else{
				$AllowedMenues 	= $this->fetchAssoc('menu','menu_id',"public = 'Y' AND status = 'A'");
			}
		}

		foreach($AllowedMenues as $Menu)
		{
			$Menues[]			= $Menu['menu_id'];
		}

		$this->IDs		= $Menues;
	}

	public function GetParent($Menu_id)
	{
		$Parent = $this->fetchAssoc('menu','title','menu_id='.$Menu_id);
		return $Parent[0]['title'];
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
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// SEARCHLIST FUNCTIONS ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function GetGroups()
	{
		if(!$this->Groups)
		{
			$Rs 	= $this->fetchAssoc('admin_group','*',"status = 'A' AND group_id IN (SELECT group_id FROM relation_menu_group WHERE menu_id=".$this->MenuData['menu_id'].") AND customer_id = ".$_SESSION['customer_id'],"title");
			$this->Groups = $Rs;
			return $this->Groups;
		}
	}
	
	public function GetProfiles()
	{
		if(!$this->Profiles)
		{
			$Rs 	= $this->fetchAssoc('admin_profile','*',"status = 'A' AND profile_id IN (SELECT profile_id FROM relation_menu_profile WHERE menu_id=".$this->MenuData['menu_id'].") AND customer_id = ".$_SESSION['customer_id'],"title");
			$this->Profiles = $Rs;
			return $this->Profiles;
		}
	}

	public function MakeRegs($Mode="List")
	{
		$Rows	= $this->GetRegs();
		//echo $this->lastQuery();
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
			
			if($Row->MenuData['link']=="#")
				$Row->MenuData['link'] = "";
				
			if($Row->MenuData['public']=='Y')
				$Row->MenuData['public'] = 'P&uacute;blico';
			else
				$Row->MenuData['public'] = 'Privado';
			
			
			$Actions	= 	'<span class="roundItemActionsGroup"><a href="edit.php?id='.$Row->MenuData['menu_id'].'"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>';
			if($Row->MenuData['status']=="A")
			{
				$Actions	.= '<a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_'.$Row->MenuData['menu_id'].'"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>';
			}else{
				$Actions	.= '<a class="activateElement" process="../../library/processes/proc.common.php" id="activate_'.$Row->MenuData['menu_id'].'"><button type="button" class="btn btnGreen"><i class="fa fa-check-circle"></i></button></a>';
			}
			$Actions	.= '</span>';
			switch(strtolower($Mode))
			{
				case "list":
					$RowBackground = $i % 2 == 0? '':' listRow2 ';
					$Regs	.= '<div class="row listRow'.$RowBackground.'" id="row_'.$Row->MenuData['menu_id'].'" title="'.$Row->MenuData['title'].'">
									<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa '.$Row->MenuData['icon'].'" alt="'.$Row->MenuData['title'].'"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">'.$Row->MenuData['title'].'</span>
											<span class="smallDetails">'.$Row->MenuData['link'].'</span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Privacidad</span>
											<span class="itemRowtitle">'.$Row->MenuData['public'].'</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											'.$Profiles.'
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
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
					if($Row->MenuData['link']) $Row->MenuData['link'] = '<p>('.$Row->MenuData['link'].')</p>';
					$Regs	.= '<li id="grid_'.$Row->MenuData['menu_id'].'" class="RoundItemSelect roundItemBig" title="'.$Row->MenuData['title'].'">
						            <div class="flex-allCenter imgSelector">
						              <div class="imgSelectorInner">
						                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="'.$Row->MenuData['title'].'" class="img-responsive">
						                <div class="imgSelectorContent">
						                  <div class="roundItemBigActions">
						                    '.$Actions.'
						                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
						                  </div>
						                </div>
						              </div>
						              <div class="roundItemText">
						                <p><b>'.$Row->MenuData['title'].'</b></p>
							            '.$Row->MenuData['link'].'
						              </div>
						            </div>
						          </li>';
				break;
			}
        }
        if(!$Regs) $Regs.= '<div class="callout callout-info"><h4><i class="icon fa fa-info-circle"></i> No se encontraron menues.</h4><p>Puede crear un nuevo usuario haciendo click <a href="new.php">aqui</a>.</p></div>';
		return $Regs;
	}
	
	protected function InsertSearchField()
	{
		$Parents = $this->GetParents();
		$Parents = $this->fetchAssoc('menu','menu_id,title',"status<>'I' AND menu_id IN (".implode(",",$Parents).")");
		$Parents[] = array("menu_id"=>"0","title"=>"Men&uacute; Principal");
		
		return '<!-- Title -->
          <div class="input-group">
            <span class="input-group-addon order-arrows sort-activated" order="title" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','title','','form-control','placeholder="T&iacute;tulo"').'
          </div>
          <!-- Link -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="link" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','link','','form-control','placeholder="Link"').'
          </div>
          <!-- Parent -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="parent" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','parent','','form-control','',$Parent,'', 'Ubicaci&oacute;n').'
          </div>
          <!-- Public -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="public" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','public','','form-control','',array("N"=>"Privado","Y"=>"P&uacute;blico"),'',"Privacidad").'
          </div>
          <!-- Type -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="status" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','view_status','','form-control','',array("A"=>"Visible","O"=>"Oculto"),'',"Visibilidad").'
          </div>
          <!-- Profile -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="profile" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('select','profile','','form-control','',$this->fetchAssoc('admin_profile','profile_id,title',"customer_id=".$_SESSION['customer_id']." AND status='A'"),'', 'Perfil').'
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
		    	<a href="new.php"><button type="button" class="NewElementButton btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Men&uacute;</button></a>
		    	<!-- /New User Button -->';
	}
	
	public function ConfigureSearchRequest()
	{
		$this->SetTable('menu AS m, admin_group AS g, relation_menu_group AS rg, admin_profile AS p, relation_menu_profile AS rp');
		$this->SetFields('m.*,p.title as profile, g.title as group_title');
		$this->SetWhere("1=1");
		//$this->AddWhereString(" AND a.profile_id = p.profile_id");
		$this->SetOrder('title');
		$this->SetGroupBy("m.menu_id");
		// if($this->ProfileID!=333)
		// {
		// 	$this->SetWhereCondition("a.profile_id",">",$this->ProfileID);
		// }
		
		foreach($_POST as $Key => $Value)
		{
			$_POST[$Key] = htmlentities($Value);
		}
			
		if($_POST['title']) $this->SetWhereCondition("m.title","LIKE","%".$_POST['title']."%");
		if($_POST['link']) $this->SetWhereCondition("m.link","LIKE","%".$_POST['link']."%");
		if($_POST['parent'] || $_POST['parent']=="0") $this->SetWhereCondition("m.parent_id","=",$_POST['parent']);
		if($_POST['public']) $this->SetWhereCondition("m.public","=",$_POST['public']);
		if($_POST['view_status']) $this->SetWhereCondition("m.view_status","=", $_POST['view_status']);
		if($_POST['group'])
		{
			$this->AddWhereString(" AND m.menu_id = rg.menu_id AND rg.group_id = g.group_id AND g.group_id = ".$_POST['group']);	
		}
		if($_POST['profile'])
		{
			$this->AddWhereString(" AND m.menu_id = rp.menu_id AND rp.profile_id = p.profile_id AND p.profile_id = ".$_POST['profile']);	
		}
		if($_REQUEST['status'])
		{
			if($_POST['status']) $this->SetWhereCondition("m.status","=", $_POST['status']);
			if($_GET['status']) $this->SetWhereCondition("m.status","=", $_GET['status']);	
		}else{
			$this->SetWhereCondition("m.status","<>","I");
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
					$this->AddWhereString(" AND m.menu_id = rg.menu_id AND rg.group_id = g.group_id");
					$Order = 'title';
					$Prefix = "g.";
				break;
				case "profile": 
					$this->AddWhereString(" AND m.menu_id = rp.menu_id AND rp.profile_id = p.profile_id");
					$Order = 'title';
					$Prefix = "p.";
				break;
				default:
					$Prefix = "m.";
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
		return $this->MenuData;
	}
	
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PROCESS METHODS ///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function Insert()
	{
		$Title		= htmlentities($_POST['title']);
		$Link		= $_POST['link'];
		$Position	= $_POST['position']? intval($_POST['position']) : 0;
		$Parent		= $_POST['parent'];
		$Icon		= $_POST['icon'];
		$Groups 	= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Profiles 	= $_POST['profiles'] ? explode(",",$_POST['profiles']) : array();
		$Status		= $_POST['status']=='on'? 'A':'O';
		$Public		= $_POST['public']=='on'? 'N':'Y';
		if(!$Link) $Link="#";
		$this->execQuery('insert','menu','title,link,position,icon,parent_id,status,public',"'".$Title."','".$Link."',".$Position.",'".$Icon."',".$Parent.",'".$Status."','".$Public."'");
		$ID 		= $this->GetInsertId();
		foreach($Groups as $Group)
		{
			if(intval($Group)>0)
				$Values .= !$Values? $ID.",".$Group : "),(".$ID.",".$Group;
		}
		$this->execQuery('insert','relation_menu_group','menu_id,group_id',$Values);
		$Values="";
		foreach($Profiles as $Profile)
		{
			if(intval($Profile)>0)
				$Values .= !$Values? $ID.",".$Profile : "),(".$ID.",".$Profile;
		}
		$this->execQuery('insert','relation_menu_profile','menu_id,profile_id',$Values);
	}
	
	public function Update()
	{
		$ID	= $_POST['id'];
		
		$Title		= htmlentities($_POST['title']);
		$Link		= $_POST['link']==""? "#" : $_POST['link'];
		$Position	= $_POST['position']? intval($_POST['position']) : 0;
		$ParentID	= $_POST['parent'];
		$Status		= $_POST['status'];
		$Icon		= $_POST['icon'];
		$Groups 	= $_POST['groups'] ? explode(",",$_POST['groups']) : array();
		$Profiles 	= $_POST['profiles'] ? explode(",",$_POST['profiles']) : array();
		$Status		= $_POST['status']? 'A':'O';
		$Public		= $_POST['public']? 'N':'Y';
		if(!$Link) $Link="#";
		$this->execQuery('update','menu',"title='".$Title."',link='".$Link."',position='".$Position."',icon='".$Icon."',status='".$Status."',parent_id=".$ParentID.",public='".$Public."'","menu_id=".$ID);
		$this->execQuery('delete','relation_menu_group',"menu_id = ".$ID);
		$this->execQuery('delete','relation_menu_profile',"menu_id = ".$ID);
		foreach($Groups as $Group)
		{
			if(intval($Group)>0)
				$Values .= !$Values? $ID.",".$Group : "),(".$ID.",".$Group;
		}
		$this->execQuery('insert','relation_menu_group','menu_id,group_id',$Values);
		$Values="";
		foreach($Profiles as $Profile)
		{
			if(intval($Profile)>0)
				$Values .= !$Values? $ID.",".$Profile : "),(".$ID.",".$Profile;
		}
		$this->execQuery('insert','relation_menu_profile','menu_id,profile_id',$Values);
	}
	
	public function Activate()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','menu',"status = 'A'","menu_id=".$ID);
	}
	
	public function Delete()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','menu',"status = 'I'","menu_id=".$ID);
	}
	
	public function Search()
	{
		$this->ConfigureSearchRequest();
		echo $this->InsertSearchResults();
	}
}
?>
