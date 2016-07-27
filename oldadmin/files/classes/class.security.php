<?php 

class Security extends dataBase
{
	var $Profile_id;
	var $User;
	var $Password;
	var $Link;
	var $File;
	var $ErrorMsg	= "Debe estar logueado para ingresar al sistema";
	var $IsLogged	= false;
	var $MenuData 	= array();
	var $ProfileData 	= array();

	const PROFILE		= 333;
	const LOGIN			= 'login/login.php';
	const DESTINATION	= '../main/main.php';
	
	function __construct($User='',$Password='')
	{
		$this->Connect();
		// $User 				= !$User && isset($_COOKIE['rememberuser'])? $_COOKIE['rememberuser'] : $User;
		// $User 				= !$User && isset($_COOKIE['rememberpassword'])? md5($_COOKIE['rememberpassword']) : $User;
		$this->User			= isset($_COOKIE['user'])? 			$_COOKIE['user'] 		: $User;
		$this->Password		= isset($_COOKIE['password'])? 		$_COOKIE['password'] 	: $Password;
		$this->File			= basename($_SERVER['PHP_SELF']);
		$this->getLink();
		$MenuData			= $this->fetchAssoc("menu","menu_id,public","link LIKE '%".$this->Link."%'");
		$this->MenuData		= $MenuData[0];
	}
	
	public function checkProfile($AdminID=0)
	{		
		if($this->User!='' && $this->Password!='')
		{
			$ProfileData		= $this->fetchAssoc("admin_user","profile_id","user = '".$this->User."' AND password='".$this->Password."'");
			$this->ProfileData	= $ProfileData[0];

			if($this->checkException() && $this->ProfileData['profile_id']!=self::PROFILE)
			{
				$Groups    		= $this->fetchAssoc("relation_admin_group","group_id","admin_id=".$AdminID);
				$AdminGroups 	= array();
				$AdminGroups[]	= 0;
				foreach($Groups as $Group)
				{
					$AdminGroups[]	= $Group['group_id'];
				}
				$MenuGroups 	= implode(",",$AdminGroups);
				$Rows			= $this->numRows("relation_menu_profile","*","menu_id = ".$this->MenuData['menu_id']." AND profile_id = ".$this->ProfileData['profile_id']);
				$Exceptions 	= $this->numRows("menu_exception","*","menu_id = ".$this->MenuData['menu_id']." AND admin_id = ".$AdminID);
				$GroupsAllowed 	= $this->numRows("relation_menu_group","*","menu_id = ".$this->MenuData['menu_id']." AND group_id IN (".$MenuGroups.")");
				
				if($Rows<1 && $Exceptions<1 && $GroupsAllowed<1){header("Location: ".$_SERVER['HTTP_REFERER']); echo '<script>window.history.go(-1)</script>';}
			}elseif($this->Link==self::LOGIN){
				header("Location: ".self::DESTINATION);
			}
			$this->IsLogged		= true;
			return true;
		}else{
			if($this->checkException() && $this->File!='login.php')
			{
				header("Location: ../login/login.php?error=login");
			}
			return false;	
		}
	}
	
	public function getLink()
	{
		$ActualUrl	= explode("/",$_SERVER['PHP_SELF']);
		$this->Link	= $ActualUrl[count($ActualUrl)-2]."/".$this->File;
	}
	
	public function checkException()
	{
		if(isset($this->MenuData['menu_id']))
		{
			return 	$this->MenuData['public']!='Y';
		}
		else
		{
			return false;
		}
	}
	
}

?>