<?php

class FileData extends DataBase
{
	var		$TmpUrl;
	var		$Url;
	var		$TmpName;
	var		$Name;
	var		$Type;
	var		$Error;
	var		$Size;
	var		$Width;
	var		$Height;
	var		$NewWidth;
	var		$NewHeight;
	var		$Extension	= "jpeg";
	var		$Quality	= 100;
	var		$Path		= "../../../skin/images/body/pictures/";
	
	public function __construct($File,$Path="",$FileName="")
	{
		$this->Connect();
		
		if($Path)
			$this->SetPath($Path);
		
		if(is_array($File))
		{
			
			$Type			= array_reverse(explode("/",$File['type']));
			$this->TmpUrl	= $File['tmp_name'];
			$this->TmpName	= $File['name'];
			$this->Type		= $Type[0];
			$Extension		= array_reverse(explode(".",$File['name']));
			$this->Extension= $Extension[0];
			$this->Error	= $File['error'];
			$this->Size		= $File['size'];
			$this->Name		= $FileName ? $FileName.".".$this->Type : md5($this->TmpName.date("Y-m-d H:i:s")).".".$this->Type;
			$this->Url		= $this->Path.$this->Name;
			
		}elseif(count(explode(".",$File))>1){
			if(file_exists($File)){
				
				$this->TmpUrl	= $File;
				$Name			= array_reverse(explode("/",$File));
				$this->TmpName	= $Name[0];
				$Extension		= array_reverse(explode(".",$Name[0]));
				$this->Extension= $Extension[0];
				$Type			= array_reverse(explode(".",$Name[0]));
				$this->Type		= $Type[0];
				$this->Error	=  0;
				$this->Size		= filesize($File);
				$this->Url		= $this->TmpUrl;
				$this->Name		= $this->TmpName;
				
			}else{
				$this->Error	=  4;
			}
			
		}else{
			
			$Type			= array_reverse(explode("/",$_FILES[$File]['type']));
			$this->TmpUrl	= $_FILES[$File]['tmp_name'];
			$this->TmpName	= $_FILES[$File]['name'];
			$this->Type		= $Type[0];
			$Extension		= array_reverse(explode(".",$_FILES[$File]['name']));
			$this->Extension= $Extension[0];
			$this->Error	= $_FILES[$File]['error'];
			$this->Size		= $_FILES[$File]['size'];
			$this->Name		= $FileName ? $FileName.".".$this->Type : md5($this->TmpName.date("Y-m-d H:i:s")).".".$this->Type;
			$this->Url		= $this->Path.$this->Name;
			
		}
		
	}
	
	public function BuildImage($MaxWidth=0,$MaxHeight=0,$Mode="strict")
	{
		if(file_exists($this->Url)) $this->DeleteFile($this->Url);
		
		list($this->Width,$this->Height)	= getimagesize($this->TmpUrl);
		
		if($MaxWidth!=0 && $MaxHeight!=0 && $Mode!="free")
		{
			if($Mode=="limited"){
				$xRatio = $MaxWidth  / $this->Width;
				$yRatio = $MaxHeight / $this->Height;
				
				if(($this->Width > $MaxWidth) && ($this->Height > $MaxHeight)){
					
					if(($xRatio * $this->Height) < $MaxHeight)
					{
						
						$this->NewWidth		= $MaxWidth;
						$this->NewHeight 	= ceil($xRatio * $this->Height);
						
					}else{
					
						$this->NewWidth 	= ceil($yRatio * $this->Width);
						$this->NewHeight 	= $MaxHeight;
					}
					
				}
			}
			
			if($Mode=="strict"){
				
				$this->NewWidth		= $MaxWidth;
				$this->NewHeight 	= $MaxHeight;
				
			}
			
		}else{
			
			$this->NewWidth		= $this->Width;
			$this->NewHeight	= $this->Height;
			
		}
		
		$this->EditImage();
		return $this->Url;
	}
	
	public function CreateImageFrom()
	{
		switch($this->Extension)
		{
			case "bmp":		return $this->imagecreatefrombmp($this->TmpUrl); break;
			case "wbmp":	return imagecreatefromwbmp($this->TmpUrl); break;
			case "png": 	return imagecreatefrompng ($this->TmpUrl); break;
			case "gif": 	return imagecreatefromgif ($this->TmpUrl); break;
			default: 		return imagecreatefromjpeg($this->TmpUrl); break;
		}
	}
	
	public function EditImage()
	{
		$NewImg	= imagecreatetruecolor($this->NewWidth,$this->NewHeight);
		$White = imagecolorallocatealpha($NewImg, 255, 255, 255,10);
		//imagecolortransparent($NewImg);
		imagefilledrectangle($NewImg, 0, 0, $this->NewWidth, $this->NewHeight, $White);
		$OldImg = $this->CreateImageFrom();
		imagecopyresampled($NewImg,$OldImg,0,0,0,0,$this->NewWidth,$this->NewHeight,$this->Width,$this->Height);
		$this->Width	= $this->NewWidth;
		$this->Height	= $this->NewHeight;
		unlink($this->TmpUrl);
		$this->SaveImage($NewImg,$this->Url,$this->Quality,$this->Type);
		
	}
	
