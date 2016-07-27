<?php

class Head
{
	var $Title;
	var $DocType	= '<!DOCTYPE html>';
	var $HTML		= '<html lang="es">';
	var $Link		= array();
	var $Script		= array();
	var $Meta		= array();
	var $Favicon	= '';
	var $Charset	= "iso-8859-1";
	
	function __construct()
	{
		
	}
	
	function setHTML($HTML)
	{
		$this->HTML	= $HTML;
	}
	
	function setTitle($Title)
	{
		$this->Title	= "<title>".$Title."</title>";
	}
	
	function setHead(){
		echo $this->DocType;
		echo $this->HTML;
		echo "<head>";
		echo '<meta http-equiv="Content-Type" content="application/xhtml+xml; charset='.$this->Charset.'">';
    	echo '<meta charset="'.$this->Charset.'" >';
		include("../../includes/inc.head.php");
		echo $this->Title;
		echo $this->Favicon;
		$this->echoLink();
		$this->echoMeta();
		$this->echoScript();
		echo '	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    			<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
			    <!--[if lt IE 9]>
			        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			    <![endif]-->';
		echo "</head>";
	}
	
	function setDocType($DocType)
	{
		$this->DocType	= $DocType;
	}
	
	function setLink($href,$rel,$type)
	{
		$this->Link[]	= '<link href="'.$href.'" rel="'.$rel.'" type="'.$type.'" />';
	}

	function setStyle($href,$rel="stylesheet",$type="text/css")
	{
		$this->Link[]	= '<link href="'.$href.'" rel="'.$rel.'" type="'.$type.'" />';
	}
	
	function setScript($src)
	{
		$this->Script[]	= '<script src="'.$src.'" ></script>';
	}
	
	function setMeta($param1,$param2,$param3)
	{
		$this->Meta[]	= '<meta '.$param1.' '.$param2.' '.$param3.' />';
	}
	
	function echoLink(){
		foreach($this->Link as $Link)
		{
			echo $Link;
		}
	}
	
	function echoScript(){
		foreach($this->Script as $Script)
		{
			echo $Script;
		}
		
	}
	
	function echoMeta(){
		foreach($this->Meta as $Meta)
		{
			echo $Meta;
		}
	}
	
	function setFavicon($Rute)
	{
		$this->Favicon = '	<link rel="apple-touch-icon" href="'.$Rute.'">
    						<link rel="apple-touch-icon" sizes="114x114" href="'.$Rute.'">
    						<link rel="apple-touch-icon" sizes="72x72" href="'.$Rute.'">
    						<link rel="apple-touch-icon" sizes="144x144" href="'.$Rute.'">
    						<link rel="shortcut icon" href="'.$Rute.'" type="image/x-icon">';
	}
	
	function setCharset($Charset)
	{
		$this->Charset	= $Charset;
	}
		
}

?>