<?php
class DataBase
{
	var $UserDB		= 'root';
	var $PasswordDB	= 'root';
	var $DataBase	= 'renovatio';
	var $ServerDB	= '127.0.0.1';
	var $TypeDB 	= 'Mysql';
	var $SchemaDB	= 'testing,public';
	var $PortDB 	= 3306;
	var $AfectedRows;
	var $StreamConnection;
	var $Error;
	var $LastQuery;
	var $Where = '1=1';
	var $Regs = array();
	var $TotalRegs;
	var $Page = 1;
	var $RegsPerView = 5;
	var $Order;
	//var $GroupBy;
	var $Table;
	var $Fields = '*';
	
	public function __construct($UserDB='root', $PasswordDB='root', $DataBase='renovatio', $ServerDB='127.0.0.1',$TypeDB='Mysql'){
		$this->UserDB 		= $UserDB;
		$this->PasswordDB	= $PasswordDB;
		$this->DataBase		= $DataBase;
		$this->ServerDB		= $ServerDB;
		$this->TypeDB		= $TypeDB;
	}
	public function Connect(){
		$this->StartConnection();
		if(!$this->StreamConnection){
			$this->Error = "No ha sido posible conectarse a la base de datos, error en la funcion 'connect': ".$this->ConnectionError();
			return false;
		}else{
			if(!$this->SelectDB()){
				$this->Error = "No ha sido posible conectarse a la base de datos, error en la funci&oacute;n 'select_db': ".$this->ConnectionError();
				return false;
			}else{
				return true;
			}
		}
	}
	public function SelectDB()
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				return mysqli_select_db($this->StreamConnection,$this->DataBase)? true : false;
			break;
			case "Postgress":
				return pg_query($this->StreamConnection, "set search_path to ".$this->SchemaDB)? true : false;
			break;
			case "Oracle":
				return true;
			break;
		}
	}
	public function ConnectionError()
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				return mysqli_error($this->StreamConnection);
			break;
			case "Postgress":
				return pg_last_error();
			break;
			case "Oracle":
				$Error = oci_error($this->StartConnection());
				return $Error['message'];
			break;
		}
	}
	public function StartConnection()
	{
		switch($this->TypeDB)
        {
        	case "Mysql":
            	$this->StreamConnection = mysqli_connect($this->ServerDB,$this->UserDB,$this->PasswordDB,$this->DataBase,$this->PortDB);
			break;
			case "Postgress":
				$this->StreamConnection = pg_connect("host=".$this->ServerDB." port=5432 dbname=".$this->DataBase." user=".$this->UserDB." password=".$this->PasswordDB);
			break;
			case "Oracle":
            	$this->StreamConnection = oci_connect($this->UserDB, $this->PasswordDB, $this->ServerDB."/".$this->DataBase);
            break;
		}
	}
	public function GetInsertId()
	{
		switch($this->TypeDB)
        {
			case "Mysql":
            	return $this->StreamConnection->insert_id;
			break;
		}
	}
	public function Disconnect()
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				mysqli_close($this->StreamConnection);
			break;
			case "Postgress":
				pg_close($this->StreamConnection);
			break;
			case "Oracle":
				oci_close($this->StreamConnection);
			break;
		}
	}
	public function getQuery($Operation,$Table='',$Fields='',$Where='',$Order='',$GroupBy='',$Limit='')
	{
		return $Query	= $this->queryBuild($Operation,$Table,$Fields,$Where,$Order,$GroupBy,$Limit);
	}
	public function execQuery($Operation,$Table='',$Fields='',$Where='',$Order='',$GroupBy='',$Limit='')
	{
		$Query	= $this->queryBuild($Operation,$Table,$Fields,$Where,$Order,$GroupBy,$Limit);
		switch($this->TypeDB)
		{
			case "Mysql":
				$Result = mysqli_query($this->StreamConnection,$Query);
				if(!$Result) $this->Error = mysqli_error($this->StreamConnection);
				return $Result;
			break;
		}
	}
	public function fetchAssoc($Table,$Fields='',$Where='',$Order='',$GroupBy='',$Limit='')
	{
		$Query	= $this->queryBuild("SELECT",$Table,$Fields,$Where,$Order,$GroupBy,$Limit);
		switch($this->TypeDB)
		{
			case "Mysql":
				$Query = mysqli_query($this->StreamConnection,$Query) or mysqli_error($this->StreamConnection);
				$Data	= array();
				while($Data[]=mysqli_fetch_assoc($Query)){}
				array_pop($Data);
				return $Data;
			break;
		}
	}
	public function fetchRow($Table,$Fields='',$Where='',$Order='',$GroupBy='',$Limit='')
	{
		$Query	= $this->queryBuild("SELECT",$Table,$Fields,$Where,$Order,$GroupBy,$Limit);
		switch($this->TypeDB)
		{
			case "Mysql":
				$Query = mysqli_query($this->StreamConnection,$Query) or mysqli_error($this->StreamConnection);
				if(!$Result) $this->Error = mysqli_error($this->StreamConnection);
				while($Data[]=mysqli_fetch_row($Query)){}
				array_pop($Data);
				return $Data;
			break;
		}
	}
	public function numRows($Table,$Fields='',$Where='',$Order='',$GroupBy='',$Limit='')
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$Result = mysqli_num_rows($this->execQuery("SELECT",$Table,$Fields,$Where,$Order,$GroupBy,$Limit));
				if(!$Result) $this->Error = mysqli_error($this->StreamConnection);
				return $Result;
			break;
		}
	}
	public function affectedRows()
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$this->AfectedRows = mysqli_affected_rows($this->StreamConnection);
			break;
		}
	}
	public function queryBuild($Operation,$Table,$Fields='',$Where='',$Order='',$GroupBy='',$Limit='')
	{
		if($Fields)
			$Fields	= utf8_decode($Fields);
		if($Where)
			$Where	= utf8_decode($Where);
		switch(strtolower($Operation))
		{
			case "select":
				$Query = $this->selectBuild($Table,$Fields,$Where,$Order,$GroupBy,$Limit);
			break;
			case "insert":
				$Query = $this->insertBuild($Table,$Fields,$Where);
			break;
			case "update":
				$Query = $this->updateBuild($Table,$Fields,$Where);
			break;
			case "delete":
				$Query = $this->deleteBuild($Table,$Fields);
			break;
			case "data":
				$Query = $this->dataBuild($Table);
			break;
			default:
				$Query = $Operation;
			break;
		}
		$this->LastQuery = $Query;
		return $Query;
	}
	public function selectBuild($Table,$Fields,$Where='',$Order='',$GroupBy='',$Limit='')
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$Fields	= $Fields ? $Fields : '*';
				$Where	= $Where ? ' WHERE '.$Where : '';
				$GroupBy= $GroupBy ? ' GROUP BY '.$GroupBy : '';
				$Order	= $Order ? ' ORDER BY '.$Order : '';
				$Limit	= $Limit ? ' LIMIT '.$Limit : '';
				return 'SELECT '.$Fields.' FROM '.$Table.$Where.$GroupBy.$Order.$Limit;
			break;
		}
	}
	public function insertBuild($Table,$Fields,$Values)
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				return 'INSERT INTO '.$Table.' ('.$Fields.')VALUES('.$Values.')';
			break;
		}
	}
	public function updateBuild($Table,$Values,$Where)
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$Where	= $Where ? ' WHERE '.$Where : '';
				return 'UPDATE '.$Table.' SET '.$Values.$Where;
			break;
		}
	}
	public function deleteBuild($Table,$Where)
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$Where	= $Where ? ' WHERE '.$Where : '';
				return 'DELETE FROM '.$Table.$Where;
			break;
		}
	}
	public function dataBuild($Table)
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				return 'DESCRIBE '.$Table;
			break;
		}
	}
	public function lastQuery()
	{
		return $this->LastQuery;
	}
	public function lastError()
	{
		return $this->Error;
	}
	
	
	///////////////////////////////////// Search Handler ////////////////////////////////
	public function GetWhere()
	{
		return $this->Where;
	}
	
	public function SetWhereCondition($Key="",$Operation="=",$Value="",$Connector="AND")
	{
		if(isset($Key))
		{
			$this->Where .= " ".$Connector." ".$Key." ".$Operation." '".$Value."'";
			return $this->GetWhere();	
		}
	}
	
	public function AddWhereString($String="")
	{
		$this->Where .= $String;
		return $this->GetWhere();
	}
	
	public function SetWhere($Where="")
	{
		$this->Where = $Where;
		return $this->GetWhere();
	}
	
	public function SetRegsPerView($Regs)
	{
		$this->RegsPerView = $Regs;
	}
	
	public function GetRegsPerView()
	{
		return $this->RegsPerView;
	}
	
	public function GetRegs()
	{
		if(!$this->Regs)
		{
			$this->Regs = $this->fetchAssoc($this->GetTable(),$this->GetFields(),$this->GetWhere(),$this->GetOrder(),$this->GetGroupBy(),$this->GetLimit());
			
		}
		return $this->Regs;
	}
	
	public function GetTotalRegs()
	{
		if($this->TotalRegs)
			return $this->TotalRegs;
		else
			return "0";
	}
	
	public function CalculateTotalRegs()
	{
		$this->TotalRegs = $this->numRows($this->GetTable(),$this->GetFields(),$this->GetWhere(),$this->GetOrder(),$this->GetGroupBy());
		if($this->TotalRegs)
			return $this->TotalRegs;
		else
			return "0";
	}
	
	public function SetPage($Page)
	{
		$this->Page = $Page;
	}
	
	public function GetPage()
	{
		return $this->Page;
	}
	
	public function SetOrder($Order)
	{
		$this->Order = $Order;
	}
	
	public function GetOrder()
	{
		return $this->Order;
	}
	
	public function SetGroupBy($GroupBy)
	{
		$this->GroupBy = $GroupBy;
	}
	
	public function GetGroupBy()
	{
		return $this->GroupBy;
	}
	
	public function SetTable($Table)
	{
		$this->Table = $Table;
	}
	
	public function GetTable()
	{
		return $this->Table;
	}
	
	public function SetFields($Fields)
	{
		$this->Fields = $Fields;
	}
	
	public function GetFields()
	{
		return $this->Fields;
	}
	
	public function GetTotalPages()
	{
		$Total			= $this->GetTotalRegs();
		$RegsPerView	= $this->GetRegsPerView();
		if($RegPerView>=$Total || $RegsPerView<=0)
		{
			return 0;
		}else{
			return intval(ceil($Total/$RegsPerView)); 	
		}
		
	}
	
	public function GetLimit()
	{
		$TotalRegs	= $this->CalculateTotalRegs();
		$TotalPages	= $this->GetTotalPages();
		$Page		= $this->GetPage();
		$RegPerView	= $this->GetRegsPerView();
		
		if($Page<=$TotalPages)
		{
			$From = $RegPerView * ($Page-1);
			$To = $RegPerView;
		}
		else
		{
			$From = 0;
			$To = $TotalRegs;
		}
		return $From.", ".$To;
	}
	
	public function InsertSearchList()
	{
		return '<div class="box">
    		<div class="box-body">
    			'.$this->InsertSearchButtons().'
		    	<!-- Search Filters -->
		    	<div class="SearFilters searchFiltersHorizontal animated fadeIn Hidden">
			        <div class="form-inline" id="SearchFieldsForm">
			        	'.insertElement('hidden','view_type','list').'
			        	'.insertElement('hidden','view_page','1').'
			        	'.insertElement('hidden','view_order_field',$this->GetOrder()).'
			        	'.insertElement('hidden','view_order_mode','asc').'
			        	'.$this->InsertSearchField().'
			          <!-- Submit Button -->
			          <button type="button" class="btn btnGreen searchButton">Buscar</button>
			          <button type="button" class="btn btnGrey" id="ClearSearchFields">Limpiar</button>
			          <!-- Decoration Arrow -->
			          <div class="arrow-right-border">
			            <div class="arrow-right-sf"></div>
			          </div>
			        </div>
			      </div>
			      <!-- /Search Filters -->
			      <div class="changeView">
			        <button class="ShowFilters SearchElement btn"><i class="fa fa-search"></i></button>
			        <button class="ShowList GridElement btn Hidden"><i class="fa fa-list"></i></button>
			        <button class="ShowGrid ListElement btn"><i class="fa fa-th-large"></i></button>
			      </div>
			      '.$this->InsertSearchResults().'
			    </div><!-- /.box-body -->
			    <div class="box-footer clearfix">
			      <!-- Paginator -->
			      <div class="pull-left form-inline paginationLeft">
			          <label for="RegsPerView" class="control-label">Mostrar </label>
			          '.insertElement('select','regsperview','','form-control','',array("5"=>"5","10"=>"10","25"=>"25","50"=>"50","100"=>"100")).'
			          de <b><span id="TotalRegs">'.$this->GetTotalRegs().'</span></b>
			      </div>
			      <ul class="paginationRight pagination no-margin pull-right">
			      </ul>
			      <!-- Paginator -->
			    </div>
			  </div><!-- /.box -->
			  <!-- DELETE SELECTED BUTTON -->
			    <div class="deleteSelectedAbs Hidden DeleteSelectedElements">
			      <i class="fa fa-trash-o"></i> Eliminar Seleccionados
			    </div>
			  <!-- DELETE SELECTED BUTTON-->
			  <!-- ACTIVATE SELECTED BUTTON -->
			    <div class="deleteSelectedAbs Hidden ActivateSelectedElements">
			      <i class="fa fa-check-circle"></i> Activar Seleccionados
			    </div>
			  <!-- ACTIVATE SELECTED BUTTON-->';
	}
	
	public function InsertSearchResults()
	{
		if($_POST['view_type']=='grid')
			$ListClass = 'Hidden';
		else
			$GridClass = 'Hidden';
			
		return '<div class="contentContainer txC" id="SearchResult" object="'.get_class ($this).'"><!-- List Container -->
			        <div class="GridView row horizontal-list flex-justify-center GridElement '.$GridClass.' animated fadeIn">
			          <ul>
			            '.$this->MakeGrid().'
			          </ul>
			        </div><!-- /.horizontal-list -->
			        <div class="row ListView ListElement animated fadeIn '.$ListClass.'">
			          <div class="container-fluid">
			            '.$this->MakeList().'
			          </div><!-- container-fluid -->
			        </div><!-- row -->
			        '.insertElement('hidden','totalregs',$this->GetTotalRegs()).'
			      </div><!-- /Content Container -->';
	}
}
?>
