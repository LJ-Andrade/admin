<?php

class Login extends DataBase
{
	var 	$User;
	var 	$Password;
	var 	$PasswordHash;
	var 	$IP;
	var 	$Tries;
	var		$IsMaxTries;
	var		$AdminData = array();
	var		$UserExist;
	var 	$PassMatch;
	var 	$Target;
	var		$Return;
	
	const 	HOURS 		= 2;
	const 	MAX_TRIES	= 13;
	
	public function __construct($User,$Password)
	{
		$this->setLogin($User,$Password);
	}
	
	public function setLogin($User,$Password)
	{
		$this->Connect();
		
		$this->User			= $User;
		$this->Password		= $Password;
		$this->PasswordHash	= md5($Password);
		$this->IP 			= getenv("REMOTE_ADDR");
		
		//$Query 				= "SELECT * FROM admin_user WHERE user = '".$this->User."' AND status = 'A'";
		$this->UserExist 	= $this->numRows('admin_user','*',"user = '".$this->User."' AND status = 'A'") > 0;
		$this->AdminData 	= $this->fetchAssoc('admin_user','*',"user = '".$this->User."' AND status = 'A'");
		$this->PassMatch	= $this->AdminData[0]['password'] == $this->PasswordHash;
		$this->Tries		= $this->AdminData[0]['tries']+1;
		$this->IsMaxTries	= $this->Tries > $this->getMaxTries();
	}
	
	public function setSessionVars()
	{
		$_SESSION['user'] 		= $this->AdminData[0]['user'];
		$_SESSION['admin_id'] 	= $this->AdminData[0]['admin_id'];
		$_SESSION['first_name'] = $this->AdminData[0]['first_name'];
		$_SESSION['last_name'] 	= $this->AdminData[0]['last_name'];
		$_SESSION['profile_id'] = $this->AdminData[0]['profile_id'];
	}
	
	public function setCookies()
	{
		$time	= false;//time()+(3600*$this->getHours());
		setcookie("user", 		$this->AdminData[0]['user'], 		$time, "/");
		setcookie("password", 	$this->AdminData[0]['password'],	$time, "/");
		setcookie("admin_id", 	$this->AdminData[0]['admin_id'], 	$time, "/");
		setcookie("first_name", $this->AdminData[0]['first_name'], 	$time, "/");
		setcookie("last_name", 	$this->AdminData[0]['last_name'], 	$time, "/");
		setcookie("profile_id", $this->AdminData[0]['profile_id'], 	$time, "/");
	}
	
	public function queryMaxTries()
	{
		$Success 				= $this->execQuery("insert",'login_log','user,password,ip,tries,event',"'".$this->User."','".$this->Password."','".$this->IP."','".$this->Tries."','Inhabilitado por Revocaci&oacute;n'");
		
		$SuccessInhabilitation	= $this->execQuery('update','admin_user',"tries = 0, status = 'I'","user = '".$this->User."'");
		
		return ($Success && $SuccessInhabilitation);
	}
	
	public function queryLogin()
	{
		$SuccessReset 			= $this->execQuery('update','admin_user',"tries = 0, last_access = NOW()","user = '".$this->User."'");

		$SuccessLogin 			= $this->execQuery('insert','login_log','user,ip,event',"'".$this->User."','".$this->IP."','OK'");

		return $SuccessLogin && $SuccessReset;
	}
	
	public function queryPasswordFail()
	{
		$SuccessIncreaseTries 	= $this->execQuery('update','admin_user',"tries = '".$this->Tries."'","user = '".$this->User."'"); 
		
		$SuccessWrongPassword 	= $this->execQuery('insert','login_log',"user,password,ip,tries,event","'".$this->User."','".$this->Password."','".$this->IP."','".$this->Tries."','Clave Incorrecta'");
		
		
		if($SuccessIncreaseTries && $SuccessWrongPassword){
			return true;
		}else{
			return false;
		}
	}
	
	public function queryWrongUser()
	{
		$SuccessWrongUser	= $this->execQuery('insert','login_log',"user,password,ip,event","'".$this->User."','".$this->Password."','".$this->IP."','Usuario invalido'");
		
		if($SuccessWrongUser){
			return true;
		}else{
			return false;
		}
	}
	
	public static function getHours()
	{
    	return self::HOURS;
  	}

  	public static function getMaxTries()
  	{
    	return self::MAX_TRIES;
  	}
}


?>