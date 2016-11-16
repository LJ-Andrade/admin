<?php

class Login extends DataBase
{
	var 	$User;
	var 	$Password;
	var 	$PasswordHash;
	var 	$RememberUser;
	var 	$IP;
	var 	$Tries;
	var		$IsMaxTries;
	var		$AdminData = array();
	var		$UserExists;
	var 	$PassMatch;
	var 	$Target;
	var		$Return;
	var 	$Link;

	const 	HOURS 		= 2;
	const 	MAX_TRIES	= 13;
	const 	LOGIN		= 'login/process.login.php';

	public function __construct($User='',$Password='',$Remember=0,$PasswordHash='')
	{
		$this->Connect();
		$this->getLink();
		if($User)
			$this->setData($User,$Password,$Remember,$PasswordHash);
		$this->IP 			= getenv("REMOTE_ADDR");
	}
	
	public function setData($User,$Password='',$Remember=0,$PasswordHash='')
	{
		$this->User			= $User;
		$this->Password		= $Password;
		$this->PasswordHash	= $PasswordHash? $PasswordHash : md5($Password);
		$this->AdminData 	= $this->fetchAssoc('admin_user','*'," (user = '".$this->User."' OR email='".$this->User."' )AND status = 'A'");
		$this->RememberUser = $Remember==1;
	}

	public function setLogin()
	{
		$this->UserExists	= count($this->AdminData) > 0;
		$this->PassMatch	= $this->AdminData[0]['password'] == $this->PasswordHash;
		$this->Tries		= $this->AdminData[0]['tries']+1;
		$this->IsMaxTries	= $PasswordHash? false : $this->Tries > $this->getMaxTries();
	}

	public function setSessionVars()
	{
		$_SESSION['user'] 			= $this->AdminData[0]['user'];
		$_SESSION['admin_id'] 		= $this->AdminData[0]['admin_id'];
		$_SESSION['company_id'] 	= $this->AdminData[0]['company_id'];
		$_SESSION['first_name'] 	= $this->AdminData[0]['first_name'];
		$_SESSION['last_name'] 		= $this->AdminData[0]['last_name'];
		$_SESSION['profile_id'] 	= $this->AdminData[0]['profile_id'];
		$_SESSION['meli']			= boolval($this->AdminData[0]['meli']);
		$MeliAppData = $this->fetchAssoc("renovatio_configuration","*");
		$_SESSION['meli_application_id'] = $MeliAppData[0]['meli_application_id'];
		$_SESSION['meli_secret'] 	= $MeliAppData[0]['meli_secret'];
		
		if($_SESSION['meli'])
		{
			$_SESSION['meli_code'] 			= $this->AdminData[0]['meli_code'];
			$_SESSION['meli_access_token'] 	= $this->AdminData[0]['meli_access_token'];
			$_SESSION['meli_refresh_token'] = $this->AdminData[0]['meli_refresh_token'];
			$_SESSION['meli_expires_in'] 	= $this->AdminData[0]['meli_expires_in'];
		}
	}

	public function setCookies()
	{
		$time	= time()+(3600*$this->getHours());
		$Year = time() + 31536000;
		setcookie("user",$this->AdminData[0]['user'],$time, "/");
		setcookie("password",$this->AdminData[0]['password'],$time, "/");
		if($this->RememberUser && $this->Link==self::LOGIN)
		{
			setcookie('rememberuser',$this->AdminData[0]['user'],$Year);
			setcookie('rememberpassword',$this->Password,$Year);

		}elseif(isset($_COOKIE['rememberuser'])){
			$Past = time()-100;
			setcookie('rememberuser','gone',$Past);
			setcookie('rememberpassword','gone',$Past);
		}
	}

	public function queryMaxTries()
	{
		$Success 								= $this->execQuery("insert",'login_log','user,password,ip,tries,event',"'".$this->User."','".$this->Password."','".$this->IP."','".$this->Tries."','Inhabilitado por Revocaci&oacute;n'");
		$SuccessInhabilitation 	= $this->execQuery('update','admin_user',"tries = 0, status = 'I'","user = '".$this->User."'");
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

	public function checkCustomer()
	{
		$Data 		= $this->fetchAssoc("admin_company","status","company_id=".$this->AdminData[0]['company_id']);
		$Customer = $Data[0];
		$Result 	= self::isValidCustomerStatus($Customer['status']);
		return $Result;
	}

	public static function isValidCustomerStatus($Status)
	{
		switch ($Status) {
			case 'A':
				return true;
			break;

			default:
				return false;
			break;
		}
	}

	public function getLink()
	{
		$ActualUrl	= explode("/",$_SERVER['PHP_SELF']);
		$this->Link	= $ActualUrl[count($ActualUrl)-2]."/".basename($_SERVER['PHP_SELF']);
	}

	public static function getHours()
	{
  	return self::HOURS;
	}

	public static function getMaxTries()
	{
  	return self::MAX_TRIES;
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PROCESS METHODS ///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function Startlogin()
	{
		$this->setData($_POST['user'],$_POST['password'],$_POST['rememberuser']);
		$this->setLogin();

		/* PROCESS */
		if($this->UserExists)/* User Existence */
		{
			if($this->IsMaxTries)/* Attempts to Login */
			{
				$this->queryMaxTries(); /* Max Tries Reached */
				echo "1";
			}else{
				if($this->PassMatch) /* Password Match*/
				{
					if($this->checkCustomer())
					{
						$this->setSessionVars();
						$this->setCookies();
						$this->queryLogin();
					}else{
						echo "4";
					}
				}else{
					$this->queryPasswordFail(); /* Password does not Match*/
					echo "2";
				}
			}
		}else{
			$this->queryWrongUser(); /* Nonexistent User */
			echo "3";
		}
	}
	
	public function Logout()
	{
		session_destroy();
		//Unset Cookies
		setcookie("renovatio", "", 0 ,"/");
		//setcookie("user", "", 0 ,"/");
		setcookie("password", "", 0 ,"/");
		setcookie("admin_id", "", 0 ,"/");
		setcookie("profile_id", "", 0 ,"/");
		setcookie("first_name", "", 0 ,"/");
		setcookie("last_name", "", 0 ,"/");
		//setcookie("password", "", 0 ,"/");
	}
}


?>
