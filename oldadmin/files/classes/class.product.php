<?php
	class Product extends DataBase
	{
		var $ID;
		var $Data;
		
		public function __construct($ID=0)
		{
			$this->Connect();
			$this->ID = $ID;
			$this->setData($ID);
		}


		/********* SETTERS *********/

		public function setData()
		{
			$Data 		= $this->fetchAssoc("product","*","product_id=".$this->ID);
			$this->Data = $Data[0];
		}

		/********* GETTERS *********/
		public function getData()
		{
			return $this->Data;
		}

		public function getPrice()
		{
			return $this->Data['price'];
		}

		public function getImages()
		{
			if(!$this->Images)
				$this->Images = $this->fetchAssoc('product_image','*',"product_id=".$this->ID,"position");
			return $this->Images;
		}

		public function getFirstImage()
		{
			$Images = $this->getImages();
			return $Images[0];
		}
	}
?>