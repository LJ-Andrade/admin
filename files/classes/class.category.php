<?php
	class Category extends DataBase
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
			$this->Data = $this->fetchAssoc("category","*","category_id=".$ID);
		}

		/********* GETTERS *********/
		public function getData()
		{
			return $this->Data;
		}

		public function getPrice()
		{
			return $this->Data;
		}
	}

?>