	public function SaveImage($Image,$Url,$Quality,$Type="jpg")
	{
		switch($Type)
		{
			case "png":  imagepng($Image,$Url,intval( $Quality*(9/100)) ); break;
			case "gif":  imagegif($Image,$Url,$Quality); break;
			default: 	 imagejpeg($Image,$Url,$Quality); break;
		}
	}

	public function SaveFile()
	{
		$NewFile = $this->Path.$this->Name;
		if(file_exists($NewFile)) unlink($NewFile);
		return move_uploaded_file($this->TmpUrl,$NewFile); 

	}
	
	public function DeleteFile($Url="")
	{
		$Url ? unlink($Url) :  unlink($this->Url) ;
	}
	
	public function SetPath($Path)
	{
		
		$this->Path	= $Path;
		
	}
	
	public function SetQuality($Quality)
	{
		
		$this->Quality	= $Quality;
		
	}
	
	public function SetFormatType($Extension)
	{
		
		$this->Extension	= $Extension;
		
	}
	
	function imagecreatefrombmp($filename)
	{
		if (! $f1 = fopen($filename,"rb")) return FALSE;
		
		$FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1,14));
	   	
		if ($FILE['file_type'] != 19778) return FALSE;
		
		
	 
	   	$BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel'.'/Vcompression/Vsize_bitmap/Vhoriz_resolution'.'/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1,40));
	   	$BMP['colors'] = pow(2,$BMP['bits_per_pixel']);
	   	if ($BMP['size_bitmap'] == 0) $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
	   	$BMP['bytes_per_pixel'] = $BMP['bits_per_pixel']/8;
	   	$BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
	   	$BMP['decal'] = ($BMP['width']*$BMP['bytes_per_pixel']/4);
	   	$BMP['decal'] -= floor($BMP['width']*$BMP['bytes_per_pixel']/4);
	   	$BMP['decal'] = 4-(4*$BMP['decal']);
	   	if ($BMP['decal'] == 4) $BMP['decal'] = 0;
	
	 
	   	$PALETTE = array();
	   	if ($BMP['colors'] < 16777216)
	   	{
			$PALETTE = unpack('V'.$BMP['colors'], fread($f1,$BMP['colors']*4));
	   	}
	
	 
	   	$IMG = fread($f1,$BMP['size_bitmap']);
	   	$VIDE = chr(0);
	
	   	$res = imagecreatetruecolor($BMP['width'],$BMP['height']);
	   	$P = 0;
	   	$Y = $BMP['height']-1;
	   	while ($Y >= 0)
	   	{
			$X=0;
			while ($X < $BMP['width'])
			{
			 if ($BMP['bits_per_pixel'] == 24)
				$COLOR = unpack("V",substr($IMG,$P,3).$VIDE);
		 	elseif ($BMP['bits_per_pixel'] == 16)
		 	{  
				$COLOR = unpack("n",substr($IMG,$P,2));
				$COLOR[1] = $PALETTE[$COLOR[1]+1];
		 	}
		 	elseif ($BMP['bits_per_pixel'] == 8)
		 	{  
				$COLOR = unpack("n",$VIDE.substr($IMG,$P,1));
				$COLOR[1] = $PALETTE[$COLOR[1]+1];
		 	}
		 	elseif ($BMP['bits_per_pixel'] == 4)
		 	{
				$COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
				if (($P*2)%2 == 0) $COLOR[1] = ($COLOR[1] >> 4) ; else $COLOR[1] = ($COLOR[1] & 0x0F);
				$COLOR[1] = $PALETTE[$COLOR[1]+1];
		 	}
		 	elseif ($BMP['bits_per_pixel'] == 1)
		 	{
				$COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
				if     (($P*8)%8 == 0) $COLOR[1] =  $COLOR[1]        >>7;
				elseif (($P*8)%8 == 1) $COLOR[1] = ($COLOR[1] & 0x40)>>6;
				elseif (($P*8)%8 == 2) $COLOR[1] = ($COLOR[1] & 0x20)>>5;
				elseif (($P*8)%8 == 3) $COLOR[1] = ($COLOR[1] & 0x10)>>4;
				elseif (($P*8)%8 == 4) $COLOR[1] = ($COLOR[1] & 0x8)>>3;
				elseif (($P*8)%8 == 5) $COLOR[1] = ($COLOR[1] & 0x4)>>2;
				elseif (($P*8)%8 == 6) $COLOR[1] = ($COLOR[1] & 0x2)>>1;
				elseif (($P*8)%8 == 7) $COLOR[1] = ($COLOR[1] & 0x1);
				$COLOR[1] = $PALETTE[$COLOR[1]+1];
		 	}
		 	else
				return FALSE;
		 	imagesetpixel($res,$X,$Y,$COLOR[1]);
		 	$X++;
		 	$P += $BMP['bytes_per_pixel'];
			}
			$Y--;
			$P+=$BMP['decal'];
	   	}
	
	
	   	fclose($f1);
		
	 	return $res;
	}
	
}


?>