<?php
	class Product extends DataBase
	{
		var 	$Data;
		
		public function __construct($ID=0)
		{
			$this->Connect();
			$this->setData($ID);
		}


		/********* SETTERS *********/

		public function setData($ID)
		{
			$this->Data = $this->fetchAssoc("product","*","product_id=".$ID);
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

		public function getProducts()
		{
			
		}
	}
?>