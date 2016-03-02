<?php

class Menu extends DataBase
{
	
	//var $Menues = array();
	var $IDs 		= array();
	var $MenuData 	= array();
	var $Link 		= "";

	const PROFILE		= 333;
	
	public function __construct($MenuID=0)
	{
		$this->Connect();
		$Data			= $MenuID>0? $this->fetchAssoc('menu','*',"menu_id = ".$MenuID) : array();
		$this->MenuData	= $Data[0];
		$this->setLink();
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
		$Rows		= $this->fetchAssoc('menu','*',"parent_id = ".$Parent_id." AND status='A' AND menu_id IN (".implode(",",$this->IDs).")","position");
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

	public function insertBreadCrumbs($ID=0)
	{
		if($ID==0)	
			$Menu = $this->fetchAssoc('menu','*',"link LIKE '%".$this->Link."' ");
		else
			$Menu = $this->fetchAssoc('menu','*'," menu_id = ".$ID);

		$Parent = $Menu[0]['parent_id'];

		if($Parent!=0) $this->insertBreadCrumbs($Parent);
		
		if($ID==0)
			echo '<li class="crumactive">'.$Menu[0]['title'].'</li>';
		else
			echo '<li><a href="'.$Menu[0]['link'].'">'.$Menu[0]['title'].'</a></li>';
	}

	public function setLink()
	{
		$ActualUrl  = explode("/",$_SERVER['PHP_SELF']);
	    $this->Link = $ActualUrl[count($ActualUrl)-2]."/".basename($_SERVER['PHP_SELF']);
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
			$Actions	= 	'<li><a href="edit.php?id='.$MenuRegs['menu_id'].'" class="btnmod"><i class="fa fa-fw fa-pencil"></i></a></li>';
			$Actions	.= 	'<li><a href="#modal1" id="1" class="btndel deleteelem"><i class="fa fa-fw fa-trash"></i></a></li>';
			
			$Parent 	= $MenuReg['parent_id'] != 0 ? 	$this->GetParent($MenuReg['parent_id']) : 'Men&uacute; Principal';
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

			$Regs	.= '<div id="menu'.$MenuRegs['menu_id'].'" class="row animated bounceInUp prodfilediv">
                         <div class="col-md-2 col-sm-3 col-xs-12">
                            <i class="fa fa-fw '.$MenuRegs['icon'].'"></i>
                         </div>
                         <div class="col-md-1 col-sm-3 col-xs-3 colprod1">
                            <div class="colprodtit">
                            <p><b>'.$MenuRegs['title'].'</b></p>
                            </div>    
                         </div>
                         <div class="col-md-1 col-sm-2 col-xs-3 colprod1">
                            <div class="colprod">
                            <p><b>'.$MenuRegs['link'].'</b></p>
                            </div>  
                         </div>
                         <div class="col-md-1 col-sm-2 col-xs-3 colprod1">
                            <div class="colprod">
                            <p><b>'.$Status.'</b></p>
                            </div>
                         </div>
                         <div class="col-md-1 col-sm-2 col-xs-3 colprod1">
                            <div class="colprod">
                            <p><b>'.$Parent.'</b></p>
                            </div>
                         </div>
                         <div class="col-md-4 col-sm-12 col-xs-12 colprod1">
                            <div class="colprod">
                            <!-- Es una cama muy buena. Sirve para domir. Tiene 4 patas. Almohada de madera. Todo de madera. -->
                            </div> 
                         </div>
                         <div class="col-md-2 col-sm-12 col-xs-12  colprod1">
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

}

?>