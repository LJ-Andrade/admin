<?php

class Foot
{
	var $HTML			= '<body><html>';
	var $Link			= array();
	var $Script		= array();
	var $Meta			= array();
	var $Includes = array();

	const INCFOOT = "../../includes/inc.foot.php";

	function __construct()
	{
		$this->Includes[] = self::INCFOOT;
	}

	function setFoot()
	{
		$this->echoIncludes();
		$this->echoLink();
		$this->echoMeta();
		$this->echoScript();
		$this->echoHTML();
	}

	function setHTML($HTML)
	{
		$this->HTML	= $HTML;
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

	function setInclude($src)
	{
		$this->Inludes[] = $src;
	}

	function echoLink()
	{
		foreach($this->Link as $Link)
		{
			echo $Link;
		}
	}

	function echoScript()
	{
		foreach($this->Script as $Script)
		{
			echo $Script;
		}

	}

	function echoMeta()
	{
		foreach($this->Meta as $Meta)
		{
			echo $Meta;
		}
	}

	function echoIncludes()
	{
		foreach($this->Includes as $Include)
		{
			include($Include);
		}
	}

	function echoHTML()
	{
		echo $this->HTML;
	}

}

?>
