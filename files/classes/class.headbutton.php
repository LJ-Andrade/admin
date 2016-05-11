<?php

class HeadButton
{
	var $HTML				= '';
	var $Buttons 			= array();
	var $AddDefaultName 	= 'Agregar';
	var $DelDefaultName 	= 'Eliminar Seleccionados';
	
	function __construct($Add='',$Del='')
	{

		$this->SetDefaultNames($Add,$Del);
		$this->SetDefaultButtons();
	}

	function SetDefaultNames($Add='',$Del='')
	{
		if($Add)
			$this->AddDefaultName = $Add;
		if($Del)
			$this->AddDefaultName = $Del;
	}

	function SetDefaultButtons($DefaultAdd=true,$DefaultDel=true)
	{
		if($DefaultAdd)
			$this->SetButton($this->AddDefaultName,'mainbtn animated slideInDown','fa-user-plus','NewItem','new.php');
		if($DefaultDel)
			$this->SetButton($this->DelDefaultName,'mainbtn animated fadeIn mainbtnred Hidden','fa-trash','delselected','');	
	}
	
	function SetButton($Title,$Class='',$Icon='',$ID='',$Link='',$Extra='',$Order=0)
	{
		$NewButton = array();
		$NewButton['title'] = $Title;
		$NewButton['class'] = $Class;
		$NewButton['icon'] = $Icon;
		$NewButton['id'] = $ID;
		$NewButton['link'] = $Link;
		$NewButton['extra'] = $Extra;

		if($Order>0)
			$this->Buttons[$Order] = $NewButton;
		else
			$this->Buttons[] = $NewButton;

		return $NewButton;
	}
	
	function ShowButtons(){
		
		echo $this->GetHTML();
	}

	function GetHTML()
	{
		$HTML = "";
		foreach ($this->Buttons as $Button) {
			
			if($Button['icon'])
				$Value = '<i class="fa '.$Button['icon'].'"> '.$Button['title'].'</i>';
			else
				$Value = $Button['title'];
			
			$NewHTML = insertElement('button',$Button['id'],$Value,$Button['class'],$Button['extra']);

			if($Button['link'])
				$HTML .= '<a href="'.$Button['link'].'">'.$NewHTML.'</a>';
			else
				$HTML .= $NewHTML;

		}
		return $HTML;
	}
	
			
}

?>