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

	public function getQuery($Operation,$Table,$Fields='',$Where='',$Order='',$Limit='')
	{
		return $Query	= $this->queryBuild($Operation,$Table,$Fields,$Where,$Order,$Limit);
	}

	public function execQuery($Operation,$Table,$Fields='',$Where='',$Order='',$Limit='')
	{
		$Query	= $this->queryBuild($Operation,$Table,$Fields,$Where,$Order,$Limit);
		switch($this->TypeDB)
		{
			case "Mysql":
				$Result = mysqli_query($this->StreamConnection,$Query);
				if(!$Result) $this->Error = mysqli_error($this->StreamConnection);
				return $Result;
			break;
		}
	}

	public function fetchAssoc($Table,$Fields='',$Where='',$Order='',$Limit='')
	{
		$Query	= $this->queryBuild("SELECT",$Table,$Fields,$Where,$Order,$Limit);
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

	public function fetchRow($Table,$Fields='',$Where='',$Order='',$Limit='')
	{
		$Query	= $this->queryBuild("SELECT",$Table,$Fields,$Where,$Order,$Limit);
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

	public function numRows($Table,$Fields='',$Where='',$Order='',$Limit='')
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$Result = mysqli_num_rows($this->execQuery("SELECT",$Table,$Fields,$Where,$Order,$Limit));
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

	public function queryBuild($Operation,$Table,$Fields='',$Where='',$Order='',$Limit='')
	{
		if($Fields)
			$Fields	= utf8_decode($Fields);

		if($Where)
			$Where	= utf8_decode($Where);

		switch(strtolower($Operation))
		{
			case "select":
				$Query = $this->selectBuild($Table,$Fields,$Where,$Order,$Limit);
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
				$Query = $Table;
			break;
		}
		$this->LastQuery = $Query;
		return $Query;
	}

	public function selectBuild($Table,$Fields,$Where='',$Order='',$Limit='')
	{
		switch($this->TypeDB)
		{
			case "Mysql":
				$Fields	= $Fields ? $Fields : '*';
				$Where	= $Where ? ' WHERE '.$Where : '';
				$Order	= $Order ? ' ORDER BY '.$Order : '';
				$Limit	= $Limit ? ' LIMIT '.$Limit : '';
				return 'SELECT '.$Fields.' FROM '.$Table.$Where.$Order.$Limit;
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

}

?>
