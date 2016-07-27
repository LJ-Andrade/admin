<?php

class Foot
{
	var $HTML		= '<body><html>';
	var $Link		= array();
	var $Script		= array();
	var $Meta		= array();
	
	function __construct()
	{
		
	}
	
	function setHTML($HTML)
	{
		$this->HTML	= $HTML;
	}
	
	
	function setFoot()
	{
		include("../../includes/inc.foot.php");
		$this->echoLink();
		$this->echoMeta();
		$this->echoScript();
		echo $this->HTML;
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
		
}

?>