<?php

class GeolocationCountry extends DataBase
{
	var $Data 		= array();
	var $Provinces 	= array();
	var $Zones 		= array();
	var $ID;

	const DEFAULTIMG		= "../../../skin/images/groups/default/groupgen.jpg";

	public function __construct($ID=0)
	{
		$this->Connect();
		if($ID>0)
		{
			$this->ID = $ID;
			$this->GetData();
		}
	}
	
	// public function GetData()
	// {
	// 	if(!$this->Data)
	// 	{
	// 		$Data = $this->fetchAssoc("admin_country","*","country_id = ".$this->ID);
	// 		$this->Data = $Data[0];
	// 	}
	// 	return $this->Data;
	// }
	
	public function GetProvinces()
	{
		if(!$this->Provinces)
		{
			$this->Provinces = $this->fetchAssoc("admin_country_province","*","country_id = ".$this->ID);
		}
		return $this->Provinces;
	}
	
	public function GetZones()
	{
		if(!$this->Zones)
		{
			$this->Zones = $this->fetchAssoc("admin_country_zone","*","country_id = ".$this->ID);
		}
		return $this->Zones;
	}
	
	public function GetDefaultImg()
	{
		return self::DEFAULTIMG;
	}
	
	public function GetImg()
	{
		if(!$this->Data['image'])
			return $this->GetDefaultImg();
		else
			return $this->Data['image'];
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// SEARCHLIST FUNCTIONS ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function MakeRegs($Mode="List")
	{
		$Rows	= $this->GetRegs();
		//echo $this->lastQuery();
		foreach($Rows as $Row)
		{
			$Row			= new GeolocationCountry($Row['country_id']);
			$ID 			= $Row->ID;
			$Provinces		= $Row->GetProvinces();
			$ProvincesHTML	= '';
			foreach($Provinces as $Province)
			{
				$ProvincesHTML .= '<span class="label label-success">'.$Province['title'].'</span> ';
			}
			if(!$ProvincesHTML) $ProvincesHTML = 'Ninguna';
			$Actions	= 	'<span class="roundItemActionsGroup"><a href="edit.php?id='.$ID.'"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a>';
			if($Row->Data['status']=="A")
			{
				$Actions	.= '<a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_'.$ID.'"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a>';
			}else{
				$Actions	.= '<a class="activateElement" process="../../library/processes/proc.common.php" id="activate_'.$ID.'"><button type="button" class="btn btnGreen"><i class="fa fa-check-circle"></i></button></a>';
			}
			$Actions	.= '</span>';
			switch(strtolower($Mode))
			{
				case "list":
					$Row->Data['title'] = $Row->Data['title'];
					$RowBackground = $i % 2 == 0? '':' listRow2 ';
					$Regs	.= '<div class="row listRow'.$RowBackground.'" id="row_'.$ID.'" title="'.$Row->Data['title'].'">
									<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallTitle">T&iacute;tulo</span>
											<span class="listTextStrong">'.$Row->Data['title'].'</span>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Provincias</span>
											<span class="listTextStrong">
												'.$ProvincesHTML.'
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
				$Regs	.= '<li id="grid_'.$ID.'" class="RoundItemSelect roundItemBig '.$Restrict.'" title="'.$Row->Data['title'].'">
						            <div class="flex-allCenter imgSelector">
						              <div class="imgSelectorInner">
						                <img src="'.$Row->Data['image'].'" alt="'.$Row->Data['title'].'" class="img-responsive">
						                <div class="imgSelectorContent">
						                  <div class="roundItemBigActions">
						                    '.$Actions.'
						                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
						                  </div>
						                </div>
						              </div>
						              <div class="roundItemText">
						                <p><b>'.$Row->Data['title'].'</b></p>
						              </div>
						            </div>
						          </li>';
				break;
			}
        }
        if(!$Regs) $Regs.= '<div class="callout callout-info"><h4><i class="icon fa fa-info-circle"></i> No se encontraron pa&iacute;ses.</h4><p>Puede crear un nuevo grupo haciendo click <a href="new.php">aqui</a>.</p></div>';
		return $Regs;
	}
	
	protected function InsertSearchField()
	{
		return '<!-- Title -->
          <div class="input-group">
            <span class="input-group-addon order-arrows sort-activated" order="title" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            '.insertElement('text','title','','form-control','placeholder="T&iacute;tulo"').'
          </div>';
	}
	
	protected function InsertSearchButtons()
	{
		return '<!-- New User Button -->
		    	<a href="new.php"><button type="button" class="NewElementButton btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Pa&iacute;s</button></a>
		    	<!-- /New User Button -->';
	}
	
	public function ConfigureSearchRequest()
	{
		$this->SetTable('admin_country as c');
		$this->SetFields('c.*');
		//$this->SetWhere("g.company_id = ".$_SESSION['company_id']);
		//$this->AddWhereString(" AND a.profile_id = p.profile_id");
		$this->SetOrder('title');
		//$this->SetGroupBy("g.group_id");
		
		foreach($_POST as $Key => $Value)
		{
			$_POST[$Key] = htmlentities($Value);
		}
			
		if($_POST['title']) $this->SetWhereCondition("c.title","LIKE","%".$_POST['title']."%");
		
		if($_REQUEST['status'])
		{
			if($_GET['status']) $this->SetWhereCondition("c.status","=", $_GET['status']);
			else
				if($_POST['status']) $this->SetWhereCondition("c.status","=", $_POST['status']);	
		}else{
			$this->SetWhereCondition("c.status","=","A");
		}
		if($_POST['view_order_field'])
		{
			if(strtolower($_POST['view_order_mode'])=="desc")
				$Mode = "DESC";
			else
				$Mode = $_POST['view_order_mode'];
			
			$Order = strtolower($_POST['view_order_field']);
			// switch($Order)
			// {
			// 	case "profile": 
			// 		$this->AddWhereString(" AND g.group_id = r.group_id AND r.profile_id = p.profile_id");
			// 		$Order = 'title';
			// 		$Prefix = "p.";
			// 	break;
			// 	default:
			// 		$Prefix = "g.";
			// 	break;
			// }
			$Prefix = "c.";
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
		if(!$this->Data)
		{
			$Data 		= $this->fetchAssoc("admin_country","*","country_id=".$this->ID);
			$this->Data = $Data[0];
		}
		return $this->Data;
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PROCESS METHODS ///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function Insert()
	{	
		$Title		= htmlentities(ucfirst($_POST['title']));
		$Insert		= $this->execQuery('insert','admin_country','title,creation_date',"'".$Title."',NOW()");
	}
	
	public function Update()
	{
		$ID 	= $_POST['id'];
		$Edit	= new GeolocationCountry($ID);
		$Title		= htmlentities(ucfirst($_POST['title']));
		$Update		= $this->execQuery('update','admin_country',"title='".$Title."'","country_id=".$ID);
		//echo $this->lastQuery();
		
	}
	
	public function Activate()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','admin_country',"status = 'A'","country_id=".$ID);
	}
	
	public function Delete()
	{
		$ID	= $_POST['id'];
		$this->execQuery('update','admin_country',"status = 'I'","country_id=".$ID);
	}
	
	public function Search()
	{
		$this->ConfigureSearchRequest();
		echo $this->InsertSearchResults();
	}
	
	// public function Newimage()
	// {
	// 	if(count($_FILES['image'])>0)
	// 	{
	// 		if($_POST['newimage']!=$this->GetDefaultImg() && file_exists($_POST['newimage']))
	// 			unlink($_POST['newimage']);
	// 		$TempDir = $this->ImgGalDir;
	// 		$Name	= "group".intval(rand()*rand()/rand());
	// 		$Img	= new FileData($_FILES['image'],$TempDir,$Name);
	// 		echo $Img	-> BuildImage(200,200);
	// 	}
	// }
	
	// public function Deleteimage()
	// {
	// 	$SRC	= $_POST['src'];
	// 	unlink($SRC);
	// }
	
	public function Validate()
	{
		$Title 			= strtolower(utf8_encode($_POST['title']));
		$ActualTitle 	= strtolower(utf8_encode($_POST['actualtitle']));

	    if($ActualTitle)
	    	$TotalRegs  = $this->numRows('admin_country','*',"title = '".$Title."' AND title <> '".$ActualTitle."'");
    	else
		    $TotalRegs  = $this->numRows('admin_country','*',"title = '".$Title."'");
		if($TotalRegs>0) echo $TotalRegs;
	}
}


?>
