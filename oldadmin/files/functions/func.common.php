<?php

	function include_dir($Path,$s="/")
	{
		$handle = opendir($Path);
		while ($file = readdir($handle)) {
	    	$ext = substr(strtolower($file),-3);
	        if($ext == 'php') include_once($Path.$s.$file);
        }
        closedir($handle);
	}

	function GetDirFiles($Path)
	{
		$Files 	= array();
		if(!is_dir($Path)) mkdir($Path);
	    $Dir 	= opendir($Path);   
	    while ($Element = readdir($Dir)){
	        if( $Element != "." && $Element != ".."){
	            if( is_dir($Path.$Element) ){
	                //Add Dir Files
	                $Files[] = GetDirFiles($Element);
	            } else {
	                //Add File
	                $Files[] = $Element;
	            }
	        }
	    }
	    return $Files;
	}

	function GetFileTypeImg($Ext)
	{
		switch(strtolower($Ext))
		{
			case "xls":
			case "xlsx":
			case "xlt":
			case "xltx":
			case "csv":
				$Ext = "xls";
			break;
			case "doc":
			case "dot":
			case "docx":
			case "docm":
			case "dotx":
			case "dotm":
				$Ext = "doc";
			break;
			case "ppt":
			case "pot":
			case "pps":
				$Ext = "ppt";
			break;
			case "pdf":
				$Ext = "pdf";
			break;
			case "avi":
				$Ext = "avi";
			break;
			case "mp3":
				$Ext = "mp3";
			break;
			case "3gp":
				$Ext = "3gp";
			break;
			case "wav":
				$Ext = "wav";
			break;
			case "rar":
			case "zip":
				$Ext = "rar";
			break;
			case "wma":
				$Ext = "wma";
			break;
			case "wmv":
				$Ext = "wmv";
			break;
			default: $Ext = "txt"; break;

		}
		return $Ext;
	}

	function MonthFormat($Month)
	{
		$FormatedMonth		= array();
		$FormatedMonth[1]	= 'Enero';
		$FormatedMonth[2]	= 'Febrero';
		$FormatedMonth[3]	= 'Marzo';
		$FormatedMonth[4]	= 'Abril';
		$FormatedMonth[5]	= 'Mayo';
		$FormatedMonth[6]	= 'Junio';
		$FormatedMonth[7]	= 'Julio';
		$FormatedMonth[8]	= 'Agosto';
		$FormatedMonth[9]	= 'Septiembre';
		$FormatedMonth[10]	= 'Octubre';
		$FormatedMonth[11]	= 'Noviembre';
		$FormatedMonth[12]	= 'Diciembre';
		
		return $FormatedMonth[$Month];
	}
	
	function AddSlashesArray($Array)
	{
		foreach($Array as $Key => $Value)
		{
			$Array[$Key]	= addslashes($Value);
		}
		
		return $Array;
	}
	
	function DateTimeFormat($DateTime)
	// Returns a formated date
	{
		$DateTime	= explode(" ",$DateTime);
		$Time		= $DateTime[1];
		$Date		= explode("-",$DateTime[0]);
		$Day		= $Date[2];
		$Month		= MonthFormat(intval($Date[1]));
		$Year		= $Date[0];
		
		$DateTime	= $Day." de ".$Month." del ".$Year;
		return		$Time? $DateTime.", a las ".$Time : $DateTime;
		
	}
	
	function insertElement($Type,$ID='',$Value='',$Class='',$Extra='',$Query='',$FirstValue='',$FirstText='')
	// Returns Form Elements
	{
		if($Type=="checkbox")  $Class = 'CheckBox '.$Class;
		$Class	= $Class? ' class="'.$Class.'" ': '';
		if($Type!="textarea")
			if($Type!="select" && $Type!="button")  $Value	= $Value? ' value="'.$Value.'" ': '';


		
		switch(strtolower($Type)){
			case 'text': 		return '<input type="text" id="'.$ID.'" name="'.$ID.'"'.$Value.$Class.$Extra.' />'; break;
			case 'password': 	return '<input type="password" id="'.$ID.'" name="'.$ID.'"'.$Value.$Class.$Extra.' />'; break;
			case 'textarea': 	return '<textarea id="'.$ID.'" name="'.$ID.'"'.$Class.$Extra.' >'.$Value.'</textarea>'; break;
			case 'checkbox': 	return '<input type="checkbox" id="'.$ID.'" name="'.$ID.'"'.$Value.$Class.$Extra.' />'; break;
			case 'radio': 		return '<input type="radio" id="'.$ID.'" name="'.$ID.'"'.$Value.$Class.$Extra.' />'; break;
			case 'hidden': 		return '<input type="hidden" id="'.$ID.'" name="'.$ID.'"'.$Value.$Class.$Extra.' />'; break;
			case 'image': 		return '<input type="text" readonly="readonly" id="File'.$ID.'" name="FileField"'.$Value.$Class.$Extra.' /><input type="file" id="'.$ID.'" name="'.$ID.'" class="Hidden" />'; break;
			case 'file': 		return '<input type="text" readonly="readonly" id="File'.$ID.'" name="FileField"'.$Value.$Class.$Extra.' /><input type="file" id="'.$ID.'" name="'.$ID.'" class="Hidden" />'; break;
			case 'button': 		return '<button id="'.$ID.'" name="'.$ID.'"'.$Class.$Extra.' >'.$Value.'</button>'; break;
			case 'select': 		$Select	  = 	'<select id="'.$ID.'" name="'.$ID.'"'.$Class.$Extra.' firstvalue="'.$FirstValue.'" firsttext="'.$FirstText.'" >';
								$Select	 .= $FirstValue || $FirstText ? '<option value="'.$FirstValue.'" >'.$FirstText.'</option>' : '' ;
								
								if(is_array($Query))
								{
									while ($Data = current($Query))
									{
										if(is_array($Data))
										{
												$Selected 	= $Data[key($Data)] == $Value ? ' selected="selected" ' : '';
												$Select	   .= '<option value="'.$Data[key($Data)].'" '.$Selected.' >';
												next($Data);
												$Select .= $Data[key($Data)].'</option>';
											
										}else{
											
											$Selected	 = key($Query)==$Value ? ' selected="selected" ' : '';
											$Select		.= '<option value="'.key($Query).'" '.$Selected.' >'.$Data.'</option>';
											
										}
										next($Query);
									}
								}else{
									
									if($Query) include($Query);
									
								}
								$Select	.=	'</select>';
								return	$Select; break;
								
			default: 			return '<input type="'.$Type.'" id="'.$ID.'" name="'.$ID.'"'.$Value.$Class.$Extra.' />'; break;
		}
	}

	function ReplaceLatin($Str)
	{
		$Str = str_replace("ñ","n",$Str);
		$Str = str_replace("Ñ","N",$Str);
		$Str = str_replace("á","a",$Str);
		$Str = str_replace("Á","A",$Str);
		$Str = str_replace("é","e",$Str);
		$Str = str_replace("É","E",$Str);
		$Str = str_replace("í","i",$Str);
		$Str = str_replace("Í","I",$Str);
		$Str = str_replace("ó","o",$Str);
		$Str = str_replace("Ó","O",$Str);
		$Str = str_replace("ú","u",$Str);
		$Str = str_replace("Ú","U",$Str);
		$Str = str_replace(" ","",$Str);
		$Str = str_replace("ä","a",$Str);
		$Str = str_replace("Ä","A",$Str);
		$Str = str_replace("ë","e",$Str);
		$Str = str_replace("Ë","E",$Str);
		$Str = str_replace("ï","i",$Str);
		$Str = str_replace("Ï","I",$Str);
		$Str = str_replace("ö","o",$Str);
		$Str = str_replace("Ö","O",$Str);
		$Str = str_replace("ü","u",$Str);
		$Str = str_replace("Ü","U",$Str);
		$Str = str_replace("â","a",$Str);
		$Str = str_replace("Â","A",$Str);
		$Str = str_replace("ê","e",$Str);
		$Str = str_replace("Ê","E",$Str);
		$Str = str_replace("î","i",$Str);
		$Str = str_replace("Î","I",$Str);
		$Str = str_replace("ô","o",$Str);
		$Str = str_replace("Ô","O",$Str);
		$Str = str_replace("û","u",$Str);
		$Str = str_replace("Û","u",$Str);

		return $Str;
	}
	

	function FilterByField($Fields,$Table="")
	{
		$FieldsType	= TableData($Table);
		if(is_array($Fields))
		{
			$Where	= " 1=1 ";
			foreach($Fields as $ID => $Field)
			{
				$Field['type']	= $FieldsType[$ID]['type'];
				if($Field['value'])
				{
					switch(strtolower($Field['type']))
					{
						case 'num':
						case 'numeric':
						case 'numerico':
						case 'int':
						case 'integer':
						case 'decimal':
						case 'float':
							$Where .= MakeNumericField($ID,$Field['value'],$Field['condition']);
						break;
						case 'date':
						case 'datetime':
						case 'fecha':
						case 'calendar':
							$Where .= MakeDateField($ID,$Field['value'],$Field['condition'],$Field['second_value']);
						break;
						default: 
							$Where .= MakeStringField($ID,$Field['value'],$Field['condition']);
						break;
					}
				}
			}
			return $Where;
		}else{
			return "";
		}
	}

	function MakeNumericField($ID,$Value,$Condition)
	{
		switch(strtolower($Condition))
		{
			case 'igual':
			case 'igual a':
			case 'equal':
			case 'equal to':
			case '=':
				return " AND ".$ID." = ".$Value." ";
			break;
			case 'bigger':
			case 'higher':
			case 'bigger than':
			case 'higher than':
			case '>':
				return " AND ".$ID." > ".$Value." ";
			break;
			case 'lower':
			case 'smaller':
			case 'lower than':
			case 'smaller than':
			case '<':
				return " AND ".$ID." < ".$Value." ";
			break;
			default: return ""; break;
		}		
	}

	function MakeDateField($ID,$Value,$Condition,$SecondValue="")
	{
		switch(strtolower($Condition))
		{
			case 'igual':
			case 'igual a':
			case 'equal':
			case 'equal to':
			case '=':
				return " AND ".$ID." = '".$Value."' ";
			break;
			case 'bigger':
			case 'higher':
			case 'bigger than':
			case 'higher than':
			case '>':
				return " AND ".$ID." > '".$Value."' ";
			break;
			case 'lower':
			case 'smaller':
			case 'lower than':
			case 'smaller than':
			case '<':
				return " AND ".$ID." < '".$Value."' ";
			break;
			case 'between':
			case 'entre':
				return " AND ".$ID." BETWEEN '".$Value."' AND '".$SecondValue."' ";
			break;
			default: return ""; break;
		}		
	}

	function MakeStringField($ID,$Value,$Condition)
	{
		switch(strtolower($Condition))
		{
			case 'igual':
			case 'igual a':
			case 'equal':
			case 'equal to':
			case '=':
				return " AND ".$ID." = '".$Value."' ";
			break;
			case '%':
			case 'like':
			case '%%':
			case ' like ':
				return " AND ".$ID." LIKE '%".$Value."%' ";
			break;
			
			default: return "string"; break;
		}		
	}


	function TableData($Table)
	{
		$DB = new DataBase();
		$DB->Connect();
		$RsData = $DB->fetchAssoc("data",$Table);
		foreach ($RsData as $ID => $Row)
		{
			$Type 						= explode("(",$Row['type']);
			$Row['type']				= $Type[0];
			$TableData[$Row['field']]	= $Row['type'];
		}
		return $TableData;

	}

	function MoveImage($New,$Temp,$Old='')
	{
		$Tmp = array_reverse(explode("/", $Temp));
		if(file_exists($Old)) unlink($Old);
		if(file_exists($Temp))
		{
			copy($Temp, $New);
			unlink($Temp);
		}
		return file_exists($New);
	}
	
?>